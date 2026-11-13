<?php
class Personne {
    private string $dateNaissance;

    public function __construct(
        public string $nom,
        public string $prenom,
        string $dateNaissance
    ) {
        $this->dateNaissance = $dateNaissance;
    }

    private function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {
        return $this->prenom . " " . $this->nom
            . " (" . $this->getAge() . " ans)";
    }
}

$p = new Personne("Hachimi", "Sara", "2000-05-14");

echo $p . PHP_EOL;
