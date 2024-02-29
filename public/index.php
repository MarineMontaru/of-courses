<?php

require_once __DIR__ . "./../vendor/autoload.php";
use app\Controllers\MainController;
use app\Controllers\ErrorController;
use app\Controllers\RecipeController;
use app\Controllers\BooksController;
use app\Controllers\WeekController;
use app\Controllers\SearchController;
use app\Controllers\SessionController;

// ================
// ROUTER
// ================

// Create new instance of Altorouter to create the routes
$routes = new AltoRouter();

// Set the base path thanks to .htaccess file
$baseUri = $_SERVER['BASE_URI'];	
$routes->setBasePath($baseUri);

// Home routes
$routes->map('GET', '/', ['controller'=> MainController::class, 'method'=> 'home'], 'home');

// Books routes
$routes->map('GET', '/books', ['controller'=> BooksController::class,'method'=> 'booksList'], 'books-list');
$routes->map('GET', '/book/[i:id]', ['controller'=> BooksController::class, 'method'=> 'bookDetail'], 'book-detail');

// Recipe routes
$routes->map('GET', '/recipe/[i:id]', ['controller'=> RecipeController::class, 'method'=> 'recipeDetail'], 'recipe-detail');

// Search routes
$routes->map('GET', '/search', ['controller'=> SearchController::class, 'method'=> 'searchRecipes'], 'search-recipes');

// Week routes
$routes->map('GET', '/week', ['controller'=> WeekController::class, 'method'=> 'weekDetail'], 'week-detail');

// Session routes
$routes->map('GET', '/login', ['controller'=> SessionController::class, 'method'=> 'login'], 'login');
$routes->map('POST', '/login', ['controller'=> SessionController::class, 'method'=> 'loginPost'], 'login-post');
$routes->map('GET', '/login', ['controller'=> SessionController::class, 'method'=> 'logout'], 'logout');


// ================
// DISPATCHER
// ================

// Match the routes with the URL
$match = $routes->match();


// Call action methods in MainController in case of match, or call ErrorController if not
if($match) {

    $currentRouteTarget = $match['target'];
    $controllerName = $currentRouteTarget['controller'];
    $methodName = $currentRouteTarget['method'];
    $params = $match['params'];

    $controller = new $controllerName();
    $controller->$methodName($params);

} else {

    $controllerName = ErrorController::class;

    $controller = new $controllerName();
    $controller->error404Action();

}