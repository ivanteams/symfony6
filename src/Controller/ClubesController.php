<?php

namespace App\Controller;

use App\Entity\Clubes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

#[Route('/clubes', name: 'app_clubes')]
class ClubesController extends AbstractController
{
    #[Route('/insertarClubes', name: 'app_insertarClubes')]
    public function index(EntityManagerInterface $gestorEntidades): Response
    {
        // endpoint de ejemplo: http://127.0.0.1:8000/clubes/insertarClubes
        $clubes = array(
            "betis" => array(
                "cif" => "12345678A",
                "nombre" => "Real Betis",
                "fundacion" => "1907-09-12",
                "num_socios" => 200,
                "estadio" => "Benito Villamarín"
            ),
            "sevilla" => array(
                "cif" => "23456789B",
                "nombre" => "Sevilla FC",
                "fundacion" => "1905-10-15",
                "num_socios" => 450,
                "estadio" => "Sánchez Pizjuan"
            )
        );

        foreach ($clubes  as $registro) {
            try {
                $club = new Clubes();
                $club->setCif($registro['cif']);
                $club->setNombre($registro['nombre']);

                // Para las fechas, creamos objeto DateTime
                $fundacion = new DateTime($registro['fundacion']);
                $club->setFundacion($fundacion);

                $club->setNumSocios($registro['num_socios']);
                $club->setEstadio($registro['cif']);

                // Hago el insert, persistiendo el registro
                $gestorEntidades->persist($club);
                $gestorEntidades->flush();
            } catch (UniqueConstraintViolationException $e) {
                return new Response("<h1>ERROR Clave primaria DUPLICADA! </h1>");
            }
        }

        return new Response("<h1>Clubes Insertados: </h1>");
    }
}
