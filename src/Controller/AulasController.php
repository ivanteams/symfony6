<?php

namespace App\Controller;

use App\Entity\Aulas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Importamos clases abstractas de gestión BBDD
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/aulas', name: 'app_aulas')]
class AulasController extends AbstractController
{
    #[Route('/{numAula}/{capacidad}/{docente}/{hardware}', name: 'app_aulas_insertarAula')]
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

    #[Route('/insertarAulas', name: 'app_aulas_insertarAulas')]
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


        return new Response("<h1>Registros Insertados: </h1>");
    }
}
