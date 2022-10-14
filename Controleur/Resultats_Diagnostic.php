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


    /*$critere_Desengagement_Relationnel = $_SESSION['critere_Desengagement_Relationnel'];
    $id_critere = $_SESSION['id_critere'];
    $requete = "INSERT INTO Criteres WHERE id_critere = '$id_critere' VALUES ('','','".$critere_Desengagement_Relationnel."','','','','')";
    $resultat = mysqli_query($link,$requete);*/

    /*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
    $resultat2 = mysqli_query($link,$requete2);*/
    ?>

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
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Implication C1.php">
            <button type="submit" value="Les critères de risques sociaux" class="button">
                Les critères de risques sociaux
            </button>
        </form>
    </div>

<?php
$Id_Critere = $_SESSION['id_Critere'];

    $requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$Id_Critere'";
    $resultat = mysqli_query($db, $requete);
    $row = mysqli_fetch_assoc($resultat);

?>
    <h1>Tableau </h1>
    <table>
        <tr>
            <td> Question </td>
            <td> 1 </td>
            <td> 2 </td>
            <td> 3 </td>
            <td> 4 </td>
        </tr>
        <?php
        $i = 1;
        while ($i <= 4) {
            if ($row['C1Q' . $i] == 0) {
                echo 'Oui';
                $i++;
            }
            if ($row['C1Q' . $i] == 1) {
                echo 'Non';
                $i++;
            }
        }?>
        <tr>
            <td> Vos reponses </td>
            <td>


            </td>
            <td> 2 </td>
            <td> 3 </td>
            <td> 4 </td>
        </tr>
        <tr>
            <td> fleche </td>
            <td> fleche </td>
            <td> fleche </td>
            <td> fleche </td>
            <td> fleche </td>
        </tr>
        <tr>
            <td> fleche </td>
            <td> fleche </td>
            <td> fleche </td>
            <td> fleche </td>
            <td> fleche </td>
        </tr>
    </table>


<form action="connexion.php">
    <button type="submit">Retour à l'accueil</button>
</form>

</body>
</html>