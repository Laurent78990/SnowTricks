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
     * @Route("/new/{id}", name="media_new", methods={"GET","POST"})
     */
    public function new(Request $request, Trick $trick, FileUploader $fileUploader): Response
    {
        $medium = new Media();
        $form = $this->createForm(MediaType::class, $medium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Step 1 - get the file
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


            // Step 2 - load and save the data
            $entityManager = $this->getDoctrine()->getManager();
            
            $medium->setTrick($trick);
            $medium->setCreatedAt(new \DateTime());
            
            $entityManager->persist($medium);
            $entityManager->flush();

            // return $this->redirectToRoute('media_index');
            return $this->redirectToRoute('trick_show', ['id' => $trick->getId()]);
        }

        return $this->render('media/new.html.twig', [
            'medium' => $medium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Media $medium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('media_index');
    }
}
