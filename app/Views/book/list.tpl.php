<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/books.css">


<div class="page-title pdg-lr">

    <h2 class="active">Mes carnets</h2>

</div>

<section class="books__search search pdg-lr">

    <form action="">
        <input type="text" placeholder="Exemples : butternut, risotto...">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </form>

</section>

<section class="books__list pdg-lr">

    <a href="<?= $routes->generate('book-detail-all') ?>">
        <h3>
            Toutes mes recettes <em>(<?= $viewData['all-user-recipes-nb'] ?>)</em>
        </h3>
    </a>

    <?php foreach ($viewData['user-books'] as $userBook) : ?>
        <a href="<?= $routes->generate('book-detail', ['id' => $userBook->getId()]) ?>">
            <h3>
                <?= $userBook->getTitle() ?>
                <em> (<?= $viewData['books-recipes-nb'][$userBook->getId()] ?>)</em>
            </h3>
        </a>
    <?php endforeach; ?>

</section>

<section class="books__add pdg-lr">

    <a href="<?= $routes->generate('book-add') ?>">
        <p class="btn-add">+</p>
        <p>Ajouter un carnet de recettes</p>
    </a>

    <a href="<?= $routes->generate('recipe-add') ?>">
        <p class="btn-add">+</p>
        <p>Créer une recette</p>
    </a>

</section>