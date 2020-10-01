<?php
namespace App\Database;

use PDO;

class db
{
    private $pdo;

    /**
     * Fonction Connect
     * Elle nous permet de se connecter et d'instancier le pdo tout en vérifiant s'il existe déja.
     * @return pdo la connection
     */
    public function connect()
    {
        $host = "127.0.0.1";
        $user = "root";
        $pass = "";
        $dbname = "slimcrud";
        if($this->pdo == null){
            //connect database using php pdo wrapper 
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo = $pdo;
        }
    
        return $this->pdo;
    }

    /**
     * Fonction Prepare
     * @param String sql la requete
     * @param String attributes
     * 
     */
    public function prepare($sql, $attributes = []){
        $req = $this->connect()->prepare($sql);
        if($attributes){
            $result = $req->execute($attributes);
        } else {
            $result = $req->execute();
        }
        return $result;
    }

    /**
     * Fonction Query
     * @param String sql la requete
     * @param Boolean one true/false
     * @return le résultat
     */
    public function query($sql, $one = false){
        $req = $this->connect()->query($sql);
        if($one){
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    /**
     * Fonction Insertion
     * @param String sql la requete
     * @param Array data les données
     * @return l'execution
     */
    public function insert($sql, $data = []){
        //if($params){
            var_dump($data);
            $req = $this->connect()->prepare($sql);
            $result = $req->execute($data);
            return $result;
            //echo '{"notice": {"text": "User has been just added now"}}';
        //}
    }

    public function lastId(){
        return $this->connect()->lastInsertId();
    }

    public function login($sql, $attributes){
        $req = $this->prepare($sql, $attributes);
        return $req;
    }
}
