<?php

class MainController {

    public function homeAction () {
        $this->show('home');
    }

    public function booksAction () {
        $this->show('books');
    }

    public function recipeCardAction () {
        $this->show('recipe-card');
    }

    public function searchAction () {
        $this->show('search');
    }

    public function weekAction () {
        $this->show('week');
    }

    public function show($page) {
        require __DIR__ . '/../../inc/bdd-recettes.php';
        require __DIR__ . '/../../inc/listes.php';
        require __DIR__ . "/../Views/header.tpl.php";
        require __DIR__ . "/../Views/" . $page . ".tpl.php";
        require __DIR__ . "/../Views/footer.tpl.php";
    }

}