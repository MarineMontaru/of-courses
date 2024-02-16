<?php 

    if(!empty($_GET)) {
        $recipeId = $bddRecettes[filter_input(INPUT_GET, "id")];
    };

    $typePlat = $recipeId['type de plat'];
    $niveau = $recipeId['niveau'];
    $temps = $recipeId['temps'];
    $portions = $recipeId['portions'];
    $saisons = $recipeId['saisons'];
    $meteo = $recipeId['meteo'];
    $ingredients = $recipeId['ingredients'];
    $etapes = $recipeId['etapes'];
    $tags = $recipeId['tags'];

?>

<link rel="stylesheet" href="assets/css/recipe-card.css">

<h2 class="pdg-lr"><?= $recipeId['titre'] ?></h2>

<section class="infos-recette">
    
    <section class="infos-recette__main pdg-lr">
        
        <?php if(!empty($typePlat)): ?>
            <div class="info-recette">
                <i class="fas fa-<?=$typesPlat[$typePlat]?>"></i>
                <p><?=$typePlat?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($niveau)): ?>
            <div class="info-recette">
                <i class="fas fa-utensil-spoon"></i>
                <p><?=$niveau?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($temps)): ?>
            <div class="info-recette">
                <i class="fas fa-clock"></i>
                <p><?=$temps?></p>
            </div>
        <?php endif; ?>

        <div class="portions">
            <!-- TODO? Ajouter un include pour le nombre de portions (revient souvent) -->
            <div>
                <button class="portions__remove">-</button>
                <div class="portions__nb">  
                    <p>4</p> 
                </div>
                <!-- TODO modifier le nb de portions selon ce qui est dans la semaine -->
                <button class="portions__add">+</button>
            </div>
            <p>portions</p>
        </div>
    
    </section>

    <section class="tags pdg-lr">
        <?php if(!empty($tags)): 
            foreach ($tags as $tag): ?>
            <p class="tag"><?=$tag?></p>
            <?php endforeach;
        endif; ?>
    </section>

    <section class="infos-recette__quand pdg-lr">

        <?php if(!empty($saisons)): 
            foreach ($saisons as $saison): ?>
                <div class="info-recette__saison"><?= $saison ?></div>
            <?php endforeach; 
        endif; ?>

        <?php if(!empty($meteo)): ?>
            <div class="info-recette__meteo">
                <p><?=$meteo?></p>
            </div>
        <?php endif; ?>
    
    </section>
  
</section>

<section class="ingredients pdg-lr">
    <h3>Ingrédients</h3>
    <ul>
        <!-- TODO répercuter les modifs de portions sur les quantités -->
        <?php foreach ($ingredients as $ingredient): ?>
            <li><?=$ingredient?></li>
        <?php endforeach; ?>
    </ul>
</section>

<section class="etapes pdg-lr">
    <h3>Etapes de préparation</h3>

    <section>
        <h4>Batch cooking</h4>
        <ul>
            <!-- TODO répercuter les modifs de portions sur les quantités -->
            
            <?php if (empty($etapes['batchCooking'])) { ?>
                <p>Aucune étape de batch cooking</p>
            <?php } else { ?>
                <?php foreach ($etapes['batchCooking'] as $etape): ?>
                    <li><?=$etape?></li>
                <?php endforeach;
            } ?>
        </ul>
    </section>
    
    <section>
        <h4>Le jour J</h4>
        <ul>
            <!-- TODO répercuter les modifs de portions sur les quantités -->
            
            <?php if (empty($etapes['jourJ'])) { ?>
                <p>Aucune étape le jour J</p>
            <?php } else { ?>
                <?php foreach ($etapes['jourJ'] as $etape): ?>
                    <li><?=$etape?></li>
                <?php endforeach;
            } ?>
        </ul>
    </section>
            
</section>