<?php

use Router\Router;

require '../vendor/autoload.php';

// Constante qui est un chemin qui pointe vers le dossier des vues (dirname(__DIR__) renvoie vers le dossier)
define ('VIEWS' , dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
// Contante qui envoie vers nos dossiers de script (dirname($_SERVER['SCRIPT_NAME']) pour avoir un bon chemin vers les scripts)
define('SCRIPTS' , dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR);
define('DB_NAME', 'annonces');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router( $_GET['url']);

// On appelle la fonction index et show dans le bloc AnnonceController
$router->get('/', 'App\Controllers\AnnonceController@index'); // Un chemin '/' et une action AnnonceController@index' (le controller @ la méthode)
$router->get('/produits/:id', 'App\Controllers\AnnonceController@show'); // Dans l'url on écrit produits/id
$router->get('/formulaire', 'App\Controllers\AnnonceController@form');
$router->get('/formulaire', 'App\Controllers\AnnonceController@modif');
$router->get('/pdf/:id','App\Controllers\AnnonceController@showPdf');
$router->get('/', 'App\Controllers\AnnonceController@search');

$router->get('/formulaire', 'App\Controllers\Admin\ProduitController@create');
$router->post('/formulaire', 'App\Controllers\Admin\ProduitController@createProduit');
$router->post('/delete/:id', 'App\Controllers\Admin\ProduitController@delete');
$router->get('/edit/:id', 'App\Controllers\Admin\ProduitController@edit');
$router->post('/edit/:id', 'App\Controllers\Admin\ProduitController@update');


// Pour vérifier que nos routes fonctionnent
$router->run();

?>