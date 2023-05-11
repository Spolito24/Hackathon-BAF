<?php

namespace App\Controller;

class TravelController extends AbstractController
{
    /**
     * Display home page
     */
    public function travelRequest(): string
    {
        return $this->twig->render('Travel/index.html.twig');
    }
}
