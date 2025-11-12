<?php
try{
    $bdd = new PDO("mysql:host=".apache_getenv("HOST").";dbname=".apache_getenv("DBNAME").",".apache_getenv("LOGIN"), apache_getenv("PASSWORD"));
} catch(\Exception $e){
    die("Message d'erreur : " . $e->getMessage());
}