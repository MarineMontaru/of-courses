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

}