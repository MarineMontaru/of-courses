<?php 
    // Récupération du tableau errorList de la méthode show
    if(!isset($viewData['errorList'])) {
        $viewData['errorList'] = [];
    } 

    function showErrors($fieldName, $errorList = null) {
        if(isset($errorList) && !empty($errorList[$fieldName])) {
            echo '<div class="error-msg">';
                foreach($errorList[$fieldName] as $error) {
                    echo '<p>'.$error.'</p>';
                }
            echo '</div>';
        }
    }