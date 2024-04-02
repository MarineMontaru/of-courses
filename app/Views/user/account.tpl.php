<div class="page-title pdg-lr">
    <h2 class="active">Mon compte</h2>
</div>

<section class="pdg-lr">

        <!-- TODO mettre ça dans le header? -->

        <?php if(isset($_SESSION['connectedUser'])): ?>
            <p>
                Bienvenue <?= $_SESSION['connectedUser']["firstname"] ?> 
            </p>
            <a href="<?= $routes->generate('logout') ?>">Se déconnecter</a>
            
        <?php else: ?> <!-- TODO A garder ??? -->
            <a href="<?= $routes->generate('login') ?>" class="btn">
                Connexion
            </a>
        <?php endif; ?>

        <!-- TODO rajouter mes préférences de filtres, et autres ? -->
        

</section>