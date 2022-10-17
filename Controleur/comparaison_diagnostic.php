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
<body>

<?php
    if (isset($_POST['ok']) && count($_POST['adv']) >= 1 && count($_POST['adv'])<=3){
        //echo ("le nombre est ".count($_POST['adv']));

        if(isset($_POST['adv'])){
            echo '<p>Votre choix : </p>';
            // $choix est l'id du diagnostique
            foreach ($_POST['adv'] as $choix){
               // echo $choix.'<br/>';
            }
        }
    }
    if (isset($_POST['ok']) && count($_POST['adv'] ) >3 ) {
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php?erreur=1');
    }
    if (isset($_POST['ok']) && count($_POST['adv'] ) ==0 ) {
        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php?erreur=1');
    }
?>



<?php
    $diagnostics = $_POST['adv'];
    $critere1 = $diagnostics[0];
    $resultat1 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation, Nom FROM Criteres WHERE Id_critere = '$critere1'") or die ( "<br>BUG".mysqli_error($db));
    $row = mysqli_fetch_array($resultat1);
    $diagnostic1_critere1 = $row[0];
    $diagnostic1_critere2 = $row[1];
    $diagnostic1_critere3 = $row[2];
    $diagnostic1_critere4 = $row[3];
    $diagnostic1_critere5 = $row[4];
    $diagnostic1_critere6 = $row[5];
    $diagnostic1_nom = $row[6];
    if (isset($diagnostics[0]) && empty($diagnostics[1]) && empty($diagnostics[2])){
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
                        label: '<?=$diagnostic1_nom?>',
                        data: [
                            <?=$diagnostic1_critere1?>,
                            <?=$diagnostic1_critere2?>,
                            <?=$diagnostic1_critere3?>,
                            <?=$diagnostic1_critere4?>,
                            <?=$diagnostic1_critere5?>,
                            <?=$diagnostic1_critere6?>
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
    <?php
    }
    elseif (isset($diagnostics[0],$diagnostics[1]) && empty($diagnostics[2])) {
        $resultat2 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation, Nom FROM Criteres WHERE Id_critere = '$diagnostics[1]'") or die ( "<br>BUG".mysqli_error($db));
        $row = mysqli_fetch_array($resultat2);
        $diagnostic2_critere1 = $row[0];
        $diagnostic2_critere2 = $row[1];
        $diagnostic2_critere3 = $row[2];
        $diagnostic2_critere4 = $row[3];
        $diagnostic2_critere5 = $row[4];
        $diagnostic2_critere6 = $row[5];
        $diagnostic2_nom = $row[6];
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
                    label: '<?=$diagnostic1_nom?>',
                    data: [
                        <?=$diagnostic1_critere1?>,
                        <?=$diagnostic1_critere2?>,
                        <?=$diagnostic1_critere3?>,
                        <?=$diagnostic1_critere4?>,
                        <?=$diagnostic1_critere5?>,
                        <?=$diagnostic1_critere6?>
                    ],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)',
                },{
                    label: '<?=$diagnostic2_nom?>',
                    data: [
                        <?=$diagnostic2_critere1?>,
                        <?=$diagnostic2_critere2?>,
                        <?=$diagnostic2_critere3?>,
                        <?=$diagnostic2_critere4?>,
                        <?=$diagnostic2_critere5?>,
                        <?=$diagnostic2_critere6?>
                    ],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)',
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
<?php
    }
    elseif (isset($diagnostics[0],$diagnostics[1],$diagnostics[2])){
        $resultat2 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation, Nom FROM Criteres WHERE Id_critere = '$diagnostics[1]'") or die ( "<br>BUG".mysqli_error($db));
        $row = mysqli_fetch_array($resultat2);
        $diagnostic2_critere1 = $row[0];
        $diagnostic2_critere2 = $row[1];
        $diagnostic2_critere3 = $row[2];
        $diagnostic2_critere4 = $row[3];
        $diagnostic2_critere5 = $row[4];
        $diagnostic2_critere6 = $row[5];
        $diagnostic2_nom = $row[6];

    $resultat3 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation, Nom FROM Criteres WHERE Id_critere = '$diagnostics[2]'") or die ( "<br>BUG".mysqli_error($db));
    $row = mysqli_fetch_array($resultat3);
    $diagnostic3_critere1 = $row[0];
    $diagnostic3_critere2 = $row[1];
    $diagnostic3_critere3 = $row[2];
    $diagnostic3_critere4 = $row[3];
    $diagnostic3_critere5 = $row[4];
    $diagnostic3_critere6 = $row[5];
    $diagnostic3_nom = $row[6];
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
                    label: '<?=$diagnostic1_nom?>',
                    data: [
                        <?=$diagnostic1_critere1?>,
                        <?=$diagnostic1_critere2?>,
                        <?=$diagnostic1_critere3?>,
                        <?=$diagnostic1_critere4?>,
                        <?=$diagnostic1_critere5?>,
                        <?=$diagnostic1_critere6?>
                    ],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)',
                },{
                    label: '<?=$diagnostic2_nom?>',
                    data: [
                        <?=$diagnostic2_critere1?>,
                        <?=$diagnostic2_critere2?>,
                        <?=$diagnostic2_critere3?>,
                        <?=$diagnostic2_critere4?>,
                        <?=$diagnostic2_critere5?>,
                        <?=$diagnostic2_critere6?>
                    ],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)',
                },{
                    label: '<?=$diagnostic3_nom?>',
                    data: [
                        <?=$diagnostic3_critere1?>,
                        <?=$diagnostic3_critere2?>,
                        <?=$diagnostic3_critere3?>,
                        <?=$diagnostic3_critere4?>,
                        <?=$diagnostic3_critere5?>,
                        <?=$diagnostic3_critere6?>
                    ],
                    fill: true,
                    backgroundColor: 'rgba(50, 205, 50, 0.2)',
                    borderColor: 'rgb(50,205,50)',
                    pointBackgroundColor: 'rgb(50,205,50)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(50,205,50)',
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
<?php
    }
