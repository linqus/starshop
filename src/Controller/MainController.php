<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function home(StarshipRepository $repository): Response
    {
        $ships = $repository->findAll();
        
        $random_ship = $ships[array_rand($ships)];
        return $this->render('main/homepage.html.twig', [
            'starships' => $ships,
            'myShip' => $random_ship,
        ]);
        //new Response('', $status = 200, $headers = ['Content-Type' => 'text/html']);
    }
}
