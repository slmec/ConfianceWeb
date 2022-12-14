<!DOCTYPE html>
<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

    $Nom_Diagnostic = $_SESSION['Nom_Diagnostic'];
?>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <link rel="stylesheet" href="../Vue/style_resultats.css" />
        <title>MAIAT</title>
    </head>
    <body>
        <section>
            <div class="fond_entete">
                <div class="block_entete">
                    <!-- Barre de navigation !-->
                    <header>
                        <div class="left">
                            <a href="https://www.confiance.ai/" class="logo" target="_blank"><img src="../Medias/logoconfiance.jpg" width="150" height="106"></a>
                        </div>
                        <div class="middle">
                            <nav class="navbar">
                                <a href="../index.php" target="_blank" > MAIAT </a>
                                <a href="inscription.php">Inscription</a>
                                <a href="identification.php">Connexion</a>
                                <a class="active" href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                                <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                            </nav>
                        </div>
                        <div class="right">
                            <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                        </div>
                    </header>
                    <br><hr><br>
                    <h1 class="blanc">Diagnostic <?php echo $Nom_Diagnostic ?></h1>
                    <br><hr><br>
                </div>
            </div>

            <div class="container">
                <!-- Corps de page !-->
                <div class="block_titre">
                    <hr><hr><br>
                    <h1> Evaluation globale </h1>
                    <br><hr><hr><br>
                </div>
                <div class="block_legende">
                    <p>Evaluation tend vers 0 : risques sociaux importants </p>
                    <p>Evaluation tend vers 4 : risques sociaux réduits </p>
                    <br>
                </div>
            </div>
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

                <div class="container">
                    <div class="block_titre">
                        <hr><hr><br>
                        <h1 align="center"> Analyse détaillée </h1>
                        <br><hr><hr>
                    </div>
                    <div class="block_titre_critere">
                        <h2>La reconnaissance </h2>
                    </div>
                    <div class="block_table">
                        <table>
                            <?php
                            $C1Q1 = $_SESSION['C1Q1'];
                            $C1Q2 = $_SESSION['C1Q2'];
                            $C1Q3 = $_SESSION['C1Q3'];
                            $C1Q4 = $_SESSION['C1Q4'];
                            ?>
                            <tr>
                                <td class="col_1">Questions</td>
                                <td class="col_2"> <b> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </b> </td>
                                <td class="col_2"> <b>  Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </b> </td>
                                <td class="col_2"> <b> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </b> </td>
                                <td class="col_2"> <b> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </b> </td>
                            </tr>
                            <tr>
                                <td class="col_1"> Vos réponses </td>
                                <td class="col_2"><?php if ($C1Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C1Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C1Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C1Q4 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            </tr>
                            <tr>
                            <td class="col_1"> Implications </td>
                            <td class="col_2">
                                <?php
                                if ($C1Q1 == 0) {
                                    echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                                }
                                else {
                                    echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                                }
                                ?>
                            </td>
                            <td class="col_2">
                                <?php
                                if ($C1Q2 == 0) {
                                    echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                                }
                                else {
                                    echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                                }
                                ?>
                            </td>
                            <td class="col_2">
                                <?php
                                if ($C1Q3 == 0) {
                                    echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                                }
                                else {
                                    echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                                }
                                ?>
                            </td>
                            <td class="col_2">
                                <?php
                                if ($C1Q4 == 0) {
                                    echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                                }
                                else {
                                    echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                                }
                                ?>
                            </td>
                        </tr>
                            <tr>
                                <td> </td>
                                <td class="col_2">
                                    <?php
                                    if ($C1Q1 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C1Q2 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C1Q3 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C1Q4 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="block_titre_critere">
                        <br><hr><hr>
                        <h2>Les relations humaines</h2>
                    </div>
                    <div class="block_table">
                        <table>
                            <?php
                            $C2Q1 = $_SESSION['C2Q1'];
                            $C2Q2 = $_SESSION['C2Q2'];
                            $C2Q3 = $_SESSION['C2Q3'];
                            $C2Q4 = $_SESSION['C2Q4'];
                            ?>
                            <tr>
                                <td class="col_1"> Questions </td>
                                <td class="col_2"> La technologie introduit-elle une communication entre des machines ? </td>
                                <td class="col_2"> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
                                <td class="col_2"> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
                                <td class="col_2"> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
                            </tr>
                            <tr>
                                <td class="col_1"> Vos réponses </td>
                                <td class="col_2"><?php if ($C2Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C2Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C2Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><<?php if ($C2Q4 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            </tr>
                            <tr>
                                <td class="col_1"> Implications </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q1 == 0) {
                                        echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                                    }
                                    else {
                                        echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q2 == 0) {
                                        echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
                                    }
                                    else {
                                        echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q3== 0) {
                                        echo "<p style='color:red'>Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
                                    }
                                    else {
                                        echo "<p> Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q4 == 0) {
                                        echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                                    }
                                    else {
                                        echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q1 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q2 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q3 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C2Q4 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="block_titre_critere">
                        <br><hr><hr>
                        <h2>La surveillance</h2>
                    </div>
                    <div class="block_table">
                        <table>
                            <?php
                            $C3Q1 = $_SESSION['C3Q1'];
                            $C3Q2 = $_SESSION['C3Q2'];
                            $C3Q3 = $_SESSION['C3Q3'];
                            $C3Q4 = $_SESSION['C3Q4'];
                            ?>
                            <tr>
                                <td class="col_1"> Questions </td>
                                <td class="col_2"> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? </td>
                                <td class="col_2"> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </td>
                                <td class="col_2"> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </td>
                                <td class="col_2"> La finalité de l’utilisation des données est-elle transparente ? </td>
                            </tr>
                            <tr>
                                <td class="col_1"> Vos réponses </td>
                                <td class="col_2"><?php if ($C3Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C3Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C3Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C3Q4 == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                            </tr>
                            <tr>
                                <td class="col_1"> Implications </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Que ces appareils soient utilisés pour la surveillance ou non, ils portent un imaginaire fortement ancré qui sera plus ou moins activé suivant la technologie." ;
                                    if ($C3Q1 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "La personnification des données recueillies augmente significativement la méfiance." ;
                                    if ($C3Q2 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "La collecte de données d'activité du travailleur peut être exploitée  pour augmenter sa productivité et intensifier le travail." ;
                                    if ($C3Q3 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Les machines et plus spécifiquement celles à base d’IA renvoient à un imaginaire important. L'absence de transparence de la finalité des données augmente la méfiance. " ;
                                    if ($C3Q4 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="col_2">
                                    <?php
                                    if ($C3Q1 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C3Q2 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C3Q3 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C3Q4 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="block_titre_critere">
                        <br><hr><hr>
                        <h2>L'autonomie</h2>
                    </div>
                    <div class="block_table">
                        <table>
                            <?php
                            $C4Q1 = $_SESSION['C4Q1'];
                            $C4Q2 = $_SESSION['C4Q2'];
                            $C4Q3 = $_SESSION['C4Q3'];
                            $C4Q4 = $_SESSION['C4Q4'];

                            ?>
                            <br>
                            <tr>
                                <td class="col_1"> Questions </td>
                                <td class="col_2"> Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
                                <td class="col_2"> Le système à base d'IA émet-il des notifications à l’adresse du travailleur ? </td>
                                <td class="col_2"> Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ? </td>
                                <td class="col_2"> Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ? </td>
                            </tr>
                            <tr>
                                <td class="col_1"> Vos réponses </td>
                                <td class="col_2"><?php if ($C4Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C4Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C4Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C4Q4 == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                            </tr>
                            <tr>
                                <td class="col_1"> Implications </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                                    if ($C4Q1 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                                    if ($C4Q2 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                                    if ($C4Q3== 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                                    if ($C4Q4 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                            <tr>
                                <td> </td>
                                <td class="col_2">
                                    <?php
                                    if ($C4Q1 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C4Q2 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C4Q3 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C4Q4 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                            </tr>

                            </tr>
                        </table>
                    </div>

                    <div class="block_titre_critere">
                        <br><hr><hr>
                        <h2>Le savoir faire</h2>
                    </div>
                    <div class="block_table">
                        <table>
                            <?php
                            $C5Q1 = $_SESSION['C5Q1'];
                            $C5Q2 = $_SESSION['C5Q2'];
                            $C5Q3 = $_SESSION['C5Q3'];
                            $C5Q4 = $_SESSION['C5Q4'];

                            ?>
                            <tr>
                                <td class="col_1"> Questions </td>
                                <td class="col_2"> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </td>
                                <td class="col_2"> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </td>
                                <td class="col_2"> Le système à base d'IA rend-il des savoir-faire obsolètes ? </td>
                                <td class="col_2"> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </td>
                            </tr>
                            <tr>
                                <td class="col_1"> Vos réponses </td>
                                <td class="col_2"><?php if ($C5Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C5Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C5Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C5Q4 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            </tr>
                            <tr>
                                <td class="col_1"> Implications </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machines , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                                    if ($C5Q1== 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                                    if ($C5Q2 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                                    if ($C5Q3 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                                    if ($C5Q4 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="col_2">
                                    <?php
                                    if ($C5Q1 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C5Q2 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C5Q3 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C5Q4 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="block_titre_critere">
                        <br><hr><hr>
                        <h2>La responsabilité</h2>
                    </div>
                    <div class="block_table">
                        <table>
                            <?php
                            $C6Q1 = $_SESSION['C6Q1'];
                            $C6Q2 = $_SESSION['C6Q2'];
                            $C6Q3 = $_SESSION['C6Q3'];
                            $C6Q4 = $_SESSION['C6Q4'];

                            ?>
                            <tr>
                                <td class="col_1"> Questions </td>
                                <td class="col_2"> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </td>
                                <td class="col_2"> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </td>
                                <td class="col_2"> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?  </td>
                                <td class="col_2"> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                                    Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ? </td>
                            </tr>
                            <tr>
                                <td class="col_1"> Vos réponses </td>
                                <td class="col_2"><?php if ($C6Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C6Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C6Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                                <td class="col_2"><?php if ($C6Q4== 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            </tr>
                            <tr>
                                <td class="col_1"> Implications </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                                    if ($C6Q1 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>" ;
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                                    if ($C6Q2== 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                                    if ($C6Q3 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                                    if ($C6Q4 == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td class="col_2">
                                    <?php
                                    if ($C6Q1 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C6Q2 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C6Q3 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                                <td class="col_2">
                                    <?php
                                    if ($C6Q4 == 0) {
                                        echo'<img src="../Medias/icone.png" width=50px height=50px >';
                                    }
                                    else {
                                        echo "<p></p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                </div>
                <div class = "bouton">
                    <button type="submit" value="Imprimer la page" onclick="window.print();" />Imprimer la page</button>
                </div>
                <form action="identification.php">
                    <button type="submit">Retour au tableau de bord </button>
                </form>
            </div>
        </section>
    </body>
</html>