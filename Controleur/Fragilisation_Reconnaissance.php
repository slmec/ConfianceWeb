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


        $_SESSION['Contexte_casusage'] = $_POST['Contexte_casusage'];
        $_SESSION['Objectif_sia'] = $_POST['Objectif_sia'];
        $_SESSION['Fonctionnement_sia'] = $_POST['Fonctionnement_sia'];
        $_SESSION['Utilisation_sia'] = $_POST['Utilisation_sia'];
        $_SESSION['Maturite'] = $_POST['Maturite'];


    ?>
    
    <p>
        Le premier critère concerne la fragilisation de la reconnaissance.
    </p>
    <form action="Desengagement_Relationnel.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
        <p>Le système à base d'IA réduit-il la distinction entre les novices et les experts ?  &nbsp;Oui
            <input name="Oui_question1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_question1" type="checkbox" value = "1"/>
        </p>
        <p>Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? Oui 
            <input name="Oui_question2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question2" type="checkbox" value = "1"/>
        </p>
        <p>Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ?  Oui 
            <input name="Oui_question3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question3" type="checkbox" value = "1"/>
        </p>
        <p>L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur? Oui 
            <input name="Oui_question4" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_question4" type="checkbox" value = "1"/>
        </p>
        <input type="submit" value="Valider les réponses"> 
    </form>

    
</body>
</html>