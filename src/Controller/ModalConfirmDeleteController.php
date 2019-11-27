<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModalConfirmDeleteController extends AbstractController
{
    /**
     * @Route("/modal/confirm/delete", name="modal_confirm_delete")
     */
    public function index()
    {
        return $this->render('trick/modal_confirm_delete.html.twig', [
            'controller_name' => 'ModalConfirmDeleteController',
        ]);
    }
}
