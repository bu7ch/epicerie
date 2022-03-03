<?php

namespace App\Controller\Admin;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAlimentController extends AbstractController
{
    #[Route('/admin/admin/aliment', name: 'admin_aliments')]
    public function index(AlimentRepository $repository): Response
    {
      $aliments = $repository->findAll();
        return $this->render('admin/admin_aliment/index.html.twig', [
            'aliments' => $aliments,
        ]);
    }

    
}
