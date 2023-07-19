<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/monCompte/{id}', name: 'app_account')]
    public function index(EntityManagerInterface $em, int $id): Response
    {
        $user = $em->getRepository(User::class)->find($id);

        return $this->render('account/index.html.twig',
    [
        'user' => $user,
    ]);
    }

    #[Route('/monCompte/{id}/Mes-annonces', name: 'app_account_mes_annonces')]
    public function annonce(EntityManagerInterface $em, int $id): Response
    {
        $user = $em->getRepository(User::class)->find($id);
        $annonces = $em->getRepository(Annonce::class)->findby(array('droppedUser'=>$user));

        return $this->render('account/MesAnnonces.html.twig',
    [
        'user' => $user,
        'annonces' => $annonces,
    ]);
    }
}
