<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Annonce;
use App\Form\AnnoncesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
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

            $brochureFile = $form->get('imageAvant')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
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
            $brochureFile = $form->get('imageArriere')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
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

            $this->entityManager->persist($annonce);
            $this->entityManager->flush();

            $this->addFlash('message', 'Votre annonce a bien été envoyer, elle est en cours de vérification.');
            return $this->redirectToRoute('app_account');
        }

        return $this->render('deposer_annonce/index.html.twig', [
            'formAnnonce' => $form->createView(),
        ]);
    }
}
