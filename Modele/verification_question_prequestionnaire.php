<?php
    session_start();
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");

    //Questions_prequestionnaire.php
    if ($_POST['Contexte_casusage'] !== "" && $_POST['Objectif_sia'] !== "" && $_POST['Fonctionnement_sia'] !== "" && $_POST['Utilisation_sia'] !== "" && $_POST['Maturite'] !== "") {


        $_SESSION['Contexte_casusage'] = $_POST['Contexte_casusage'];
        $_SESSION['Objectif_sia'] = $_POST['Objectif_sia'];
        $_SESSION['Fonctionnement_sia'] = $_POST['Fonctionnement_sia'];
        $_SESSION['Utilisation_sia'] = $_POST['Utilisation_sia'];
        $_SESSION['Maturite'] = $_POST['Maturite'];


                header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire.php');
        } else {
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Questions_prequestionnaire.php?erreur=1'); // nom du diagnostique vide
        }
    mysqli_close($db); // fermer la connexion
?>
