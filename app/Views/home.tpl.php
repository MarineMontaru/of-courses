<link rel="stylesheet" href="assets/css/home.css">

<section class="container home-search">

    <figure>
        <img src="assets/img/photo-livre-cuilleres.jpg" alt="Photo livre de cuisine et cuillères doseuses">
        <figcaption>
            Photo de <a href="https://unsplash.com/fr/@karaeads?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Kara Eads</a> sur <a href="https://unsplash.com/fr/photos/gobelet-doseur-sur-papier-blanc-AemWnTSPxoE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
        </figcaption>
    </figure>             

    <h2 class="pdg-lr home-search-title">Rechercher une recette, un ingrédient...</h2>

    <div class="search pdg-lr">
        <form action="">
            <input type="text" class="home-search-input" placeholder="Exemples : butternut, risotto...">
            <button><i class="fas fa-search"></i></button>
        </form>
    </div>

</section>

<section class="container pdg-lr menus">

    <h2>Mes prochains menus</h2>

    <section class="menus__day">

        <h3>Dimanche 14/01</h3>
        <!-- TODO mettre à jour automatiquement le jour avec le jour J, J+1 et J+2 -->
        <!-- TODO mettre en italique "Pas de menu planifié" -->

        <section class="menus__day__lunch">

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

    <section class="menus__day">

        <h3>Lundi 15/01</h3>
        <!-- TODO mettre à jour automatiquement le jour avec le jour J -->
        <!-- TODO rajouter J+1 -->
        <!-- TODO gérer le cas des jours où rien n'est planifié : il ne faut pas que déjeuner et dîner se chevauchent -->

        <section class="menus__day__lunch">

            <!-- TODO ajouter le diner également -->

            <aside>
                <p>Déjeuner</p>
            </aside>

            <div  class="menus__day__details">

                <p>Pas de menu planifié</p>

            </div>

        </section>

        <section class="menus__day__diner">

            <!-- TODO ajouter le diner également -->

            <aside>
                <p>Dîner</p>
            </aside>

            <div class="menus__day__details">

                <p>Pas de menu planifié</p>

            </div>

        </section>

    </section>

    <div class="btn-see-more">
        <a href="./week">Voir ma semaine</a>
    </div>

</section>

<section class="container pdg-lr last-recipes">

    <h2>Les dernières recettes</h2>
    
    <section class="last-recipes__container">

        <i class="fas fa-chevron-left last-recipes__nav"></i>
        <!-- TODO ajouter interaction pour naviguer dans les recettes -->

        <?php
        foreach ($bddRecettes as $recipeId => $recipeDetail) : ?>
            <!-- TODO boucler uniquement sur les 3 ou 5 dernières recettes ajoutées-->

            <article class="last-recipes__recipe recipe-card">
                <a href="./recipe-card&id=<?=$recipeId?>"><?=$recipeDetail['titre']?></a>
            </article>
        
        <?php endforeach; ?>

        <i class="fas fa-chevron-right last-recipes__nav"></i>

    </section>

</section>