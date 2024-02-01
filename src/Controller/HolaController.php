<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HolaController extends AbstractController
{
    #[Route('/hola/{nombre}/{apellido}', name: 'app_hola', methods: 'GET')]
    public function index(String $nombre, String $apellido): Response
    {
        return $this->render('hola/index.html.twig', [
            'controller_name' => 'HolaController',
            'nombre' => $nombre,
            'apellido' => $apellido,
        ]);
    }

    public function suma(int $num1, String $num2): Response
    {
        $resultado = $num1 + $num2;
        return new Response("<h1> La suma es: $resultado </h1>");
    }
}
