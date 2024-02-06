<?php

namespace App\Controller;

use App\Entity\Alumnos;
use App\Entity\Aulas;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/alumnos', name: 'app_alumnos')]
class AlumnosController extends AbstractController
{
    #[Route('/insertarAlumnos', name: 'app_alumnos')]
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
                "sexo" => 1,
                "fechanac" => "1994-01-10",
                "num_aula" => 22
            ),
            "alu2" => array(
                "nif" => "99996666H",
                "nombre" => "Jairo",
                "edad" => 28,
                "sexo" => 1,
                "fechanac" => "1992-02-02",
                "num_aula" => 22
            )
        );



        foreach ($otrosAlumnos as $registro) {
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

            $paramBusqueda = ["num_aula" => $registro['num_aula']];
            $repoAulas =  $gestorEntidades->getRepository(Aulas::class);
            $aula = $repoAulas->findOneBy($paramBusqueda);

            $alumno->setAulasNumAula($aula);

            $gestorEntidades->persist($alumno);
            $gestorEntidades->flush();
        }

        return new Response("<h1>Insertado Alumnado</h1>");
    }
}
