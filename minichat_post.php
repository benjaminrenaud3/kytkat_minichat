<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=kitkat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO kitkat (pseudo, message, date) VALUES (?, ?, NOW())');
$req->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: minichat.php');
?>

