<?php

namespace App\Controller;

use App\Entity\Aulas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Importamos clases abstractas de gestión BBDD
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * REANUDAR BBDD
 * - En MySQL: DROP DATABASE soltel_liga;
 * php bin/console doctrine:database:create
 * php bin/console doctrine:migrations:migrate 
 * 
 * LISTADO ENDPOINTS
 * http://127.0.0.1:8000/aulas/23/15/Iván Rodríguez/1
 * http://127.0.0.1:8000/aulas/insertarAulas
 * http://127.0.0.1:8000/alumnos/insertarAlumnos
 * http://127.0.0.1:8000/alumnos/insertar/45612378K/Juan Carlos/22/0/2001-09-16/23
 * http://127.0.0.1:8000/clubes/insertarClubes
 * 
 * SACAR LISTADO DE TABLAS
 * php bin/console dbal:run-sql 'SELECT * FROM alumnos'
 */

#[Route('/aulas', name: 'app_aulas_')]
class AulasController extends AbstractController
{
    #[Route('/{numAula}/{capacidad}/{docente}/{hardware}', name: 'insertarAula')]
    public function index(
        int $numAula,
        int $capacidad,
        String $docente,
        bool $hardware,
        EntityManagerInterface $gestorEntidades
    ): Response {
        // endpoint de ejemplo:
        // http://127.0.0.1:8000/aulas/23/15/Iván Rodríguez/1

        $aula = new Aulas();
        // Voy asignando los distintos campos...
        $aula->setNumAula($numAula);
        $aula->setCapacidad($capacidad);
        $aula->setDocente($docente);
        $aula->setHardware($hardware);

        // Hago el insert, persistiendo el registro
        $gestorEntidades->persist($aula);
        $gestorEntidades->flush();

        return new Response("<h1>Registro Insertado: $numAula, $capacidad, $docente, $hardware</h1>");
        /*
        return $this->render('aulas/index.html.twig', [
            'controller_name' => 'AulasController',
        ]);
        */
    }

    #[Route('/insertarAulas', name: 'insertarAulas')]
    public function insertarAulas(ManagerRegistry $gestorFilas): Response
    {
        // endpoint de ejemplo: http://127.0.0.1:8000/aulas/insertarAulas
        $gestorEntidades = $gestorFilas->getManager();

        $aulas = array(
            "aula1" => array(
                "num_aula" => 21,
                "capacidad" => 2,
                "docente" => "Isabel Álvarez",
                "hardware" => 0
            ),
            "aula2" => array(
                "num_aula" => 22,
                "capacidad" => 15,
                "docente" => "Ignacio Mejias",
                "hardware" => 0
            )
        );

        foreach ($aulas as $clave => $registro) {
            $aula = new Aulas;
            // Voy asignando los distintos campos...
            $aula->setNumAula($registro["num_aula"]);
            $aula->setCapacidad($registro["capacidad"]);
            $aula->setDocente($registro["docente"]);
            $aula->setHardware($registro["hardware"]);

            // Hago el insert, persistiendo el registro
            $gestorEntidades->persist($aula);
            $gestorEntidades->flush();
        }


        return new Response("<h1>Registros Insertados. </h1>");
    }

    // APLICACIÓN AULAS
    #[Route('/consultarAulas', name: 'consultarAulas')]
    public function consultarAulas(ManagerRegistry $gestorFilas): JsonResponse
    {
        // endpoint de ejemplo: http://127.0.0.1:8000/aulas/consultarAulas
        // Saco el gestor de entidades a partir del gestor de Filas (mas genérico)
        $gestorEntidades = $gestorFilas->getManager();
        // Desde el gestor de entidades, saco el repositorio de mi clase
        $repoAulas =  $gestorEntidades->getRepository(Aulas::class);
        $filasAulas = $repoAulas->findAll();


        $json = array();
        foreach ($filasAulas as $aula) {
            $json[] = array(
                'numAula' => $aula->getNumAula(),
                'capacidad' => $aula->getCapacidad(),
                'docente' => $aula->getDocente(),
                'hardware' => $aula->isHardware(),
            );
        }

        return new JsonResponse($json);


        return $this->render('aulas/index.html.twig', [
            'controller_name' => 'Controlador Aulas',
            'tabla' => $filasAulas,
        ]);
    }


    #[Route('/actualizarAula/{numAula}/{capacidad}/{docente}/{hardware}', name: 'actualizarAula')]
    public function actualizarAula(
        ManagerRegistry $gestorFilas,
        $numAula,
        $capacidad,
        $docente,
        $hardware
    ): Response {
        // endpoint de ejemplo: http://127.0.0.1:8000/aulas/actualizarAula/21/1/Isabel Álvarez Sánchez/1

        /* Modo virguero
        $gestorEntidades = $gestorFilas->getManager();
        $aula = $gestorEntidades->getRepository(Aulas::class)->findOneBy(["num_aula" => $numAula]); */

        $gestorEntidades = $gestorFilas->getManager();
        $repoAulas = $gestorEntidades->getRepository(Aulas::class);
        $arrayCriterios = ["num_aula" => $numAula];
        $aula = $repoAulas->findOneBy($arrayCriterios);

        if (!$aula) {
            return new Response("<p style='color:red; font-weight: bold'>NO existe Aula con número $numAula</p>");
        } else {
            // Procedemos con la actualización
            $aula->setCapacidad($capacidad);
            $aula->setDocente($docente);
            $aula->setHardware($hardware);
            $gestorEntidades->flush();

            // Redirección entre endpoints. Usamos redirectToRoute -> Poner EL NOMBRE no la ruta
            return $this->redirectToRoute("app_aulas_consultarAulas");
        }
    }
}
