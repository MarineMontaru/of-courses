<?php

namespace app\Controllers;

use app\Models\AppUser;

class SessionController extends CoreController {

    public function account () 
    {
        if(isset($_SESSION['connectedUser'])) {
            $this->show('user/account');
        }
        else {
            global $routes;
            header('Location: '. $routes->generate('login'));
        }
    }

    public function login () 
    {
        $this->show('user/login');
    }

    public function loginPost() 
    {
        $errorList = [];

        // Control of the login form inputs
        if($_POST['email'] !== "") {
            $email = filter_input(INPUT_POST, 'email');
            if (false === $email) { 
                $errorList['email'][] = 'Veuillez renseigner un email valide.'; 
            }
        } else {
            $errorList['email'][] = 'Veuillez renseigner un email.'; 
        }

        if($_POST['password'] !== "") {
            $password = filter_input(INPUT_POST, 'password');
            if (false === $password) { 
                $errorList['password'][] = 'Veuillez renseigner un mot de passe valide.'; 
            }
        } else {
            $errorList['password'][] = 'Veuillez renseigner un mot de passe.'; 
        }

        // If an error is detected in the login form...
        if (!empty($errorList)) {
            $this->show('user/login', [
                'errorList' => $errorList,
                'email' => $email ?? ''
            ]);
        }
        // ...else, if no error has been detected in the login form :
        else {
            global $routes;
            $user = AppUser::findByEmail($email);
            
            // If the user does not exist in DB...
            if(!$user) {
                $errorList['email'][] = 'L\'email est inconnu.';
                $this->show('user/login', [
                    'errorList' => $errorList,
                    'email' => $email
                ]);
            } 

            // ...else if the user exists in DB :
            else {
                $databasePassword = $user->getPassword();
                
                // If the password is not correct...
                if(!password_verify($password, $databasePassword)) {
                    $errorList['password'][] = 'Le mot de passe est incorrect.';
                    $this->show('user/login', [
                        'errorList' => $errorList,
                        'email' => $email
                    ]);
                }
                // ...else if the password is correct :
                else {
                    $_SESSION["connectedUser"] = [
                        "email" => $user->getEmail(),
                        "firstname" => $user->getFirstname(),
                        "lastname" => $user->getLastname(),
                        "role" => $user->getRole()
                    ];
                    header('Location: '.$routes->generate('home'));
                    // TODO rediriger vers la page sur laquelle l'utilisateur était précédemment
                }
            } 
        } 
    }

    public function logout() 
    {
        // Logout the user
        unset($_SESSION["connectedUser"]);

        // Redirection to the home page
        global $routes;
        header('Location: '.$routes->generate('home'));
    }

}