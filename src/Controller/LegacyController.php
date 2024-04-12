<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LegacyController extends AbstractController
{
    #[Route('/legacy', name: 'app_legacy')]
    public function index(): Response
    {
        return $this->render('front-office/legacy.html.twig', [
            'controller_name' => 'LegacyController',
        ]);
    }
}
