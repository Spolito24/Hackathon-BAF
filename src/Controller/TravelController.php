<?php

namespace App\Controller;

use App\Model\TravelManager;
use App\Model\UserManager;

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
            if (empty($errors)) {
                header('Location: /voyage');
                exit();
            }
        }

        return $this->twig->render('Travel/index.html.twig', [
            'errors' => $errors
        ]);
    }

    public function travelResponse(): string
    {
        // allowed only for users
        if (!$this->user) {
            header('Location: /login');
            exit();
        }

        $travelManager = new TravelManager();
        $travel = $travelManager->selectTravel();

        $userManager = new UserManager();
        $userManager->updateUserTravel($this->user['id'], $travel['id']);

        $apikey = '77a76ff006508eda50354d8b0ed0a5be';
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $travel['lat'] . '&lon=' . $travel['long'] . '&appid=' . $apikey . '&units=metric&lang=fr';
        $result = file_get_contents($url);
        $weatherResult = json_decode($result, true);
        $temp = (int) $weatherResult['main']['temp'];

        $icon = 'https://openweathermap.org/img/wn/' . $weatherResult['weather']['0']['icon'] . '@2x.png';

        return $this->twig->render('Travel/destination.html.twig', [
            'travel' => $travel,
            'temp' => $temp,
            'weather' => $weatherResult['weather']['0']['description'],
            'icon' => $icon,
        ]);
    }

    public function booking(): string
{
    // allowed only for users
    if (!$this->user) {
        header('Location: /login');
        exit();
    }

    // Retrieve user and associated travel information
    $userManager = new UserManager();
    $userWithTravel = $userManager->getUserWithTravel($this->user['id']);

    // rest of your code...
    
    return $this->twig->render('Travel/voyage.html.twig', [
        'userWithTravel' => $userWithTravel, // Pass user with travel information to twig
    ]);
}

}
