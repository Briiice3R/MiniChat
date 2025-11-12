<?php
require_once "global.php";
try{
    $bdd = new PDO("mysql:host=".$HOST.";dbname=".$DBNAME, $LOGIN, $PASSWORD);
} catch(\Exception $e){
    die("Message d'erreur : " . $e->getMessage());
}