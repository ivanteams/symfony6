<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HolaController extends AbstractController
{
    #[Route('/hola/{nombre}/{apellido}', name: 'app_hola', methods:'GET')]
    public function index(String $nombre, String $apellido): Response
    {
        return $this->render('hola/index.html.twig', [
            'controller_name' => 'HolaController',
            'nombre' => $nombre,
            'apellido' => $apellido,
        ]);
    }
}
