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
    
    //Mettre Nom diagnostic dans la base de données
    $id_diagnostic = $_SESSION['id_diagnostic'];
    
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
    
    //Intégration de la note du critère dans la BDD
    $_SESSION['critere_fragilisation_reconnaissance'] = $a + $b;
   // $critere_fragilisation_reconnaissance = $_SESSION['critere_fragilisation_reconnaissance'];
   /* $requete = "INSERT INTO Criteres VALUES ('','".$critere_fragilisation_reconnaissance."','','','','','')";
    $resultat = mysqli_query($link,$requete);
    $_SESSION['id_critere'] = mysqli_insert_id($link);
    $id_critere = $_SESSION['id_critere'];
*/
    /*$requete2 = "INSERT INTO Exploiter VALUES ('','".$id_critere."')";
    $resultat2 = mysqli_query($link,$requete2);*/
    ?>
    <p>
        Le deuxième critère concerne le désengagement relationnel.
    </p>
    <form action="../Surveillance.php" method="post" name="Desengagement_Relationnel" target="_self">
        <p>La technologie introduit-elle une communication entre des machines ? &nbsp;Oui
            <input name="Oui_question1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_question1" type="checkbox" value = "1"/>
        </p>
        <p>La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes?  Oui 
            <input name="Oui_question2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question2" type="checkbox" value = "1"/>
        </p>
        <p>La technologie intervient-elle dans la communication entre plusieurs personnes?   Oui 
            <input name="Oui_question3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question3" type="checkbox" value = "1"/>
        </p>
        <p>Le  système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? Oui 
            <input name="Oui_question4" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question4" type="checkbox" value = "1"/>
        </p>
        <input type="submit" value="Valider les réponses"> 
    </form>
</body>
</html>