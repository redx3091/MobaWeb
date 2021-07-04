<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', 'root', 'moba_db');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}