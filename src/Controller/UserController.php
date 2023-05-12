<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Clean $_POST
            $data = array_map('trim', $_POST);
            // Check if login is filled
            if (!isset($data['login']) || empty($data['login'])) {
                $this->errors[] = 'Please fill in login field.';
            }
            // Check if password is filled
            if (!isset($data['password']) || empty($data['password'])) {
                $this->errors[] = 'Please fill in password field.';
            }
            // user and password field are filled
            if (empty($this->errors)) {
                $userManager = new UserManager();
                $user = $userManager->selectUserByName($data['login']);
                // Check if user exists and password is correct
                if ($user && password_verify($data['password'], $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    header('Location: /explore');
                    exit();
                }
                $this->errors[] = 'Nom ou mot de passe invalide';
            }
        }
        return $this->twig->render('User/login.html.twig', [
            'errors' => $this->errors
        ]);
    }

    public function logout(): string
    {
        session_destroy();
        return $this->twig->render('User/logout.html.twig');
    }
}