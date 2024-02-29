<?php

namespace app\Controllers;

class SearchController extends CoreController {

    public function searchRecipes () 
    { 
        $this->show('search');
    }

}