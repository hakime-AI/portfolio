<div class="show">
<div class="infos_show">
<h2>Titre : <?= $params['produit']->getTitre() ?></h2>
<p>Categorie : <?= $params['produit']->getCategorie() ?></p>
<p>Date : <?= $params['produit']->getCreatedAt() ?></p>
<p>Description : <?= $params['produit']->getDescription() ?></p>
<p>Prix : <?= $params['produit']->getPrix() ?></p>
</div>

<div class="caroussel_container">
    <input type="radio" name="position" checked />
    <input type="radio" name="position" />
    <input type="radio" name="position" />
    <input type="radio" name="position" />
    <input type="radio" name="position" />
    <main id="carousel">
        <div class="item"><img src="../public/pic/<?= $params['produit']->getImage1() ?>" alt="" width="350px" height="250px"></div>
        <div class="item"><img src="../public/pic/<?= $params['produit']->getImage2() ?>" alt="" width="350px" height="250px"></div>
        <div class="item"><img src="../public/pic/<?= $params['produit']->getImage3() ?>" alt="" width="350px" height="250px"></div>
        <div class="item"><img src="../public/pic/<?= $params['produit']->getImage4() ?>" alt="" width="350px" height="250px"></div>
        <div class="item"><img src="../public/pic/<?= $params['produit']->getImage5() ?>" alt="" width="350px" height="250px"></div>
        <main>
</div>
</div>

<div class="choix">
<a href="/Annonces/"><button class="seebtn">Retour</button></a>
<a href="/Annonces/edit/<?= $params['produit']->getId() ?>"><button class="seebtn">Modifier</button></a>
<form action="/Annonces/delete/<?= $params['produit']->getId() ?>" method="POST" class="d-inline">
    <button class="seebtn" type="submit" class="">Supprimer</button>
</form>
<a href="/Annonces/pdf/<?= $params['produit']->getId() ?><?= $params['produit']->getTitre() ?>" target="blank"><button class="seebtn">PDF</button></a>
</div>


