<?php

include __DIR__ . "./../vendor/autoload.php";
require __DIR__ . "/../App/Controllers/MainController.php";
require __DIR__ . "/../App/Controllers/ErrorController.php";

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
        'controller'=> 'MainController',
        'method'=> 'homeAction',
    ],
    'home_route'
);

$routes->map(
    'GET',
    '/books',
    [
        'controller'=> 'MainController',
        'method'=> 'booksAction',
    ],
    'books_route'
);

$routes->map(
    'GET',
    '/book/[i:book_id]',
    [
        'controller'=> 'MainController',
        'method'=> 'bookAction',
    ],
    'book_route'
);

$routes->map(
    'GET',
    '/recipe/[i:recipe_id]',
    [
        'controller'=> 'MainController',
        'method'=> 'recipeAction',
    ],
    'recipe_route'
);

$routes->map(
    'GET',
    '/search',
    [
        'controller'=> 'MainController',
        'method'=> 'searchAction',
    ],
    'search_route'
);

$routes->map(
    'GET',
    '/week',
    [
        'controller'=> 'MainController',
        'method'=> 'weekAction',
    ],
    'week_route'
);


// Match the routes with the URL
$match = $routes->match();


// Call action methods in MainController in case of match, or call ErrorController if not
if($match) {

    $currentRouteTarget = $match['target'];
    $controllerName = $currentRouteTarget['controller'];
    $methodName = $currentRouteTarget['method'];

    $controller = new $controllerName();
    $controller->$methodName();

} else {

    $controller = new ErrorController();
    $controller->error404Action();

}