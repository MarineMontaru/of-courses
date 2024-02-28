<?php

namespace app\Controllers;

use app\Models\Recipe;
use app\Models\Instruction;
use app\Models\Category;
use app\Models\Difficulty;

class MainController extends CoreController {

    public function home () {
        $this->show('home');
    }

    public function booksList () {
        $this->show('books');
    }

    public function searchRecipes () { 
        $this->show('search');
    }

    public function weekDetail () {
        $this->show('week');
    }

}