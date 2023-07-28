<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/inscription', name: 'app_register')]

    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm( RegisterType::class, $user );

        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ) {

            $user = $form->getData();

            $password = $user->getPassword();
            $password = $encoder->hashPassword($user, $user->getPassword());

            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('message', 'Votre inscription à bien etait prise en compte, vous pouvez vous connectez');
            return $this->redirectToRoute('app_home_page');
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
