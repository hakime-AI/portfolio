<h1>Modifier votre annonce</h1>

    <h2><?= $params['produit']->getId() ?></h2>
    <div class="form_modif">
    <div class="modif">
    <form action="/Annonces/edit/<?= $params['produit']->getId() ?>" method="POST" enctype="multipart/form-data">
        <div class="modi">
            <label for="titre">Titre : </label>
            <input type="text" id="titre" name="titre" value="<?= $params['produit']->getTitre() ?>">
        </div>

        <div class="modi">
            <label for="description">Description : </label>
            <textarea name="description" id="description" cols="20" rows="5" <?= $params['produit']->getDescription() ?>><?= $params['produit']->getDescription() ?></textarea>
        </div>

        <div class="modi">
            <label for="prix">Prix : </label>
            <input type="number" id="prix" name="prix" value="<?= $params['produit']->getPrix() ?>">
        </div>

        <div class="modi">
            <label for="image">Image</label>
            <?php
            $image = array($params['produit']->getImage1(), $params['produit']->getImage2(), $params['produit']->getImage3(), $params['produit']->getImage4(), $params['produit']->getImage5());

            for ($i = 0; $i < 5; $i++) {
                $image[$i];
                //echo "<pre>",print_r( $image[$i]),"</pre>";
            ?>
                <input type="file" accept="image/jpg,image/jpeg,image/gif,image/png" name="image<?= $i ?>" id="img"><img src="../public/pic/<?= $image[$i]  ?>" width="100px">
            <?php  } ?>
        </div>

        <label for="Categorie">Categorie:</label>
        <select name="categorie" id="categorie">
            <option hidden>Liste des catégories</option>
            <option value="automobile" <?= ($params['produit']->getCategorie() == 'automobile') ? 'selected=selected' : '' ?>>Auto</option>
            <option value="immobilier" <?= ($params['produit']->getCategorie() == 'immobilier') ? 'selected=selected' : '' ?>>Immobilier</option>
            <option value="jardin" <?= ($params['produit']->getCategorie() == 'jardin') ? 'selected=selected' : '' ?>>Jardin</option>
            <option value="jeux" <?= ($params['produit']->getCategorie() == 'jeux') ? 'selected=selected' : '' ?>>Jouets & Jeux Vidéo</option>
            <option value="multimedia" <?= ($params['produit']->getCategorie() == 'multimedia') ? 'selected=selected' : '' ?>>Multimedia</option>
            <option value="emploi" <?= ($params['produit']->getCategorie() == 'emploi') ? 'selected=selected' : '' ?>>Emploi</option>
        </select><br>

        <input class="seebtn" type="submit">
    </form>
</div>
</div>
<a class="btnadd" href="/Annonces/"><button class="seebtn">Retour</button></a>