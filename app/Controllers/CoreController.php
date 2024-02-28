<?php

namespace app\Controllers;

/**
 * Manage the display of the views, bu calling the view files and providing data to be used in the views
 *
 * @param {string} $viewName is the name of the view.tpl.php to display
 * @param {string} $viewData is the array containing all data to be used in the views
 */ 
class CoreController {

    protected function show($viewName, $viewData=[]) {

        global $routes;
        global $baseUri;

        require __DIR__ . "/../Views/partials/header.tpl.php";
        require __DIR__ . "/../Views/" . $viewName . ".tpl.php";
        require __DIR__ . "/../Views/partials/footer.tpl.php";
    }

}