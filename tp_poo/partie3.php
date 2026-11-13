<?php
class Personne {
    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    public function __set(string $name, mixed $value): void {

        if (!property_exists($this, $name)) {
            echo "Propriété $name inexistante." . PHP_EOL;
            return;
        }

        // Validation du nom
        if ($name === "nom") {
            $value = trim((string) $value);

            if ($value === "" || strlen($value) < 2) {
                throw new InvalidArgumentException(
                    "Le nom doit contenir au moins 2 caractères."
                );
            }
        }

        $this->$name = $value;
    }

    public function __get(string $name): mixed {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    public function __isset(string $name): bool {
        return property_exists($this, $name)
            && isset($this->$name);
    }

    public function __unset(string $name): void {
        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}

// Programme de test
$p = new Personne();

$p->nom = "Hachimi";
echo $p->nom . PHP_EOL;

echo '<br>';

var_dump(isset($p->nom));

echo '<br>';

unset($p->nom);

var_dump(isset($p->nom));

echo '<br>';

$p->telephone = "0600000000";
