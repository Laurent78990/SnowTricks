<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


// class LuckyController
class LuckyController extends AbstractController

{
    /**
    * @Route("/luckyNumber", name="app_luckyNumber")
    */
    
    public function number()
    {
        $number = random_int(0, 100);
        
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
            '<html><body>Lucky number: '.$number.'</body></html>'
            ]
        );
    }
}
