<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    session_start();
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

    if(isset($_POST['C1Q1']) && isset($_POST['C1Q2'])  && isset($_POST['C1Q3']) && isset($_POST['C1Q4']) && isset($_POST['C2Q1']) && isset($_POST['C2Q2'])  && isset($_POST['C2Q3']) && isset($_POST['C2Q4']) && isset($_POST['C3Q1']) && isset($_POST['C3Q2'])  && isset($_POST['C3Q3']) && isset($_POST['C3Q4']) && isset($_POST['C4Q1']) && isset($_POST['C4Q2'])  && isset($_POST['C4Q3']) && isset($_POST['C4Q4']) && isset($_POST['C5Q1']) && isset($_POST['C5Q2'])  && isset($_POST['C5Q3']) && isset($_POST['C5Q4']) && isset($_POST['C6Q1']) && isset($_POST['C6Q2'])  && isset($_POST['C6Q3']) && isset($_POST['C6Q4'])) {
    // note C1
        $i = 1;
        $a = 0;
        while ($i <= 4) {
            if (isset($_POST['C1Q' . $i])) {
                $rep[$i] = $_POST['C1Q' . $i];
                $a = $a + $rep[$i];
                $i++;
            } else {
                unset($_POST['C1Q' . $i]);
                $i++;
            }
        }
        $_SESSION['critere_fragilisation_reconnaissance'] = $a;

        //pour afficher les implications
        $C1Q1 = $_POST['C1Q1'];
        $C1Q2 = $_POST['C1Q2'];
        $C1Q3 = $_POST['C1Q3'];
        $C1Q4 = $_POST['C1Q4'];

    // note C2
            $i = 1;
            $a = 0;
    while ($i <= 4) {
        if (isset($_POST['C2Q' . $i])) {
            $rep[$i] = $_POST['C2Q' . $i];
            $a = $a + $rep[$i];
            $i++;
        } else {
            unset($_POST['C2Q' . $i]);
            $i++;
        }
    }
            /* while ($i <= 4) {
                if (isset($_POST['C2Q' . $i])) {
                    $Oui[$i] = intval($_POST['C2Q' . $i]);
                    $a = $a + $Oui[$i];
                    $i++;
                } else {
                    unset($_POST['C2Q' . $i]);
                    $i++;
                }
            } */

            $_SESSION['critere_Desengagement_Relationnel'] = $a;

        $C2Q1 = $_POST['C2Q1'];
        $C2Q2 = $_POST['C2Q2'];
        $C2Q3 = $_POST['C2Q3'];
        $C2Q4 = $_POST['C2Q4'];

    // note C3
            $i = 1;
            $a = 0;
    while ($i <= 4) {
        if (isset($_POST['C3Q' . $i])) {
            $rep[$i] = $_POST['C3Q' . $i];
            $a = $a + $rep[$i];
            $i++;
        } else {
            unset($_POST['C3Q' . $i]);
            $i++;
        }
    }

            $_SESSION['critere_Surveillance'] = $a;

        $C3Q1 = $_POST['C3Q1'];
        $C3Q2 = $_POST['C3Q2'];
        $C3Q3 = $_POST['C3Q3'];
        $C3Q4 = $_POST['C3Q4'];

    // note C4
            $i = 1;
            $a = 0;
    while ($i <= 4) {
        if (isset($_POST['C4Q' . $i])) {
            $rep[$i] = $_POST['C4Q' . $i];
            $a = $a + $rep[$i];
            $i++;
        } else {
            unset($_POST['C4Q' . $i]);
            $i++;
        }
    }

            $_SESSION['critere_Perte_Autonomie'] = $a;

    $C4Q1 = $_POST['C4Q1'];
    $C4Q2 = $_POST['C4Q2'];
    $C4Q3 = $_POST['C4Q3'];
    $C4Q4 = $_POST['C4Q4'];
    // note C5
            $i = 1;
            $a = 0;
    while ($i <= 4) {
        if (isset($_POST['C5Q' . $i])) {
            $rep[$i] = $_POST['C5Q' . $i];
            $a = $a + $rep[$i];
            $i++;
        } else {
            unset($_POST['C5Q' . $i]);
            $i++;
        }
    }
            $_SESSION['critere_Sentiment_Depossession'] = $a;

    $C5Q1 = $_POST['C5Q1'];
    $C5Q2 = $_POST['C5Q2'];
    $C5Q3 = $_POST['C5Q3'];
    $C5Q4 = $_POST['C5Q4'];

    // note C6
            $i = 1;
            $a = 0;
    while ($i <= 4) {
        if (isset($_POST['C6Q' . $i])) {
            $rep[$i] = $_POST['C6Q' . $i];
            $a = $a + $rep[$i];
            $i++;
        } else {
            unset($_POST['C6Q' . $i]);
            $i++;
        }
    }

            $_SESSION['critere_Deresponsabilite'] = $a;
    $C6Q1 = $_POST['C6Q1'];
    $C6Q2 = $_POST['C6Q2'];
    $C6Q3 = $_POST['C6Q3'];
    $C6Q4 = $_POST['C6Q4'];

            $critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
            $critere2 = $_SESSION['critere_Desengagement_Relationnel'];
            $critere3 = $_SESSION['critere_Surveillance'];
            $critere4 = $_SESSION['critere_Perte_Autonomie'];
            $critere5 = $_SESSION['critere_Sentiment_Depossession'];
            $critere6 = $_SESSION['critere_Deresponsabilite'];

            $Contexte_casusage = $_SESSION['Contexte_casusage'];
            $Objectif_sia = $_SESSION['Objectif_sia'];
            $Fonctionnement_sia = $_SESSION['Fonctionnement_sia'];
            $Utilisation_sia = $_SESSION['Utilisation_sia'];
            $Maturite = $_SESSION['Maturite'];

            $Nom_Diagnostic = $_SESSION['Nom_Diagnostic'];

            $requete = "INSERT INTO Criteres VALUES ('','" . $critere1 . "','" . $critere2 . "','" . $critere3 . "','" . $critere4 . "','" . $critere5 . "','" . $critere6 . "','" . $Contexte_casusage . "','" . $Objectif_sia . "','" . $Fonctionnement_sia . "','" . $Utilisation_sia . "','" . $Maturite . "','" . $Nom_Diagnostic . "')";
            $resultat = mysqli_query($db, $requete);

            $requete2 = "SELECT Id_critere FROM Criteres WHERE Nom = '$Nom_Diagnostic'";
            $resultat2 = mysqli_query($db, $requete2);
            $row = mysqli_fetch_assoc($resultat2);
            $_SESSION['id_Critere'] = $row['Id_critere'];

            $Id_Critere = $_SESSION['id_Critere'];

            $requete3 = "INSERT INTO Diagnostics VALUES ('','".$Id_Critere."','".$Nom_Diagnostic."','".$C1Q1."','".$C1Q2."','".$C1Q3."','".$C1Q4."','','','','','','','','','".$C2Q1."','".$C2Q2."','".$C2Q3."','".$C2Q4."','','','','','','','','','".$C3Q1."','".$C3Q2."','".$C3Q3."','".$C3Q4."','','','','','','','','','".$C4Q1."','".$C4Q2."','".$C4Q3."','".$C4Q4."','','','','','','','','','".$C5Q1."','".$C5Q2."','".$C5Q3."','".$C5Q4."','','','','','','','','','".$C6Q1."','".$C6Q2."','".$C6Q3."','".$C6Q4."','','','','','','','','','')";
            $resultat3 = mysqli_query($db, $requete3);

            $Id_Utilisateur = $_SESSION['id_Utilisateur'];

            $requete4 = "INSERT INTO Repondre VALUES ('" . $Id_Utilisateur . "','" . $Id_Critere . "')";
            $resultat4 = mysqli_query($db, $requete4);

        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php');
    }
    else{
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire.php?erreur=1');
    }
?>