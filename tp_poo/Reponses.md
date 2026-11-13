Exercice 0:
3)- Non, les deux objets ne partagent pas la même valeur. La raison est que chaque objet créé à l'aide de `new` possède ses propres propriétés. Modifier `$v1->marque` ne modifie pas `$v2->marque`.


Exercice 1:
1.1)– Les attributs et les méthodes déclarés comme `private` ne sont pas directement accessibles depuis l'extérieur de la classe. Chacune des trois lignes provoque une erreur (`Error`) si elle est exécutée isolément. 

1.2)– Car n'importe quelle partie du programme pourrait lire ou modifier le numéro de la carte nationale d'identité sans aucun contrôle. Cela pourrait entraîner la divulgation de données personnelles ou leur modification de manière incorrecte. 

1.3)– Non. Elle peut être appelée depuis n'importe quelle autre méthode au sein de la même classe. Ainsi, `private` ne signifie pas que la fonction est inutilisable ; cela signifie que son utilisation est restreinte à l'intérieur de la classe. 

1.4)– Passer `cin` de `private` en `protected`: L'accès à `$p->cin` depuis l'extérieur de la classe demeure interdit. La différence apparaît lors de l'héritage : la classe dérivée peut accéder aux membres `protected`, mais elle ne peut pas accéder aux membres `private` hérités de la classe parente.

Exercice 2:
2.1.a)- new Voiture("Noire") : C'est correct ; la couleur est « Noire » et la vitesse prend la valeur par défaut 0. 
new Voiture(120) : Une erreur TypeError survient, car le premier argument doit être une chaîne de caractères (string), alors que nous lui avons transmis un nombre entier.

2.1.b)- La définition des propriétés et du constructeur peut être remplacée comme suit :
public function __construct(
    public string $couleur = "Blanche",
    public int $vitesse = 0
) {}

Quel est l'avantage de cette écriture ?
PHP crée et initialise les propriétés directement à partir des paramètres du constructeur, ce qui permet de réduire la répétition de code.

2.2.a)– La méthode `__construct()` ne peut pas être définie deux fois au sein d'une même classe. PHP ne prend pas en charge la surcharge de constructeurs (plusieurs constructeurs portant le même nom).

2.2.b)– Solution avec un seul constructeur:
public function __construct(
    string $nom = "",
    string $prenom = ""
) {
    $this->nom = $nom;
    $this->prenom = $prenom;

    echo "Création " . __CLASS__ . PHP_EOL;
}
$p1 = new Personne();
$p2 = new Personne("Hachimi", "Sara");

2.2.c)– Bonus: méthode de fabrique statique: Il s'agit d'une méthode `static` qui crée et renvoie un objet ; elle permet de proposer différentes manières, explicites, de créer des objets. Exemple :
class Personne {
    public function __construct(
        public string $nom,
        public string $prenom
    ) {}
    public static function depuisTableau(array $data): Personne {
        return new Personne(
            $data["nom"],
            $data["prenom"]
        );
    }
}
$p = Personne::depuisTableau([
    "nom" => "Hachimi",
    "prenom" => "Sara"
]);
echo $p->prenom . " " . $p->nom . PHP_EOL;

2.3.a)– Avec unset():
Voiture Blanche créée.
Voiture Blanche détruite.
Fin du script.

2.3.b)– Sans unset():
Voiture Blanche créée.
Fin du script.
Voiture Blanche détruite.

2.3.c)– Deux objets sans unset:
$a = new Voiture("Rouge");
$b = new Voiture("Noire");

2.3.d)– Destructeur dans Personne:
public function __destruct() {
    echo "Détruire " . __CLASS__ . PHP_EOL;
}


Exercice 3:
3.2)– Sans __set et avec __set Sans __set, toute tentative de modifier $p->nom depuis l'extérieur provoque une erreur, car nom est privé. Avec __set, la fonction est appelée automatiquement ; elle peut alors autoriser ou refuser la modification. 

3.3)– Oui, si l'on autorise la modification de toutes les propriétés sans aucune vérification. Il est donc nécessaire de définir quelles propriétés peuvent être modifiées et de valider les valeurs avant de les stocker. 

3.4)– Validation du nom:
`throw` lance une exception, que le programme peut ensuite intercepter à l'aide de `try/catch`.


Exercice 4:
4.1)– Parce que __toString() et getAge() sont définies au sein de la même classe. Une méthode située dans une classe peut appeler une autre méthode (même privée) appartenant à cette même classe. 

4.2)– La méthode exige le retour d'une chaîne de caractères (string). En PHP, sans l'activation de `strict_types`, une valeur numérique telle que 25 peut être automatiquement convertie en "25" dans ce contexte. En revanche, avec le typage strict, une erreur `TypeError` pourrait survenir. 

