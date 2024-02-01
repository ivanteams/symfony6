<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Atributos Symfony6 (#[Route]) y anotaciones Symfony5 (@Route)
#[Route('/num-aleatorios', name: 'app_aleatorios')]
/**
 * @Route("/num-aleatorios", name="app_aleatorios")
 */
class AleatorioController extends AbstractController
{
    #[Route('/num1', name: 'app_aleatorio',  methods: ["GET",])]
    public function index(): Response
    {
        $numAleatorio = random_int(0, 100);

        return $this->render('aleatorio/index.html.twig', [
            'controller_name' => 'AleatorioController',
            'numeroAleatorio' => $numAleatorio,
        ]);
    }

    // El atributo en línea tiene prioridad
    #[Route('/num2', name: 'app_aleatorio2',  methods: ["GET",])]
    public function index2(): Response
    {
        $numAleatorio = "000";
        return new Response("<h1>El aleatorio es: $numAleatorio</h1>");
    }

    public function index3(): Response
    {
        $numAleatorio = "666";

        return $this->render('aleatorio/index.html.twig', [
            'controller_name' => 'AleatorioController',
            'numeroAleatorio' => $numAleatorio,
        ]);
    }
}
