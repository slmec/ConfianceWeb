<!DOCTYPE html>
<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MAIAT</title>
    </head>
    <body onload="init();">
        <?php

        /* L'icam peut t-il utiliser les données de ce diagnostic ? */
        if($_POST['TraitementDonnees'] !="") {
            $Id_diagnostic = $_SESSION['Id_diagnostic'];
            $TraitementDonnees = $_POST['TraitementDonnees'];

            $requete = "UPDATE Diagnostics SET TraitementDonnees ='$TraitementDonnees' WHERE Id_diagnostic = '$Id_diagnostic' ";
            $result = mysqli_query($db, $requete);
            header('Location: ../Controleur/connexion.php');
        }
        /* Si on ne choisi aucune case alors erreur */
        else{
            header('Location: ../Controleur/Traitement.php?erreur=1');
        }
            ?>
    </body>
</html>
