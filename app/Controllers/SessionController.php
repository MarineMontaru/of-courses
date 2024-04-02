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
        if($_POST['email'] === "") {
            $errorList['email'][] = 'Veuillez renseigner un email.'; 
        } else {
            $sanitizedEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            if (false === $sanitizedEmail) {
                $errorList['email'][] = 'Veuillez renseigner un email valide.'; 
            } else {
                $email = filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL);
                if (false === $email) { 
                    $errorList['email'][] = 'Veuillez renseigner un email valide.'; 
                }
            }
        }

        if($_POST['password'] === "") {
            $errorList['password'][] = 'Veuillez renseigner un mot de passe.'; 
        } else {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (false === $password) {
                $errorList['password'][] = 'Veuillez renseigner un mot de passe valide.'; 
            }
        }

        // If an error is detected in the login form...
        if (!empty($errorList)) {
            $this->show('user/login', [
                'errorList' => $errorList,
                'email' => $_POST['email'] ?? ''
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
                    'email' => $_POST['email'] ?? ''
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
                        'email' => $_POST['email'] ?? ''
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

                    header('Location: '.$routes->generate($_SESSION['lastRoute']));
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

    public function createAccount()
    {
        $this->show('user/create');
    }

    public function createAccountPost()
    {
        $errorList = [];

        // Control of the login form inputs
        if($_POST['email'] === "") {
            $errorList['email'][] = 'Veuillez renseigner un email.'; 
        } else {
            $sanitizedEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            if (false === $sanitizedEmail) {
                $errorList['email'][] = 'Veuillez renseigner un email valide.'; 
            } else {
                $email = filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL);
                if (false === $email) { 
                    $errorList['email'][] = 'Veuillez renseigner un email valide.'; 
                }
            }
        }

        if($_POST['firstname'] === "") {
            $errorList['firstname'][] = 'Veuillez renseigner un prénom.'; 
        } else {
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (false === $firstname) {
                $errorList['firstname'][] = 'Veuillez renseigner un prénom valide.'; 
            }
        }

        if($_POST['lastname'] === "") {
            $errorList['lastname'][] = 'Veuillez renseigner un nom.'; 
        } else {
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (false === $lastname) {
                $errorList['lastname'][] = 'Veuillez renseigner un nom valide.'; 
            }
        }

        if($_POST['password'] === "") {
            $errorList['password'][] = 'Veuillez renseigner un mot de passe.'; 
        } else if($_POST['password2'] === "") {
            $errorList['password2'][] = 'Veuillez répéter le mot de passe.'; 
        } else {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (false === $password) {
                $errorList['password'][] = 'Veuillez renseigner un mot de passe valide.'; 
            }
            if (false === $password2) {
                $errorList['password2'][] = 'Veuillez renseigner un mot de passe valide.'; 
            }
            if ($password !== $password2) {
                $errorList['password2'][] = 'Les deux mots de passe doivent être identiques.'; 
            }
        }

        // If an error is detected in the login form...
        if (!empty($errorList)) {
            $this->show('user/create', [
                'errorList' => $errorList,
                'email' => $_POST['email'] ?? '',
                'firstname' => $_POST['firstname'] ?? '',
                'lastname' => $_POST['lastname'] ?? ''
            ]);
        }
        // ...else, if no error has been detected in the login form, we create the user in DB
        else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $user = new AppUser();
            $user
                ->setEmail($email)
                ->setFirstname($firstname)
                ->setLastname($lastname)
                ->setPassword($password) 
                ->setRole('user');
            $rowsAffected = $user->insert();

            // If insertion succeeded...
            if($rowsAffected > 0) {
                global $routes;
                header('Location: ' . $routes->generate('login'));
                exit();
            } 
            // ... else, if insertion failed
            else {
                $errorList['global'][] = 'Une erreur est survenue lors de la création du compte. Veuillez réessayer..';
            }
            

            $this->show('user/add', [
                'errorList' => $errorList
            ]);



            $role = 'user';
        } 
    }
}