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

$a= $_POST['btn'];

$interpretation = $_POST['interpretation'];
$plan_action = $_POST['plan_action'];
$suivi = $_POST['suivi'];
$Id_Critere = $_SESSION['id_Critere'];

if ($a==1){
    if ($suivi != ""){
        $requete1 = "UPDATE Diagnostics SET C1_suivi ='$suivi'WHERE Id_critere_bis = '$Id_Critere' ";
        $result1 = mysqli_query($db, $requete1);
    }
    if ($plan_action != ""){
        $requete2 = "UPDATE Diagnostics SET C1_plan_action ='$plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
        $result2 = mysqli_query($db, $requete2);
    }
    if ($interpretation != ""){
        $requete3 = "UPDATE Diagnostics SET C1_interpretation ='$interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
        $result3 = mysqli_query($db, $requete3);
    }
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?');
    $a=0;
}

if ($a==2){
    if ($suivi != ""){
        $requete1 = "UPDATE Diagnostics SET C2_suivi ='$suivi'WHERE Id_critere_bis = '$Id_Critere' ";
        $result1 = mysqli_query($db, $requete1);
    }
    if ($plan_action != ""){
        $requete2 = "UPDATE Diagnostics SET C2_plan_action ='$plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
        $result2 = mysqli_query($db, $requete2);
    }
    if ($interpretation != ""){
        $requete3 = "UPDATE Diagnostics SET C2_interpretation ='$interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
        $result3 = mysqli_query($db, $requete3);
    }
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?');
}
?>
</body>
</html>
