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
        $recipeModel = new Recipe();
        $recipe = $recipeModel->findRecipe($params['id']);
        
        // Get the category of the recipe
        $categoryModel = new Category();
        $category = $categoryModel->find($recipe->getCategoryId());
        
        // Get the difficulty of the recipe
        $difficultyModel = new Difficulty();
        $difficulty = $difficultyModel->find($recipe->getDifficultyId());

        // Get all tags
        $tagsModel = new Tag();
        $tags = $tagsModel->findAllByRecipe($recipe->getId());

        // Get all seasons
        $seasonsModel = new Season();
        $seasons = $seasonsModel->findAllByRecipe($recipe->getId());

        // Get the weather
        $weatherModel = new Weather();
        $weather = $weatherModel->find($recipe->getWeatherId());

        // Get all foods with required quantities
        $foodsModel = new Food();
        $foods = $foodsModel->findAllByRecipe($recipe->getId());

        // Get all instructions of the recipe
        $instructionsModel = new Instruction();
        $instructions = $instructionsModel->findAllByRecipeId($params['id']);

        $this->show('recipe-card', [
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

}