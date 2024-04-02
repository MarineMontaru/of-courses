<?php dump($viewData); 
dump($_POST); ?>

<div class="page-title pdg-lr">  
    <h2 class="active">
        Créer un compte
    </h2>
</div>

<div class="create-account-container pdg-lr">

  <form method="POST" class="create-account">
  
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
      <label for="firstname"><h4>Prénom*</h4></label>
      <input type="text" 
        id="firstname" 
        class="<?= isset($viewData['errorList']['firstname']) ? 'is-invalid' : '' ?>" 
        name="firstname" 
        required
        value="<?= $viewData['firstname'] ?? '' ?>">
      <?php
        if (isset($viewData['errorList']['firstname'])) : 
          foreach ($viewData['errorList']['firstname'] as $error) : ?>
            <p class="error-msg"><?= $error ?></p>
          <?php endforeach;
        endif;
      ?>
    </fieldset>

    <fieldset>
      <label for="lastname"><h4>Nom*</h4></label>
      <input type="text" 
        id="lastname" 
        class="<?= isset($viewData['errorList']['lastname']) ? 'is-invalid' : '' ?>" 
        name="lastname" 
        required
        value="<?= $viewData['lastname'] ?? '' ?>">
      <?php
        if (isset($viewData['errorList']['lastname'])) : 
          foreach ($viewData['errorList']['lastname'] as $error) : ?>
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

    <fieldset>
      <label for="password2"><h4>Répétez le mot de passe*</h4></label>
      <input type="password" 
        id="password2" 
        class="<?= isset($viewData['errorList']['password2']) ? 'is-invalid' : '' ?>" 
        name="password2"
        required>
      <?php
        if (isset($viewData['errorList']['password2'])) : 
          foreach ($viewData['errorList']['password2'] as $error) : ?>
            <p class="error-msg"><?= $error ?></p>
          <?php endforeach;
        endif;
      ?>
    </fieldset>
  
    <button type='submit' class="btn">Créer un compte</button>
  
</div>