<?php

class Database
{
    public static function connect_db(): PDO
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=francois-niang_boutique;charset=utf8", "francois-niang-b", "boutiquepassword");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$db) {
                die("Connexion a la base de donnée impossible");
            }
            return $db;
        } catch (PDOException $e) {

            echo 'echec : ' . $e->getMessage();
            var_dump($e);
        }
    }
}