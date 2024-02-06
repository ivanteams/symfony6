<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/alumnos', name: 'app_alumnos')]
class AlumnosController extends AbstractController
{
    #[Route('/insertarAlumnos', name: 'app_alumnos')]
    public function index(): Response
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

        return new Response("<h1>Insertado Alumnado</h1>");
    }
}
