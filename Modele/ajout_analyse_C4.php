<!DOCTYPE html>
<?php
session_start();
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
</head>
<body onload="init();">
<?php

mysqli_select_db($db, "Confiance" );
if ( ! $db ) die( "Impossible de se connecter à MySQL" );

$Id_Critere = $_SESSION['id_Critere'];

$C4_interpretation = $_POST['C4_interpretation'];
$C4_plan_action = $_POST['C4_plan_action'];
$C4_suivi = $_POST['C4_suivi'];

if($C4_interpretation !== "" && $C4_plan_action !== ""&&$C4_suivi !== "") {
    $requete2 = "UPDATE Diagnostics SET C4_suivi ='$C4_suivi',C4_plan_action ='$C4_plan_action',C4_interpretation ='$C4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
    $result2 = mysqli_query($db, $requete2);
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?');
}
else {
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_perte_autonomie.php?erreur=1');
}

?>
</body>
</html>


