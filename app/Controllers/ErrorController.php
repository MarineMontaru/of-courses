<?php

namespace app\Controllers;

class ErrorController extends CoreController {

    public function error404Action () {   
        $this->show('error404');
    }

}