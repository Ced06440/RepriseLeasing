<?php

namespace App\Controller;

use App\Entity\Annonce;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(EntityManagerInterface $em): Response
    {
        $annonces = $em->getRepository(Annonce::class)->findBy(array(), null);

        return $this->render('home_page/index.html.twig',
            [
                'annonces' => $annonces,
            ]
        );
    }
}
