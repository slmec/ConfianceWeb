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

$C1_interpretation = $_POST['C1_interpretation'];
$C1_plan_action = $_POST['C1_plan_action'];
$C1_suivi = $_POST['C1_suivi'];

//C1
    if ($C1_suivi != ""){
        $requete1 = "UPDATE Diagnostics SET C1_suivi ='$C1_suivi'WHERE Id_critere_bis = '$Id_Critere' ";
        $result1 = mysqli_query($db, $requete1);
    }
    if ($C1_plan_action != ""){
        $requete2 = "UPDATE Diagnostics SET C1_plan_action ='$C1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
        $result2 = mysqli_query($db, $requete2);
    }
    if ($C1_interpretation != ""){
        $requete3 = "UPDATE Diagnostics SET C1_interpretation ='$C1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
        $result3 = mysqli_query($db, $requete3);
    }

$C2_interpretation = $_POST['C2_interpretation'];
$C2_plan_action = $_POST['C2_plan_action'];
$C2_suivi = $_POST['C2_suivi'];

//C2
if ($C2_suivi != ""){
    $requete12 = "UPDATE Diagnostics SET C2_suivi ='$C2_suivi'WHERE Id_critere_bis = '$Id_Critere' ";
    $result12 = mysqli_query($db, $requete12);
}
if ($C2_plan_action != ""){
    $requete22 = "UPDATE Diagnostics SET C2_plan_action ='$C2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
    $result22 = mysqli_query($db, $requete22);
}
if ($C2_interpretation != ""){
$requete32 = "UPDATE Diagnostics SET C2_interpretation ='$C2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
$result32 = mysqli_query($db, $requete32);

$C3_interpretation = $_POST['C3_interpretation'];
$C3_plan_action = $_POST['C3_plan_action'];
$C3_suivi = $_POST['C3_suivi'];

//C2
if ($C3_suivi != ""){
    $requete13 = "UPDATE Diagnostics SET C3_suivi ='$C3_suivi'WHERE Id_critere_bis = '$Id_Critere' ";
    $result13 = mysqli_query($db, $requete13);
}
if ($C3_plan_action != ""){
    $requete23 = "UPDATE Diagnostics SET C3_plan_action ='$C3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
    $result23 = mysqli_query($db, $requete23);
}
if ($C3_interpretation != ""){
$requete33 = "UPDATE Diagnostics SET C3_interpretation ='$C3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
$result33 = mysqli_query($db, $requete33);

$C4_interpretation = $_POST['C4_interpretation'];
$C4_plan_action = $_POST['C4_plan_action'];
$C4_suivi = $_POST['C4_suivi'];

//C4
if ($C4_suivi != ""){
    $requete14 = "UPDATE Diagnostics SET C4_suivi ='$C4_suivi'WHERE Id_critere_bis = '$Id_Critere' ";
    $result14 = mysqli_query($db, $requete14);
}
if ($C4_plan_action != ""){
    $requete24 = "UPDATE Diagnostics SET C4_plan_action ='$C4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
    $result24 = mysqli_query($db, $requete24);
}
if ($C4_interpretation != ""){
$requete34 = "UPDATE Diagnostics SET C4_interpretation ='$C4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
$result34 = mysqli_query($db, $requete34);

$C5_interpretation = $_POST['C5_interpretation'];
$C5_plan_action = $_POST['C5_plan_action'];
$C5_suivi = $_POST['C5_suivi'];

//C5
if ($C5_suivi != ""){
    $requete15 = "UPDATE Diagnostics SET C5_suivi ='$C5_suivi'WHERE Id_critere_bis = '$Id_Critere' ";
    $result15 = mysqli_query($db, $requete15);
}
if ($C5_plan_action != ""){
    $requete25 = "UPDATE Diagnostics SET C5_plan_action ='$C5_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
    $result25 = mysqli_query($db, $requete25);

if ($C5_interpretation != ""){
$requete35 = "UPDATE Diagnostics SET C5_interpretation ='$C5_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
$result35 = mysqli_query($db, $requete35);

$C6_interpretation = $_POST['C6_interpretation'];
$C6_plan_action = $_POST['C6_plan_action'];
$C6_suivi = $_POST['C6_suivi'];

//C6
if ($C6_suivi != ""){
    $requete16 = "UPDATE Diagnostics SET C6_suivi ='$C6_suivi'WHERE Id_critere_bis = '$Id_Critere' ";
    $result16= mysqli_query($db, $requete16);
}
if ($C6_plan_action != ""){
    $requete26 = "UPDATE Diagnostics SET C6_plan_action ='$C6_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
    $result26 = mysqli_query($db, $requete26);
}
if ($C6_interpretation != ""){
$requete36 = "UPDATE Diagnostics SET C6_interpretation ='$C6_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
$result36 = mysqli_query($db, $requete36);

header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php');
?>
</body>
</html>
