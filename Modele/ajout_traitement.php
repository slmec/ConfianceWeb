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
    <title>MAIAT</title>
</head>
<body onload="init();">
<?php
mysqli_select_db($db, "Confiance" );
if ( ! $db ) die( "Impossible de se connecter à MySQL" );

$Id_Critere = $_SESSION['id_Critere'];
$données_diagnostic =$_POST['Données_diag'] ;
        $requete = "UPDATE Diagnostics SET Données_traitement ='$données_diagnostic' WHERE Id_critere_bis = '$Id_Critere' ";
        $result = mysqli_query($db, $requete);
header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/connexion.php');
    ?>
</body>
</html>
