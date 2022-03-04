<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminSecuController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function inscription(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordhaser): Response
    {
      $utilisateur = new Utilisateur();
      $form = $this->createForm(InscriptionType::class, $utilisateur);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $passwordhashed = $passwordhaser->hashPassword($utilisateur, $utilisateur->getPassword());
        $utilisateur->setPassword($passwordhashed);

        $manager->persist($utilisateur);
        $manager->flush();
      }
        return $this->render('admin_secu/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/login', name: 'connexion')]
    public function login() {
      return $this->render('admin_secu/login.html.twig',[]);
    }

    #[Route('/logout', name: 'deconnexion')]
    public function logout() {
    }

}
