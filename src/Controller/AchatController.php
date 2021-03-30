<?php

namespace App\Controller;

use App\Entity\Achat;
use App\Form\AchatType;
use App\Repository\AcheterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vente")
 */
class AchatController extends AbstractController
{
    /**
     * @Route("/", name="vente_index", methods={"GET"})
     */
    public function index(AcheterRepository $acheterRepository): Response
    {
        return $this->render('achat/index.html.twig', [
            'achats' => $acheterRepository->findAll(),
        ]);
    }

   
}
