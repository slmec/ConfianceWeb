<?php

session_start();

// connexion à la base de données
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');

//Questions_prequestionnaire.php
if ($_POST['Contexte_casusage'] !== "" && $_POST['Objectif_sia'] !== "" && $_POST['Fonctionnement_sia'] !== "" && $_POST['Fonctionnement_sia'] !== "" && $_POST['Fonctionnement_sia'] !== "") {


    $_SESSION['Contexte_casusage'] = $_POST['Contexte_casusage'];
    $_SESSION['Objectif_sia'] = $_POST['Objectif_sia'];
    $_SESSION['Fonctionnement_sia'] = $_POST['Fonctionnement_sia'];
    $_SESSION['Utilisation_sia'] = $_POST['Fonctionnement_sia'];
    $_SESSION['Maturite'] = $_POST['Fonctionnement_sia'];


            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire.php');
    } else {
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Questions_prequestionnaire.php?erreur=1'); // nom du diagnostique vide
    }

mysqli_close($db); // fermer la connexion
?>
