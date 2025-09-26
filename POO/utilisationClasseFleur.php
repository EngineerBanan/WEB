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

$fleur1 = new Fleur();
$fleur1->getNom("Alstroemeria jaune");
$fleur1->getPrix(4.5);
$fleur1->getImage("alstroemeria_jaune.png");
$fleur1->getTemperature("18°C");
var_dump($fleur1);

$fleur2 = new Fleur(); 
$fleur2->getNom("Alstroemeria violet");
$fleur2->getPrix(4.5);
$fleur2->getImage("alstroemeria_violet.jpg");
$fleur2->getTemperature("18°C");
var_dump($fleur2);

$origine1 = new Origine();
$origine1->getNom("Chili");
var_dump($origine1);

$origine2 = new Origine();
$origine2->getNom("Pérou");
var_dump($origine2);

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
$origine->getNom("France");
var_dump($origine);

$ensoleillement = new Ensoleillement();
$ensoleillement->libelle = "Plein soleil";
var_dump($ensoleillement);

$couleur = new Couleur();
$couleur->getCouleur("Rouge");
var_dump($couleur);

$couleur1 = new Couleur();
$couleur1->getCouleur("Jaune");
var_dump($couleur1);

$couleur2 = new Couleur();
$couleur2->getCouleur("Violet");
var_dump($couleur2);

$couleur3 = new Couleur();
$couleur3->getCouleur("Noir");
var_dump($couleur3);

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

echo '<br>Origine : ' . $origine1->afficheNom() . '<br>';
echo 'Origine : ' . $origine2->afficheNom() . '<br>';

echo '<br>Couleur : ' . $couleur1->afficheCouleur() . '<br>';
echo 'Couleur : ' . $couleur2->afficheCouleur() . '<br>';
echo 'Couleur : ' . $couleur3->afficheCouleur() . '<br>';
?>