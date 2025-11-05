<?php
try{
    $bdd = new PDO("mysql:host=localhost;dbname=minichat", "root", "");
} catch(\Exception $e){
    die("Message d'erreur : " . $e->getMessage());
}