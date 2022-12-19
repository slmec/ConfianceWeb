<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

    //Questions_prequestionnaire.php
    if ($_POST['SIA_contexte'] !== "" && $_POST['SIA_objectif'] !== "" && $_POST['SIA_fonctionnement'] !== "" && $_POST['SIA_utilisation'] !== "" && $_POST['SIA_maturite'] !== "") {


        $_SESSION['SIA_contexte'] = $_POST['SIA_contexte'];
        $_SESSION['SIA_objectif'] = $_POST['SIA_objectif'];
        $_SESSION['SIA_fonctionnement'] = $_POST['SIA_fonctionnement'];
        $_SESSION['SIA_utilisation'] = $_POST['SIA_utilisation'];
        $_SESSION['SIA_maturite'] = $_POST['SIA_maturite'];


                header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire.php');
        } else {
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Questions_prequestionnaire.php?erreur=1'); // reponses vides
        }
    mysqli_close($db); // fermer la connexion
?>
