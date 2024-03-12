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

use function PHPSTORM_META\type;

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

        $recipe = new Recipe();

        //--------------------------------------------------
        // COLLECT FORM DATA
        // - check that mandatory fields are not empty
        // - check that filter_input is not false (with appropriate FILTER_VALIDATE)
        // - check that the value of <select> fields exists in database
        // - check that INT UNSIGNED fields are positive 
        // - trim the string fields
        //--------------------------------------------------

        // Get and validate the category (mandatory field)
        $categoryPost = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);
        if (empty($categoryPost)) {
            $categoryPost = null;
            $errorList['category'][] = "Veuillez renseigner une catégorie.";
        } else if ($categoryPost === false || $categoryPost < 0 || Category::find($categoryPost) === false) {
            $errorList['category'][] = "Veuillez renseigner une catégorie valide.";
        }

        // Get and validate the difficulty (optional field)
        $difficultyPost = filter_input(INPUT_POST, 'difficulty', FILTER_VALIDATE_INT);
        if (empty($difficultyPost)) {
            $difficultyPost = null;
        } else if ($difficultyPost === false || $difficultyPost < 0 || Difficulty::find($difficultyPost) === false) {
            $errorList['difficulty'][] = "Veuillez renseigner un niveau de difficulté valide.";
        }

        // Get and validate the time needed to cook the recipe (mandatory field)
        $hoursPost = intval(filter_input(INPUT_POST, 'time-hours', FILTER_VALIDATE_INT));
        $minutesPost = intval(filter_input(INPUT_POST, 'time-minutes', FILTER_VALIDATE_INT));
        if (empty($hours) && empty($minutes)) {
            $errorList['time'][] = "Veuillez renseigner un temps total de préparation.";
        } else if ($hoursPost === false || $minutesPost === false || $hoursPost < 0 || $minutesPost < 0) {
            $errorList['time'][] = "Veuillez renseigner un temps total de préparation valide.";
        } else {
            $timeInMinutesPost = $minutesPost + 60 * $hoursPost;
        }

        // Get and validate the number of portions (mandatory field)
        $portionsPost = intval(filter_input(INPUT_POST, 'portions', FILTER_VALIDATE_INT));
        if (empty($portionsPost)) {
            $errorList['portions'][] = "Veuillez renseigner un nombre de portions.";
        } else if ($portionsPost === false || $portionsPost <= 0) {
            $errorList['portions'][] = "Veuillez renseigner un nombre de portions valide.";
        }

        // Get and validate the seasons (optional field)
        $seasonsPost = filter_input(INPUT_POST, 'season', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if (empty($seasonsPost)) {
            $seasonsPost = null;
        } else if ($seasonsPost === false) {
            $errorList['seasons'][] = "Veuillez saisir une (des) saison(s) valide(s).";
        } else {
            foreach ($seasonsPost as $seasonPost) {
                if (empty($seasonPost) || $seasonPost < 0 || Season::find($seasonPost) === false) {
                    $errorList['seasons'][] = "Veuillez saisir une (des) saison(s) valide(s).";
                }
            }
        }

        // Get and validate the weather (optional field)
        $weatherPost = filter_input(INPUT_POST, 'weather', FILTER_VALIDATE_INT);
        if (empty($weatherPost)) {
            $weatherPost = null;
        } else if ($weatherPost === false || Weather::find($weatherPost) === false) {
            $errorList['weather'][] = "Veuillez renseigner une météo valide.";
        }

        // Get and validate the tags (optional field)
        $tagsPost = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if (empty($tagsPost)) {
            $tagsPost = null;
        } else if ($tagsPost === false) {
            $errorList['tags'][] = "Veuillez saisir un (des) tag(s) valide(s).";
        } else {
            foreach ($tagsPost as $tagPost) {
                if (empty($tagPost) || $tagPost < 0 || Tag::find($tagPost) === false) {
                    $errorList['tags'][] = "Veuillez saisir un (des) tag(s) valide(s).";
                } 
            }
        }

        // Get the foods (mandatory field)
        $foodsPost = filter_input(INPUT_POST, 'food', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if (empty($foodsPost)) {
            $errorList['foods'][] = "Veuillez renseigner au moins un aliment.";
        } else if ($foodsPost === false) {
            $errorList['foods'][] = "Veuillez saisir un (des) aliment(s) valide(s).";
        } else {
            $foodIsEmpty = true;
            foreach ($foodsPost as $foodPost) {
                $trimmedFoodPost = trim($foodPost);
                if (!empty($trimmedFoodPost) && $trimmedFoodPost !== "") {
                    $foodIsEmpty = false;
                    $foodsPostClean[] = $trimmedFoodPost;
                }
            }
            if($foodIsEmpty === true) {
                $errorList['foods'][] = "Veuillez renseigner au moins un aliment.";
            }
        }

        // Get the instructions Batch cooking (optional field)
        $instructionsBatchPost = filter_input(INPUT_POST, 'instruction-batch', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if ($instructionsBatchPost === false) {
            $errorList['instruction-batch'][] = "Veuillez saisir une (des) étape(s) de préparation batch cooking valide(s).";
        } else {
            $batchInstructionsIsEmpty = true;
            foreach ($instructionsBatchPost as $instructionBatchPost) {
                $trimmedInstructionBatchPost = trim($instructionBatchPost);
                if (!empty($trimmedInstructionBatchPost) && $trimmedInstructionBatchPost !== "") {
                    $batchInstructionsIsEmpty = false;
                    $instructionsBatchPostClean[] = $trimmedInstructionBatchPost;
                }
            }
        }

        // Get the instructions D-day (optional field, but at least one instruction must be filled between batch cooking and d-day)
        $instructionsDayPost = filter_input(INPUT_POST, 'instruction-day', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        if (empty($instructionsDdayPost) && empty($instructionsBatchPost)) {
            $errorList['instructions'][] = "Veuillez renseigner au moins une étape de préparation.";
        } else if ($instructionsDayPost === false) {
            $errorList['instructions-day'][] = "Veuillez saisir une (des) étape(s) de préparation jour J valide(s).";
        } else {
            $dayInstructionsIsEmpty = true;
            foreach ($instructionsDayPost as $instructionDayPost) {
                $trimmedInstructionDayPost = trim($instructionDayPost);
                if (!empty($trimmedInstructionDayPost) && $trimmedInstructionDayPost !== "") {
                    $dayInstructionsIsEmpty = false;
                    $instructionsDayPostClean[] = $trimmedInstructionDayPost;
                }
            }
            if($dayInstructionsIsEmpty === true && $batchInstructionsIsEmpty === true) {
                $errorList['instructions'][] = "Veuillez renseigner au moins une étape de préparation (batch cooking ou jour J).";
            }
        }
        

        dump(get_defined_vars());


    }

}