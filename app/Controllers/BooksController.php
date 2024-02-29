<?php

namespace app\Controllers;

class BooksController extends CoreController {

    public function booksList () 
    {
        $this->show('books');
    }

}