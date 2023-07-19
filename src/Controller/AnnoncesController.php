<?php

namespace App\Controller;

use App\Entity\Annonce;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnoncesController extends AbstractController
{
    #[Route('/annonce/{id}', name: 'app_annonce')]
    public function index(EntityManagerInterface $em, int $id): Response
    {
        $annonce = $em->getRepository(Annonce::class)->findOneById($id);
        
        return $this->render('annonce/index.html.twig', 
            [
                'annonce' => $annonce,
            ]
        );
    }
}
