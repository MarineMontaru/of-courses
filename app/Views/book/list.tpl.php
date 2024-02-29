<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/books.css">


<div class="page-title pdg-lr">

    <h2 class="active">Mes carnets</h2>

</div>

<section class="books__search search pdg-lr">

    <form action="">
        <input type="text" placeholder="Exemples : butternut, risotto...">
        <button><i class="fas fa-search"></i></button>
    </form>

</section>

<section class="books__list pdg-lr">

    <!-- TODO ajouter boucle sur les différents carnets de l'utilisateur -->
    <a href="#">
        <!-- TODO ajouter lien -->
        <h3>
            Toutes mes recettes <em>(25)</em>
        </h3>
    </a>

    <a href="#">
        <!-- TODO ajouter lien -->
        <h3>
            Mes favoris <em>(5)</em>
        </h3>
    </a>

    <a href="#">
        <!-- TODO ajouter lien -->
        <h3>
            Idées à tester <em>(12)</em>
        </h3>
    </a>

    <a href="#">
        <!-- TODO ajouter lien -->
        <h3>
            Grandes tablées <em>(3)</em>
        </h3>
    </a>

</section>

<section class="books__add pdg-lr">

    <div>
        <button class="btn-add">+</button>
        <p>Ajouter un carnet de recettes</p>
    </div>

    <div>
        <button class="btn-add">+</button>
        <p>Créer une recette</p>
    </div>

</section>