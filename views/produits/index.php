

<!-- <h1>Liste des annonces</h1> -->
<?php
//echo "<pre>",var_dump($params),"</pre>";die();
//echo "<pre>",print_r($params['pages']),"</pre>";die();
//$afficher='oui';
@$envoyer=$_GET["envoyer"];
if ($envoyer==true) {?>
    <div id="resultat"></div>
    <h1 id="nbr"><?=count($params['produits'])."".(count($params['produits'])>1?" annonces trouvées":" annonce trouvée") ?></h1>
    <?php for ($i=0; $i <count($params['produits']); $i++) { 
        
    ?>
        <div class="annonce_container">
            <h2 class="categorie_annonce"><?= $params['produits'][$i]['categorie']?></h2>
            <div class="contenu">
                <div class="infos">
                    <h3 class="paddington"><?= $params['produits'][$i]['titre']  ?></h3>
                    <p class="paddington">Date :<?= $params['produits'][$i]['date'] ?></p>
                    <p class="paddington">Description : <?= $params['produits'][$i]['description'] ?></p>
                    <p class="paddington">Prix : <?= $params['produits'][$i]['prix']?>€</p>
                </div>
                <div class="photo">
                    <img src="public/pic/<?= $params['produits'][$i]['image1'] ?>" alt="" width="300px">
                </div>
            </div>
            <a class="voir" href="/Annonces/produits/<?= $params['produits'][$i]['id'] ?>"><button class="seebtn">Voir le produit</button></a>
        </div>
        <br>


        <?php } ?>
        <?php
            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int) strip_tags($_GET['page']);
            }else{
                $currentPage = 1;
            }
        ?>
            <nav>
                <ul class="pagination">
<!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <?php if ($currentPage  > 1) : ?> 
                    <li class="page-item"><a href="?page=<?= $currentPage - 1 ?>" class="page-link"><button class="seebtn">Précédent</button></a></li>
                    <?php endif ?>

<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <?php for($page = 1;  $page <= $params['pagesSearch'];  $page++): ?>
                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="?page=<?= $page ?>/"><button class="seebtn"><?= $page ?></button></a>
                            </li>
                    <?php endfor ?>

<!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <?php if ($currentPage < $params['pagesSearch']) : ?> 
                    <li class="page-item"><a href="?page=<?= $currentPage + 1 ?>" class="page-link"><button class="seebtn">Suivant</button></a></li>
                <?php endif ?>
                    </ul>
            </nav>
        <?php } else{ ?>
            <h1>Liste des annonces</h1>
        <?php

//print_r($params);
foreach ($params['annonces'] as $produit) :

?>
    <div class="annonce_container">
        <h2 class="categorie_annonce"><?= $produit->getCategorie() ?></h2>
        <div class="contenu">
            <div class="infos">
                <h3 class="paddington"><?= $produit->getTitre()  ?></h3>
                <p class="paddington">Date :<?= $produit->getCreatedAt() ?></p>
                <p class="paddington">Description : <?= $produit->getDescription() ?></p>
                <p class="paddington">Prix : <?= $produit->getPrix() ?>€</p>
            </div>
            <div class="photo">
                <img src="public/pic/<?= $produit->getImage1() ?>" alt="" width="300px">
            </div>
        </div>
        <a class="voir" href="/Annonces/produits/<?= $produit->getId() ?>"><button class="seebtn">Voir le produit</button></a>
    </div>
    <br>
<?php endforeach ?>
<?php
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }
?>
<nav>
        <ul class="pagination">
<!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <?php if ($currentPage  > 1) : ?> 
                <li class="page-item"><a href="/Annonces/?page=<?= $currentPage - 1 ?>" class="page-link"><button class="seebtn">Précédent</button></a></li>
            <?php endif ?>

<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <?php for($page = 1;  $page <= $params['pages'];  $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="/Annonces/?page=<?= $page ?>/"><button class="seebtn"><?= $page ?></button></a>
                </li>
            <?php endfor ?>

<!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <?php if ($currentPage < $params['pages']) : ?> 
                <li class="page-item"><a href="/Annonces/?page=<?= $currentPage + 1 ?>" class="page-link"><button class="seebtn">Suivant</button></a></li>
            <?php endif ?>
        </ul>
    </nav>
<?php }?>

