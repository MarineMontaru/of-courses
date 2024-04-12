<?php

namespace app\Controllers;

use app\Models\Recipe;
use app\Models\Category;
use app\Models\Difficulty;
use app\Models\Weather;
use app\Models\Season;
use app\Models\Tag;

class SearchController extends CoreController {

    public function searchRecipes () 
    { 
        $categories = Category::findAll();
        $difficulties = Difficulty::findAll();
        $seasons = Season::findAll();
        $weathers = Weather::findAll();
        $tags = Tag::findAll();

        $this->show('search/search', [
            'categories' => $categories,
            'difficulties' => $difficulties,
            'seasons' => $seasons,
            'weathers' => $weathers,
            'tags' => $tags
        ]);
    }

    public function searchRecipesPost ()
    {
        // Plan d'action pour traiter la recherche de recettes
        // x créer la vue de la page de recherche
        // - créer la méthode searchRecipePost
        //      x créer la route et la méthode dans le controller
        //      - récupérer les infos du formulaire et les nettoyer, et créer des erreurs le cas échéant
        //      - identifier la requête sql associée
        //      - dans le modèle, créer la méthode de recherche associée
        //      - gérer le lien du controller avec le modèle
        //      - traiter les cas d'erreurs
        //          - traiter les cas d'erreurs si les données du form ne sont pas ok
        //          - traiter les cas d'erreurs si la recherche n'a pas abouti (mauvaise connection)
        //          - traiter le cas où il n'y a aucune recette qui correspond
        //          - afficher les erreurs aux endroits pertinents dans la vue
    }

}