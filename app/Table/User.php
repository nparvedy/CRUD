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

    public static function customer($id_customer){
        return self::query(
            "SELECT customers.nom, customers.prenom, customers.id, customers.cp, customers.adresse, customers.numero, customers.mail, users.nom_entreprise as user
            FROM customers 
            INNER JOIN users ON id_user = users.id
            WHERE customers.id = ?
        ", [$id_customer]);
    }

    public static function updateCustomer($nom, $prenom, $cp, $numero, $mail, $adresse, $id){
        return self::update(
            "UPDATE customers
            SET nom = :nom, prenom = :prenom, cp = :cp, numero = :numero, mail = :mail, adresse = :adresse
            WHERE id = :id
            
        ", [$nom, $prenom, $cp, $numero, $mail, $adresse, $id]);
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

    public static function deleteCustomer($id_customer){
        return self::delete(
            "DELETE 
            FROM customers
            WHERE id = ?
            
        ", [$id_customer]);
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->prenom, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}
