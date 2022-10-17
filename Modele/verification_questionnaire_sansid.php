<?php
session_start();

// connexion à la base de données
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);

// note C1
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['C1Q' . $i])) {
        $Oui[$i] = intval($_POST['C1Q' . $i]);
        $a = $a + $Oui[$i];
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


/* $o = 1;
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

   $_SESSION['critere_fragilisation_reconnaissance'] = $a + $b;

} */
// note C2
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['C2Q' . $i])) {
        $Oui[$i] = intval($_POST['C2Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['C2Q' . $i]);
        $i++;
    }
}

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
        $Oui[$i] = intval($_POST['C3Q' . $i]);
        $a = $a + $Oui[$i];
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
        $Oui[$i] = intval($_POST['C4Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['C4Q' . $i]);
        $i++;
    }
}

$_SESSION['critere_Perte_Autonomie'] = $a;

// note C5
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['C5Q' . $i])) {
        $Oui[$i] = intval($_POST['C5Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['C5Q' . $i]);
        $i++;
    }
}
$_SESSION['critere_Sentiment_Depossession'] = $a;

// note C6
$i = 1;
$a = 0;
while ($i <= 4) {
    if (isset($_POST['C6Q' . $i])) {
        $Oui[$i] = intval($_POST['C6Q' . $i]);
        $a = $a + $Oui[$i];
        $i++;
    } else {
        unset($_POST['C6Q' . $i]);
        $i++;
    }
}
$_SESSION['critere_Deresponsabilite'] = $a;

$critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
$critere2 = $_SESSION['critere_Desengagement_Relationnel'];
$critere3 = $_SESSION['critere_Surveillance'];
$critere4 = $_SESSION['critere_Perte_Autonomie'];
$critere5 = $_SESSION['critere_Sentiment_Depossession'];
$critere6 = $_SESSION['critere_Deresponsabilite'];
$_SESSION['Nom_Diagnostic'] = $_POST['Nom_Diagnostic'];

header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic_sansid.php');
?>
