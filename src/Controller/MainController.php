<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController {
    #[Route('/')]
    public function home(): Response
    {
        return new Response('<strong>Hi</strong> There!',$status = 200, $headers = ['Content-Type' => 'text/html']);
    }
}