<link rel="stylesheet" href="assets/css/home.css">

            <section class="container pdg-lr menus">

                <h3 class="menus__titre">Mes prochains menus</h3>

                <section class="menus__jourJ">

                    <h4>Dimanche 14/01</h4>
                    <!-- TODO mettre à jour automatiquement le jour avec le jour J -->
                    <!-- TODO rajouter J+1 -->

                    <section class="menus__jourJ__dejeuner">

                        <!-- TODO ajouter le diner également -->

                        <aside>
                            <p>Déjeuner</p>
                        </aside>

                        <div  class="menus__jourJ__details">

                            <?php
                            foreach ($bddRecettes as $recetteId => $recetteDetail) : ?>
                                <!-- TODO boucler uniquement sur les recettes de la semaine, uniquement pour ce jour et ce repas -->

                                <article class="menus__jourJ__details__recette">
                                    <a href="./recipe-card&id=<?=$recetteId?>"><?=$recetteDetail['titre']?></a>
                                    <div class="portions">
                                        <!-- TODO? Ajouter un include pour le nombre de portions (revient souvent) -->
                                        <div>
                                            <p class="portions__modif">-</p>
                                            <div class="portions__nb">  
                                                <p>4</p> 
                                            </div>
                                            <!-- TODO modifier le nb de portions selon ce qui est dans la semaine -->
                                            <p class="portions__modif">+</p>
                                        </div>
                                        <p>portions</p>
                                    </div>
                                </article>
                            
                            <?php endforeach; ?>

                        </div>

                    </section>

                    <section class="menus__jourJ__diner">

                        <!-- TODO ajouter le diner également -->

                        <aside>
                            <p>Dîner</p>
                        </aside>

                        <div class="menus__jourJ__details">

                            <?php
                            foreach ($bddRecettes as $recetteId => $recetteDetail) : ?>
                                <!-- TODO boucler uniquement sur les recettes de la semaine, uniquement pour ce jour et ce repas -->

                                <article class="menus__jourJ__details__recette">
                                    <a href="./recipe-card&id=<?=$recetteId?>"><?=$recetteDetail['titre']?></a>
                                    <div class="portions">
                                        <div>
                                            <p class="portions__modif">-</p>
                                            <div class="portions__nb">  
                                                <p>4</p> 
                                            </div>
                                            <!-- TODO modifier le nb de portions selon ce qui est dans la semaine -->
                                            <p class="portions__modif">+</p>
                                        </div>
                                        <p>portions</p>
                                    </div>
                                </article>
                            
                            <?php endforeach; ?>

                        </div>

                    </section>
                    
                    <div class="btn_voir-plus">
                        <a href="./semaine.php">Voir ma semaine</a>
                    </div>

                </section>

            </section>

            <section class="container barre-recherche">

                <figure>
                    <img src="assets/img/photo-livre-cuilleres.jpg" alt="Photo livre de cuisine et cuillères doseuses">
                    <figcaption>
                        Photo de <a href="https://unsplash.com/fr/@karaeads?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Kara Eads</a> sur <a href="https://unsplash.com/fr/photos/gobelet-doseur-sur-papier-blanc-AemWnTSPxoE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
                    </figcaption>
                </figure>             

                <h3 id="index-recherche">Rechercher une recette, un ingrédient...</h3>

                <form action="">
                    <input type="text" class="recherche-accueil" placeholder="Exemples : butternut, risotto...">
                    <i class="fas fa-search"></i>
                </form>

            </section>

            <section class="container pdg-lr raccourcis">

                <a href="#" class="raccourcis__courses">
                    <i class="fas fa-shopping-cart"></i>
                    <p class="raccourcis__text">Ma liste de courses</p>
                </a>

                <a href="./carnets.php" class="raccourcis__carnets">
                    <i class="fas fa-book"></i>
                    <p class="raccourcis__text">Mes carnets de recettes</p>
                </a>

            </section>

            <section class="container pdg-lr dernieres-recettes">

                <h3>Les dernières recettes</h3>
                
                <section class="dernieres-recettes__container">

                    <i class="fas fa-chevron-left dernieres-recettes__nav"></i>
                    <!-- TODO ajouter interaction pour naviguer dans les recettes -->

                    <?php
                    foreach ($bddRecettes as $recetteId => $recetteDetail) : ?>
                        <!-- TODO boucler uniquement sur les 3 ou 5 dernières recettes ajoutées-->

                        <article class="dernieres-recettes__recette">
                            <a href="./recipe-card&id=<?=$recetteId?>"><?=$recetteDetail['titre']?></a>
                        </article>
                    
                    <?php endforeach; ?>

                    <i class="fas fa-chevron-right dernieres-recettes__nav"></i>

                </section>

            </section>