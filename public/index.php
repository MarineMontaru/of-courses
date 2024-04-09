<?php

require_once __DIR__ . "./../vendor/autoload.php";
use app\Controllers\MainController;
use app\Controllers\ErrorController;
use app\Controllers\RecipeController;
use app\Controllers\BooksController;
use app\Controllers\WeekController;
use app\Controllers\SearchController;
use app\Controllers\SessionController;

session_start();

// ================
// ROUTER
// ================

// Create new instance of Altorouter to create the routes
$routes = new AltoRouter();

// Set the base path thanks to .htaccess file
$baseUri = $_SERVER['BASE_URI'];	
$routes->setBasePath($baseUri);


//!\\ THINK TO ADD NEW ROUTES TO THE ACL IN THE CORECONTROLLER !!!

// Home routes
$routes->map('GET', '/', ['controller'=> MainController::class, 'method'=> 'home'], 'home');

// Books routes
$routes->map('GET', '/books', ['controller'=> BooksController::class,'method'=> 'booksList'], 'books-list');
$routes->map('POST', '/books', ['controller'=> BooksController::class, 'method'=> 'booksListPost'], 'book-list-post');
$routes->map('GET', '/book/[i:id]', ['controller'=> BooksController::class, 'method'=> 'bookDetail'], 'book-detail');
$routes->map('GET', '/book/all', ['controller'=> BooksController::class, 'method'=> 'bookDetailAll'], 'book-detail-all');
$routes->map('GET', '/book/add', ['controller'=> BooksController::class, 'method'=> 'addBook'], 'book-add');
$routes->map('POST', '/book/add', ['controller'=> BooksController::class, 'method'=> 'addBookPost'], 'book-add-post');


// Recipe routes
$routes->map('GET', '/recipe/[i:id]', ['controller'=> RecipeController::class, 'method'=> 'recipeDetail'], 'recipe-detail');
$routes->map('GET', '/recipe/add', ['controller'=> RecipeController::class, 'method'=> 'recipeAdd'], 'recipe-add');
$routes->map('POST', '/recipe/add', ['controller'=> RecipeController::class, 'method'=> 'recipeAddPost'], 'recipe-add-post');

// Search routes
$routes->map('GET', '/search', ['controller'=> SearchController::class, 'method'=> 'searchRecipes'], 'search-recipes');
$routes->map('POST', '/search', ['controller'=> SearchController::class, 'method'=> 'searchRecipesPost'], 'search-recipes-post');

// Week routes
$routes->map('GET', '/week', ['controller'=> WeekController::class, 'method'=> 'weekDetail'], 'week-detail');

// Session routes
$routes->map('GET', '/account', ['controller'=> SessionController::class, 'method'=> 'account'], 'account');
$routes->map('GET', '/login', ['controller'=> SessionController::class, 'method'=> 'login'], 'login');
$routes->map('POST', '/login', ['controller'=> SessionController::class, 'method'=> 'loginPost'], 'login-post');
$routes->map('GET', '/logout', ['controller'=> SessionController::class, 'method'=> 'logout'], 'logout');
$routes->map('GET', '/create-account', ['controller'=> SessionController::class, 'method'=> 'createAccount'], 'create-account');
$routes->map('POST', '/create-account', ['controller'=> SessionController::class, 'method'=> 'createAccountPost'], 'create-account-post');


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