<link rel="stylesheet" href="<?= $baseUri ?>/assets/css/recipe-card.css">


<div class="page-title pdg-lr">  

    <h2 class="active">
        <?= $viewData['recipe']->getTitle() ?>
    </h2>

</div>


<!-- TODO insérer photo recette si existe (peut être null) -->


<section class="pdg-lr recipe-actions">

    <button class="btn">Ajouter au menu</button>
    <button><i class="fas fa-pen"></i></button>
    <button><i class="fas fa-folder-open"></i></button>
    <button><i class="fas fa-share-alt"></i></button>

</section>


<section class="infos-recette pdg-lr">
    
    <!-- main information concerning the recipe -->
    <section class="infos-recette__main">
        
        <?php if(!empty($viewData['recipe']->getCategoryId())): ?>
            <div class="info-recette">
                <i class="fas fa-cookie-bite"></i>
                <p><?= $viewData['category']->getCategory() ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($viewData['recipe']->getDifficultyId())): ?>
            <div class="info-recette">
                <i class="fas fa-utensil-spoon"></i>
                <p><?= $viewData['difficulty']->getDifficulty() ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($viewData['recipe']->getTime())): ?>
            <div class="info-recette">
                <i class="fas fa-clock"></i>
                <p><?= $viewData['recipe']->getTime() ?></p>
            </div>
        <?php endif; ?>

        <div class="portions">
            <div>
                <button class="portions__remove">-</button>
                <div class="portions__nb">  
                    <!-- TODO ?? modifier le nb de portions selon ce qui est dans la semaine/dans la recette par défaut -->
                    <p><?= $viewData['recipe']->getPortionsDefault() ?></p>
                </div>
                <button class="portions__add">+</button>
            </div>
            <p>portions</p>
        </div>
    
    </section>

    <section class="tags">
        <?php if(!empty($viewData['tags'])): 
            foreach ($viewData['tags'] as $tag): ?>
            <p class="tag"><?= $tag->getName() ?></p>
            <?php endforeach;
        endif; ?>
    </section>

    <section class="infos-recette__quand">

        <?php if(!empty($viewData['seasons'])): 
            foreach ($viewData['seasons'] as $season): ?>
                <div><?= $season->getName() ?></div>
            <?php endforeach; 
        endif; ?>
        <?php if(!empty($viewData['weather'])): ?>
            <div>
                <p><?= $viewData['weather']->getName() ?></p>
            </div>
        <?php endif; ?>
    
    </section>
  
</section>


<section class="ingredients pdg-lr">
    <h3>Ingrédients</h3>
    <ul>
        <!-- TODO répercuter les modifs de portions sur les quantités -->
        <?php foreach ($viewData['foods'] as $food): ?>
            <li><?= $food->getQuantity() . " " . $food->getName() ?></li>
        <?php endforeach; ?>
    </ul>
</section>


<section class="etapes pdg-lr">
    <h3>Etapes de préparation</h3>

    <section>
        <h4>Batch cooking</h4>
        <ul>
            <?php
            $batchCook = 0;
            foreach ($viewData['instructions'] as $instruction) {
                if ($instruction->getBatchcook() === 1) { ?>
                    <li><?= $instruction->getInstruction() ?></li>
                    <?php $batchCook = 1;
                }
            } ?>

            <?php if ($batchCook === 0) : ?>
                <p><em>Aucune étape de batch cooking</em></p>
            <?php endif; ?>
        </ul>
    </section>
    
    <section>
        <h4>Le jour J</h4>
        <ul>
            <?php
            $dDay = 0;
            foreach ($viewData['instructions'] as $instruction) {
                if ($instruction->getBatchcook() !== 1) { ?>
                    <li><?= $instruction->getInstruction() ?></li>
                    <?php $dDay = 1;
                    }
            } ?>

            <?php if ($dDay === 0) : ?>
                <p><em>Aucune étape de préparation le jour J</em></p>
            <?php endif; ?>
        </ul>
    </section>
            
</section>