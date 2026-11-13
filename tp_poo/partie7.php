<?php
class Compte {
    private float $montant;
    private float $interet;

    public function __construct(
        float $montantInitial,
        float $interet
    ) {
        $this->montant = $montantInitial;
        $this->interet = $interet;
    }

    public function get_montant(): float {
        return $this->montant;
    }

    public function un_an(): void {
        $this->montant = $this->montant
            * (1 + $this->interet / 100);
    }
}

// Création des deux comptes
$c1 = new Compte(400, 10);
$c2 = new Compte(2500, 5);

// Calcul des intérêts pendant 10 ans
for ($i = 1; $i <= 10; $i++) {
    $c1->un_an();
    $c2->un_an();
}

// Affichage des résultats
echo "Valeur du compte 1 = "
    . number_format($c1->get_montant(), 2, ',', ' ')
    . " dirhams" . PHP_EOL;

echo '<br>';

echo "Valeur du compte 2 = "
    . number_format($c2->get_montant(), 2, ',', ' ')
    . " dirhams" . PHP_EOL;
