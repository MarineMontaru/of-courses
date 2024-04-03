<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/home.css">

<section class="home-search">

    <figure>
        <img src="<?= $baseUri ?>/assets/img/myrtilles.jpg" alt="Myrtilles sur une planche à découper en bois">
    </figure>             

    <h2 class="pdg-lr home-search-title">Rechercher une recette, un ingrédient...</h2>

    <div class="search pdg-lr">
        <form action="">
            <input type="text" class="home-search-input" placeholder="Exemples : butternut, risotto...">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </form>
    </div>

</section>

<section class="pdg-lr menus">

    <h2>Mes prochains menus</h2>
<!--
    <section class="menus__day">

        <h3>Dimanche 14/01</h3>

        <section class="menus__day__lunch">

            <aside>
                <p>Déjeuner</p>
            </aside>

            <div  class="menus__day__details">

                <?php
                foreach ($recipesDb as $recipeId => $recipeDetail) : ?>

                    <article class="menus__day__details__recipe recipe-card">
                        <a href="<?= $routes->generate('recipe-detail', ['id' => $recipeId]) ?>"><?=$recipeDetail['titre']?></a>
                        <div class="portions">
                            <div>
                                <button class="portions__remove">-</button>
                                <div class="portions__nb">  
                                    <p>4</p> 
                                </div>
                                <button class="portions__add">+</button>
                            </div>
                            <p>portions</p>
                        </div>
                    </article>
                
                <?php endforeach; ?>

            </div>

        </section>

        <section class="menus__day__diner">

            <aside>
                <p>Dîner</p>
            </aside>

            <div class="menus__day__details">

                <?php
                foreach ($recipesDb as $recipeId => $recipeDetail) : ?>

                    <article class="menus__day__details__recipe recipe-card">
                        <a href="<?= $routes->generate('recipe-detail', ['id' => $recipeId]) ?>"><?=$recipeDetail['titre']?></a>
                        <div class="portions">
                            <div>
                                <button class="portions__remove">-</button>
                                <div class="portions__nb">  
                                    <p>4</p> 
                                </div>
                                <button class="portions__add">+</button>
                            </div>
                            <p>portions</p>
                        </div>
                    </article>
                
                <?php endforeach; ?>

            </div>

        </section>

    </section>
-->


    <div class="btn-see-more">
        <a class="btn" href="<?= $routes->generate('week-detail') ?>">Voir ma semaine</a>
    </div>

</section>

<section class="last-recipes">

    <h2 class="pdg-lr">Les dernières recettes</h2>
    
    <section class="last-recipes__container">

        <i class="fas fa-chevron-left last-recipes__nav"></i>

        <?php
        foreach ($viewData['last-recipes'] as $recipe) : ?>

            <article class="last-recipes__recipe recipe-card">
                <a href="<?= $routes->generate('recipe-detail', ['id' => $recipe->getId()]) ?>">
                    <?=$recipe->getTitle()?>
                </a>
            </article>
        <?php endforeach; ?>

        <i class="fas fa-chevron-right last-recipes__nav"></i>

    </section>

</section>