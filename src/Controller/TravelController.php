<?php

namespace App\Controller;

class TravelController extends AbstractController
{

    public function travelRequest(): string
    {
        // allowed only for users
        if (!$this->user) {
            header('Location: /login');
            exit();
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Clean $_POST
            $data = array_map('trim', $_POST);
            // Check if date-d is filled
            if (!isset($data['date-d']) || empty($data['date-d'])) {
                $errors[] = 'Vous devez definir une date de départ.';
            }
            // Check if date-a is filled
            if (!isset($data['date-a']) || empty($data['date-a'])) {
                $errors[] = 'Vous devez definir une date d\'arrivée.';
            }
            // Check if person is filled
            if (!isset($data['person']) || empty($data['person'])) {
                $errors[] = 'Vous devez definir un nombre de personnes.';
            }
            // Check if person is filled
            if ($data['person'] < 1 || $data['person'] > 8) {
                $errors[] = 'Entre 1 et 8 personnes peuvent participer.';
            }
            // Check if guest is filled
            if (!isset($data['guest']) || empty($data['guest'])) {
                $errors[] = 'Vous devez definir si il y a un compagnon mystère.';
            }

            if (empty($errors)) {
                header('Location: /voyage');
                exit();
            }
        }

        return $this->twig->render('Travel/index.html.twig', [
            'errors' => $errors
        ]);
    }
}
