<?php

namespace App\Controller;

use DateTime;
use DateTimeImmutable;
use App\Entity\Annonce;
use App\Form\AnnoncesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class DeposerAnnonceController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/deposerAnnonce', name: 'app_deposer_annonce')]
    public function index(Request $request, SluggerInterface $slugger): Response
    {
        $annonce = new Annonce;
        $form = $this->createForm(AnnoncesType::class, $annonce);

        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) {

            $user = $this->getUser();

            $annonce->setCreatedAt(new DateTimeImmutable())
                    ->setDroppedUser($this->getUser($user));

            $imageAvant = $form->get('imageAvant')->getData();

            if ($imageAvant) {
                $originalFilename = pathinfo($imageAvant->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageAvant->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageAvant->move(
                        $this->getParameter('imageAvant_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $annonce->setimageAvant($newFilename);
            }
            $imageArriere = $form->get('imageArriere')->getData();

            if ($imageArriere) {
                $originalFilename = pathinfo($imageArriere->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageArriere->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageArriere->move(
                        $this->getParameter('imageArriere_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $annonce->setimageArriere($newFilename);
            }

            $imageInterieur = $form->get('imageInterieur')->getData();

            if ($imageInterieur) {
                $originalFilename = pathinfo($imageInterieur->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageInterieur->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageInterieur->move(
                        $this->getParameter('imageInterieur_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $annonce->setimageInterieur($newFilename);
            }

            $this->entityManager->persist($annonce);
            $this->entityManager->flush();

            $this->addFlash('message', 'Votre annonce a bien été envoyer, elle est en cours de vérification.');
            return $this->redirectToRoute('app_home_page');
        }

        return $this->render('deposer_annonce/index.html.twig', [
            'formAnnonce' => $form->createView(),
        ]);
    }
}
