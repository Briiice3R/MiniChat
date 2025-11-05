<?php

require_once "bddConnection.php";

session_start();

if(!isset($_SESSION["username"])){
    $_SESSION["username"] = "";
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Minichat</title>
    </head>
    <body>
        <header>Minichat en PHP !</header>
        <main>
            <div>
                <form action="submitedForm.php" method="post">
                    <label for="username">Pseudo : </label>
                    <input type="text" name="username" id="username" value="<?php echo $_SESSION["username"]?>">
                    <label for="message">Message : </label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <div>
            <?php /** @var TYPE_NAME $bdd */
            $res = $bdd->query("SELECT username, message, DATE_FORMAT(createdAt, '%d/%m/%Y') as day, DATE_FORMAT(createdAt, '%Hh:%imin:%ss') as hours FROM chat ORDER BY createdAt DESC LIMIT 0,5"); ?>
                <p>Liste des 5 derniers msgs :</p>
                <?php
                    $data = $res->fetchAll();
                    for($i = 0; $i<count($data); $i++){
                        echo "<p>" . $data[$i]['day'] . " " . $data[$i]['hours'] . " " . $data[$i]['username'] . " " . $data[$i]['message'] . "</p>";
                    }

                ?>
            </div>

        </main>
    </body>

</html>
