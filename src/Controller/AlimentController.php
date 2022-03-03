<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlimentController extends AbstractController
{
    #[Route('/', name: 'aliments')]
    public function index(AlimentRepository $repository): Response
    {
      $aliments = $repository->findAll();
        return $this->render('aliment/index.html.twig', [
            'aliments' => $aliments,
        ]);
    }
}
