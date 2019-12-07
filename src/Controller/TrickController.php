<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Commentaire;

use App\Form\TrickType;
use App\Form\CommentaireType;

use App\Repository\TrickRepository;
use App\Service\FileUploader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// /**
//  * @Route("/trick")
//  */
class TrickController extends AbstractController
{

    // =======================================================
    /**
     * @Route("/", name="trick_index", methods={"GET"})
     */
    public function index(TrickRepository $trickRepository): Response
    {

        $loadPage = 0;
        setcookie('loadPage', $loadPage, time() + (3600 * 8), "/");

        return $this->render('trick/index.html.twig', [

            // 'tricks' => $trickRepository->findAll(),
            'tricks' => $trickRepository->getRangedTrick($loadPage, 15),
            'page_title' => 'Figures SnowTricks',
            'current_page' => $loadPage,
        ]);
    }

    // =======================================================
    /**
     * @Route("/trick/nextpage", name="next_page", methods={"GET"})
     */
    // public function gallery(TrickRepository $trickRepository, $page): Response
    public function galleryNext(TrickRepository $trickRepository): Response
    {
        $loadPage = isset( $_COOKIE['loadPage'] ) ? $_COOKIE['loadPage'] : 99;
        $loadPage++;
        setcookie('loadPage', $loadPage, time() + (3600 * 8), "/");

        return $this->render('trick/index.html.twig', [
            'tricks' => $trickRepository->getRangedTrick( ($loadPage) * 15, 15),
            'page_title' => 'Figures SnowTricks',
            'current_page' => $loadPage,
        ]);
    }
    
    // =======================================================
    /**
     * @Route("/trick/previouspage", name="previous_page", methods={"GET"})
     */
    public function galleryPrev(TrickRepository $trickRepository): Response
    {
        $loadPage = isset( $_COOKIE['loadPage'] ) ? $_COOKIE['loadPage'] : 99;
        $loadPage--;
        setcookie('loadPage', $loadPage, time() + (3600 * 8), "/");

        return $this->render('trick/index.html.twig', [
            'tricks' => $trickRepository->getRangedTrick( ($loadPage) * 15, 15),
            'page_title' => 'Figures SnowTricks',
            'current_page' => $loadPage,
        ]);
    }

    // =======================================================
    /**
     * @Route("/trick/new", name="trick_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        // $userId = $user->getId();
        // $username = $user->getUsername();
        
        // var_dump($userId); die();

        if ($form->isSubmitted() && $form->isValid()) {
            
            // ... Begin the cover file upload
             /** @var UploadedFile $coverFile */
             $coverFile = $form['cover']->getData();

             // this condition is needed because the 'cover' field is not required
             // so the JPG file must be processed only when a file is uploaded
             if ($coverFile) {
                $coverFileName = $fileUploader->upload($coverFile);
                $trick->setcover($coverFileName);
             }
            // ... End cover file upload
            
            $entityManager = $this->getDoctrine()->getManager();
            
            // auteur par défaut
            // $trick->setUsername($userId);
            // $trick->setUsername($username);

            //  var_dump($userId);
            //  var_dump($username);
            //  die();

            $trick->setUsername($user);
            
            $trick->setCreatedAt(new \DateTime());

            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('trick_index');
        }

        // setcookie('Page_Home', '', time() + (3600 * 3), "/"); // last for 3 hours
        // setcookie('Page_Index', 'active', time() + (3600 * 3), "/");

            return $this->render('trick/new.html.twig', [
            // return $this->render('trick/modal_new.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
            'page_title' => 'Ajouter un nouveau Trick',
        ]);
    }

    // =======================================================
    /**
     * @Route("show/{id}", name="trick_show", methods={"GET", "POST"})
     */
    public function show(Request $request, Trick $trick): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {







        }

        return $this->render('trick/show.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
            'page_title' => 'Présentation du Trick',
        ]);
    }

    // =======================================================
    /**
     * @Route("/trick/{id}/edit", name="trick_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Trick $trick, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // ... Begin the cover file upload
             /** @var UploadedFile $coverFile */
             $coverFile = $form['cover']->getData();

             // this condition is needed because the 'cover' field is not required
             // so the JPG file must be processed only when a file is uploaded
             if ($coverFile) {
                $coverFileName = $fileUploader->upload($coverFile);
                $trick->setcover($coverFileName);
             }
            // ... End cover file upload

            $trick->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trick_index');
        }

        return $this->render('trick/edit.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
            'page_title' => 'Modifier ce Trick',
        ]);
    }

    // =======================================================
    /**
     * @Route("/trick/{id}", name="trick_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Trick $trick): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trick);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trick_index');
    }
}