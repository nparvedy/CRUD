<?php

namespace App;
use \PDO;

class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = "", $db_host='localhost'){
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=crud;host=localhost', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo; 
            
        }
        
        return $this->pdo;
    }

    public function query($statement, $class_name, $one = false){
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();

        }else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function queryUpdate($statement, $class_name, $one = false){
        $req = $this->getPDO()->query($statement);
        return $req->execute(); // fin du script test
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();

        }else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function prepareUpdate($statement, $attributes, $class_name, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $req->execute(array(
            'nom' => $attributes[0],
            'prenom' => $attributes[1],
            'cp' => $attributes[2],
            'numero' => $attributes[3],
            'mail' => $attributes[4],
            'adresse' => $attributes[5],
            'id' => $attributes[6]
        ));

        return "vous avez bien modifier"; // a modifier
    }

    public function prepareDelete($statement, $attributes, $class_name, $one = false){
        $req = $this->getPDO()->prepare($statement);
        return $req->execute($attributes);
    }

    public function prepare($statement, $attributes, $class_name, $one = false){

        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if($one){
            $datas = $req->fetch();

        }else {
            $datas = $req->fetchAll();
        }

        return $datas;

    }
}