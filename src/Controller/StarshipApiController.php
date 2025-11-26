<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {
        $all_ships = $repository->findAll();
        return $this->json($all_ships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function getStarship(StarshipRepository $repository, int $id): Response
    {
        $starship = $repository->find($id);
        if ($starship) {
            return $this->json($starship);
        }
        throw $this->createNotFoundException('No such starship');
    }


}