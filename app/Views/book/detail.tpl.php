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

<section class="pdg-lr">

    <?php 
    // If no recipe in the book
    if (empty($viewData['recipes'])) { ?>

        <p><em>Aucune recette dans le carnet.</em></p>

    <?php 
    } else { 

        foreach ($viewData['recipes'] as $recipe) : ?>
        
        <a href="<?= $routes->generate('recipe-detail', ['id' => $recipe->getId()]) ?>">
            <article class="recipe-card">
                <?= $recipe->getTitle() ?>
            </article>
        </a>

        <?php 
        endforeach;

    } ?>

</section>


