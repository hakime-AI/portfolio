
<h1>Créez votre annonce</h1>
<div class="form_create">
<div class="formulaire">


<form action="/Annonces/formulaire" method="POST" enctype="multipart/form-data">

<label for="Categorie">Categorie:</label><br>
    <select name="categorie" id="categorie">
        <option hidden>Liste des catégories</option>
        <option value="automobile">Auto</option>
        <option value="immobilier">Immobilier</option>
        <option value="jardin">Jardin</option>
        <option value="jeux">Jouets & Jeux Vidéo</option>
        <option value="multimedia">Multimedia</option>
        <option value="emploi">Emploi</option>
    </select><br>
    
    <div>
    <br><label for="titre">Titre : </label><br>
        <input type="text" id="titre" name="titre" size="35">
    </div>
    <div>
    <br><label for="description">Description : </label><br>
        <textarea name="description" id="description" cols="30" rows="5"></textarea>
    </div>
    <div>
    <br><label for="prix">Prix : </label><br>
        <input type="number" id="prix" name="prix" size="35">
    </div>
    <div>
    <br><label for="image">Image</label><br>
            <input type="file" accept = "image/jpg,image/jpeg,image/gif,image/png" name="image[]" id="img" multiple required>
            <input type="file" accept = "image/jpg,image/jpeg,image/gif,image/png" name="image[]" id="img" multiple required>
            <input type="file" accept = "image/jpg,image/jpeg,image/gif,image/png" name="image[]" id="img" multiple required>
            <input type="file" accept = "image/jpg,image/jpeg,image/gif,image/png" name="image[]" id="img" multiple required>
            <input type="file" accept = "image/jpg,image/jpeg,image/gif,image/png" name="image[]" id="img" multiple required>
        </div>
        <br>

    <div id="submit">
    <button class="seebtn" type="submit">Poster</button>
    </div>
    
</form>
</div>
</div>
<div class="btnadd">
<a href="/Annonces/"><button class="seebtn">Retour</button></a>
