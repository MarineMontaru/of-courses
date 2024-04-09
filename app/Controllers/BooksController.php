<?php

namespace app\Controllers;

use app\Models\AppUser;
use app\Models\Book;
use app\Models\Recipe;

class BooksController extends CoreController {

    public function booksList () 
    {
        // Get current user's id
        $user = AppUser::findByEmail($_SESSION['connectedUser']['email']);
        $userId = $user->getId();
 
        // Get the number of recipes contained in all user's books or created by this user
        $allUserRecipes = Recipe::findAllByUser($userId);
        $allUserRecipesNb = count($allUserRecipes);

        // Get the books owned by the current user
        $userBooks = Book::findAllByUser($userId);

        // Get the recipes contained in each user's book
        $booksRecipes = [];
        if (empty($userBooks)) {
            $booksRecipesNb = 0;
        } else {
            foreach ($userBooks as $userBook) {
                $bookRecipes = Recipe::findAllInBook($userBook->getId());
                $booksRecipesNb[$userBook->getId()] = count($bookRecipes);
            }
        }

        $this->show('book/list', [
            'all-user-recipes-nb' => $allUserRecipesNb,
            'user-books' => $userBooks,
            'books-recipes-nb' => $booksRecipesNb
        ]); 
    }

    public function bookDetailAll () 
    {
        // Get current user's id
        $user = AppUser::findByEmail($_SESSION['connectedUser']['email']);
        $userId = $user->getId();

        //Get all recipes contained in all user's books or created by this user (without duplicate)
        $recipes = Recipe::findAllByUser($userId);

        $this->show('book/detail', [
            'recipes' => $recipes
        ]);
    }

    public function bookDetail ($id) 
    {
        extract($id);

        // Get book information
        $book = Book::find($id);

        // Get all recipes contained in the book
        $recipes = Recipe::findAllInBook($id);

        $this->show('book/detail', [
            'book' => $book,
            'recipes' => $recipes
        ]);
    }

    public function addBook () 
    {
        $this->show('book/add');
    }

    public function addBookPost ()
    {
        $errorList = [];

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($title === false || $title === '') {
            $errorList['title'][] = 'Le titre est obligatoire.';
        }
        
        // Get current user's id
        $user = AppUser::findByEmail($_SESSION['connectedUser']['email']);
        $userId = $user->getId();

        $position = count(Book::findAllByUser($userId)) + 1;

        $bookModel = new Book();
        $book = $bookModel
            ->setTitle($title)
            ->setPosition($position)
            ->setUserId($userId)
        ;

        $inserted = $book->insert();

        if($inserted === true) {
			$_SESSION['flashMessages'][] = 'Le carnet de recettes "{$book->getTitle()}" a bien été créé.';
			global $routes;
			header('Location: '. $routes->generate('books-list'));
			exit(); 
		} else {
			$errorList['global'] = "Une erreur est survenue lors de la création du carnet de recettes.";
		}
    }

    public function booksListPost ()
    {
        // Get current user's id
        $user = AppUser::findByEmail($_SESSION['connectedUser']['email']);
        $userId = $user->getId();
        if ($userId === false || $userId ="") {
            $errorList['global'][] = 'Une erreur est survenue. Veuillez réessayer.';
        }

        // Get keywords entered into search form
        $keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($keywords === false || $keywords = "" || empty($keywords)) {
            $errorList['keywords'][] = 'Veuillez renseigner un mot clé.';
        }

        if (!empty($errorList)) {
            $this->show('book/search', [
                'keywords' => $keywords,
                'recipes' => null,
                'recipesNb' => null,
                'errorList' => $errorList
            ]);
        } else {
            // Get recipes matching keywords and in user's books
            $matchRecipes = Recipe::findAllByUserAndByKeywords($userId, $keywords);
            
            $recipesNb = count($matchRecipes);

            $this->show('book/search', [
                'keywords' => $keywords,
                'recipes' => $matchRecipes,
                'recipesNb' => $recipesNb
            ]);
        }
    }
}