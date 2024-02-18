<?php

namespace app\Controllers;

class MainController extends CoreController {

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

    public function accountAction () {
        $this->show('account');
    }

}