<?php

class ErrorController {

    public function error404Action () {   
        $this->show('404');
    }

    public function show($page) {
        include __DIR__ . "/../Views/header.tpl.php";
        include __DIR__ . "/../Views/$page.tpl.php";
        include __DIR__ . "/../Views/footer.tpl.php";
    }

}