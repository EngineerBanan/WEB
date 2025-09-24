<?php
class Fleur {
    private $nom;
    private $prix;
    private $image;
    private $temperature;


    public function getPrix($prix) {
        if ($prix < 0 || empty($prix)) {
            echo "Le prix ne peut pas être négatif ou vide.";
            die;
        } else {
            return $this->prix = $prix;
        }
    }

    public function affichePrix() {
        return $this->prix;
    }

    public function getImage($image){
        if (empty($image)) {
            return "L'image n'existe pas ou est mal indentée.";
            die;
        } else {
            return $this->image = $image;
        }
    }

    public function afficheImage() {
        return $this->image;
    }

    public function getNom($nom) {
        if (empty($nom)) {
            echo "Le nom ne peut pas être vide.";
            die;
        } else {
            return $this->nom = $nom;
        }
    }

    public function afficheNom() {
        return $this->nom;
    }

    public function getTemperature($temperature) {
        if (empty($temperature)) {
            echo "La température ne peut pas être vide.";
            die;
        } else {
            return $this->temperature = $temperature;
        }
    }

    public function afficheTemperature() {
        return $this->temperature;
    }
}

?>