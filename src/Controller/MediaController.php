<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Trick;

use App\Form\MediaType;
use App\Repository\MediaRepository;

use App\Service\FileUploader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media")
 */
class MediaController extends AbstractController
{

    /**
     * @Route("/", name="media_index", methods={"GET"})
     */
    public function index(MediaRepository $mediaRepository): Response
    {
        return $this->render('media/index.html.twig', [
            'medias' => $mediaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="media_new", methods={"GET","POST"})
     */
    public function new(Request $request, Trick $trick, FileUploader $fileUploader): Response
    {

        $media = new Media();
        
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Step 1 - get the file
              // ... Begin the media file upload
             /** @var UploadedFile $mediaFile */
             $mediaFile = $form['media']->getData();

            // this condition is needed because the 'media' field is not required
            // so the JPG file must be processed only when a file is uploaded
            if ($mediaFile) {
                
                $mediaFileName = $fileUploader->upload($mediaFile);
                $media->setMediaName($mediaFileName);
             
                // var_dump($media); die;
                $trick->addMedia($media);
            }
            // ... End media file upload

            // Step 2 - load and save the data
            $entityManager = $this->getDoctrine()->getManager();
            
            $media->setTrick($trick);
            $media->setCreatedAt(new \DateTime());
            
            $entityManager->persist($media);
            $entityManager->flush();

            // return $this->redirectToRoute('media_index');
            return $this->redirectToRoute('trick_show', ['id' => $trick->getId()]);
        }

        return $this->render('media/new.html.twig', [
            'media' => $media,
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Media $media): Response
    {
        if ($this->isCsrfTokenValid('delete'.$media->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $trick = $media->getTrick();
            
            $entityManager->remove($media);
            $entityManager->flush();

        }

        return $this->redirectToRoute('trick_show', ['id' => $trick->getId()]);
    }
}
