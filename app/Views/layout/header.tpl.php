<html lang="fr" dir="ltr">

    <head>

        <title>Of courses</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Marine Montaru">
        <meta name="description" content="Planification de repas">

        <link rel="icon" href="<?= $baseUri ?>/assets/img/logo.png" type="image/x-icon" >
        <link rel="stylesheet" href="<?= $baseUri ?>/assets/css/reset.css">
        <link rel="stylesheet" href="<?= $baseUri ?>/assets/css/style.css">
        <script src="https://kit.fontawesome.com/56af0e18c9.js" crossorigin="anonymous"></script>
    
    </head>

    <body>
        
        <header> 

            <a href="<?= $routes->generate('home') ?>">
                <h1>Of courses</h1>
            </a>

            <nav class="navbar">
                
                <section class="navbar__shortcuts">

                    <a href="<?= $routes->generate('home') ?>"> 
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>

                    <a href="<?= $routes->generate('week-detail') ?>"> 
                        <i class="fas fa-calendar"></i>
                        <span>Ma semaine</span>
                    </a>

                    <a href="<?= $routes->generate('books-list') ?>"> 
                        <i class="fas fa-book"></i>
                        <span>Mes carnets</span>
                    </a>

                    <a href="<?= $routes->generate('search-recipes') ?>"> 
                        <i class="fas fa-search"></i>
                        <span>Rechercher</span>
                    </a>

                </section>

                <a href="<?= $routes->generate('account') ?>"> 
                    <i class="fas fa-user"></i>
                    <span>Mon compte</span>
                </a>

            </nav>

        </header>

        <main>