?>

<!--
    //Test $critere1 et $critere2
    if (isset($diagnostics[1])) {
        $resultat2 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation, Nom FROM Criteres WHERE Id_critere = '$diagnostics[1]'") or die ( "<br>BUG".mysqli_error($db));
        $row2 = mysqli_fetch_array($resultat2);
        $diagnostic2_critere1 = $row2[0];
        $diagnostic2_critere2 = $row2[1];
        $diagnostic2_critere3 = $row2[2];
        $diagnostic2_critere4 = $row2[3];
        $diagnostic2_critere5 = $row2[4];
        $diagnostic2_critere6 = $row2[5];
        $diagnostic2_nom = $row2[6];
        }
    else {
        unset($diagnostics[1]);
    }
    if (isset($diagnostics[2])) {
        $resultat3 = mysqli_query($db,"SELECT Fragilisation_Reconnaissance, Desengagement_Relationnel, Surveillance, Perte_Autonomie, Sentiment_Depossession, Deresponsabilisation, Nom FROM Criteres WHERE Id_critere = '$diagnostics[2]'") or die ( "<br>BUG".mysqli_error($db));
        $row3 = mysqli_fetch_array($resultat3);
        $diagnostic3_critere1 = $row3[0];
        $diagnostic3_critere2 = $row3[1];
        $diagnostic3_critere3 = $row3[2];
        $diagnostic3_critere4 = $row3[3];
        $diagnostic3_critere5 = $row3[4];
        $diagnostic3_critere6 = $row3[5];
        $diagnostic3_nom = $row3[6];
    }
    else {
        unset($diagnostics[2]);
    }
?>



-->
<form action="connexion.php">
    <button type="submit">Retour au tableau de bord </button>
</form>
<!--onload="init();-->
</body>
</html>