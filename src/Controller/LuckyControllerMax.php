<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerMax
{
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number($max)
    {
        $number1 = random_int(1, $max);
        $number2 = random_int(1, $max);
        $average = ($number1 + $number2)/2; 

        return new Response(
            '<html><body>
            <h1>Lucky number game</h1><hr>
            <p>Dice 1 : '.$number1.'</p>
            <p>Dice 2 : '.$number2.'</p>
            <p>Average = '.$average.'</p>
            </body></html>'
        );
    }
}
