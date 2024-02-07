<?php

namespace App\Controller;

use App\Entity\Alumnos;
use App\Entity\Aulas;
use DateTime;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/alumnos', name: 'app_alumnos')]
class AlumnosController extends AbstractController
{
    #[Route('/insertarAlumnos', name: 'app_alumnos_insertar1')]
    public function index(EntityManagerInterface $gestorEntidades): Response
    {
        // endpoint de ejemplo: http://127.0.0.1:8000/alumnos/insertarAlumnos
        $alumnos = array(
            "alu1" => array(
                "nif" => "22223333J",
                "nombre" => "Blanca",
                "edad" => 30,
                "sexo" => 1,
                "fechanac" => "1994-01-10",
                "num_aula" => 23
            ),
            "alu2" => array(
                "nif" => "44445555X",
                "nombre" => "Alba",
                "edad" => 28,
                "sexo" => 1,
                "fechanac" => "1992-02-02",
                "num_aula" => 23
            )
        );

        $otrosAlumnos = array(
            "alu1" => array(
                "nif" => "77778888G",
                "nombre" => "José Antonio",
                "edad" => 30,
                "sexo" => 0,
                "fechanac" => "1994-01-10",
                "num_aula" => 22
            ),
            "alu2" => array(
                "nif" => "99996666H",
                "nombre" => "Jairo",
                "edad" => 28,
                "sexo" => 0,
                "fechanac" => "1992-02-02",
                "num_aula" => 22
            )
        );


        foreach ($alumnos as $registro) {
        //foreach ($otrosAlumnos as $registro) {
            $alumno = new Alumnos();
            $alumno->setNif($registro['nif']);
            $alumno->setNombre($registro['nombre']);
            $alumno->setEdad($registro['edad']);
            $alumno->setSexo($registro['sexo']);

            $fecha = new DateTime($registro['fechanac']);
            $alumno->setFechanac($fecha);

            /*
            $aula = $gestorEntidades->getRepository(Aulas::class)
                ->findOneBy(["num_aula" => $registro['num_aula']]); */

            $repoAulas =  $gestorEntidades->getRepository(Aulas::class);
            $paramBusqueda = ["num_aula" => $registro['num_aula']];
            $aula = $repoAulas->findOneBy($paramBusqueda);

            $alumno->setAulasNumAula($aula);

            $gestorEntidades->persist($alumno);
            $gestorEntidades->flush();
        }

        return new Response("<h1>Insertado Alumnado</h1>");
    }


    #[Route('/insertar/{nif}/{nombre}/{edad}/{sexo}/{fechanac}/{numAula}', name: 'app_insertar2')]
    public function meteAlumno(
        String $nif,
        String $nombre,
        int $edad,
        bool $sexo,
        String $fechanac,
        int $numAula,
        EntityManagerInterface $gestorEntidades
    ): Response {
        // endpoint de ejemplo: 
        // http://127.0.0.1:8000/alumnos/insertar/45612378K/Juan Carlos/22/0/2001-09-16/23

        $alumno = new Alumnos();
        $alumno->setNif($nif);
        $alumno->setNombre($nombre);
        $alumno->setEdad($edad);
        $alumno->setSexo($sexo);

        $fecha = new DateTime($fechanac);
        $alumno->setFechanac($fecha);


        $aula = $gestorEntidades->getRepository(Aulas::class)
            ->findOneBy(["num_aula" => $numAula]);

        $alumno->setAulasNumAula($aula);

        $gestorEntidades->persist($alumno);
        $gestorEntidades->flush();


        return new Response("<h1>Insertado Alumnado</h1>");
    }


    #[Route('/verAlumnos/{aula}/{sexo}', name: 'app_alumnos_ver_alumnos')]
    public function verAlumnos(
        EntityManagerInterface $gestorEntidades,
        int $aula,
        bool $sexo
    ): JsonResponse {
        // Ejemplo endpoint: http://127.0.0.1:8000/alumnos/verAlumnos/23/1
        $repoAlumnos = $gestorEntidades->getRepository(Alumnos::class);
        $param = ['aulas_num_aula' => $aula, 'sexo' => $sexo];
        $paramOrdenacion = ['nombre' => 'ASC'];
        $filasAlumnos = $repoAlumnos->findBy($param, $paramOrdenacion);

        $json = array();
        foreach ($filasAlumnos as $alumno) {
            $json[] = array(
                'nif' => $alumno->getNif(),
                'nombre' => $alumno->getNombre(),
                'edad' => $alumno->getEdad()
            );
        }

        return new JsonResponse($json);
    }

    /**
     * @todo Endpoint que saque JOIN entre Alumnos y Aulas (Num y docente)
     * @todo Presentar datos en una tabla BS5 en twig
     * JOIN a modo de José Antonio
     */
    #[Route('/consultarAlumnos', name: 'app_alumnos_consultar_alumnos')]
    public function consultarAlumnos(ManagerRegistry $gestorDoctrine): Response{
        $conexion = $gestorDoctrine->getConnection();
        $alumnos = $conexion
            ->prepare("SELECT nif, nombre, sexo, num_aula, docente, fechanac
                        FROM aulas 
                        JOIN alumnos
                        ON num_aula = aulas_num_aula")
            ->executeQuery()
            ->fetchAllAssociative();

        // Para probarlo, como dice JAVI el back ha hecho su trabajo
        /*
        $contenidoAlumnos = json_encode($alumnos);
        return new Response($contenidoAlumnos); */

        return $this->render('alumnos/index.html.twig', [
            'controller_name' => 'Controlador Alumnos',
            'filasAlumnos' => $alumnos,
        ]);
        
    }
}
