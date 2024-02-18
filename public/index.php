<?php

require_once __DIR__ . "./../vendor/autoload.php";
use app\Controllers\MainController;
use app\Controllers\ErrorController;

// ================
// ROUTER
// ================

// Create new instance of Altorouter to create the routes
$routes = new AltoRouter();

// Set the base path thanks to .htaccess file
$baseUri = $_SERVER['BASE_URI'];	
$routes->setBasePath($baseUri);

// Create all routes
$routes->map(
    'GET',
    '/',
    [
        'controller'=> MainController::class,
        'method'=> 'homeAction',
    ],
    'home_route'
);

$routes->map(
    'GET',
    '/books',
    [
        'controller'=> MainController::class,
        'method'=> 'booksAction',
    ],
    'books_route'
);

$routes->map(
    'GET',
    '/book/[i:book_id]',
    [
        'controller'=> MainController::class,
        'method'=> 'bookAction',
    ],
    'book_route'
);

$routes->map(
    'GET',
    '/recipe/[i:recipe_id]',
    [
        'controller'=> MainController::class,
        'method'=> 'recipeAction',
    ],
    'recipe_route'
);

$routes->map(
    'GET',
    '/search',
    [
        'controller'=> MainController::class,
        'method'=> 'searchAction',
    ],
    'search_route'
);

$routes->map(
    'GET',
    '/week',
    [
        'controller'=> MainController::class,
        'method'=> 'weekAction',
    ],
    'week_route'
);

$routes->map(
    'GET',
    '/account',
    [
        'controller'=> MainController::class,
        'method'=> 'accountAction',
    ],
    'account_route'
);

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
    $controller->$methodName();

} else {

    $controllerName = ErrorController::class;

    $controller = new $controllerName();
    $controller->error404Action();

}