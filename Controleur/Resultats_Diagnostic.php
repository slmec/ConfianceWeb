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
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/diagramme.css" />


</head>
<body onload="init();">
<?php $Nom_Diagnostic = $_SESSION['Nom_Diagnostic']; ?>
<section>
<div class="block_haut">
<div class="container">
    <header>
        <nav class="navbar">
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/acceuil.php">Accueil</a>
            <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
            <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
            <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
        </nav>
    </header>
    <div class="block_tableau">
        <br><hr><br>
    </div>
    <nav class="navbar">
        <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php"> Nouveau Diagnostic </a>
        <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php">Consulter mes diagnostics</a>
        <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php">Mon profil </a>
        <a href="../Modele/deconnexion.php">Deconnexion</a>
    </nav>
    <div class="block_tableau">
        <br><hr><br>
        <h1 class="blanc">Diagnostic <?php echo $Nom_Diagnostic ?></h1>
        <br><hr><br>
    </div>
</div>
</div>
</div>
</section>
<div class="block_bas">
    <?php
        //Intégration de la note du critère dans la BDD - UNE SEULE FOIS EN DERNIER FICHIER
    $critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
    $critere2 = $_SESSION['critere_Desengagement_Relationnel'];
    $critere3 = $_SESSION['critere_Surveillance'];
    $critere4 = $_SESSION['critere_Perte_Autonomie'];
    $critere5 = $_SESSION['critere_Sentiment_Depossession'];
    $critere6 = $_SESSION['critere_Deresponsabilite'];
    $Nom_Diagnostic = $_SESSION['Nom_Diagnostic']
    ?>
    <div class="chart-container">
        <canvas id="radarCanvas" aria-label="chart" role="img" ></canvas>
    </div>
    <style type="text/css">
        .chart-container{
            width:800px;
            height: 800px;
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
</div>
    <?php
    $Id_Critere = $_SESSION['id_Critere'];
    $requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$Id_Critere'";
    $resultat = mysqli_query($db, $requete);
    $row = mysqli_fetch_assoc($resultat);
    ?>
    <div class="block_page">
        <div class="block_titre">
            <h2>La reconnaissance</h2>
        </div>
        <div class="block_table"></div>


    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications.php" method="post">
            <button type="submit" value="1" class="button"name = "btn1">

                La reconnaissance
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications.php" method="post">
            <button type="submit" value="2" class="button" name = "btn1">
                Les relations humaines
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications.php" method="post">
            <button type="submit" value="3" class="button" name = "btn1">
                La surveillance
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications.php" method="post">
            <button type="submit" value="4" class="button" name = "btn1">
               La perte d'autonomie
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications.php" method="post">
            <button type="submit" value="5" class="button" name = "btn1">
                Le savoir faire
            </button>
        </form>
    </div>
    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/implications.php" method="post">
            <button type="submit" value="6" class="button" name = "btn1">
                La responsabilité
            </button>
        </form>

    </div>

    <div class = "bouton">
        <form action = "https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/impression.php" target=_BLANK>
            <button type="submit" value="impression" class="button">
                Impression
            </button>
        </form>
    </div>

<form action="connexion.php">
    <button type="submit">Retour au tableau de bord </button>

</form>

</body>
</html>