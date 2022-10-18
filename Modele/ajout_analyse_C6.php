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

$C6_interpretation = $_POST['C6_interpretation'];
$C6_plan_action = $_POST['C6_plan_action'];
$C6_suivi = $_POST['C6_suivi'];

if($C6_interpretation !== "" && $C6_plan_action !== ""&&$C6_suivi !== "") {
    $requete2 = "UPDATE Diagnostics SET C6_suivi ='$C6_suivi',C6_plan_action ='$C6_plan_action',C6_interpretation ='$C6_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
    $result2 = mysqli_query($db, $requete2);
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?');
}
else {
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_responsabilité.php?erreur=1');
}

?>
</body>
</html>


