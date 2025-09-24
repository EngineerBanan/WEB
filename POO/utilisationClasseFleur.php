<?php
require_once("classeFleur.php");

$Alstroemeria_jaune = new Fleur();
$Alstroemeria_jaune->nom = "Alstroemeria jaune";
$Alstroemeria_jaune->image = "alstroemeria_jaune.png";
$Alstroemeria_jaune->origine = "Pérou";

echo '<img src="' . $Alstroemeria_jaune->image . '" alt="' . $Alstroemeria_jaune->nom . '"><br>';
echo "$Alstroemeria_jaune->nom vient du $Alstroemeria_jaune->origine.<br>";

$Alstroemeria_violet = new Fleur();
$Alstroemeria_violet->nom = "Alstroemeria violet";
$Alstroemeria_violet->image = "alstroemeria_violet.jpg";
$Alstroemeria_violet->origine = "Chili";

echo '<img src="' . $Alstroemeria_violet->image . '" alt="' . $Alstroemeria_violet->nom . '"><br>';

echo "$Alstroemeria_violet->nom vient du $Alstroemeria_violet->origine.<br>"; 
?>