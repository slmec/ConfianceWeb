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

$C1_interpretation = $_POST['C1_interpretation'];
$C1_plan_action = $_POST['C1_plan_action'];
$C1_suivi = $_POST['C1_suivi'];
$Id_Critere = $_SESSION['id_Critere'];

if($C1_interpretation !== "" && $C1_plan_action !== ""&&$C1_suivi !== "") {
    $requete = "UPDATE Diagnostics SET C1_suivi ='$C1_suivi',C1_plan_action ='$C1_plan_action',C1_interpretation ='$C1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
    $result = mysqli_query($db, $requete);
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?');
}

?>
</body>
</html>
