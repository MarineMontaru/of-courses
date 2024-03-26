<div class="page-title pdg-lr">  

    <h2 class="active">
        Créer une recette
    </h2>

</div>


<form method="POST" action="" class="pdg-lr">

    <fieldset>
        <label for="title"><h3>Titre*</h3></label>
        <input type="text" name="title" class="text">
    </fieldset>

    <fieldset>
        <label for="category"><h3>Catégorie*</h3></label>
        <select name="category" id="category">
            <?php foreach ($viewData['categories'] as $category) : ?>
                <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <fieldset>
        <label for="difficulty"><h3>Difficulté</h3></label>
        <select name="difficulty" id="difficulty">
            <?php foreach ($viewData['difficulties'] as $difficulty) : ?>
                <option value="<?= $difficulty->getId() ?>"><?= $difficulty->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <fieldset>
        <label for="time-hours"><h3>Temps total de préparation*</h3></label>
        <div class="number-fieldset">
            <input type="number" name="time-hours" id="time-hours" class="number-input">
            <p>heure(s)</p>
            <input type="number" name="time-minutes" id="time-minutes" class="number-input">
            <p>minute(s)</p>
        </div>
    </fieldset>
    
    <fieldset class="number-fieldset">
        <label for="portions"><h3>Nombre de portions*</h3></label>
        <input type="number" name="portions" id="portions" class="number-input">
    </fieldset>
   
    <fieldset>
        <label for="season"><h3>Saison des aliments</h3></label>
        <select multiple name="season[]" id="season">
            <?php foreach ($viewData['seasons'] as $season) : ?>
                <option value="<?= $season->getId() ?>"><?= $season->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>
    
    <fieldset>
        <label for="weather"><h3>Par quelle météo faire cette recette ?</h3></label>
        <select name="weather" id="weather">
            <?php foreach ($viewData['weathers'] as $weather) : ?>
                <option value="<?= $weather->getId() ?>"><?= $weather->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <fieldset>
        <label for="tag"><h3>Tags</h3></label>
        <select multiple name="tag[]" id="tag">
            <?php foreach ($viewData['tags'] as $tag) : ?>
                <option value="<?= $tag->getId() ?>"><?= $tag->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <fieldset>
        <label for="food"><h3>Ingrédients*</h3></label>
        <ul>
            <!-- TODO ajouter ingrédients au fur et à mesure -->
            <li>
                <input type="text" name="food[]" id="food" placeholder="exemple : 200g de farine">
            </li>
            <li>
                <input type="text" name="food[]" id="food2" placeholder="exemple : 200g de farine">
            </li>
            <li>
                <input type="text" name="food[]" id="food3" placeholder="exemple : 200g de farine">
            </li>
            <li>
                <input type="text" name="food[]" id="food4" placeholder="exemple : 200g de farine">
            </li>
            <li>
                <input type="text" name="food[]" id="food5" placeholder="exemple : 200g de farine">
            </li>
        </ul>
    </fieldset>

    <fieldset>
        <label for="food"><h3>Etapes de préparation*</h3></label>

        <h4>Batch cooking</h4>
        <ul>
            <!-- TODO ajouter instructions au fur et à mesure -->
            <li>
                <textarea name="instruction-batch[]" id="instruction-batch"></textarea>
            </li>
            <li>
                <textarea name="instruction-batch[]" id="instruction-batch"></textarea>
            </li>
            <li>
                <textarea name="instruction-batch[]" id="instruction-batch"></textarea>
            </li>
        </ul>

        <h4>Jour J</h4>
        <ul>
            <!-- TODO ajouter instructions au fur et à mesure -->
            <li>
                <textarea name="instruction-day[]" id="instruction-day"></textarea>
            </li>
            <li>
                <textarea name="instruction-day[]" id="instruction-day"></textarea>
            </li>
            <li>
                <textarea name="instruction-day[]" id="instruction-day"></textarea>
            </li>
        </ul>      

    </fieldset>

    <button class="btn">Valider</button>

</form>

<!-- TODO insérer photo recette si existe (peut être null) -->