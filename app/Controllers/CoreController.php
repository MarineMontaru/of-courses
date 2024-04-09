<?php

namespace app\Controllers;

use Exception;

/**
 * Manage the display of the views, bu calling the view files and providing data to be used in the views
 *
 * @param {string} $viewName is the name of the view.tpl.php to display
 * @param {string} $viewData is the array containing all data to be used in the views
 */ 
class CoreController {

    public function __construct() 
	{
        // This constructor will be called everytime a new Object of type CoreController will be created
		global $match;
		$route = $match['name'];

		$acl = [
            // 'home' => all
            'books-list' => ['user', 'admin'],
            'books-list-post' => ['user', 'admin'],
            'book-detail' => ['user', 'admin'],
            'book-detail-all' => ['user', 'admin'],
            'book-add' => ['user', 'admin'],
            'book-add-post' => ['user', 'admin'],
            // 'recipe-detail' => all
            'recipe-add' => ['user', 'admin'],
            'recipe-add-post' => ['user', 'admin'],
            // 'search-recipes' => all
            'week-detail' => ['user', 'admin'],
            'account' => ['user', 'admin'],
            // 'login' => all
            // 'login-post' => all
            // 'logout' => all
            // 'create-account'  => all
            // 'create-account-post' => all
		];

 		if(array_key_exists($route, $acl)) {
			$this->checkAuthorization($acl[$route]);
		} 

		// Token CSRF
		// Routes that manage CSRF token (not on GET routes, because we need to display the forms)
		$csrfRoutes = [
            'book-add-post' => ['user', 'admin'],
            'recipe-add-post' => ['user', 'admin'],
            'login-post' => ['user', 'admin'],
		];

        try {
            if(in_array($route, $csrfRoutes)) {
                if(empty($_POST['tokenCSRF'])) {
                    throw new Exception('Missing CSRF token');
                }
                // If a token is expected and exists for this route, we check if it correponds to the one stored into the session
                if($_POST['tokenCSRF'] !== $_SESSION['tokenCSRF']) {	 		
                    throw new Exception('Invalid CSRF token');
                }
            }
        }
        catch(Exception $e) {
            header('Status: 403 Forbidden');
            $this->show('errors/error403');
            throw($e);
        } 
    
	}


    protected function checkAuthorization($roles = []) 
    {
        // If user is already connected
        if (array_key_exists('connectedUser', $_SESSION)) {
            $connectedUser = $_SESSION['connectedUser'];
            $roleUser = $connectedUser['role'];
            // If the user role is in the list of authorized roles given in parameters
            if(in_array($roleUser, $roles)) {
                return true;
            } else {
                header('Status: 403 Forbidden');
                $this->show('errors/error403');
                throw(new Exception('Acess denied - Insufficient privileges'));
            }
        } 
        // If user is not connected yet
        else {
            global $routes;
            global $match;
            $_SESSION['lastRoute'] = $match['name'];

            header('Location: '. $routes->generate('login'));
        }
    }
       

    protected function show($viewName, $viewData=[]) {

        global $routes;
        global $baseUri;

        require __DIR__ . "/../Views/layout/header.tpl.php";
        require __DIR__ . "/../Views/" . $viewName . ".tpl.php";
        require __DIR__ . "/../Views/layout/footer.tpl.php";
    }

}