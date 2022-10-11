<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

        <title></title>
</head>
<body>
<?php
    $valeur = array(1,2,2,1,3,1);
    echo json_encode($valeur);
    $i = 0;
    while ($i <= 5){
        $valeurs = $valeur[$i];

        echo $valeur[$i];
        echo json_decode($valeurs, JSON_NUMERIC_CHECK);
        $i++;
    }

?>

<div class=chart-container">
        <canvas id="radarCanvas" aria-label="chart" role="img"></canvas>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!--<script src="script.js"></script>-->
<script>
    const radarCanvas = document.getElementById("radarCanvas");

/*const radarChart = new Chart(radarCanvas, {
type: "bar",
data: {
labels: ["Beijing","Tokyo", "Seoul", "Hong Kong"],
datasets: [{
data: [240,120,140,130],
backgroundColor: [
"crimson",
"lightgreen",
"lightblue",
"violet"
]
}],
},
})
*/

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
                    <?= $valeur[0]?>,
                    <?= $valeur[1]?>,
                    <?= $valeur[2]?>,
                    <?= $valeur[3]?>,
                    <?= $valeur[4]?>,
                    <?= $valeur[5]?>
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





</body>
</html>