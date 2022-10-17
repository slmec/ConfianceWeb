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
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title></title>

</head>
<body onload="init();">
    <?php


    //Intégration de la note du critère dans la BDD - UNE SEULE FOIS EN DERNIER FICHIER

    $critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
    $critere2 = $_SESSION['critere_Desengagement_Relationnel'];
    $critere3 = $_SESSION['critere_Surveillance'];
    $critere4 = $_SESSION['critere_Perte_Autonomie'];
    $critere5 = $_SESSION['critere_Sentiment_Depossession'];
    $critere6 = $_SESSION['critere_Deresponsabilite'];
    $Nom_Diagnostic = $_SESSION['Nom_Diagnostic']


    /*$critere_Desengagement_Relationnel = $_SESSION['critere_Desengagement_Relationnel'];
    $id_critere = $_SESSION['id_critere'];
    $requete = "INSERT INTO Criteres WHERE id_critere = '$id_critere' VALUES ('','','".$critere_Desengagement_Relationnel."','','','','')";
    $resultat = mysqli_query($link,$requete);*/

    /*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
    $resultat2 = mysqli_query($link,$requete2);*/
    ?>

    <!-- <p> Diagnostic " <?php echo $_SESSION['Nom_Diagnostic']?> " : </p>
    <p> La fragilisation de la reconnaissance : <?php echo $_SESSION['critere_fragilisation_reconnaissance']?> /4 </p>
    <p> Le desengagement relationnel  : <?php echo $_SESSION['critere_Desengagement_Relationnel']?> /4 </p>
    <p> La surveillance : <?php echo $_SESSION['critere_Surveillance']?> /4 </p>
    <p> La perte d'autonomie : <?php echo $_SESSION['critere_Perte_Autonomie']?> /4 </p>
    <p> Le sentiment de depossesion : <?php echo $_SESSION['critere_Sentiment_Depossession']?> /4 </p>
    <p> La deresponsabilisation : <?php echo $_SESSION['critere_Deresponsabilite']?> /4 </p> -->

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
                    "La reconnaissance",
                    "Les relations humaines",
                    "La surveillance",
                    "L'autonomie",
                    "Le savoir-faire",
                    "La responsabilité"
                ],
                datasets: [{
                    label: '<?=$Nom_Diagnostic?>',
                    data: [
                        <?= $critere1?>,
                        <?= $critere2?>,
                        <?= $critere3?>,
                        <?= $critere4?>,
                        <?= $critere5?>,
                        <?= $critere6?>
                    ],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)',
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

    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_reconnaissance.php">
            <button type="submit" value="La reconnaissance" class="button">
                La reconnaissance
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_relations_humaines.php">
            <button type="submit" value="Les relations humaines" class="button">
                Les relations humaines
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_surveillance.php">
            <button type="submit" value="La surveillance" class="button">
                La surveillance
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_perte_autonomie.php">
            <button type="submit" value="La perte d'autonomie" class="button">
               La perte d'autonomie
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_savoir_faire.php">
            <button type="submit" value="Le savoir faire " class="button">
                Le savoir faire
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_responsabilité.php">
            <button type="submit" value="La responsabilité" class="button">
                La responsabilité
            </button>
        </form>
    </div>

<form action="connexion.php">
    <button type="submit">Retour au tableau de bord </button>
</form>

</body>
</html>