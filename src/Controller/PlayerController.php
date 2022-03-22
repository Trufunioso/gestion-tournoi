<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    #[Route('/player', name: 'app_player')]
    public function index(PlayerRepository $repo): Response
    {
        $players = $repo->findAll();

        return $this->render('player/index.html.twig', [
            'controller_name' => 'PlayerController',
            'players' => $players
        ]);
    }

    #[Route('/add', name: 'player_add')]
    public function add(Request $request, EntityManagerInterface $em, PlayerRepository $repo)
    {
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        $formView = $form->createView();

        if($form->isSubmitted()) {
            //dd($form->getData());

            $em->persist($player);
            $em->flush();
            $this->addFlash('success', 'Joueur ajouté');
            return $this->redirectToRoute('app_player');
        }

        return $this->render('player/add.html.twig', [
            'form' => $formView
        ]);
    }
}
