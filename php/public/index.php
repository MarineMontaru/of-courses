<?php

require __DIR__ . "/../App/Controllers/MainController.php";
require __DIR__ . "/../App/Controllers/ErrorController.php";

$page = "/";

if(isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
}

$routes =[
    '/' => [
        'controller'=> 'MainController',
        'method'=> 'homeAction',
    ],
    '/books' => [
        'controller'=> 'MainController',
        'method'=> 'booksAction',
    ],
    '/recipe-card' => [
        'controller'=> 'MainController',
        'method'=> 'recipeCardAction',
    ],
    '/search' => [
        'controller'=> 'MainController',
        'method'=> 'searchAction',
    ],
    '/week' => [
        'controller'=> 'MainController',
        'method'=> 'weekAction',
    ]
];

if(isset($routes[$page])) {

    $currentRoute = $routes[$page];
    $controllerName = $currentRoute['controller'];
    $methodName = $currentRoute['method'];

    $controller = new $controllerName();
    $controller->$methodName();

} else {

    $controller = new ErrorController();
    $controller->error404Action();

}