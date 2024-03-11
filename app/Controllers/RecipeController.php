<?php

namespace app\Controllers;

use app\Models\Recipe;
use app\Models\Category;
use app\Models\Difficulty;
use app\Models\Weather;
use app\Models\Season;
use app\Models\Tag;
use app\Models\Food;
use app\Models\Instruction;


class RecipeController extends CoreController {

    public function recipeDetail ($params) {

        // Get all attributes from the recipe
        $recipe = Recipe::find($params['id']);
        
        // Get the category of the recipe
        $category = Category::find($recipe->getCategoryId());
        
        // Get the difficulty of the recipe
        $difficulty = Difficulty::find($recipe->getDifficultyId());

        // Get all tags
        $tags = Tag::findAllByRecipe($recipe->getId());

        // Get all seasons
        $seasons = Season::findAllByRecipe($recipe->getId());

        // Get the weather
        $weather = Weather::find($recipe->getWeatherId());

        // Get all foods with required quantities
        $foods = Food::findAllByRecipe($recipe->getId());

        // Get all instructions of the recipe
        $instructionsModel = new Instruction();
        $instructions = $instructionsModel->findAllByRecipeId($params['id']);

        $this->show('recipe/view', [
            'recipe' => $recipe,
            'category' => $category,
            'difficulty' => $difficulty,
            'weather' => $weather,
            'seasons' => $seasons,
            'tags' => $tags,
            'foods' => $foods,
            'instructions' => $instructions
        ]);
    }

    public function recipeAdd() 
    {        
        $categories = Category::findAll();
        $difficulties = Difficulty::findAll();
        $seasons = Season::findAll();
        $weathers = Weather::findAll();
        $tags = Tag::findAll();

        $this->show('recipe/add', [
            'categories' => $categories,
            'difficulties' => $difficulties,
            'seasons' => $seasons,
            'weathers' => $weathers,
            'tags' => $tags
        ]);

    }

    public function recipeAddPost () 
    {
        $errorList = [];

        $categories = Category::findAll();
        $difficulties = Difficulty::findAll();
        $seasons = Season::findAll();
        $weathers = Weather::findAll();
        $tags = Tag::findAll();

        $recipe = new Recipe();

        // Get and validate the category
        $categoryPost = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT);
        if (empty($categoryPost)) {
            $categoryPost = null;
        } else if (empty($categoryPost)) {
            $errorList['category'][] = "Veuillez renseigner une catégorie.";
        } else if ($categoryPost === false || Category::find($categoryPost) === false) {
            $errorList['category'][] = "Veuillez renseigner une catégorie valide.";
        }

        // Get and validate the difficulty
        $difficultyPost = filter_input(INPUT_POST, 'difficulty', FILTER_SANITIZE_NUMBER_INT);
        if (empty($difficultyPost)) {
            $difficultyPost = null;
        } else if (empty($difficultyPost)) {
            $errorList['difficulty'][] = "Veuillez renseigner un niveau de difficulté.";
        } else if ($difficultyPost === false || Difficulty::find($difficultyPost) === false) {
            $errorList['difficulty'][] = "Veuillez renseigner un niveau de difficulté valide.";
        }

        // Get and validate the time needed to cook the recipe
        $hoursPost = intval(filter_input(INPUT_POST, 'time-hours', FILTER_SANITIZE_NUMBER_INT));
        $minutesPost = intval(filter_input(INPUT_POST, 'time-minutes', FILTER_SANITIZE_NUMBER_INT));
        if (empty($hours) && empty($minutes)) {
            $errorList['time'][] = "Veuillez renseigner un temps total de préparation.";
        } else if ($hoursPost === false || $minutesPost === false || $hoursPost < 0 || $minutesPost < 0) {
            $errorList['time'][] = "Veuillez renseigner un temps total de préparation valide.";
        } else {
            // TODO à faire ici ?
            $timeInMinutes = $minutesPost + 60 * $hoursPost;
        }

        // Get and validate the number of portions
        $portionsPost = intval(filter_input(INPUT_POST, 'portions', FILTER_SANITIZE_NUMBER_INT));
        if (empty($portionsPost)) {
            $errorList['portions'][] = "Veuillez renseigner un nombre de portions.";
        } else if ($portionsPost === false || $portionsPost <= 0) {
            $errorList['portions'][] = "Veuillez renseigner un temps total de préparation valide.";
        }

        // Get and validate the seasons
        $seasonsPost = filter_input(INPUT_POST, 'season', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if (empty($seasonsPost)) {
            $seasonsPost = null;
        } else if ($seasonsPost === false) {
            $errorList['seasons'][] = "Veuillez saisir une (des) saison(s) valide(s).";
        } else {
            foreach ($seasonsPost as $seasonPost) {
                if (empty($seasonPost)) {
                    $errorList['seasons'][] = "Veuillez saisir une (des) saison(s) valide(s).";
                } else if (Season::find($seasonPost) === false) {
                    $errorList['seasons'][] = "Veuillez saisir une (des) saison(s) valide(s).";
                } 
            }
        }

        // Get and validate the weather
        $weatherPost = filter_input(INPUT_POST, 'weather', FILTER_SANITIZE_NUMBER_INT);
        if (empty($weatherPost)) {
            $weatherPost = null;
        } else if ($weatherPost === false || Weather::find($weatherPost) === false) {
            $errorList['difficulty'][] = "Veuillez renseigner une météo pour préparer la recette valide.";
        }

        // Get and validate the tags
        $tagsPost = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if (empty($tagsPost)) {
            $tagsPost = null;
        } else if ($tagsPost === false) {
            $errorList['tags'][] = "Veuillez saisir un (des) tag(s) valide(s).";
        } else {
            foreach ($tagsPost as $tagPost) {
                if (empty($tagPost)) {
                    $errorList['tags'][] = "Veuillez saisir un (des) tag(s) valide(s).";
                } else if (Season::find($tagPost) === false) {
                    $errorList['tags'][] = "Veuillez saisir un (des) tag(s) valide(s).";
                } 
            }
        }

        // Get the foods
        $foodsPost = filter_input(INPUT_POST, 'food', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        dump($foodsPost);
        if (empty($foodsPost)) {
            $errorList['foods'][] = "Veuillez renseigner au moins un aliment.";
        } else if ($foodsPost === false) {
            $errorList['foods'][] = "Veuillez saisir un (des) aliment(s) valide(s).";
        } else {
            $foodIsEmpty = true;
            foreach ($foodsPost as $foodPost) {
                if (!empty($foodPost)) {
                    $foodIsEmpty = false;
                    $foodsPostClean[] = $foodPost;
                }
            }
            if($foodIsEmpty === true) {
                $errorList['foods'][] = "Veuillez renseigner au moins un aliment.";
            }
        }

        // Get the instructions Batch cooking


        // Get the instructions D-day

        

        dump(get_defined_vars());


    }

}