<?php 

namespace App\Database;


/**
 * @class Db
 * @author IDIRI Anas
 * 
 * Singleton permettant une abstraction pour les requetes à la base de donnée
 * 
 * Il est pertinent d'utiliser le design pattern singleton ici pour éviter de se retrouver 
 * à instancier plusieurs fois cette classe, sachant que dans ce projet nous ne travaillons 
 * qu'avec une seule base de donnée.
 */

class Db {
    private const USERNAME = "root";
    private const PASSWORD = "root";
    private const HOST = "mysql";
    private const NAME = "sae23";

    private static $_instance;
    private $connection;

    /**
     * Le principe du singleton est le suivant : si la classe est déjà instancié, on retourne l'instance,
     * sinon on l'instancie, on stocke l'instance dans un attribut de l'objet, puis on retourne l'instance
     *
     * @return \App\Database\Db           L'instance de la classe Db
     */
    public static function get_instance(): \App\Database\Db {
        // On vérifie si la classe à déja été instanciée
        if(self::$_instance === null) 
            // Si non, on l'instancie, et on place cette instance dans l'attribut dédié
            self::$_instance = new Db();

        // Enfin on retourne l'attribut qui contient l'instance
        return self::$_instance;
    }



    /**
     * Constructeur de la classe 
     * 
     * Étant donné que nous utilisons le design pattern Singleton, le constructeur n'est pas supposé
     * être appelé en dehors de la classe. On le passe donc en privé afin d'être sur que seul la 
     * méthode get_instance ait le "droit" de faire appel au constructeur.
     */
    private function __construct() {
        // On se connecte à PDO et on place cette connection dans un attribut de l'objet
        $this -> connection = new \PDO(
            "mysql:host=" . self::HOST . ";" .
            "dbname=" . self::NAME,
            self::USERNAME,
            self::PASSWORD,
        ) 
        or die("CRITICAL ERROR: unable to connect to the database");
    }



    /**
     * Méthode permettant d'effectuer une requête SQL à résultat (SELECT) via l'utilisation
     * de la méthode fetch ou fetchall
     *
     * @param string $request       La requête SQL à effectuer
     * @param array $data           Les éventuels paramètres de cette requête
     * @param boolean $all          Booléen indiquant si on doit faire un fetchAll ou un fetch simple
     *                              true  -> fetchAll
     *                              false -> fetch
     * 
     * @return array                Tableau contenant le retour de al requête
     */
    public function fetch(string $request, array $data, bool $all = false): array {
        $request = $this -> connection -> prepare($request);
        $request -> execute($data);

        if($all === true) {
            return $request -> fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return [ $request -> fetch(\PDO::FETCH_ASSOC) ];
        } 
    }

}

?>
