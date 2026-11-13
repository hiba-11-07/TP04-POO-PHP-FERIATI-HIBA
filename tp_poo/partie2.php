<?php
class Voiture {
    public string $couleur;
    public int $vitesse;

    public function __construct(
        string $couleur = "Blanche",
        int $vitesse = 0
    ) {
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
    }

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | ";
        echo "Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v1 = new Voiture();
$v2 = new Voiture("Rouge", 50);
$v3 = new Voiture("Noire");

$v1->afficher();
echo '<br>';
$v2->afficher();
echo '<br>';
$v3->afficher();
