<?php
$Alstroemeria_jaune = new Fleur();
$Alstroemeria_jaune->nom = "Alstroemeria jaune";
//var_dump($Alstroemeria_jaune);

$Alstroemeria_violet = new Fleur();
$Alstroemeria_violet->nom = "Alstroemeria violet";
//var_dump($Alstroemeria_violet);

echo "Les fleurs sont : " . $Alstroemeria_jaune->nom . " et " . $Alstroemeria_violet->nom;
?>