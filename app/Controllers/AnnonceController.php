<?php

namespace App\Controllers;
use \Mpdf\Mpdf;
use App\Models\Produit;
class AnnonceController extends Controller {

    public function index()
    {
        $produit = new Produit($this->getConnection());

        // Numéro de page dans l'URL. Si aucun numéro de page alors nous sommes en page 1
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

        // On détermine le nombre d'élément par page
        $parPage = 2;
        // On calcul le 1er élément de la page
        $premier = ($currentPage * $parPage) - $parPage;
        $produits = $produit->search($premier, $parPage);
        $annonces = $produit->all($premier, $parPage);

        // Pagination sur tous les produits
        $paging = $produit->paging();
        $nbAnnonce = $paging['id'];
        $pages = ceil($nbAnnonce / $parPage);

        // Pagination sur la recherche
        $pagingSearch = $produit->pagingSearch();
        $nbSearch = $pagingSearch['id'];
        $pagesSearch = ceil($nbSearch / $parPage);

        //echo "<pre>",print_r($pagesSearch),"</pre>";  die();

        /* On return : 
        - produits pour la fonction search (sélection pour la recherche)
        - annonces pour la fonction all (sélection de tous les produits)
        - pages pour la pagination sur tous les produits
        - pagesSearch pour la pagination sur la recherche*/
        return $this->view('produits.index', compact('produits', 'annonces', 'pages', 'pagesSearch'));

    }

    public function show(int $id)
    {
        // Fonction qui affiche un produit grâce à son id
        $produit = new Produit($this->getConnection());
        $produit = $produit->findById($id);
        //echo "<pre>",print_r($produit),"</pre>"; die();
        return $this->view('produits.show', compact('produit'));
    }

    public function form()
    {
        // Retourne le formulaire d'ajout
        return $this->view('produits.form');
    }

    public function modif()
    {
        // Retourne le formulaire de modification
        return $this->view('produits.modif');
    }

    public function showPdf(int $id)
    {
        // global $router;
        $produit = new Produit($this->getConnection());
        var_dump($id);

        $pdf = $produit->findById($id);
        
        //var_dump($pdf);

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P'
        ]);
        // var_dump($pdf);
        // echo"<br>";

        //  foreach($pdf as $valeur){
            //echo "<pre>",print_r($pdf,1),"</pre>";
            $titre = $pdf->getTitre();
            $categorie = $pdf->getCategorie();
            $date = $pdf->getCreatedAt();
            $prix = $pdf->getPrix();
            $description = $pdf->getDescription();
            $image = $pdf->getImage1();

        $html ="
            <!DOCTYPE html>
            <html lang='fr'>
            <style media='print'>
                section.annonce {
                    padding: 10px;
                    text-align: center;
                    font-family: 'DM Sans', sans-serif;
                    color: #1d2625;
                }

                .header, .footer{
                    color: white;
                    background-color: #519F50;
                }
                
                section.annonce  div.container  ul {
                    list-style-type: none;
                }
                section.annonce  div.container  ul  li{
                    margin-top: 10px;
                }
                section.annonce h2{
                    margin-top: 20px;
                    text-align: center;
                }
            
                .footer {
                    margin-top: 50px;
                    text-align: center;
                    height: 100px;
                }
            </style>
            <body>
                <section class='annonce'>
                <div class='header'>
                <img class='logo' width='200px' src='/Annonces/public/assets/logo'/>
                <p>Achetez simplement de particulier à particulier ! </p>
                </div>
                    <h1>$titre</h1>
                    <div class='container'>
                        <div class='img-container'><img width='300px' src='/Annonces/public/pic/$image'/></div>
                        <div class='preview'>
                            <ul>
                                <li>Date de création : <span>$date</span> </li>
                                <li>Catégorie : <span>$categorie</span> </li>
                                <li>Prix : <span>$prix €</span></li>
                            </ul>
                        </div>
                        <h2>Description</h2>
                        <p>$description</p>
                    </div>
                    <div class='footer'>
                <p>&copy; Copyright 2022 : Corner Shop</p>
                </div>
            
                </section>
                </body>";
                

        $mpdf->WriteHTML($html);

        $mpdf->Output($titre. ' .pdf','I');
            }
}
?>