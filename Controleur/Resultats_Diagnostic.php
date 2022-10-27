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
    <link rel="stylesheet" href="../Vue/style_fond_resultats_diagramme.css" />
    <link rel="stylesheet" href="../Vue/style_resultats_analyse.css" />


</head>
<body onload="init();">
<?php $Nom_Diagnostic = $_SESSION['Nom_Diagnostic']; ?>
<section>
    <div class="block_entete">
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
</section>
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

    <?php
    $Id_Critere = $_SESSION['id_Critere'];
    $requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$Id_Critere'";
    $resultat = mysqli_query($db, $requete);
    $row = mysqli_fetch_assoc($resultat);
    ?>
<section>
    <div class="block_page">
        <form action="../Modele/ajout_analyse.php" method="post" >
            <div class="block_titre">
                <hr>
                <hr>
                <h2>La reconnaissance</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="titre">Questions</td>
                        <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
                        <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
                        <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
                        <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
                    </tr>
                    <tr>
                        <td class="titre"> Vos réponses </td>
                        <td><?php if ($row['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="titre"> Implications </td>
                        <td>
                            <?php
                            if ($row['C1Q1'] == 0) {
                                echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                            }
                            else {
                                echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['C1Q2'] == 0) {
                                echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                            }
                            else {
                                echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['C1Q3'] == 0) {
                                echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                            }
                            else {
                                echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['C1Q4'] == 0) {
                                echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            else {
                                echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <table class="analyse">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Interpretation personnelle de l'évaluation </td>
                        <td > Plan d'action </td>
                        <td> Suivi à N+ ...</td>
                    </tr>
                    <tr>
                        <td class="titre">Votre Analyse : </td>
                        <td> <?php echo $row['C1_interpretation'] ?> </td>
                        <td> <?php echo $row['C1_plan_action'] ?> </td>
                        <td> <?php echo $row['C1_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <input name="C1_interpretation" type="text" /> </td>
                        <td> <input name="C1_plan_action" type="text" /></td>
                        <td> <input name="C1_suivi" type="text" /></td>
                    </tr>
                </table>
            </div>

            <div class="block_titre">
                <hr>
                <hr>
                <h2>Les relations humaines</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="titre"> Questions </td>
                        <td> La technologie introduit-elle une communication entre des machines ? </td>
                        <td> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
                        <td> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
                        <td> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
                    </tr>
                    <tr>
                        <td class="titre"> > Vos réponses </td>
                        <td><?php if ($row['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="titre">  Implications </td>
                        <td>
                            <?php
                            if ($row['C2Q1'] == 0) {
                                echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                            }
                            else {
                                echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['C2Q2'] == 0) {
                                echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
                            }
                            else {
                                echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['C2Q3'] == 0) {
                                echo "<p style='color:red'>Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
                            }
                            else {
                                echo "<p> Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.
</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['C2Q4'] == 0) {
                                echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            else {
                                echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <table class="analyse">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Interpretation personnelle de l'évaluation </td>
                        <td > Plan d'action </td>
                        <td> Suivi à N+ ...</td>
                    </tr>
                    <tr>
                        <td class="titre">Votre Analyse : </td>
                        <td> <?php echo $row['C1_interpretation'] ?> </td>
                        <td> <?php echo $row['C1_plan_action'] ?> </td>
                        <td> <?php echo $row['C1_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <input name="interpretation" type="text" /> </td>
                        <td> <input name="plan_action" type="text" /></td>
                        <td> <input name="suivi" type="text" /></td>
                    </tr>
                </table>

                <td> <button name="btn" type="submit" value="2" > Valider l'interpretation <?php $c=0;?></button></td>
            </div>

            <div class="block_titre">
                <hr>
                <hr>
                <h2>La surveillance</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="titre"> Questions </td>
                        <td> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? </td>
                        <td> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </td>
                        <td> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </td>
                        <td> La finalité de l’utilisation des données est-elle transparente ? </td>
                    </tr>
                    <tr>
                        <td> Vos réponses </td>
                        <td><?php if ($row['C3Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C3Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C3Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C3Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td> fleche </td>
                        <td> fleche </td>
                        <td> fleche </td>
                        <td> fleche </td>
                        <td> fleche </td>
                    </tr>
                    <tr>
                        <td> Implications </td>
                        <td>
                            <?php
                            $texte = "Que ces appareils soient utilisés pour la surveillance ou non, ils portent un imaginaire fortement ancré qui sera plus ou moins activé suivant la technologie." ;
                            if ($row['C3Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La personnification des données recueillies augmente significativement la méfiance." ;
                            if ($row['C3Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La collecte de données d'activité du travailleur peut être exploitée  pour augmenter sa productivité et intensifier le travail." ;
                            if ($row['C3Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les machines et plus spécifiquement celles à base d’IA renvoient à un imaginaire important. L'absence de transparence de la finalité des données augmente la méfiance. " ;
                            if ($row['C3Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <table class="analyse">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Interpretation personnelle de l'évaluation </td>
                        <td > Plan d'action </td>
                        <td> Suivi à N+ ...</td>
                    </tr>
                    <tr>
                        <td class="titre">Votre Analyse : </td>
                        <td> <?php echo $row['C1_interpretation'] ?> </td>
                        <td> <?php echo $row['C1_plan_action'] ?> </td>
                        <td> <?php echo $row['C1_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <input name="interpretation" type="text" /> </td>
                        <td> <input name="plan_action" type="text" /></td>
                        <td> <input name="suivi" type="text" /></td>
                    </tr>
                </table>

                <td> <button name="btn" type="submit" value="2" > Valider l'interpretation <?php $c=0;?></button></td>
            </div>
        </form>

    </div>

</section>



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