<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StarshipController extends AbstractController
{
    #[Route('/starship/{id<\d+>}', name: 'app_starship_show')]
    public function showStarship(int $id, StarshipRepository $repository): Response
    {
        $starship = $repository->find($id);
        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->render('starship/show.html.twig', [
            'ship' => $starship,
        ]);
    }
}