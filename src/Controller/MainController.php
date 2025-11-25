<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function home(): Response
    {
        $starshipCount = 457;

        $enterprise = ['name' => 'Enterprise', 'class' => 'Explorer', 'registry' => 'NCC-1701', 'captain'=> 'James T. Kirk'];
        return $this->render('main/homepage.html.twig', [
            'starship_count' => $starshipCount,
            'myShip' => $enterprise,
        ]);
        //new Response('', $status = 200, $headers = ['Content-Type' => 'text/html']);
    }
}
