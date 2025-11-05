<?php
require_once "bddConnection.php";

session_start();

if(isset($_POST["username"]) && isset($_POST["message"])){

    $username = strip_tags($_POST["username"]);
    $_SESSION["username"] = $username;
    $message = strip_tags($_POST["message"]);
    $req = $bdd->prepare("INSERT INTO chat(username, message, createdAt) values (?, ?, NOW())");
    $req->execute(array($username, $message));
    header("Location: minichat.php");
}