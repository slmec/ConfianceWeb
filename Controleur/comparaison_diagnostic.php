<!DOCTYPE html>
<?php include("connexion.php"); ?>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
        <title>MAIAT</title>
    </head>
    <body background="../Medias/background_v2.jpg">
        <?php
            if (isset($_POST['ok']) && count($_POST['adv']) >= 1 && count($_POST['adv'])<=3){
                //echo ("le nombre est ".count($_POST['adv']));
                if(isset($_POST['adv'])){
                    // echo '<p>Votre choix : </p>';
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

                <h1> Recapitulatif Diagnostic <?= $diagnostic1_nom ?> </h1>
            <?php
                $requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[0]'";
                $resultat = mysqli_query($db, $requete);
                $row = mysqli_fetch_assoc($resultat);
            ?>
                <h2>La reconnaissance</h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
                        <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
                        <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
                        <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
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
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <td> <?= $row['C1_interpretation'] ?> </td>
                        <td> <?= $row['C1_plan_action'] ?> </td>
                        <td> <?= $row['C1_suivi'] ?> </td>
                    </tr>
                </table>
                <h2>Les relations humaines </h2>
                    <table>
                        <tr>
                            <th> Questions </th>
                            <td> La technologie introduit-elle une communication entre des machines ? </td>
                            <td> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
                            <td> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
                            <td> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
                        </tr>
                        <tr>
                            <th> Vos réponses </th>
                            <td><?php if ($row['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            <td><?php if ($row['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            <td><?php if ($row['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            <td><?php if ($row['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        </tr>
                        <tr>
                            <th> Implications </th>
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
                                        echo "<p> Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
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
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <td> <?= $row['C2_interpretation'] ?> </td>
                        <td> <?= $row['C2_plan_action'] ?> </td>
                        <td> <?= $row['C2_suivi'] ?> </td>
                    </tr>

                </table>
                <h2>La surveillance</h2>
                    <table>
                    <tr>
                        <th> Questions </th>
                        <td> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? </td>
                        <td> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </td>
                        <td> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </td>
                        <td> La finalité de l’utilisation des données est-elle transparente ? </td>
                    </tr>
                    <tr>
                        <th> Vos reponses </th>
                        <td><?php if ($row['C3Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C3Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C3Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C3Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                                $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
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
                                $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
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
                                $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
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
                                $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
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
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <td> <?php echo $row['C3_interpretation'] ?> </td>
                        <td> <?php echo $row['C3_plan_action'] ?> </td>
                        <td> <?php echo $row['C3_suivi'] ?> </td>
                    </tr>
                </table>

                <h2>L'autonomie</h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
                        <td>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</td>
                        <td>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</td>
                        <td>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</td>
                    </tr>
                    <tr>
                        <th> Vos reponses </th>
                        <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                                $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                                if ($row['C4Q1'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>" ;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                                if ($row['C4Q2'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                                if ($row['C4Q3'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                                if ($row['C4Q4'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>";
                                }
                            ?>
                        </td>
                    </tr>
                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <td> <?= $row['C4_interpretation'] ?> </td>
                        <td> <?= $row['C4_plan_action'] ?> </td>
                        <td> <?= $row['C4_suivi'] ?> </td>
                    </tr>

                </table>
                <h2>Le savoir faire </h2>
                    <table>
                        <tr>
                            <th> Questions </th>
                            <td> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </td>
                            <td> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </td>
                            <td> Le système à base d'IA rend-il des savoir-faire obsolètes ? </td>
                            <td> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </td>
                        </tr>
                        <tr>
                            <th> Vos réponses </th>
                            <td><?php if ($row['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            <td><?php if ($row['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            <td><?php if ($row['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                            <td><?php if ($row['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        </tr>
                        <tr>
                            <th> Implications </th>
                            <td>
                                <?php
                                    $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                                    if ($row['C5Q1'] == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>" ;
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                                    if ($row['C5Q2'] == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                                    if ($row['C5Q3'] == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                                    if ($row['C5Q4'] == 0) {
                                        echo "<p style='color:red'> $texte </p>" ;
                                    }
                                    else {
                                        echo "<p> $texte </p>";
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <td> <?= $row['C5_interpretation'] ?> </td>
                        <td> <?= $row['C5_plan_action'] ?> </td>
                        <td> <?= $row['C5_suivi'] ?> </td>
                    </tr>

                </table>
                <h2>La responsabilité</h2>
                    <table>
                    <tr>
                        <th> Questions </th>
                        <td> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </td>
                        <td> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </td>
                        <td> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?  </td>
                        <td> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                            Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ? </td>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                                $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                                if ($row['C6Q1'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>" ;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                                if ($row['C6Q2'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                                if ($row['C6Q3'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                                if ($row['C6Q4'] == 0) {
                                    echo "<p style='color:red'> $texte </p>" ;
                                }
                                else {
                                    echo "<p> $texte </p>";
                                }
                            ?>
                        </td>
                    </tr>
                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <td> <?= $row['C6_interpretation'] ?> </td>
                        <td> <?= $row['C6_plan_action'] ?> </td>
                        <td> <?= $row['C6_suivi'] ?> </td>
                    </tr>

                </table>
                <?php
                    }
                    elseif (isset($diagnostics[0],$diagnostics[1]) && empty($diagnostics[2])) {
                        $critere2 = $diagnostics[1];
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

                <h1> Recapitulatif Diagnostic <?php echo $diagnostic1_nom ?> et Diagnostic <?php echo $diagnostic2_nom ?> </h1>
            <?php
            $requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[0]'";
            $resultat = mysqli_query($db, $requete);
            $row = mysqli_fetch_assoc($resultat);

            $requete1 = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[1]'";
            $resultat1 = mysqli_query($db, $requete1);
            $row1 = mysqli_fetch_assoc($resultat1); ?>

                <h2>La reconnaissance</h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
                        <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
                        <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
                        <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
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
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row1['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            if ($row1['C1Q1'] == 0) {
                                echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                            }
                            else {
                                echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row1['C1Q2'] == 0) {
                                echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                            }
                            else {
                                echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row1['C1Q3'] == 0) {
                                echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                            }
                            else {
                                echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row1['C1Q4'] == 0) {
                                echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            else {
                                echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            ?>
                        </td>
                    </tr>

                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th></th>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                        <td> <?php echo $row['C1_interpretation'] ?> </td>
                        <td> <?php echo $row['C1_plan_action'] ?> </td>
                        <td> <?php echo $row['C1_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                        <td> <?php echo $row1['C1_interpretation'] ?> </td>
                        <td> <?php echo $row1['C1_plan_action'] ?> </td>
                        <td> <?php echo $row1['C1_suivi'] ?> </td>
                    </tr>

                </table>
                <h2>Les relations humaines </h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td> La technologie introduit-elle une communication entre des machines ? </td>
                        <td> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
                        <td> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
                        <td> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
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
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row1['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            if ($row1['C2Q1'] == 0) {
                                echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                            }
                            else {
                                echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row1['C2Q2'] == 0) {
                                echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
                            }
                            else {
                                echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row1['C2Q3'] == 0) {
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
                            if ($row1['C2Q4'] == 0) {
                                echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            else {
                                echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th></th>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                        <td> <?php echo $row['C2_interpretation'] ?> </td>
                        <td> <?php echo $row['C2_plan_action'] ?> </td>
                        <td> <?php echo $row['C2_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                        <td> <?php echo $row1['C2_interpretation'] ?> </td>
                        <td> <?php echo $row1['C2_plan_action'] ?> </td>
                        <td> <?php echo $row1['C2_suivi'] ?> </td>
                    </tr>

                </table>
                <h2>La surveillance</h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? </td>
                        <td> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </td>
                        <td> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </td>
                        <td> La finalité de l’utilisation des données est-elle transparente ? </td>
                    </tr>
                    <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    <tr>
                        <th> Vos réponses</th>
                        <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                            if ($row['C4Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                            if ($row['C4Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                            if ($row['C4Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                            if ($row['C4Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                    <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                    <tr>
                        <th> Vos réponses</th>
                        <td><?php if ($row1['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                            if ($row1['C4Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                            if ($row1['C4Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                            if ($row1['C4Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                            if ($row1['C4Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th></th>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                        <td> <?php echo $row['C3_interpretation'] ?> </td>
                        <td> <?php echo $row['C3_plan_action'] ?> </td>
                        <td> <?php echo $row['C3_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                        <td> <?php echo $row1['C3_interpretation'] ?> </td>
                        <td> <?php echo $row1['C3_plan_action'] ?> </td>
                        <td> <?php echo $row1['C3_suivi'] ?> </td>
                    </tr>
                </table>
                <h2>L'autonomie</h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
                        <td>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</td>
                        <td>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</td>
                        <td>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</td>
                    </tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    <tr>
                        <th> Vos reponses </th>
                        <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                            if ($row['C4Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                            if ($row['C4Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                            if ($row['C4Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                            if ($row['C4Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                    </tr>
                    <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                    <tr>
                        <th> Vos reponses </th>
                        <td><?php if ($row1['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                            if ($row['C4Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                            if ($row['C4Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                            if ($row1['C4Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                            if ($row1['C4Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                    <h3>Votre analyse :  </h3>
                    <table>
                        <tr>
                            <th></th>
                            <th> Interpretation personnelle de l'évaluation </th>
                            <th> Plan d'action </th>
                            <th> Suivi à N+ ...</th>
                        </tr>
                        <tr>
                            <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                            <td> <?php echo $row['C4_interpretation'] ?> </td>
                            <td> <?php echo $row['C4_plan_action'] ?> </td>
                            <td> <?php echo $row['C4_suivi'] ?> </td>
                        </tr>
                        <tr>
                            <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                            <td> <?php echo $row1['C4_interpretation'] ?> </td>
                            <td> <?php echo $row1['C4_plan_action'] ?> </td>
                            <td> <?php echo $row1['C4_suivi'] ?> </td>
                        </tr>
                    </table>
                <h2>Le savoir faire </h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </td>
                        <td> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </td>
                        <td> Le système à base d'IA rend-il des savoir-faire obsolètes ? </td>
                        <td> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                            if ($row['C5Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                            if ($row['C5Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                            if ($row['C5Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                            if ($row['C5Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row1['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                            if ($row1['C5Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                            if ($row1['C5Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                            if ($row1['C5Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                            if ($row1['C5Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th></th>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                        <td> <?php echo $row['C5_interpretation'] ?> </td>
                        <td> <?php echo $row['C5_plan_action'] ?> </td>
                        <td> <?php echo $row['C5_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                        <td> <?php echo $row1['C5_interpretation'] ?> </td>
                        <td> <?php echo $row1['C5_plan_action'] ?> </td>
                        <td> <?php echo $row1['C5_suivi'] ?> </td>
                    </tr>
                </table>
                <h2>La responsabilité</h2>
                <table>
                    <tr>
                        <th> Questions </th>
                        <td> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </td>
                        <td> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </td>
                        <td> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?  </td>
                        <td> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                            Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ? </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                            if ($row['C6Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                            if ($row['C6Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                            if ($row['C6Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                            if ($row['C6Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos réponses </th>
                        <td><?php if ($row1['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row1['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                            if ($row1['C6Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                            if ($row1['C6Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                            if ($row1['C6Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                            if ($row1['C6Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <h3>Votre analyse :  </h3>
                <table>
                    <tr>
                        <th></th>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                        <td> <?php echo $row['C6_interpretation'] ?> </td>
                        <td> <?php echo $row['C6_plan_action'] ?> </td>
                        <td> <?php echo $row['C6_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                        <td> <?php echo $row1['C6_interpretation'] ?> </td>
                        <td> <?php echo $row1['C6_plan_action'] ?> </td>
                        <td> <?php echo $row1['C6_suivi'] ?> </td>
                    </tr>
                </table>

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

            $requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[0]'";
            $resultat = mysqli_query($db, $requete);
            $row = mysqli_fetch_assoc($resultat);

            $requete1 = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[1]'";
            $resultat1 = mysqli_query($db, $requete1);
            $row1 = mysqli_fetch_assoc($resultat1);

            $requete2 = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[2]'";
            $resultat2 = mysqli_query($db, $requete2);
            $row2 = mysqli_fetch_assoc($resultat2);?>

        <h2>La reconnaissance</h2>
        <table>
            <tr>
                <th> Questions </th>
                <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
                <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
                <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
                <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
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
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row1['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    if ($row1['C1Q1'] == 0) {
                        echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                    }
                    else {
                        echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row1['C1Q2'] == 0) {
                        echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                    }
                    else {
                        echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row1['C1Q3'] == 0) {
                        echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                    }
                    else {
                        echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row1['C1Q4'] == 0) {
                        echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    else {
                        echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row2['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    if ($row2['C1Q1'] == 0) {
                        echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                    }
                    else {
                        echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row2['C1Q2'] == 0) {
                        echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                    }
                    else {
                        echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row2['C1Q3'] == 0) {
                        echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                    }
                    else {
                        echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row2['C1Q4'] == 0) {
                        echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    else {
                        echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    ?>
                </td>
            </tr>

        </table>
        <h3>Votre analyse :  </h3>
        <table>
            <tr>
                <th></th>
                <th> Interpretation personnelle de l'évaluation </th>
                <th> Plan d'action </th>
                <th> Suivi à N+ ...</th>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                <td> <?php echo $row['C1_interpretation'] ?> </td>
                <td> <?php echo $row['C1_plan_action'] ?> </td>
                <td> <?php echo $row['C1_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                <td> <?php echo $row1['C1_interpretation'] ?> </td>
                <td> <?php echo $row1['C1_plan_action'] ?> </td>
                <td> <?php echo $row1['C1_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
                <td> <?php echo $row2['C1_interpretation'] ?> </td>
                <td> <?php echo $row2['C1_plan_action'] ?> </td>
                <td> <?php echo $row2['C1_suivi'] ?> </td>
            </tr>
        </table>
        <h2>Les relations humaines </h2>
        <table>
            <tr>
                <th> Questions </th>
                <td> La technologie introduit-elle une communication entre des machines ? </td>
                <td> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
                <td> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
                <td> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
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
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row1['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    if ($row1['C2Q1'] == 0) {
                        echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                    }
                    else {
                        echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row1['C2Q2'] == 0) {
                        echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
                    }
                    else {
                        echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row1['C2Q3'] == 0) {
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
                    if ($row1['C2Q4'] == 0) {
                        echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    else {
                        echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    ?>
                </td>
            </tr>
            <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row2['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    if ($row2['C2Q1'] == 0) {
                        echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                    }
                    else {
                        echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row2['C2Q2'] == 0) {
                        echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
                    }
                    else {
                        echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row2['C2Q3'] == 0) {
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
                    if ($row2['C2Q4'] == 0) {
                        echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    else {
                        echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                    }
                    ?>
                </td>
            </tr>
        </table>
        <h3>Votre analyse :  </h3>
        <table>
            <tr>
                <th></th>
                <th> Interpretation personnelle de l'évaluation </th>
                <th> Plan d'action </th>
                <th> Suivi à N+ ...</th>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                <td> <?php echo $row['C2_interpretation'] ?> </td>
                <td> <?php echo $row['C2_plan_action'] ?> </td>
                <td> <?php echo $row['C2_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                <td> <?php echo $row1['C2_interpretation'] ?> </td>
                <td> <?php echo $row1['C2_plan_action'] ?> </td>
                <td> <?php echo $row1['C2_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
                <td> <?php echo $row2['C2_interpretation'] ?> </td>
                <td> <?php echo $row2['C2_plan_action'] ?> </td>
                <td> <?php echo $row2['C2_suivi'] ?> </td>
            </tr>

        </table>
        <h2>La surveillance</h2>
        <table>
            <tr>
                <th> Questions </th>
                <td> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? </td>
                <td> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </td>
                <td> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </td>
                <td> La finalité de l’utilisation des données est-elle transparente ? </td>
            </tr>
            <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
            <tr>
                <th> Vos réponses</th>
                <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                    if ($row['C4Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                    if ($row['C4Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                    if ($row['C4Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                    if ($row['C4Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
            <tr>
                <th> Vos réponses</th>
                <td><?php if ($row1['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                    if ($row1['C4Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                    if ($row1['C4Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                    if ($row1['C4Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                    if ($row1['C4Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
            <tr>
                <th> Vos réponses</th>
                <td><?php if ($row2['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                    if ($row2['C4Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                    if ($row2['C4Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                    if ($row2['C4Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                    if ($row2['C4Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <h3>Votre analyse :  </h3>
        <table>
            <tr>
                <th></th>
                <th> Interpretation personnelle de l'évaluation </th>
                <th> Plan d'action </th>
                <th> Suivi à N+ ...</th>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                <td> <?php echo $row['C3_interpretation'] ?> </td>
                <td> <?php echo $row['C3_plan_action'] ?> </td>
                <td> <?php echo $row['C3_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                <td> <?php echo $row1['C3_interpretation'] ?> </td>
                <td> <?php echo $row1['C3_plan_action'] ?> </td>
                <td> <?php echo $row1['C3_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
                <td> <?php echo $row2['C3_interpretation'] ?> </td>
                <td> <?php echo $row2['C3_plan_action'] ?> </td>
                <td> <?php echo $row2['C3_suivi'] ?> </td>
            </tr>
        </table>

        <h2>L'autonomie</h2>
        <table>
                    <tr>
                        <th> Questions </th>
                        <td>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
                        <td>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</td>
                        <td>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</td>
                        <td>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                    </tr>
                    <tr>
                        <th> Vos reponses </th>
                        <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                        <td><?php if ($row['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <th> Implications </th>
                        <td>
                            <?php
                            $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                            if ($row['C4Q1'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>" ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                            if ($row['C4Q2'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                            if ($row['C4Q3'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                            if ($row['C4Q4'] == 0) {
                                echo "<p style='color:red'> $texte </p>" ;
                            }
                            else {
                                echo "<p> $texte </p>";
                            }
                            ?>
                        </td>
                    </tr>
            <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
            </tr>
            <tr>
                <th> Vos reponses </th>
                <td><?php if ($row1['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                    if ($row1['C4Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                    if ($row1['C4Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                    if ($row1['C4Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                    if ($row1['C4Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
            </tr>
            <tr>
                <th> Vos reponses </th>
                <td><?php if ($row2['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                    if ($row2['C4Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
                    if ($row2['C4Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
                    if ($row2['C4Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
                    if ($row2['C4Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
                </table>
        <h3>Votre analyse :  </h3>
        <table>
                    <tr>
                        <th></th>
                        <th> Interpretation personnelle de l'évaluation </th>
                        <th> Plan d'action </th>
                        <th> Suivi à N+ ...</th>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                        <td> <?php echo $row['C4_interpretation'] ?> </td>
                        <td> <?php echo $row['C4_plan_action'] ?> </td>
                        <td> <?php echo $row['C4_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                        <td> <?php echo $row1['C4_interpretation'] ?> </td>
                        <td> <?php echo $row1['C4_plan_action'] ?> </td>
                        <td> <?php echo $row1['C4_suivi'] ?> </td>
                    </tr>
                    <tr>
                        <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
                        <td> <?php echo $row2['C4_interpretation'] ?> </td>
                        <td> <?php echo $row2['C4_plan_action'] ?> </td>
                        <td> <?php echo $row2['C4_suivi'] ?> </td>
                    </tr>
                </table>
        <h2>Le savoir faire </h2>
        <table>
            <tr>
                <th> Questions </th>
                <td> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </td>
                <td> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </td>
                <td> Le système à base d'IA rend-il des savoir-faire obsolètes ? </td>
                <td> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                    if ($row['C5Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                    if ($row['C5Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                    if ($row['C5Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                    if ($row['C5Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row1['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                    if ($row1['C5Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                    if ($row1['C5Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                    if ($row1['C5Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                    if ($row1['C5Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row2['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                    if ($row2['C5Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
                    if ($row2['C5Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
                    if ($row2['C5Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
                    if ($row2['C5Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <h3>Votre analyse :  </h3>
        <table>
            <tr>
                <th></th>
                <th> Interpretation personnelle de l'évaluation </th>
                <th> Plan d'action </th>
                <th> Suivi à N+ ...</th>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                <td> <?php echo $row['C5_interpretation'] ?> </td>
                <td> <?php echo $row['C5_plan_action'] ?> </td>
                <td> <?php echo $row['C5_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                <td> <?php echo $row1['C5_interpretation'] ?> </td>
                <td> <?php echo $row1['C5_plan_action'] ?> </td>
                <td> <?php echo $row1['C5_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
                <td> <?php echo $row2['C5_interpretation'] ?> </td>
                <td> <?php echo $row2['C5_plan_action'] ?> </td>
                <td> <?php echo $row2['C5_suivi'] ?> </td>
            </tr>
        </table>
        <h2>La responsabilité</h2>
        <table>
            <tr>
                <th> Questions </th>
                <td> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </td>
                <td> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </td>
                <td> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?  </td>
                <td> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                    Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ? </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                    if ($row['C6Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                    if ($row['C6Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                    if ($row['C6Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                    if ($row['C6Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row1['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row1['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                    if ($row1['C6Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                    if ($row1['C6Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                    if ($row1['C6Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                    if ($row1['C6Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
            </tr>
            <tr>
                <th> Vos réponses </th>
                <td><?php if ($row2['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?php if ($row2['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            </tr>
            <tr>
                <th> Implications </th>
                <td>
                    <?php
                    $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
                    if ($row2['C6Q1'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>" ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
                    if ($row2['C6Q2'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
                    if ($row2['C6Q3'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
                    if ($row2['C6Q4'] == 0) {
                        echo "<p style='color:red'> $texte </p>" ;
                    }
                    else {
                        echo "<p> $texte </p>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <h3>Votre analyse :  </h3>
        <table>
            <tr>
                <th></th>
                <th> Interpretation personnelle de l'évaluation </th>
                <th> Plan d'action </th>
                <th> Suivi à N+ ...</th>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic1_nom ?></th>
                <td> <?php echo $row['C6_interpretation'] ?> </td>
                <td> <?php echo $row['C6_plan_action'] ?> </td>
                <td> <?php echo $row['C6_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic2_nom ?></th>
                <td> <?php echo $row1['C6_interpretation'] ?> </td>
                <td> <?php echo $row1['C6_plan_action'] ?> </td>
                <td> <?php echo $row1['C6_suivi'] ?> </td>
            </tr>
            <tr>
                <th> Diagnostic <?php echo $diagnostic3_nom ?></th>
                <td> <?php echo $row2['C6_interpretation'] ?> </td>
                <td> <?php echo $row2['C6_plan_action'] ?> </td>
                <td> <?php echo $row2['C6_suivi'] ?> </td>
            </tr>
        </table>
        <?php
            }
         ?>

        <input type="button" value="Imprimer la page" onclick="window.print();" />

        <form action="connexion.php">
            <button type="submit">Retour au tableau de bord </button>
        </form>

    </body>
</html>