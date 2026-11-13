<?php
class Voiture {
    public $marque;
    public $couleur;

    public function setMarque($m) {
        $this->marque = $m;
    }

    public function setCouleur($c) {
        $this->couleur = $c;
    }

    public function afficher() {
        echo "Marque : " . $this->marque . PHP_EOL;
        echo '<br>';
        echo "Couleur : " . $this->couleur . PHP_EOL;
    }
}

// Premier objet
$v1 = new Voiture();
$v1->setMarque("Toyota");
$v1->setCouleur("Blanche");

// Deuxième objet
$v2 = new Voiture();
$v2->setMarque("Renault");
$v2->setCouleur("Noire");

// Affichage
$v1->afficher();
echo '<br>';
echo "----------------" . PHP_EOL;
echo '<br>';
$v2->afficher();
