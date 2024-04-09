<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/books.css">

<div class="page-title pdg-lr">

    <h2 class="active">
        <?php 
        if (isset($viewData['book'])) {
            echo $viewData['book']->getTitle();
        } else {
            echo "Toutes mes recettes";
        } ?>
    </h2>

</div>

<section class="book-page pdg-lr">

    <?php 
    // If no recipe in the book
    if (empty($viewData['recipes'])) { ?>
        <figure class="no-recipe-figure">
            <p class="no-recipe"><em>Aucune recette dans le carnet.</em></p>
            <img src="<?= $baseUri ?>/assets/img/empty-book.png" alt="">
        </figure>
    <?php 
    } else { 
        foreach ($viewData['recipes'] as $recipe) : ?>
            <a href="<?= $routes->generate('recipe-detail', ['id' => $recipe->getId()]) ?>">
                <article class="recipe-card">
                    <figure class="thumbnail">
                        <?php $picture = $recipe->getPicture()??'/assets/img/cuillere_bois.jpg'; ?>
                        <img src="<?= $baseUri . $picture ?>" alt="Photo de la recette">
                    </figure>
                    <?= $recipe->getTitle() ?>
                </article>
            </a>
        <?php endforeach;
    } ?>

</section>


