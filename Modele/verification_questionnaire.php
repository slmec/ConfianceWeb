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
        $_SESSION['C1'] = $a;

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

            $_SESSION['C2'] = $a;

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

            $_SESSION['C3'] = $a;

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

            $_SESSION['C4'] = $a;

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
            $_SESSION['C5'] = $a;

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

            $_SESSION['C6'] = $a;
    $C6Q1 = $_POST['C6Q1'];
    $C6Q2 = $_POST['C6Q2'];
    $C6Q3 = $_POST['C6Q3'];
    $C6Q4 = $_POST['C6Q4'];

            $C1 = $_SESSION['C1'];
            $C2= $_SESSION['C2'];
            $C3 = $_SESSION['C3'];
            $C4 = $_SESSION['C4'];
            $C5 = $_SESSION['C5'];
            $C6 = $_SESSION['C6'];

            $SIA_contexte = $_SESSION['SIA_contexte'];
            $SIA_objectif = $_SESSION['SIA_objectif'];
            $SIA_fonctionnement = $_SESSION['SIA_fonctionnement'];
            $SIA_utilisation = $_SESSION['SIA_utilisation'];
            $SIA_maturite = $_SESSION['SIA_maturite'];

            $Nom_diagnostic = $_SESSION['Nom_diagnostic'];

            $requete = "INSERT INTO Diagnostics VALUES ('','".$Nom_diagnostic."','" . $SIA_contexte . "','" . $SIA_objectif . "','" . $SIA_fonctionnement . "','" . $SIA_utilisation . "','" . $SIA_maturite . "','".$C1Q1."','".$C1Q2."','".$C1Q3."','".$C1Q4."','".$C1."','','','','','','','','','".$C2Q1."','".$C2Q2."','".$C2Q3."','".$C2Q4."','".$C2."','','','','','','','','','".$C3Q1."','".$C3Q2."','".$C3Q3."','".$C3Q4."','".$C3."','','','','','','','','','".$C4Q1."','".$C4Q2."','".$C4Q3."','".$C4Q4."','".$C4."','','','','','','','','','".$C5Q1."','".$C5Q2."','".$C5Q3."','".$C5Q4."','".C5."','','','','','','','','','".$C6Q1."','".$C6Q2."','".$C6Q3."','".$C6Q4."','".$C6."','','','','','','','','','')";
            $resultat = mysqli_query($db, $requete);

            $requete = "SELECT * FROM Diagnostics WHERE Nom_diagnostic = '$Nom_diagnostic'";
            $resultat = mysqli_query($db, $requete);
            $row = mysqli_fetch_assoc($resultat);

            $Id_diagnostic = $row['Id_diagnostic'];
            echo $row['Id_diagnostic'];
            $_SESSION['Id_diagnostic'] = $Id_diagnostic;

            $Id_utilisateur = $_SESSION['Id_utilisateur'];

            $requete4 = "INSERT INTO Repondre VALUES ('" . $Id_utilisateur . "','" . $Id_diagnostic . "')";
            $resultat4 = mysqli_query($db, $requete4);

        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php');
    }
    else{
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire.php?erreur=1');
    }
?>