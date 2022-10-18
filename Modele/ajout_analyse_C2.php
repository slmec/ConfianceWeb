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

$C2_interpretation = $_POST['C2_interpretation'];
$C2_plan_action = $_POST['C2_plan_action'];
$C2_suivi = $_POST['C2_suivi'];

if($C2_interpretation !== "" && $C2_plan_action !== ""&&$C2_suivi !== "") {
    $requete2 = "UPDATE Diagnostics SET C2_suivi ='$C2_suivi',C2_plan_action ='$C2_plan_action',C2_interpretation ='$C2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
    $result2 = mysqli_query($db, $requete2);
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?');
}
else {
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C2.php?erreur=1');
}

?>
</body>
</html>

