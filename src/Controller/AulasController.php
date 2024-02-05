<?php

namespace App\Controller;

use App\Entity\Aulas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/aulas', name: 'app_aulas')]
class AulasController extends AbstractController
{
    #[Route('/{numAula}/{capacidad}/{docente}/{hardware}', name: 'app_aulas_insertar1')]
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
}
