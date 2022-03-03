<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlimentController extends AbstractController
{
  #[Route('/admin/aliment', name: 'admin_aliments')]
  public function index(AlimentRepository $repository): Response
  {
    $aliments = $repository->findAll();
    return $this->render('admin/admin_aliment/index.html.twig', [
      'aliments' => $aliments,
    ]);
  }

  #[Route('/admin/aliment/new', name: 'admin_aliments_new')]
  #[Route('/admin/aliment/{id}', name: 'admin_aliments_edit', methods:['GET','POST'])]
  public function addAndEdit(Aliment $aliment = null, Request $request, EntityManagerInterface $manager): Response
  {
    if (!$aliment) {
      $aliment = new Aliment();
    }
    $form = $this->createForm(AlimentType::class, $aliment);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($aliment);
      $manager->flush();
      return $this->redirectToRoute('admin_aliments');
    }
    return $this->render('admin/admin_aliment/newAndEdit.html.twig', [
      'aliment' => $aliment,
      'form' => $form->createView(),
      'edition' => $aliment->getId() !== null

    ]);
  }

  #[Route("admin/aliment/{id}", name: 'admin_aliments_delete', methods: ['DELETE'])]
  public function suppression(Aliment $aliment = null, Request $request, EntityManagerInterface $manager): Response
  {
    if ($this->isCsrfTokenValid('SUP' . $aliment->getId(), $request->get('_token'))) {
      $manager->remove($aliment);
      $manager->flush();
      return $this->redirectToRoute('admin_aliments');
    }
  }
}
