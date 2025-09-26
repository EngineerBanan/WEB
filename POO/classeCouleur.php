<?php
class Couleur{
    private $couleur;

    public function getCouleur(string $couleur) {
        if (empty($couleur)||!is_string($couleur)||is_numeric($couleur)) {
            echo "La couleur de la fleur ou de la plante ne peut pas être vide ou un nombre.";
            die;
        } else {
            return $this->couleur = $couleur;
        }
    }

    public function afficheCouleur() {
        return $this->couleur;
    }
}
?>