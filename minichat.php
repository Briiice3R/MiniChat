<?php

require_once "bddConnection.php";
session_start();

if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Minichat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    link rel="stylesheet" href="styles.css">
</head>
<body>
<header>Minichat PHP</header>
<div class="chat-container">
    <form action="submitedForm.php" method="post" autocomplete="off">
        <label for="username">Pseudo :</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>"
               maxlength="20" required>
        <label for="message">Message :</label>
        <textarea name="message" id="message" maxlength="250" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
    <div class="messages" id="messages">
        <?php
        $res = $bdd->query("SELECT username, message, DATE_FORMAT(createdAt, '%d/%m/%Y') as day, DATE_FORMAT(createdAt, '%Hh:%imin:%ss') as hours FROM chat ORDER BY createdAt DESC LIMIT 0,5");
        $data = $res->fetchAll();
        for ($i = count($data) - 1; $i >= 0; $i--) {
            echo "<div class='message'><span class='timestamp'>" . $data[$i]['day'] . " " . $data[$i]['hours'] . "</span><strong>" . htmlspecialchars($data[$i]['username']) . " :</strong> " . htmlspecialchars($data[$i]['message']) . "</div>";
        }
        ?>
    </div>
</div>
<script>
    // Scroll automatique vers le bas
    const messagesDiv = document.getElementById('messages');
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
</script>
</body>
</html>
