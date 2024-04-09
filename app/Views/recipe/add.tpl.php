<?php include __DIR__ . '/../partials/form_errors.tpl.php'; ?>

<div class="page-title pdg-lr">  
    <h2 class="active">
        Créer une recette
    </h2>
</div>


<form method="POST" action="" class="pdg-lr">

    <fieldset>
        <label for="title"><h3>Titre*</h3></label>
        <?php showErrors('title', $viewData['errorList']); ?>
        <input 
            type="text" 
            name="title" 
            id="title" 
            class="text <?= (isset($viewData['errorList']['title'])) ? 'is-invalid' : ''; ?>"
        >
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
        <?php showErrors('time', $viewData['errorList']); ?>
        <div class="number-fieldset">
            <input 
                type="number" 
                name="time-hours" 
                id="time-hours" 
                class="number-input <?= (isset($viewData['errorList']['time'])) ? 'is-invalid' : ''; ?>"
            >
            <p>heure(s)</p>
            <input 
                type="number" 
                name="time-minutes" 
                id="time-minutes" 
                class="number-input <?= (isset($viewData['errorList']['time'])) ? 'is-invalid' : ''; ?>"
            >
            <p>minute(s)</p>
        </div>
    </fieldset>
    
    <fieldset class="number-fieldset">
        <label for="portions"><h3>Nombre de portions*</h3></label>
        <?php showErrors('portions', $viewData['errorList']); ?>
        <input 
            type="number" 
            name="portions" 
            id="portions" 
            class="number-input <?= (isset($viewData['errorList']['time'])) ? 'is-invalid' : ''; ?>"
        >
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
        <?php showErrors('foods', $viewData['errorList']); ?>
        <ul>
            <!-- TODO ajouter ingrédients au fur et à mesure -->
            <li>
                <input 
                    type="text" 
                    name="food[]" 
                    id="food" 
                    class="<?= (isset($viewData['errorList']['foods'])) ? 'is-invalid' : ''; ?>" 
                    placeholder="exemple : 200g de farine"
                >
            </li>
            <li>
                <input 
                    type="text" 
                    name="food[]" 
                    id="food" 
                    class="<?= (isset($viewData['errorList']['foods'])) ? 'is-invalid' : ''; ?>" 
                    placeholder="exemple : 200g de farine"
                >
            </li>
            <li>
                <input 
                    type="text" 
                    name="food[]" 
                    id="food" 
                    class="<?= (isset($viewData['errorList']['foods'])) ? 'is-invalid' : ''; ?>" 
                    placeholder="exemple : 200g de farine"
                >
            </li>
        </ul>
    </fieldset>

    <fieldset>
        <label for="food"><h3>Etapes de préparation*</h3></label>
        <?php showErrors('instructions', $viewData['errorList']); ?>

        <h4>Batch cooking</h4>
        <ul>
            <!-- TODO ajouter instructions au fur et à mesure -->
            <li>
                <textarea 
                    name="instruction-batch[]" 
                    id="instruction-batch"
                    class="<?= (isset($viewData['errorList']['instructions'])) ? 'is-invalid' : ''; ?>"
                >
                </textarea>
            </li>
            <li>
                <textarea 
                    name="instruction-batch[]" 
                    id="instruction-batch"
                    class="<?= (isset($viewData['errorList']['instructions'])) ? 'is-invalid' : ''; ?>"
                >
                </textarea>
            </li>
            <li>
                <textarea 
                    name="instruction-batch[]" 
                    id="instruction-batch"
                    class="<?= (isset($viewData['errorList']['instructions'])) ? 'is-invalid' : ''; ?>"
                >
                </textarea>
            </li>
        </ul>

        <h4>Jour J</h4>
        <ul>
            <!-- TODO ajouter instructions au fur et à mesure -->
            <li>
                <textarea 
                    name="instruction-day[]" 
                    id="instruction-day"
                    class="<?= (isset($viewData['errorList']['instructions'])) ? 'is-invalid' : ''; ?>"
                >
                </textarea>
            </li>
            <li>
                <textarea 
                    name="instruction-day[]" 
                    id="instruction-day"
                    class="<?= (isset($viewData['errorList']['instructions'])) ? 'is-invalid' : ''; ?>"
                >
                </textarea>
            </li>
            <li>
                <textarea 
                    name="instruction-day[]" 
                    id="instruction-day"
                    class="<?= (isset($viewData['errorList']['instructions'])) ? 'is-invalid' : ''; ?>"
                >
                </textarea>
            </li>
        </ul>      
        
        
    </fieldset>

    <button type="submit" class="btn">Valider</button>

</form>

<!-- TODO insérer photo recette si existe (peut être null) -->