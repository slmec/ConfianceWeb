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
    <link rel="stylesheet" href="../Vue/style_resultats.css" />
    <title>MAIAT</title>

</head>
<body>
<section>
    <div class="fond_entete">
        <div class="block_entete">
            <header>
                <div class="left">
                    <a href="https://www.confiance.ai/" class="logo" target="_blank"><img src="../Medias/logoconfiance.jpg" width="150" height="106"></a>
                </div>
                <div class="middle">
                    <nav class="navbar">
                        <a href="../index.php" target="_blank" > MAIAT </a>
                        <a href="inscription.php">Inscription</a>
                        <a class="active" href="identification.php">Connexion</a>
                        <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                        <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                    </nav>
                </div>
                <div class="right">
                    <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                </div>
            </header>
                <br><hr><br>
            <div class="navbar_deux">
                <a href="diagnostic_new.php"> Nouveau Diagnostic </a>
                <a class="active" href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                <a href="profil.php">Mon profil </a>
                <a href="../Modele/deconnexion.php">Deconnexion</a>
            </div>
            <br><hr><br>
            <h1 class="blanc">Comparaison </h1>
            <br><hr><br>
        </div>
    </div>
    <div class="container">
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
</section>
<?php

if (isset($_POST['ok']) && count($_POST['adv']) >= 1 && count($_POST['adv'])<=3){
    //echo ("le nombre est ".count($_POST['adv']));

    if(isset($_POST['adv'])){
       //echo '<p>Votre choix : </p>';
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

    <
<?php
$requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[0]'";
$resultat = mysqli_query($db, $requete);
$row = mysqli_fetch_assoc($resultat);
?>
    <section>
        <div class="container">
            <div class="block_titre">
                <hr><hr><br>
                <h2> Recapitulatif Diagnostic <?php echo $diagnostic1_nom ?> </h2>
                <br><hr><hr>
            </div>
            <div class="block_titre_critere">
                <h2>La reconnaissance</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1">Questions</td>
                        <td class="col_2"> <b> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </b> </td>
                        <td class="col_2"> <b>  Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </b> </td>
                        <td class="col_2"> <b> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </b> </td>
                        <td class="col_2"> <b> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </th>
                        <td class="col_2">Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</td>
                        <td class="col_2">Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </td>
                        <td class="col_2">Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</td>
                        <td class="col_2">L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C1Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C1Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></>
                        <td class="col_2"><?php if ($row['C1Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C1Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C1Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C1Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre">
                <br>
                <hr>
                <hr>
                <h2>Les relations humaines</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> La technologie introduit-elle une communication entre des machines ? </b> </td>
                        <td class="col_2"> <b> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </b> </td>
                        <td class="col_2"> <b> La technologie intervient-elle dans la communication entre plusieurs personnes ? </b> </td>
                        <td class="col_2"> <b> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </th>
                        <td class="col_2">La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </td>
                        <td class="col_2">Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</td>
                        <td class="col_2">Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension. </td>
                        <td class="col_2">L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos réponses </td>
                        <td class="col_2"><?php if ($row['C2Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C2Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C2Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C2Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos interprétations </td>
                        <td class="col_2"><?php echo $row['C2Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos plans d'actions </td>
                        <td class="col_2"><?php echo $row['C2Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre">
                <br>
                <hr>
                <hr>
                <h2>La surveillance</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b>Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ?</b> </td>
                        <td class="col_2"> <b>La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </b></td>
                        <td class="col_2"> <b>Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </b></td>
                        <td class="col_2"> <b>La finalité de l’utilisation des données est-elle transparente ?</b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </th>
                        <td class="col_2">La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas.</td>
                        <td class="col_2">Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement.</td>
                        <td class="col_2">La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper.</td>
                        <td class="col_2">L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos réponses </td>
                        <td class="col_2"><?php if ($row['C3Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C3Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C3Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C3Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos interprétations </td>
                        <td class="col_2"><?php echo $row['C3Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos plans d'actions </td>
                        <td class="col_2"><?php echo $row['C3Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre">
                <br>
                <hr>
                <hr>
                <h2>L'autonomie</h2>
            </div>
            <div class="block_table" >
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </b></td>
                        <td class="col_2"> <b>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</b></td>
                        <td class="col_2"> <b>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</b></td>
                        <td class="col_2"> <b>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</b></td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </th>
                        <td class="col_2">La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas.</td>
                        <td class="col_2">Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement.</td>
                        <td class="col_2">La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper.</td>
                        <td class="col_2">L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos réponses </td>
                        <td class="col_2"><?php if ($row['C4Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C4Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C4Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C4Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos interprétations </td>
                        <td class="col_2"><?php echo $row['C4Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos plans d'actions </td>
                        <td class="col_2"><?php echo $row['C4Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre">
                <br>
                <hr>
                <hr>
                <h2>Le savoir faire</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </b></td>
                        <td class="col_2"> <b> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </b></td>
                        <td class="col_2"> <b> Le système à base d'IA rend-il des savoir-faire obsolètes ?</b> </td>
                        <td class="col_2"> <b> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </b></td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </th>
                        <td class="col_2">Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. </td>
                        <td class="col_2">Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire.</td>
                        <td class="col_2"> Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation.</td>
                        <td class="col_2"> La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos réponses </td>
                        <td class="col_2"><?php if ($row['C5Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C5Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C5Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C5Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos interprétations </td>
                        <td class="col_2"><?php echo $row['C5Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos plans d'actions </td>
                        <td class="col_2"><?php echo $row['C5Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre">
                <br>
                <hr>
                <hr>
                <h2>Le responsabilité</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </b></td>
                        <td class="col_2"> <b> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </b></td>
                        <td class="col_2"> <b> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur? </b> </td>
                        <td class="col_2"> <b>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                                Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ?</b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </th>
                        <td class="col_2">L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble.</td>
                        <td class="col_2">Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer.</td>
                        <td class="col_2">Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action.</td>
                        <td class="col_2">La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos réponses </td>
                        <td class="col_2"><?php if ($row['C6Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C6Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C6Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C6Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos interprétations </td>
                        <td class="col_2"><?php echo $row['C6Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Vos plans d'actions </td>
                        <td class="col_2"><?php echo $row['C6Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
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
    <br>
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
$requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[0]'";
$resultat = mysqli_query($db, $requete);
$row = mysqli_fetch_assoc($resultat);

$requete1 = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$diagnostics[1]'";
$resultat1 = mysqli_query($db, $requete1);
$row1 = mysqli_fetch_assoc($resultat1); ?>
<section>
    <div class="container">
        <div class="block_titre">
            <hr><hr><br>
            <h2> Recapitulatif Diagnostic <?php echo $diagnostic1_nom ?> et Diagnostic <?php echo $diagnostic2_nom ?> </h2>
            <br><hr><hr>
        </div>
        <div class="block_titre_critere">
            <br><hr><hr>
            <h2>La reconnaissance</h2>
        </div>
        <div class="block_table">
            <table>
                <tr>
                    <td class="col_1"> Questions </td>
                    <td class="col_2"> <b> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </b></td>
                    <td class="col_2"> <b> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </b></td>
                    <td class="col_2"> <b> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </b></td>
                    <td class="col_2"> <b> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ?</b> </td>
                </tr>
                <tr>
                    <td class="col_1"> Implications </th>
                    <td class="col_2">Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</td>
                    <td class="col_2">Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </td>
                    <td class="col_2">Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</td>
                    <td class="col_2">L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row['C1Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C1Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C1Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></>
                    <td class="col_2"><?php if ($row['C1Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row['C1Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C1Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C1Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C1Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row['C1Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C1Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C1Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C1Q4_plan_action'] ?></td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr> Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row1['C1Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C1Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C1Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></>
                    <td class="col_2"><?php if ($row1['C1Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row1['C1Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C1Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C1Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C1Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row1['C1Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C1Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C1Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C1Q4_plan_action'] ?></td>
                </tr>
            </table>
        </div>
        <div class="block_titre_critere">
            <br><hr><hr>
            <h2>Les relations humaines</h2>
        </div>
        <div class="block_table">
            <table>
                <tr>
                    <td class="col_1"> Questions </td>
                    <td class="col_2"> <b> La technologie introduit-elle une communication entre des machines ? </b> </td>
                    <td class="col_2"> <b> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </b> </td>
                    <td class="col_2"> <b> La technologie intervient-elle dans la communication entre plusieurs personnes ? </b> </td>
                    <td class="col_2"> <b> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </b> </td>
                </tr>
                <tr>
                    <td class="col_1"> Implications </th>
                    <td class="col_2">La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </td>
                    <td class="col_2">Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</td>
                    <td class="col_2">Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension. </td>
                    <td class="col_2">L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row['C2Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C2Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C2Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C2Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row['C2Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C2Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C2Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C2Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row['C2Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C2Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C2Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C2Q4_plan_action'] ?></td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr> Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row1['C2Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C2Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C2Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C2Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row1['C2Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C2Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C2Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C2Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row1['C2Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C2Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C2Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C2Q4_plan_action'] ?></td>
                </tr>
            </table>
        </div>
        <div class="block_titre_critere">
            <br><hr><hr>
            <h2>La surveillance</h2>
        </div>
        <div class="block_table">
            <table>
                <tr>
                    <td class="col_1"> Questions </td>
                    <td class="col_2"> <b>Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ?</b> </td>
                    <td class="col_2"> <b>La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </b></td>
                    <td class="col_2"> <b>Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </b></td>
                    <td class="col_2"> <b>La finalité de l’utilisation des données est-elle transparente ?</b> </td>
                 </tr>
                <tr>
                    <td class="col_1"> Implications </th>
                    <td class="col_2">La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas.</td>
                    <td class="col_2">Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement.</td>
                    <td class="col_2">La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper.</td>
                    <td class="col_2">L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité.</td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row['C3Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C3Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C3Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C3Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row['C3Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C3Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C3Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C3Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row['C3Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C3Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C3Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C3Q4_plan_action'] ?></td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr> Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row1['C3Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C3Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C3Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C3Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row1['C3Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C3Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C3Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C3Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row1['C3Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C3Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C3Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C3Q4_plan_action'] ?></td>
                </tr>
            </table>
        </div>
        <div class="block_titre_critere">
            <br><hr><hr>
            <h2>L'autonomie</h2>
        </div>
        <div class="block_table" >
            <table>
                <tr>
                    <td class="col_1"> Questions </td>
                    <td class="col_2"> <b>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </b></td>
                    <td class="col_2"> <b>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</b></td>
                    <td class="col_2"> <b>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</b></td>
                    <td class="col_2"> <b>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</b></td>
                </tr>
                <tr>
                    <td class="col_1"> Implications </th>
                    <td class="col_2">La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas.</td>
                    <td class="col_2">Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement.</td>
                    <td class="col_2">La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper.</td>
                    <td class="col_2">L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité.</td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row['C4Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C4Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C4Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C4Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row['C4Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C4Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C4Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C4Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row['C4Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C4Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C4Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C4Q4_plan_action'] ?></td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr> Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row1['C4Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C4Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C4Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C4Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row1['C4Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C4Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C4Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C4Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row1['C4Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C4Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C4Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C4Q4_plan_action'] ?></td>
                </tr>
            </table>
        </div>
        <div class="block_titre_critere">
            <br><hr><hr>
            <h2>Le savoir faire</h2>
        </div>
        <div class="block_table">
            <table>
                <tr>
                    <td class="col_1"> Questions </td>
                    <td class="col_2"> <b> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </b></td>
                    <td class="col_2"> <b> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </b></td>
                    <td class="col_2"> <b> Le système à base d'IA rend-il des savoir-faire obsolètes ?</b> </td>
                    <td class="col_2"> <b> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </b></td>
                </tr>
                <tr>
                    <td class="col_1"> Implications </th>
                    <td class="col_2">Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. </td>
                    <td class="col_2">Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire.</td>
                    <td class="col_2"> Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation.</td>
                    <td class="col_2"> La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie.</td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row['C5Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C5Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C5Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C5Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row['C5Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C5Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C5Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C5Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row['C5Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C5Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C5Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C5Q4_plan_action'] ?></td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr> Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row1['C5Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C5Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C5Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C5Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row1['C5Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C5Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C5Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C5Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row1['C5Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C5Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C5Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C5Q4_plan_action'] ?></td>
                </tr>
            </table>
        </div>
        <div class="block_titre_critere">
            <br><hr><hr>
            <h2>Le responsabilité</h2>
        </div>
        <div class="block_table">
            <table>
                <tr>
                    <td class="col_1"> Questions </td>
                    <td class="col_2"> <b> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </b></td>
                    <td class="col_2"> <b> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </b></td>
                    <td class="col_2"> <b> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur? </b> </td>
                    <td class="col_2"> <b>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                            Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ?</b> </td>
                </tr>
                <tr>
                    <td class="col_1"> Implications </th>
                    <td class="col_2">L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble.</td>
                    <td class="col_2">Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer.</td>
                    <td class="col_2">Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action.</td>
                    <td class="col_2">La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain.</td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row['C6Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C6Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C6Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row['C6Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row['C6Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C6Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C6Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row['C6Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row['C6Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C6Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C6Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row['C6Q4_plan_action'] ?></td>
                </tr>
                <tr>
                    <td class="titre2" colspan="5" ><hr> Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                </tr>
                <tr>
                    <td class="col_1">Réponses </td>
                    <td class="col_2"><?php if ($row1['C6Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C6Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C6Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    <td class="col_2"><?php if ($row1['C6Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                </tr>
                <tr>
                    <td class="col_1">Interprétations </td>
                    <td class="col_2"><?php echo $row1['C6Q1_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C6Q2_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C6Q3_interpretation'] ?></td>
                    <td class="col_2"><?php echo $row1['C6Q4_interpretation'] ?></td>
                </tr>
                <tr>
                    <td class="col_1">Plans d'actions </td>
                    <td class="col_2"><?php echo $row1['C6Q1_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C6Q2_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C6Q3_plan_action'] ?></td>
                    <td class="col_2"><?php echo $row1['C6Q4_plan_action'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</section>

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
    <section>
        <div class="container">
            <div class="block_titre_critere">
                <br><hr><hr>
                <h2>La reconnaissance</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </b> </td>
                        <td class="col_2"> <b>  Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </b> </td>
                        <td class="col_2"> <b> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </b> </td>
                        <td class="col_2"> <b> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </tD>
                        <td class="col_2">Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</td>
                        <td class="col_2">Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </td>
                        <td class="col_2">Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</td>
                        <td class="col_2">L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C1Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C1Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C1Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C1Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C1Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C1Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C1Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row1['C1Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C1Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C1Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C1Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row1['C1Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C1Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C1Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C1Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row1['C1Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C1Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C1Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C1Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic3_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row2['C1Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C1Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C1Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C1Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row2['C1Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C1Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C1Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C1Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row2['C1Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C1Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C1Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C1Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre_critere">
                <br><hr><hr>
                <h2>Les relations humaines</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> La technologie introduit-elle une communication entre des machines ? </b> </td>
                        <td class="col_2"> <b> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </b> </td>
                        <td class="col_2"> <b> La technologie intervient-elle dans la communication entre plusieurs personnes ? </b> </td>
                        <td class="col_2"> <b> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </tD>
                        <td class="col_2">La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </td>
                        <td class="col_2">Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</td>
                        <td class="col_2">Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension. </td>
                        <td class="col_2">L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C2Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C2Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C2Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C2Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C2Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C2Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C2Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row1['C2Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C2Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C2Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C2Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row1['C2Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C2Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C2Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C2Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row1['C2Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C2Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C2Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C2Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic3_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row2['C2Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C2Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C2Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C2Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row2['C2Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C2Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C2Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C2Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row2['C2Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C2Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C2Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C2Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre_critere">
                <br><hr><hr>
                <h2>La surveillance</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b>Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ?</b> </td>
                        <td class="col_2"> <b>La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </b></td>
                        <td class="col_2"> <b>Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </b></td>
                        <td class="col_2"> <b>La finalité de l’utilisation des données est-elle transparente ?</b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </tD>
                        <td class="col_2">La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas.</td>
                        <td class="col_2">Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement.</td>
                        <td class="col_2">La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper.</td>
                        <td class="col_2">L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C3Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C3Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C3Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C3Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C3Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C3Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C3Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row1['C3Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C3Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C3Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C3Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row1['C3Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C3Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C3Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C3Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row1['C3Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C3Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C3Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C3Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic3_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row2['C3Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C3Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C3Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C3Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row2['C3Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C3Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C3Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C3Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row2['C3Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C3Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C3Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C3Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre_critere">
                <br><hr><hr>
                <h2>L'autonomie</h2>
            </div>
            <div class="block_table" >
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </b></td>
                        <td class="col_2"> <b>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</b></td>
                        <td class="col_2"> <b>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</b></td>
                        <td class="col_2"> <b>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</b></td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </td>
                        <td class="col_2">La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas.</td>
                        <td class="col_2">Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement.</td>
                        <td class="col_2">La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper.</td>
                        <td class="col_2">L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C4Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C4Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C4Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C4Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C4Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C4Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C4Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row1['C4Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C4Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C4Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C4Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row1['C4Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C4Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C4Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C4Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row1['C4Q1'] ?></td>
                        <td class="col_2"><?php echo $row1['C4Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C4Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C4Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic3_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row2['C4Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C4Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C4Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C4Q4'] == 0) {echo "<p style=color:red> Non </p>";} else {echo 'Oui';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row2['C4Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C4Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C4Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C4Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row2['C4Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C4Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C4Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C4Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre_critere">
                <br><hr><hr>
                <h2>Le savoir faire</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </b></td>
                        <td class="col_2"> <b> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </b></td>
                        <td class="col_2"> <b> Le système à base d'IA rend-il des savoir-faire obsolètes ?</b> </td>
                        <td class="col_2"> <b> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </b></td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </tD>
                        <td class="col_2">Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. </td>
                        <td class="col_2">Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire.</td>
                        <td class="col_2"> Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation.</td>
                        <td class="col_2"> La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C5Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C5Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C5Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C5Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C5Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C5Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C5Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row1['C5Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C5Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C5Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C5Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row1['C5Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C5Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C5Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C5Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row1['C5Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C5Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C5Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C5Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic3_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row2['C5Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C5Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C5Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C5Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row2['C5Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C5Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C5Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C5Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row2['C5Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C5Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C5Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C5Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="block_titre_critere">
                <br><hr><hr>
                <h2>Le responsabilité</h2>
            </div>
            <div class="block_table">
                <table>
                    <tr>
                        <td class="col_1"> Questions </td>
                        <td class="col_2"> <b> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </b></td>
                        <td class="col_2"> <b> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </b></td>
                        <td class="col_2"> <b> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur? </b> </td>
                        <td class="col_2"> <b>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
                                Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ?</b> </td>
                    </tr>
                    <tr>
                        <td class="col_1"> Implications </td>
                        <td class="col_2">L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble.</td>
                        <td class="col_2">Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer.</td>
                        <td class="col_2">Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action.</td>
                        <td class="col_2">La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain.</td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic1_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row['C6Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C6Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C6Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row['C6Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row['C6Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row['C6Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row['C6Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic2_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row1['C6Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C6Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C6Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row1['C6Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row1['C6Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C6Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C6Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row1['C6Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row1['C6Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C6Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C6Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row1['C6Q4_plan_action'] ?></td>
                    </tr>
                    <tr>
                        <td class="titre2" colspan="5" ><hr>Diagnostic <?php echo $diagnostic3_nom ?><hr></td>
                    </tr>
                    <tr>
                        <td class="col_1">Réponses </td>
                        <td class="col_2"><?php if ($row2['C6Q1'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C6Q2'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C6Q3'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                        <td class="col_2"><?php if ($row2['C6Q4'] == 0) {echo "<p style=color:red> Oui </p>";} else {echo 'Non';} ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Interprétations </td>
                        <td class="col_2"><?php echo $row2['C6Q1_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C6Q2_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C6Q3_interpretation'] ?></td>
                        <td class="col_2"><?php echo $row2['C6Q4_interpretation'] ?></td>
                    </tr>
                    <tr>
                        <td class="col_1">Plans d'actions </td>
                        <td class="col_2"><?php echo $row2['C6Q1_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C6Q2_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C6Q3_plan_action'] ?></td>
                        <td class="col_2"><?php echo $row2['C6Q4_plan_action'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <?php
}
?>
<section>
    <div class="bas">
        <br>
        <hr>
        <hr>
        <br>
        <br>
        <div class = "bouton">
            <button type="submit" value="Imprimer la page" onclick="window.print();" />Imprimer la page</button>
       </div>

        <form action="connexion.php">
            <button type="submit">Retour au tableau de bord </button>
        </form>
    </div>
</section>
</body>
</html>
