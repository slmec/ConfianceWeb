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
$c= $_POST['btn'];
$Id_Critere = $_SESSION['id_Critere'];


$requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$Id_Critere'";
$resultat = mysqli_query($db, $requete);
$row = mysqli_fetch_assoc($resultat);
?>

<h1> Recapitulatif Diagnostic <?php echo $row['Nom'] ?> </h1>

<?php if ($c==1){ ?>

<h2>La reconnaissance</h2>
<h3>Les reponses au questionnaires concernant le critere : </h3>
<table>
    <tr>
        <td> Questions </td>
        <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
        <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
        <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
        <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($row['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
<h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>
<form action="../Modele/ajout_analyse_C1.php" method="post" >
    <table>
        <tr>
            <td></td>
            <td> Interpretation personnelle de l'évaluation </td>
            <td> Plan d'action </td>
            <td> Suivi à N+ ...</td>
        </tr>
        <tr>
            <td>Votre Analyse : </td>
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
        <tr>
            <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /> <?php $c=0;?></td>
        </tr>
    </table>
</form>

<?php } ?>
<?php if ($c==2){ ?>
<h1>Les relations humaines </h1>
<table>
    <tr>
        <td> Questions </td>
        <td> La technologie introduit-elle une communication entre des machines ? </td>
        <td> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
        <td> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
        <td> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($row['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
<h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>
<form action="../Modele/ajout_analyse_C2.php" method="post" >
    <table>
        <tr>
            <td></td>
            <td> Interpretation personnelle de l'évaluation </td>
            <td> Plan d'action </td>
            <td> Suivi à N+ ...</td>
        </tr>
        <tr>
            <td>Votre Analyse : </td>
            <td> <?php echo $row['C2_interpretation'] ?> </td>
            <td> <?php echo $row['C2_plan_action'] ?> </td>
            <td> <?php echo $row['C2_suivi'] ?> </td>
        </tr>
        <tr>
            <td></td>
            <td> <input name="C2_interpretation" type="text" /> </td>
            <td> <input name="C2_plan_action" type="text" /></td>
            <td> <input name="C2_suivi" type="text" /></td>
        </tr>
        <tr>
            <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /></td>
        </tr>
    </table>

</form>
<?php } ?>
<?php if ($c==3){ ?>
    <h1>La surveillance</h1>
    <table>
        <tr>
            <td> Questions </td>
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
    <h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>
    <form action="../Modele/ajout_analyse_C2.php" method="post" >
        <table>
            <tr>
                <td></td>
                <td> Interpretation personnelle de l'évaluation </td>
                <td> Plan d'action </td>
                <td> Suivi à N+ ...</td>
            </tr>
            <tr>
                <td>Votre Analyse : </td>
                <td> <?php echo $row['C3_interpretation'] ?> </td>
                <td> <?php echo $row['C3_plan_action'] ?> </td>
                <td> <?php echo $row['C3_suivi'] ?> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input name="C3_interpretation" type="text" /> </td>
                <td> <input name="C3_plan_action" type="text" /></td>
                <td> <input name="C3_suivi" type="text" /></td>
            </tr>
            <tr>
                <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /></td>
            </tr>
        </table>

    </form>
<?php } ?>
<?php if ($c==4){ ?>
    <h2>La perte d'autonomie </h2>
    <table>
        <tr>
            <td> Questions </td>
            <td> Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
            <td> Le système à base d'IA émet-il des notifications à l’adresse du travailleur ? </td>
            <td> Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ? </td>
            <td> Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ? </td>
        </tr>
        <tr>
            <td> Vos réponses </td>
            <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C4Q4'] == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
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
    <h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>
    <form action="../Modele/ajout_analyse_C2.php" method="post" >
        <table>
            <tr>
                <td></td>
                <td> Interpretation personnelle de l'évaluation </td>
                <td> Plan d'action </td>
                <td> Suivi à N+ ...</td>
            </tr>
            <tr>
                <td>Votre Analyse : </td>
                <td> <?php echo $row['C4_interpretation'] ?> </td>
                <td> <?php echo $row['C4_plan_action'] ?> </td>
                <td> <?php echo $row['C4_suivi'] ?> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input name="C4_interpretation" type="text" /> </td>
                <td> <input name="C4_plan_action" type="text" /></td>
                <td> <input name="C4_suivi" type="text" /></td>
            </tr>
            <tr>
                <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /></td>
            </tr>
        </table>

    </form>
<?php } ?>
<?php if ($c==5){ ?>
    <h2>Le savoir faire </h2>
    <table>
        <tr>
            <td> Questions </td>
            <td> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </td>
            <td> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </td>
            <td> Le système à base d'IA rend-il des savoir-faire obsolètes ? </td>
            <td> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </td>
        </tr>
        <tr>
            <td> Vos réponses </td>
            <td><?php if ($row['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
    <h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>
    <form action="../Modele/ajout_analyse_C2.php" method="post" >
        <table>
            <tr>
                <td></td>
                <td> Interpretation personnelle de l'évaluation </td>
                <td> Plan d'action </td>
                <td> Suivi à N+ ...</td>
            </tr>
            <tr>
                <td>Votre Analyse : </td>
                <td> <?php echo $row['C5_interpretation'] ?> </td>
                <td> <?php echo $row['C5_plan_action'] ?> </td>
                <td> <?php echo $row['C5_suivi'] ?> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input name="C5_interpretation" type="text" /> </td>
                <td> <input name="C5_plan_action" type="text" /></td>
                <td> <input name="C5_suivi" type="text" /></td>
            </tr>
            <tr>
                <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /></td>
            </tr>
        </table>

    </form>
<?php } ?>
<?php if ($c==6){ ?>
    <h2>La responsabilité</h2>
    <table>
        <tr>
            <td> Questions </td>
            <td> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </td>
            <td> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </td>
            <td> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?  </td>
            <td> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ? </td>
        </tr>
        <tr>
            <td> Vos réponses </td>
            <td><?php if ($row['C6Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C6Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C6Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($row['C6Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
    <h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>
    <form action="../Modele/ajout_analyse_C2.php" method="post" >
        <table>
            <tr>
                <td></td>
                <td> Interpretation personnelle de l'évaluation </td>
                <td> Plan d'action </td>
                <td> Suivi à N+ ...</td>
            </tr>
            <tr>
                <td>Votre Analyse : </td>
                <td> <?php echo $row['C6_interpretation'] ?> </td>
                <td> <?php echo $row['C6_plan_action'] ?> </td>
                <td> <?php echo $row['C6_suivi'] ?> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input name="C6_interpretation" type="text" /> </td>
                <td> <input name="C6_plan_action" type="text" /></td>
                <td> <input name="C6_suivi" type="text" /></td>
            </tr>
            <tr>
                <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /></td>
            </tr>
        </table>

    </form>
<?php } ?>

<form action="Resultats_Diagnostic.php" >
    <button type="submit"  >Retour au resultat   </button>
</form>

</body>
</html>