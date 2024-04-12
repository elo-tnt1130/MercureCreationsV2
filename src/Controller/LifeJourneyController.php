<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LifeJourneyController extends AbstractController
{
    #[Route('/lifejourney', name: 'app_lifejourney')]
    public function index(): Response
    {
        return $this->render('front-office/life_journey.html.twig', [
            'controller_name' => 'LifeJourneyController',
        ]);
    }
}
