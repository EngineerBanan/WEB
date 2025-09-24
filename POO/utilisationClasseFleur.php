<?php
require_once("classeFleur.php");
require_once("classePlante.php");
require_once("classeAccessoire.php");
require_once("classeOrigine.php");
require_once("classeEnsoleillement.php");
require_once("classeCouleur.php");
require_once("classeMagasin.php");

$fleur = new Fleur();
$fleur->getNom("Lys");
$fleur->getPrix(5);
$fleur->getImage("lys_asiatique.jpg");
$fleur->getTemperature("15°C");
var_dump($fleur);

$plante = new Plante();
$plante->nom = "Bambou";
$plante->prix = 11;
$plante->temperature = "20°C";
$plante->image = "bambou.jpg";
var_dump($plante);

$accessoire = new Accessoire();
$accessoire->nom = "Petite pelle";
$accessoire->prix = 12.5;
$accessoire->temperature = "N/A";
$accessoire->image = "petite_pelle.png";
$accessoire->image_MES = "petite_pelle_MES.png";
var_dump($accessoire);

$origine = new Origine();
$origine->nom = "France";
var_dump($origine);

$ensoleillement = new Ensoleillement();
$ensoleillement->libelle = "Plein soleil";
var_dump($ensoleillement);

$couleur = new Couleur();
$couleur->couleur = "Rouge";
var_dump($couleur);

$magasin = new Magasin();
$magasin->nom = "Magasin Teplan";
$magasin->adresse = "8 rue de la Graine";
$magasin->cp = "51100";
$magasin->ville = "Reims";
$magasin->tel = "03.26.12.34.56";
$magasin->mail = "contact@teplan.fr";
$magasin->horaires_ouverture = "10h-20h";
var_dump($magasin);

echo '<hr>';
echo '<img src="' . $fleur->afficheImage() . '" alt="' . $fleur->afficheNom() . '"><br>';
echo 'Le/la ' . $fleur->afficheNom() . " coûte " . $fleur->affichePrix() . " €.<br>";

echo '<img src="' . $plante->image . '" alt="' . $plante->nom . '"><br>';
echo 'Ce/cette ' . $plante->nom . " coûte " . $plante->prix . " €.<br>";

echo '<img src="' . $accessoire->image . '" alt="' . $accessoire->nom . '"><br>';
echo 'Le/la ' . $accessoire->nom . " coûte " . $accessoire->prix . " €.<br>";
?>