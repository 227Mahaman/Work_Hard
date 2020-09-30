<?php
namespace App\Database;

use PDO;

class db
{
    private $pdo;

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

    public function prepare($sql, $attributes){
        $req = $this->connect()->prepare($sql);
        $result = $req->execute($attributes);
        return $result;
    }

    public function query($sql){
        $req = $this->connect()->query($sql);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

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
}
