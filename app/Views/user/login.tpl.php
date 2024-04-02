<div class="page-title pdg-lr">  
    <h2 class="active">
        Se connecter
    </h2>
</div>

<div class="authentication-container pdg-lr">
  <form method="POST" class="authentication">
  
    <fieldset>
      <label for="email"><h3>Adresse mail*</h3></label>
      <input type="email" 
        id="email" 
        class="<?= isset($viewData['errorList']['email']) ? 'is-invalid' : '' ?>" 
        name="email" 
        value="<?= $viewData['email'] ?? '' ?>">
      <?php
        if (isset($viewData['errorList']['email'])) : 
          foreach ($viewData['errorList']['email'] as $error) : ?>
            <p class="error-msg"><?= $error ?></p>
          <?php endforeach;
        endif;
      ?>

    </fieldset>
  
    <fieldset>
      <label for="password"><h3>Mot de passe*</h3></label>
      <input type="password" 
        id="password" 
        class="<?= isset($viewData['errorList']['password']) ? 'is-invalid' : '' ?>" 
        name="password">
      <?php
        if (isset($viewData['errorList']['password'])) : 
          foreach ($viewData['errorList']['password'] as $error) : ?>
            <p class="error-msg"><?= $error ?></p>
          <?php endforeach;
        endif;
      ?>
    </fieldset>
  
    <button type='submit' class="btn">Se connecter</button>
  
    <a href="#"><em>Mot de passe oublié ?</em></a>

  </form>

</div>