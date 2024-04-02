<div class="page-title pdg-lr">  
    <h2 class="active">
        Se connecter
    </h2>
</div>

<div class="authentication-container pdg-lr">

  <form method="POST" class="authentication">
  
    <fieldset>
      <label for="email"><h4>Adresse mail*</h4></label>
      <input type="email" 
        id="email" 
        class="<?= isset($viewData['errorList']['email']) ? 'is-invalid' : '' ?>" 
        name="email" 
        required
        value="<?= $viewData['email'] ?? '' ?>"
        title="Veuillez saisir une adresse mail au format exemple@xxx.yy">
      <?php
        if (isset($viewData['errorList']['email'])) : 
          foreach ($viewData['errorList']['email'] as $error) : ?>
            <p class="error-msg"><?= $error ?></p>
          <?php endforeach;
        endif;
      ?>
    </fieldset>
  
    <fieldset>
      <label for="password"><h4>Mot de passe*</h4></label>
      <input type="password" 
        id="password" 
        class="<?= isset($viewData['errorList']['password']) ? 'is-invalid' : '' ?>" 
        name="password"
        required>
      <?php
        if (isset($viewData['errorList']['password'])) : 
          foreach ($viewData['errorList']['password'] as $error) : ?>
            <p class="error-msg"><?= $error ?></p>
          <?php endforeach;
        endif;
      ?>
    </fieldset>
  
    <button type='submit' class="btn">Se connecter</button>
  
    <!-- TODO ajouter lien vers page mdp oublié -->
    <a class="forgot-pwd center" href="#"><em>Mot de passe oublié ?</em></a>

  </form>

  <button class="btn create-account">
    <a href="<?= $routes->generate('create-account') ?>">Je crée mon compte</a>
  </button> 
  
</div>