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
    <link rel="stylesheet" href="../Vue/style_resultats_analyse.css" />
    <link rel="stylesheet" href="../Vue/style_fond_resultats_diagramme.css" />
    <title>MAIAT</title>

</head>
<body>
<section>
    <div class="block_entete">
        <div class="container">
            <header>
                <nav class="navbar">
                    <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                    <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                    <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                    <a  class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                    <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                </nav>
            </header>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">Evaluation globale</h1>
                <br><hr><br>
            </div>
        </div>
    </div>
    <br>
    <p align="center">Evaluation tend vers 0 : risques sociaux réduits </p>
    <p align="center">Evaluation tend vers 4 : risques sociaux importants </p>
    <br>
<?php


//Intégration de la note du critère dans la BDD - UNE SEULE FOIS EN DERNIER FICHIER

$critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
$critere2 = $_SESSION['critere_Desengagement_Relationnel'];
$critere3 = $_SESSION['critere_Surveillance'];
$critere4 = $_SESSION['critere_Perte_Autonomie'];
$critere5 = $_SESSION['critere_Sentiment_Depossession'];
$critere6 = $_SESSION['critere_Deresponsabilite'];
$Nom_Diagnostic = $_SESSION['Nom_Diagnostic'];

/*$critere_Desengagement_Relationnel = $_SESSION['critere_Desengagement_Relationnel'];
$id_critere = $_SESSION['id_critere'];
$requete = "INSERT INTO Criteres WHERE id_critere = '$id_critere' VALUES ('','','".$critere_Desengagement_Relationnel."','','','','')";
$resultat = mysqli_query($link,$requete);*/

/*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
$resultat2 = mysqli_query($link,$requete2);*/
?>

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
                    <?=$critere1?>,
                    <?=$critere2?>,
                    <?=$critere3?>,
                    <?=$critere4?>,
                    <?=$critere5?>,
                    <?=$critere6?>
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

    <div class="block_entete">
        <div class="container">
            <header>
                <nav class="navbar">
                    <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C1_sansid.php">
                        <button type="submit" value="La reconnaissance" class="button">La reconnaissance</button>
                    </form>

                    <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C2_sansid.php">
                        <button type="submit" value="Les relations humaines" class="button">
                            Les relations humaines
                        </button>
                    </form>
                    <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C3_sansid.php">
                        <button type="submit" value="La surveillance" class="button">
                            La surveillance
                        </button>
                    </form>
                    <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C4_sansid.php">
                        <button type="submit" value="La perte d'autonomie" class="button">
                            La perte d'autonomie
                        </button>
                    </form>
                    <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C5_sansid.php">
                        <button type="submit" value="Le savoir faire " class="button">
                            Le savoir faire
                        </button>
                    </form>
                    <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications_C6_sansid.php">
                        <button type="submit" value="La responsabilité" class="button">
                            La responsabilité
                        </button>
                    </form>
                </nav>

            </header>
        </div>
        <br>
        <br>
    </div>
</section>
<form action="acceuil.php">
    <button type="submit">Retour au tableau de bord </button>
</form>

</body>
</html>