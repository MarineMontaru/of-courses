<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/books.css">

<div class="page-title pdg-lr">

    <h2 class="active">Mes carnets</h2>

</div>

<h3>Résultats de la recherche</h3>
<p><em>Mot clé : "<?= $viewData['keywords'] ?>"</em></p>
<p><em><?= $viewData['recipesNb'] ?> <?= $viewData['recipesNb'] > 1 ? "recettes trouvées" : "recette trouvée" ?></em></p>

<section class="book-page pdg-lr">

    <?php 
    foreach ($viewData['recipes'] as $recipe) : ?>
        <a href="<?= $routes->generate('recipe-detail', ['id' => $recipe->getId()]) ?>">
            <article class="recipe-card">
                <figure class="thumbnail">
                    <?php 
                        $picture = $recipe->getPicture() ?? '/assets/img/photo-grey.png'; 
                    ?>
                    <img src="<?= $baseUri . $picture ?>" class="recipe-photo" alt="Photo de la recette">
                </figure>
                <p><?= $recipe->getTitle() ?></p>
            </article>
        </a>
    <?php endforeach; ?>

</section>