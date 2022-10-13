<!DOCTYPE html>
<?php
session_start();
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');
?>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title></title>
</head>
<body onload="init();">

<?php
if (isset($_POST['ok']) && count($_POST['adv'] ) >= 1 && count($_POST['adv'] )<=2) {
    //echo ("le nombre est ".count($_POST['adv']));

    if(isset($_POST['adv']))
    {
         echo '<p>Votre choix : </p>';
        // $choix est l'id du diagnostique
        foreach ($_POST['adv'] as $choix)
        {
           // echo $choix.'<br/>';
        }
    }
}
if (isset($_POST['ok']) && count($_POST['adv'] ) >2 ) {
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php?erreur=1');
}
if (isset($_POST['ok']) && count($_POST['adv'] ) ==0 ) {
    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php?erreur=1');
}
?>

<?php

    $diagnostics = $_POST['adv'];
    $critere1 = $diagnostics[0];
    $critere2 = $diagnostics[1];
    $resultat1 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation FROM Criteres WHERE Id_critere = '$critere1'") or die ( "<br>BUG".mysqli_error($db));
    $resultat2 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation FROM Criteres WHERE Id_critere = '$critere2'") or die ( "<br>BUG".mysqli_error($db));

//Récupération des critères du premier diagnostic
    $diagnostic1 = mysqli_fetch_assoc($resultat1);
    echo $diagnostic1[0];




//Intégration de la note du critère dans la BDD - UNE SEULE FOIS EN DERNIER FICHIER
/*
$critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
$critere2 = $_SESSION['critere_Desengagement_Relationnel'];
$critere3 = $_SESSION['critere_Surveillance'];
$critere4 = $_SESSION['critere_Perte_Autonomie'];
$critere5 = $_SESSION['critere_Sentiment_Depossession'];
$critere6 = $_SESSION['critere_Deresponsabilite'];

*/
/*$critere_Desengagement_Relationnel = $_SESSION['critere_Desengagement_Relationnel'];
$id_critere = $_SESSION['id_critere'];
$requete = "INSERT INTO Criteres WHERE id_critere = '$id_critere' VALUES ('','','".$critere_Desengagement_Relationnel."','','','','')";
$resultat = mysqli_query($link,$requete);*/

/*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
$resultat2 = mysqli_query($link,$requete2);*/
?>
<!--
<p> Diagnostic " <?php echo $_SESSION['Nom_Diagnostic']?> " : </p>
<p> La fragilisation de la reconnaissance : <?php echo $_SESSION['critere_fragilisation_reconnaissance']?> /4 </p>
<p> Le desengagement relationnel  : <?php echo $_SESSION['critere_Desengagement_Relationnel']?> /4 </p>
<p> La surveillance : <?php echo $_SESSION['critere_Surveillance']?> /4 </p>
<p> La perte d'autonomie : <?php echo $_SESSION['critere_Perte_Autonomie']?> /4 </p>
<p> Le sentiment de depossesion : <?php echo $_SESSION['critere_Sentiment_Depossession']?> /4 </p>
<p> La deresponsabilisation : <?php echo $_SESSION['critere_Deresponsabilite']?> /4 </p>

<div class="chart-container">
    <canvas id="radarCanvas" aria-label="chart" role="img"></canvas>
</div>
<style type="text/css">
    .chart-container{
        width:800px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    const radarCanvas = document.getElementById("radarCanvas");

    const radarChart = new Chart(radarCanvas,{
        type: "radar",
        data: {
            labels: [
                "Fragilisation de la reconnaissance",
                "Désengagement relationnel",
                "Surveillance",
                "Perte d'autonomie",
                "Sentiment de dépossession",
                "Déresponsabilisation"
            ],
            datasets: [{
                label: 'Diagnostic 1',
                data: [
                ],
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)',
            }, {
                label: 'Diagnostic 2',
                data: [3,2,2,4,2,3],
                fill: true,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                pointBackgroundColor: 'rgb(54, 162, 235)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(54, 162, 235)'
            }],
        },
        options: {
            scales: {
                r: {
                    min: 0,
                    max: 4,
                    ticks: {
                        stepSize : 1,
                        font: {
                            size:10,
                        }
                    },
                    pointLabels: {
                        font: {
                            size: 15,
                        }
                    }
                }
            }
        }
    })
</script>
<form action="connexion.php">
    <button type="submit">Retour à l'accueil</button>
</form>
-->

</body>
</html>