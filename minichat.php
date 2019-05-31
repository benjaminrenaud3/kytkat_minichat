<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align: center;
    }
    </style>
    <body>
        <form action="minichat_post.php" method="post">
            <p>
                <label for="pseudo"> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br>
                <label for="message"> Message</label> : <input type="text" name="message" id="message" /><br>
                <input type="submit" value="envoyer" />
            </p>
        </form>
    </php>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=kitkat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date_fr FROM kitkat ORDER BY id DESC LIMIT 0, 10');
while ($donnees = $reponse->fetch())
{
    echo '<p>' . htmlspecialchars($donnees['date_fr']) . ' <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}
?>

</body>

</html>

