<?php
class Personne {
    public function __construct(
        public string $nom,
        public string $prenom,
        private string $dateNaissance,
        private string $villeNaissance,
        private string $cin
    ) {}

    protected function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {
        return $this->prenom . " " . $this->nom
            . " (" . $this->getAge() . " ans)";
    }
}

class Etudiant extends Personne {
    private string $cne;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin,
        string $cne
    ) {
        parent::__construct(
            $nom,
            $prenom,
            $dateNaissance,
            $villeNaissance,
            $cin
        );

        $this->cne = $cne;
    }

    public function getCne(): string {
        return $this->cne;
    }

    public function __toString(): string {
        return parent::__toString()
            . " | CNE : " . $this->cne;
    }
}

// Création de 5 étudiants
$etudiants = [];

$etudiants[] = new Etudiant(
    "Hachimi", "Sara", "2005-05-14",
    "Marrakech", "EE123456", "D123456"
);

$etudiants[] = new Etudiant(
    "Alami", "Ahmed", "2004-08-20",
    "Casablanca", "EE234567", "D234567"
);

$etudiants[] = new Etudiant(
    "Feriati", "Hiba", "2005-02-10",
    "Rabat", "EE345678", "D345678"
);

$etudiants[] = new Etudiant(
    "Karimi", "Salma", "2004-11-03",
    "Fès", "EE456789", "D456789"
);

$etudiants[] = new Etudiant(
    "Bennani", "Youssef", "2005-07-25",
    "Agadir", "EE567890", "D567890"
);

// Affichage
foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
    echo '<br>';
}

