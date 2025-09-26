<?php
class Origine {
    private $nom;

    public function getNom(string $nom) {
        if (empty($nom)||!is_string($nom)||is_numeric($nom)) {
            echo "L'origine de la fleur ou de la plante ne peut pas être vide ou un nombre.";
            die;
        } else {
            return $this->nom = $nom;
        }
    }

    public function afficheNom() {
        return $this->nom;
    }
}
?>