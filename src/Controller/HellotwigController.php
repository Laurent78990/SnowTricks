<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HellotwigController extends AbstractController
{
    /**
     * @Route("/hellotwig", name="hellotwig")
     */
    public function index()
    {

         // Set the user information and notifications somehow
         $userFirstName = 'Laurent';
         $userNotifications = ['Pomme', 'Cerise', 'Prune'];

        return $this->render('hellotwig/index.html.twig', [
            
            // 'controller_name' => 'HellotwigController',
            'user_first_name' => $userFirstName,
            'notifications' => $userNotifications,
        ]);
    }
}
