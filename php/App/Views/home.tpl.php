<link rel="stylesheet" href="assets/css/home.css">

<section class="container pdg-lr menus">

    <h3>Mes prochains menus</h3>

    <section class="menus__Dday">

        <h4>Dimanche 14/01</h4>
        <!-- TODO mettre à jour automatiquement le jour avec le jour J -->
        <!-- TODO rajouter J+1 -->

        <section class="menus__Dday__lunch">

            <!-- TODO ajouter le diner également -->

            <aside>
                <p>Déjeuner</p>
            </aside>

            <div  class="menus__Dday__details">

                <?php
                foreach ($bddRecettes as $recipeId => $recipeDetail) : ?>
                    <!-- TODO boucler uniquement sur les recettes de la semaine, uniquement pour ce jour et ce repas -->

                    <article class="menus__Dday__details__recipe">
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

        <section class="menus__Dday__diner">

            <!-- TODO ajouter le diner également -->

            <aside>
                <p>Dîner</p>
            </aside>

            <div class="menus__Dday__details">

                <?php
                foreach ($bddRecettes as $recipeId => $recipeDetail) : ?>
                    <!-- TODO boucler uniquement sur les recettes de la semaine, uniquement pour ce jour et ce repas -->

                    <article class="menus__Dday__details__recipe">
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
        
        <div class="btn-see-more">
            <a href="./week">Voir ma semaine</a>
        </div>

    </section>

</section>

<section class="container search-home">

    <figure>
        <img src="assets/img/photo-livre-cuilleres.jpg" alt="Photo livre de cuisine et cuillères doseuses">
        <figcaption>
            Photo de <a href="https://unsplash.com/fr/@karaeads?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Kara Eads</a> sur <a href="https://unsplash.com/fr/photos/gobelet-doseur-sur-papier-blanc-AemWnTSPxoE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
        </figcaption>
    </figure>             

    <h3 id="index-search">Rechercher une recette, un ingrédient...</h3>

    <form action="">
        <input type="text" class="search-home-input" placeholder="Exemples : butternut, risotto...">
        <i class="fas fa-search"></i>
    </form>

</section>

<section class="container pdg-lr shortcuts">

    <a href="#">
        <!-- TODO ajouter raccourci vers liste de course (voir comment faire pour ajouter classe sur une autre page) -->
        <i class="fas fa-shopping-cart"></i>
        <p class="shortcuts__text">Ma liste de courses</p>
    </a>

    <a href="./books">
        <i class="fas fa-book"></i>
        <p class="shortcuts__text">Mes carnets de recettes</p>
    </a>

</section>

<section class="container pdg-lr last-recipes">

    <h3>Les dernières recettes</h3>
    
    <section class="last-recipes__container">

        <i class="fas fa-chevron-left last-recipes__nav"></i>
        <!-- TODO ajouter interaction pour naviguer dans les recettes -->

        <?php
        foreach ($bddRecettes as $recipeId => $recipeDetail) : ?>
            <!-- TODO boucler uniquement sur les 3 ou 5 dernières recettes ajoutées-->

            <article class="last-recipes__recipe">
                <a href="./recipe-card&id=<?=$recipeId?>"><?=$recipeDetail['titre']?></a>
            </article>
        
        <?php endforeach; ?>

        <i class="fas fa-chevron-right last-recipes__nav"></i>

    </section>

</section>