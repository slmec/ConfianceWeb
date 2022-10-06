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
    $_SESSION['critere_Sentiment_Depossession'] = $a + $b;
    /*$critere_Desengagement_Relationnel = $_SESSION['critere_Desengagement_Relationnel'];
    $id_critere = $_SESSION['id_critere'];
    $requete = "INSERT INTO Criteres WHERE id_critere = '$id_critere' VALUES ('','','".$critere_Desengagement_Relationnel."','','','','')";
    $resultat = mysqli_query($link,$requete);*/

    /*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
    $resultat2 = mysqli_query($link,$requete2);*/
    ?>
    
    <p>
        Le sixième critère concerne la déresponsabilité.
    </p>
    <form action="Resultats_Diagnostic.php" method="post" name="Deresponsabilite" target="_self">
        <p>L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  &nbsp;Oui
            <input name="Oui_question1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_question1" type="checkbox" value = "1"/>
        </p>
        <p>Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ?   Oui 
            <input name="Oui_question2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question2" type="checkbox" value = "1"/>
        </p>
        <p>Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?   Oui 
            <input name="Oui_question3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question3" type="checkbox" value = "1"/>
        </p>
        <p>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités? Oui 
            <input name="Oui_question4" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question4" type="checkbox" value = "1"/>
        </p>
        <input type="submit" value="Valider les réponses"> 
    </form>
</body>
</html>