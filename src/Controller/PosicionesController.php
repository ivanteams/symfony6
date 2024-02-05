<?php

namespace App\Controller;

use App\Entity\Posiciones;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Importamos clases abstractas de gestión BBDD
use Doctrine\Persistence\ManagerRegistry;

#[Route('/posiciones', name: 'app_posiciones')]
class PosicionesController extends AbstractController
{

    #[Route('/insertarPosiciones', name: 'app_insertarPosiciones')]
    public function index(ManagerRegistry $gestorFilas): Response
    {
        // endpoint de ejemplo: http://127.0.0.1:8000/posiciones/insertarPosiciones
        $gestorEntidades = $gestorFilas->getManager();

        $posiciones = ["portero", "defensa", "medio", "delantero"];
        foreach ($posiciones as $nuevaPosicion) {
            $posicion = new Posiciones();
            $posicion->setPosicion($nuevaPosicion);
            $gestorEntidades->persist($posicion);
            $gestorEntidades->flush();
        }

        return new Response("Posiciones Insertadas");
    }
}
