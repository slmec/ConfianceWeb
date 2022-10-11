<!DOCTYPE html>
<?php
    session_start();
    $db_username = 'eleve.tou';
    $db_password = 'et*301';
    $db_name     = 'Confiance';
    $db_host     = 'localhost';

    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>

</head>
<body>

    <?php
    $Id_Utilisateur = $_SESSION['id_Utilisateur'];
    ?>
    <h4> Tous vos diagnostics : </h4>
    <?php
    $requete = "SELECT Id_critere FROM Repondre WHERE Id_utilisateur =$Id_Utilisateur ";
    $resultat = mysqli_query($db,$requete);
    $row = mysqli_fetch_assoc($resultat) ;

    $_SESSION['id_Critere']=$row['Id_critere'];
    echo $_SESSION['id_Critere'];
    echo $_SESSION['id_Utilisateur']
    ?>