4.3)– Elle permet de représenter l'objet sous forme de texte directement, sans avoir besoin d'appeler une méthode distincte. 
Deux exemples:
`echo $p` pour afficher les informations de la personne. 
L'insertion de l'objet dans une chaîne de caractères par concaténation, par exemple : `"Personne : " . $p`.


Exercice 5:
5.1)– Non. En effet, `__serialize()` a renvoyé un tableau contenant uniquement `nom` et `age`, et a exclu `motDePasse`. 

5.2)– PHP utilise le mécanisme de sérialisation par défaut, qui inclut les propriétés publiques et privées, dont `motDePasse`. Cela signifie que le mot de passe peut apparaître dans la chaîne générée par `serialize()`. 

5.3)– Valeur de `motDePasse` après la désérialisation:
$this->motDePasse = "";

5.4)– Car `unserialize()` peut recréer des objets et déclencher des fonctions magiques, telles que `__wakeup()` ou `__unserialize()`, qu’un attaquant pourrait exploiter pour provoquer des comportements indésirables.


Exercice 6:
6.1.b)– Non. Car $c est un objet de la classe Chien, et cette classe ne contient pas la méthode miauler(), et ne l'hérite pas non plus de la classe Animal. Cette méthode n'existe que dans la classe Chat.

6.2.a)– Une erreur surviendra lors de la création d'un objet `Etudiant`, car nous avons défini un constructeur spécifique pour la classe enfant ; par conséquent, le constructeur de la classe parente n'est pas appelé automatiquement. La propriété `$nom` restera non initialisée, ce qui pourrait provoquer une erreur lors de son utilisation. 

6.2.b)– Car le modificateur `protected` permet à la classe parente `Personne` ainsi qu'aux classes enfants, telles que `Etudiant`, d'accéder à `$nom`. En revanche, `private` limite l'accès à la propriété à la seule classe `Personne`, excluant ainsi la classe `Etudiant`.

6.3.a)– Les trois erreurs:
Erreur, car `afficher()` est déclarée `final` et ne peut donc pas être redéfinie. Erreur, car la classe `Outil` est déclarée `final` ; il est donc impossible de créer une classe qui en hérite. Erreur, car la propriété `readonly` ne peut pas être modifiée après son initialisation. 

6.3.b)– Exemples concrets - `readonly` est approprié pour un identifiant étudiant (CNE) ou un numéro de facture, car ces valeurs ne doivent pas changer une fois créées. - `final` est approprié pour une classe responsable d'une opération sensible, dont on ne souhaite pas permettre la modification du comportement par d'autres classes via l'héritage. 

6.4.a)– Si getAge() est déclarée private dans Personne, Etudiant ne pourra pas l'appeler directement. Il faut la modifier en protected. 

6.4.b)– Même si Etudiant hérite de Personne, il ne peut pas accéder à $dateNaissance car elle est private. L'héritage ne signifie pas que toutes les propriétés deviennent accessibles à la classe enfant. Pour un accès direct depuis l'enfant, la propriété doit être protected ou public. 

6.4.c)– Parce que cela permet de réutiliser le code présent dans la classe parente, plutôt que de réécrire le nom et l'âge. Il suffit ensuite d'ajouter le CNE.


Exercice 7:
7.1)- L'expression $this->montant 1 est syntaxiquement incorrecte, car il n'y a aucun opérateur arithmétique entre montant et 1.

7.3)- Dans le code original, l'ordre est : les intérêts, puis le montant ; or, l'énoncé de l'exercice demande d'abord le montant, suivi des intérêts. Inverser ces valeurs pourrait entraîner des erreurs lors de la création des comptes. 

7.4)- Nous utiliserons le type `float` pour les montants et les intérêts, et nous préciserons les types des valeurs renvoyées par les fonctions.


Questions de synthèse:
1. Quelle est la différence entre une classe et un objet ?
Une classe est un modèle qui définit les propriétés et les méthodes.
Un objet est une instance concrète créée à partir de cette classe avec new.

2. Citez trois avantages de la POO par rapport à la programmation procédurale.
Réutilisation du code grâce à l'héritage.
Encapsulation et meilleure protection des données.
Organisation du programme en objets, ce qui facilite sa maintenance et son évolution.

3. Pourquoi déclarer les attributs en private ou protected ?
Pour protéger les données contre les modifications directes et contrôler leur accès à travers des méthodes.

4. Quelle différence entre private et protected avec l'héritage ?
private : accessible uniquement dans la classe où l'attribut est déclaré.
protected : accessible dans la classe et ses classes filles.

5. Une méthode magique doit-elle être déclarée public ? Quelles sont les exceptions tolérées ?
Les méthodes magiques doivent généralement être déclarées public, conformément aux recommandations PHP. Certaines exceptions sont tolérées pour des raisons de compatibilité, notamment __construct(), __destruct(), __clone() et __unserialize(), qui peuvent avoir une visibilité différente selon les règles applicables. En pratique, il vaut mieux déclarer les méthodes magiques utilisées dans ce TP en public.
