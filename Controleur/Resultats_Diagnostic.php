<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title></title>
</head>
<body onload="init();">
    <?php
    $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
    mysqli_select_db($link, "Confiance" );
        if ( ! $link ) die( "Impossible de se connecter à MySQL" );
    
   //Test pour savoir si la variable reçu des cases à cocher existent ou non, et addition pour la note critère
   $i = 1;
   $a = 0;
   while ($i <= 4) {
        if (isset($_POST['Oui_question'.$i])){
            $Oui[$i] = intval($_POST['Oui_question'.$i]);
            $a = $a + $Oui[$i];
            $i++;
        }
        else {
            unset($_POST['Oui_question'.$i]);
            $i++;
        }
    }
    $o = 1;
    $b = 0;
    while ($o <= 4) {
        if (isset($_POST['Non_question'.$o])){
            $Non[$o] = intval($_POST['Non_question'.$o]);
            $b = $b + $Non[$o];
            $o++;
        }
        else {
            unset($_POST['Non_question'.$o]);
            $o++;
        }
        }

    //Intégration de la note du critère dans la BDD - UNE SEULE FOIS EN DERNIER FICHIER
    $_SESSION['critere_Deresponsabilite'] = $a + $b;
    $critere1 = $_SESSION['critere_fragilisation_reconnaissance'];
    $critere2 = $_SESSION['critere_Desengagement_Relationnel'];
    $critere3 = $_SESSION['critere_Surveillance'];
    $critere4 = $_SESSION['critere_Perte_Autonomie'];
    $critere5 = $_SESSION['critere_Sentiment_Depossession'];
    $critere6 = $_SESSION['critere_Deresponsabilite'];
    $Contexte_casusage = $_SESSION['Contexte_casusage'];
    $Objectif_sia = $_SESSION['Objectif_sia'];
    $Fonctionnement_sia = $_SESSION['Fonctionnement_sia'];
    $Utilisation_sia = $_SESSION['Utilisation_sia'];
    $Maturite = $_SESSION['Maturite'];

    $requete = "INSERT INTO Criteres VALUES ('','".$critere1."','".$critere2."','".$critere3."','".$critere4."','".$critere5."','".$critere6."','".$Contexte_casusage."','".$Objectif_sia."','".$Fonctionnement_sia."','".$Utilisation_sia."','".$Maturite."')";
    $resultat = mysqli_query($link,$requete);
    $_SESSION['id_critere'] = mysqli_insert_id($link);


    /*$critere_Desengagement_Relationnel = $_SESSION['critere_Desengagement_Relationnel'];
    $id_critere = $_SESSION['id_critere'];
    $requete = "INSERT INTO Criteres WHERE id_critere = '$id_critere' VALUES ('','','".$critere_Desengagement_Relationnel."','','','','')";
    $resultat = mysqli_query($link,$requete);*/

    /*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
    $resultat2 = mysqli_query($link,$requete2);*/
    ?>

    <p> Diagnostique " <?php echo $_SESSION['Nom_Diagnostic']?> " de <?php echo $_SESSION['nom'] ?> <?php echo $_SESSION['prenom'] ?> : </p>
    <p> La fragilisation de la reconnaissance : <?php echo $_SESSION['critere_fragilisation_reconnaissance']?> /4 </p>
    <p> Le desengagement relationnel  : <?php echo $_SESSION['critere_Desengagement_Relationnel']?> /4 </p>
    <p> La surveillance : <?php echo $_SESSION['critere_Surveillance']?> /4 </p>
    <p> La perte d'autonomie : <?php echo $_SESSION['critere_Perte_Autonomie']?> /4 </p>
    <p> Le sentiment de depossesion : <?php echo $_SESSION['critere_Sentiment_Depossession']?> /4 </p>
    <p> La deresponsabilisation : <?php echo $_SESSION['critere_Deresponsabilite']?> /4 </p>


    <canvas id="myChart"></canvas>
    <script>
        function init () {
            let tableau = new Array();
            // when a message is received from the page code
            window.onmessage = (event) => {
                if (event.data) {
                var donnees = event.data;
                tableau = JSON.parse("[" + donnees + "]");
                graphique(tableau);
                }
        }
        function graphique(){
            
        const data = {
        labels:[
            'Autonomie',
            'Deresponsabilisation',
            'Relations',
            'Reconnaissance',
            'Surveillance',
            'Depossession'
        ],
        datasets: [{
            label: 'Mon diagnostic',
            data: tableau,
            fill: true,
            backgroundColor: 'rgba(255, 160, 2, 0.2)',
            borderColor: 'rgb(255, 160, 2)',
            pointBackgroundColor: 'rgb(255, 160, 2)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 160, 2)'
            }, {
            label: 'Moyenne',
            data: [2, 2, 2, 2, 2, 2],
            fill: true,
            backgroundColor: 'rgba(77, 165, 218, 0.2)',
            borderColor: 'rgb(77, 165, 218)',
            pointBackgroundColor: 'rgb(77, 165, 218)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(77, 165, 218)'
            }]
        };

        const config = {
            type: 'radar',
            data: data,
            options: {
                elements: {
                line: {
                    borderWidth: 3
                }
                }
            },
        };
        let options = {
            scales: {
                r: {
                    angleLines: {
                        display: false
                    },
                    suggestedMin: 0,
                    suggestedMax: 100
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        }
        }
</script>


</body>
</html>