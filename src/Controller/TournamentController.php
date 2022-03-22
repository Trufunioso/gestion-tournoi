<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Repository\TournamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TournamentController extends AbstractController
{
    #[Route('/tournament', name: 'default_tournament')]
    public function index(TournamentRepository $repo): Response
    {
        $tournois = $repo->findAll();

        return $this->render('tournament/index.html.twig', [
            'controller_name' => 'TournamentController',
            'tournois' => $tournois
        ]);
    }
}
