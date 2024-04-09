<div class="page-title pdg-lr">  
    <h2 class="active">
        Rechercher des recettes
    </h2>
</div>


<form method="POST" action="" class="pdg-lr">

    <fieldset>
        <label for="keywords"><h3>Mot clé (titre ou ingrédient)</h3></label>
        <input type="text" name="keywords" id="keywords" class="text">
    </fieldset>

    <fieldset>
        <label for="category"><h3>Catégorie</h3></label>
        <select name="category" id="category" multiple>
            <?php foreach ($viewData['categories'] as $category) : ?>
                <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <fieldset>
        <label for="difficulty"><h3>Difficulté</h3></label>
        <select name="difficulty" id="difficulty" multiple>
            <?php foreach ($viewData['difficulties'] as $difficulty) : ?>
                <option value="<?= $difficulty->getId() ?>"><?= $difficulty->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <fieldset>
        <label for="time-hours"><h3>Temps total max de préparation</h3></label>
        <div class="number-fieldset">
            <input type="number" name="time-hours" id="time-hours" class="number-input">
            <p>heure(s)</p>
            <input type="number" name="time-minutes" id="time-minutes" class="number-input">
            <p>minute(s)</p>
        </div>
    </fieldset>
   
    <fieldset>
        <label for="season"><h3>Saison des aliments</h3></label>
        <select name="season[]" id="season" multiple>
            <?php foreach ($viewData['seasons'] as $season) : ?>
                <option value="<?= $season->getId() ?>"><?= $season->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>
    
    <fieldset>
        <label for="weather"><h3>Par quelle météo faire cette recette ?</h3></label>
        <select name="weather" id="weather" multiple>
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

    <!-- TODO ajouter un champ "Sans les ingrédients" -->

    <button type="submit" class="btn">Valider</button>

</form>