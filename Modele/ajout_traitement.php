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
        mysqli_select_db($db, "Confiance" );
        if ( ! $db ) die( "Impossible de se connecter à MySQL" );

        /* L'icam peut t-il utiliser les données de ce diagnostic ? */
        if($_POST['Données_diag']='') {
            $Id_Critere = $_SESSION['id_Critere'];
            $données_diagnostic = $_POST['Données_diag'];

            $requete = "UPDATE Diagnostics SET Données_traitement ='$données_diagnostic' WHERE Id_critere_bis = '$Id_Critere' ";
            $result = mysqli_query($db, $requete);
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/connexion.php');
        }
        /* Si on ne choisi aucune case alors erreur */
        else{
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Traitement.php?erreur=1');
        }
            ?>
    </body>
</html>
