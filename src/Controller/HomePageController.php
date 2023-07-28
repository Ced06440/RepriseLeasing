<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        $annonces = $em->getRepository(Annonce::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $annonces = $em->getRepository(Annonce::class)->findAllVisible($search);
        }
        dump($annonces);

        return $this->render('home_page/index.html.twig',
            [
                'annonces' => $annonces,
                'form' => $form->createView(),
            ]
        );
    }
}
