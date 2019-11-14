<?php

namespace App\Controller;

use App\Entity\Trgroup;
use App\Form\TrgroupType;
use App\Repository\TrgroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trgroup")
 */
class TrgroupController extends AbstractController
{
    /**
     * @Route("/", name="trgroup_index", methods={"GET"})
     */
    public function index(TrgroupRepository $trgroupRepository): Response
    {
        return $this->render('trgroup/index.html.twig', [
            'trgroups' => $trgroupRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trgroup_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $trgroup = new Trgroup();
        $form = $this->createForm(TrgroupType::class, $trgroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($trgroup);
            $entityManager->flush();

            return $this->redirectToRoute('trgroup_index');
        }

        return $this->render('trgroup/new.html.twig', [
            'trgroup' => $trgroup,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trgroup_show", methods={"GET"})
     */
    public function show(Trgroup $trgroup): Response
    {
        return $this->render('trgroup/show.html.twig', [
            'trgroup' => $trgroup,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trgroup_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Trgroup $trgroup): Response
    {
        $form = $this->createForm(TrgroupType::class, $trgroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trgroup_index');
        }

        return $this->render('trgroup/edit.html.twig', [
            'trgroup' => $trgroup,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trgroup_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Trgroup $trgroup): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trgroup->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trgroup);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trgroup_index');
    }
}
