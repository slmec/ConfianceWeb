<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
<?php
$link =  mysqli_connect("localhost", "eleve.tou", "et*301");

mysqli_select_db($link, "Confiance" );
if ( ! $link ) die( "Impossible de se connecter à MySQL" );

$C1_interpretation = $_POST['C1_interpretation'];
$C1_plan_action = $_POST['C1_plan_action'];
$C1_suivi = $_POST['C1_suivi'];
$Id_Critere = $_SESSION['id_Critere'];

if($C1_interpretation !== "" ) {


    $requete = "UPDATE Diagnostics SET C1_interpretation ='$C1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
    $result = mysqli_query($link, $requete);
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Resultats_Diagnostic.php?'); // utilisateur ou mot de passe incorrect
}
    ?>