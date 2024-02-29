<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/home.css">
<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/week.css">

<div class="page-title week-nav pdg-lr">
    
    <!-- TODO mettre les h2 dans des ancres, pour que le curseur apparaisse -->
    <h2 class="active">Mes menus</h2>
    <!-- TODO mettre en JS la classe active sur l'élément sélectionné selon bouton du bas et bouton liste de courses raccourci sur la page d'accueil -->
    <h2>Mes courses</h2>

</div>


<!------------ Section "Mes menus" ------------>

<section class="menus pdg-lr">

    <section class="menus__day visible">

        <h3>Dimanche 14/01</h3>
        <!-- TODO mettre à jour automatiquement le jour avec le jour J -->
        <!-- TODO rajouter J+1 et jours suivants -->

        <section class="menus__day__lunch">

            <!-- TODO ajouter le diner également -->

            <aside>
                <p>Déjeuner</p>
            </aside>

            <div  class="menus__day__details">

                <?php
                foreach ($bddRecettes as $recipeId => $recipeDetail) : ?>
                    <!-- TODO boucler uniquement sur les recettes de la semaine, uniquement pour ce jour et ce repas -->

                    <article class="menus__day__details__recipe recipe-card">
                        <a href="./recipe-card&id=<?=$recipeId?>"><?=$recipeDetail['titre']?></a>
                        <div class="portions">
                            <!-- TODO? Ajouter un include pour le nombre de portions (revient souvent) -->
                            <div>
                                <button class="portions__remove">-</button>
                                <div class="portions__nb">  
                                    <p>4</p> 
                                </div>
                                <!-- TODO modifier le nb de portions selon ce qui est dans la semaine -->
                                <button class="portions__add">+</button>
                            </div>
                            <p>portions</p>
                        </div>
                    </article>
                
                <?php endforeach; ?>

            </div>

        </section>

        <section class="menus__day__diner">

            <!-- TODO ajouter le diner également -->

            <aside>
                <p>Dîner</p>
            </aside>

            <div class="menus__day__details">

                <?php
                foreach ($bddRecettes as $recipeId => $recipeDetail) : ?>
                    <!-- TODO boucler uniquement sur les recettes de la semaine, uniquement pour ce jour et ce repas -->

                    <article class="menus__day__details__recipe recipe-card">
                        <a href="./recipe-card&id=<?=$recipeId?>"><?=$recipeDetail['titre']?></a>
                        <div class="portions">
                            <!-- TODO? Ajouter un include pour le nombre de portions (revient souvent) -->
                            <div>
                                <button class="portions__remove">-</button>
                                <div class="portions__nb">  
                                    <p>4</p> 
                                </div>
                                <!-- TODO modifier le nb de portions selon ce qui est dans la semaine -->
                                <button class="portions__add">+</button>
                            </div>
                            <p>portions</p>
                        </div>
                    </article>
                
                
                <?php endforeach; ?>

            </div>

        </section>

    </section>

</section>


<!------- Section "Mes courses" ------->

<section class="courses hidden pdg-lr">

<!-- TODO faire en sorte que les ingrédients cochés restent cochés même en revenant plus tard sur la page -->
    
    <h3>Risotto au brocoli</h3>
    <form>
        <!-- TODO spécifier la liste de courses en fonction des recettes au menu et de la quantité sélectionnée -->
        <input type="checkbox" class="ingredient" id="ingredient1" name="ingredient1">
        <label for="ingredient1">Ingrédient 1</label>
        <br>
        <input type="checkbox" class="ingredient" id="ingredient2" name="ingredient2">
        <label for="ingredient2">Ingrédient 2</label>
        <br>
        <input type="checkbox" class="ingredient" id="ingredient3" name="ingredient3">
        <label for="ingredient3">Ingrédient 3</label>
        <br>
        <input type="checkbox" class="ingredient" id="ingredient4" name="ingredient4">
        <label for="ingredient4">Ingrédient 4</label>
        <br>
    </form>

    <h3>Galette des rois</h3>
    <form>
        <!-- TODO spécifier la liste de courses en fonction des recettes au menu et de la quantité sélectionnée -->
        <input type="checkbox" class="ingredient" id="ingredient1" name="ingredient1">
        <label for="ingredient1">Ingrédient 1</label>
        <br>
        <input type="checkbox" class="ingredient" id="ingredient2" name="ingredient2">
        <label for="ingredient2">Ingrédient 2</label>
        <br>
        <input type="checkbox" class="ingredient" id="ingredient3" name="ingredient3">
        <label for="ingredient3">Ingrédient 3</label>
        <br>
    </form>

</section>