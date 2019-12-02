<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use App\Service\FileUploader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trick")
 */
class TrickController extends AbstractController
{
    // =======================================================
    /**
     * @Route("/", name="trick_index", methods={"GET"})
     */
    public function index(TrickRepository $trickRepository): Response
    {
        setcookie('Page_Home', 'active', time() + (3600 * 3), "/"); // last for 3 hours
        setcookie('Page_Index', '', time() + (3600 * 3), "/");

        return $this->render('trick/index.html.twig', [
            'tricks' => $trickRepository->findAll(),
            'page_title' => 'List of Tricks',
            'nav_active' => 'Home',
        ]);
    }

    // =======================================================
    /**
     * @Route("/gallery", name="trick_gallery", methods={"GET"})
     */
    public function gallery(TrickRepository $trickRepository): Response
    {
        setcookie('Page_Home', 'active', time() + (3600 * 3), "/"); // last for 3 hours
        setcookie('Page_Index', '', time() + (3600 * 3), "/");

        return $this->render('trick/index.html.twig', [
        // return $this->render('trick/index.html.twig#trickGallery', [
            'tricks' => $trickRepository->findAll(),
            'page_title' => 'List of Tricks',
            'nav_active' => 'Home',
        ]);
    }

    // =======================================================
    /**
     * @Route("/new", name="trick_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $trick = new Trick();
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
            
            $entityManager = $this->getDoctrine()->getManager();
            
            // auteur par défaut
            $trick->setAuthor(1);

            $trick->setCreatedAt(new \DateTime());

            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('trick_index');
        }

        setcookie('Page_Home', '', time() + (3600 * 3), "/"); // last for 3 hours
        setcookie('Page_Index', 'active', time() + (3600 * 3), "/");

            return $this->render('trick/new.html.twig', [
            // return $this->render('trick/modal_new.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
            'page_title' => 'Create a new Trick',
        ]);
    }

    // =======================================================
    /**
     * @Route("/{id}", name="trick_show", methods={"GET"})
     */
    public function show(Trick $trick): Response
    {
        return $this->render('trick/show.html.twig', [
            'trick' => $trick,
            'page_title' => 'About this Trick',
        ]);
    }

    // =======================================================
    /**
     * @Route("/{id}/edit", name="trick_edit", methods={"GET","POST"})
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
            'page_title' => 'Edit this Trick',
        ]);
    }

    // =======================================================
    /**
     * @Route("/{id}", name="trick_delete", methods={"DELETE"})
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