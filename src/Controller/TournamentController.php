<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Tournament;
use App\Form\TournamentType;
use App\Repository\TournamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TournamentController extends AbstractController
{
    #[Route('/tournament', name: 'default_tournament')]
    public function index(TournamentRepository $repo): Response
    {
        $tournois = $repo->findAllWithPlayers();

        return $this->render('tournament/index.html.twig', [
            'controller_name' => 'TournamentController',
            'tournois' => $tournois
        ]);
    }

    #[Route('/addTournament', name: 'tournament_add')]
    public function addTournament(Request $request, EntityManagerInterface $em)
    {
        $tournament = new Tournament();
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        $formView = $form->createView();

        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($tournament);
            $em->flush();
            return $this->redirectToRoute('default_tournament');
        }

        return $this->render('tournament/add.html.twig', [
            'tournament' => $tournament,
            'form' => $formView
        ]);

    }

    #[Route('/participate/{id}', name: 'participate')]
    public function participate($id, TournamentRepository $repo, EntityManagerInterface $em)
    {
        $player = $this->getUser();
        //dd($player);
        //$playerId = $player->getId();
        $tournoi = $repo->find($id);
        //dd($tournoi);
        $tournoi->addPlayer($player);

        $em->persist($player);
        $em->flush();

        return $this->render('/tournament/participate.html.twig', [
            't' => $tournoi
        ]);
    }

    #[Route('/tournament/{id}', name: 'tournament_show')]
    public function show($id, TournamentRepository $repo)
    {
        $tournoi = $repo->findWithPlayers($id);
        $players = $tournoi->getPlayers();


        return $this->render('/tournament/show.html.twig', [
            'tournoi' => $tournoi,
            'players' => $players
        ]);
    }
}
