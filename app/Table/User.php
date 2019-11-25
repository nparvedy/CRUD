<?php

namespace App\Table;

use App\App;

class User extends Table{

    protected static $table = 'users';

    public static function find($id){
        return self::query(
            "SELECT users.id, users.nom, users.prenom, users.nom_entreprise, customers.nom as customer
            FROM users 
            LEFT JOIN customers ON id_user = users.id
            WHERE users.id = ?
        ", [$id], true);
    }   

    public static function getLast(){
        return self::query(
            "SELECT *
            FROM users 
        ");
    }

    public static function lastByCustomer($id_user){
        return self::query(
            "SELECT users.id, users.nom, users.prenom, customers.nom as customer
            FROM users 
            LEFT JOIN customers ON id_user = users.id
            WHERE id_user = ?
        ", [$id_user]);
    }

    public static function listCustomer($id_user){
       
        return self::query(
            "SELECT *
            FROM users 
            LEFT JOIN customers ON id_user = users.id
            WHERE id_user = ?
        ", [$id_user]);
    }

    public function getURL(){
        return 'index.php?p=user&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->prenom, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}
