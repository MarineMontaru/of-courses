<?php

namespace app\Controllers;

use app\Models\Recipe;

class MainController extends CoreController {

    public function home () 
    {
        $recipeModel = new Recipe();
        $lastrecipes = $recipeModel->findAllLast(5);

        $this->show('main/home', [
            'last-recipes' => $lastrecipes
        ]);
    }

}