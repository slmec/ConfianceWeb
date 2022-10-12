<?php
session_start();

// connexion à la base de données
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');

// note C1
    $i = 1;
    $a = 0;
    while ($i <= 4) {
        if (isset($_POST['Oui_C1Q' . $i])) {
            $Oui[$i] = intval($_POST['Oui_C1Q' . $i]);
            $a = $a + $Oui[$i];
            $i++;
        } else {
            unset($_POST['Oui_C1Q' . $i]);
            $i++;
        }
    }
    $o = 1;
    $b = 0;
    while ($o <= 4) {
        if (isset($_POST['Non_C1Q' . $o])) {
            $Non[$o] = intval($_POST['Non_C1Q' . $o]);
            $b = $b + $Non[$o];
            $o++;
        } else {
            unset($_POST['Non_C1Q' . $o]);
            $o++;
        }
    }

    $_SESSION['critere_fragilisation_reconnaissance'] = $a + $b;


// note C2
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['Oui_C2Q' . $i])) {
        $Oui[$i] = intval($_POST['Oui_C2Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['Oui_C2Q' . $i]);
        $i++;
    }
}
$o = 1;
$b = 0;
while ($o <= 4) {
    if (isset($_POST['Non_C2Q' . $o])) {
        $Non[$o] = intval($_POST['Non_C2Q' . $o]);
        $b = $b + $Non[$o];
        $o++;
    } else {
        unset($_POST['Non_C2Q' . $o]);
        $o++;
    }
}

$_SESSION['critere_Desengagement_Relationnel'] = $a + $b;

// note C3
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['Oui_C3Q' . $i])) {
        $Oui[$i] = intval($_POST['Oui_C3Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['Oui_C3Q' . $i]);
        $i++;
    }
}
$o = 1;
$b = 0;
while ($o <= 4) {
    if (isset($_POST['Non_C3Q' . $o])) {
        $Non[$o] = intval($_POST['Non_C3Q' . $o]);
        $b = $b + $Non[$o];
        $o++;
    } else {
        unset($_POST['Non_C3Q' . $o]);
        $o++;
    }
}

$_SESSION['critere_Surveillance'] = $a + $b;

// note C4
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['Oui_C4Q' . $i])) {
        $Oui[$i] = intval($_POST['Oui_C4Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['Oui_C4Q' . $i]);
        $i++;
    }
}
$o = 1;
$b = 0;
while ($o <= 4) {
    if (isset($_POST['Non_C4Q' . $o])) {
        $Non[$o] = intval($_POST['Non_C4Q' . $o]);
        $b = $b + $Non[$o];
        $o++;
    } else {
        unset($_POST['Non_C4Q' . $o]);
        $o++;
    }
}

$_SESSION['critere_Perte_Autonomie'] = $a + $b;

// note C5
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['Oui_C5Q' . $i])) {
        $Oui[$i] = intval($_POST['Oui_C5Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['Oui_C5Q' . $i]);
        $i++;
    }
}
$o = 1;
$b = 0;
while ($o <= 4) {
    if (isset($_POST['Non_C5Q' . $o])) {
        $Non[$o] = intval($_POST['Non_C5Q' . $o]);
        $b = $b + $Non[$o];
        $o++;
    } else {
        unset($_POST['Non_C5Q' . $o]);
        $o++;
    }
}

$_SESSION['critere_Sentiment_Depossession'] = $a + $b;

// note C6
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['Oui_C6Q' . $i])) {
        $Oui[$i] = intval($_POST['Oui_C6Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['Oui_C6Q' . $i]);
        $i++;
    }
}
$o = 1;
$b = 0;
while ($o <= 4) {
    if (isset($_POST['Non_C6Q' . $o])) {
        $Non[$o] = intval($_POST['Non_C6Q' . $o]);
        $b = $b + $Non[$o];
        $o++;
    } else {
        unset($_POST['Non_C6Q' . $o]);
        $o++;
    }
}

$_SESSION['critere_Deresponsabilite'] = $a + $b;


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

$requete = "INSERT INTO Criteres VALUES ('','".$critere1."','".$critere2."','".$critere3."','".$critere4."','".$critere5."','".$critere6."','".$Contexte_casusage."','".$Objectif_sia."','".$Fonctionnement_sia."','".$Utilisation_sia."','".$Maturite."','".$Nom_Diagnostic."')";
$resultat = mysqli_query($db,$requete);

$requete2 = "SELECT Id_critere FROM Criteres WHERE Nom = '$Nom_Diagnostic'";
$resultat2 = mysqli_query($db, $requete2);
$row = mysqli_fetch_assoc($resultat2);
$_SESSION['id_Critere'] = $row['Id_critere'];

$Id_Critere = $_SESSION['id_Critere'];
$Id_Utilisateur = $_SESSION['id_Utilisateur'];

$requete3 = "INSERT INTO Repondre VALUES ('".$Id_Utilisateur."','".$Id_Critere."')";
$resultat3 = mysqli_query($db,$requete3);


header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php');
?>