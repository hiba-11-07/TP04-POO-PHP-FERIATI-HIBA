<?php
class Voiture {
    public function __construct(public string $couleur) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

$maVoiture = new Voiture("Blanche");

unset($maVoiture);

echo "Fin du script." . PHP_EOL;
