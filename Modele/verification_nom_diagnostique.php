<?php

session_start();

// connexion à la base de données
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');

// diagnostic_new.php
if(isset($_POST['Nom_Diagnostic'])) {
    $_SESSION['Nom_Diagnostic'] = $_POST['Nom_Diagnostic'];
    $Nom_Diagnostic = $_SESSION['Nom_Diagnostic'];

    if ($_SESSION['Nom_Diagnostic'] !== "") {
        //On insère le nom du diagnostic dans la table diagnostic
        $requete = "INSERT INTO Criteres VALUES ('','','','','','','','','','','','','".$Nom_Diagnostic."')";
        $resultat = mysqli_query($db, $requete);

        //On creer la variable session de l'id
        $requete2 = "SELECT Id_critere FROM Criteres WHERE Nom = '$Nom_Diagnostic'";
        $resultat2 = mysqli_query($db, $requete2);
        $row = mysqli_fetch_assoc($resultat2);
        $_SESSION['id_Critere'] = $row['Id_critere'];
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Questions_prequestionnaire.php');
    }
    else {
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php?erreur=1'); // nom du diagnostique vide
    }
}
else{
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php?');
}


// Fragilisation_Reconnaissance.php


mysqli_close($db); // fermer la connexion
?>
