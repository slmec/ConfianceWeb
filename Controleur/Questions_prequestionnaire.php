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

    $_SESSION['Nom_Diagnostic'] = $_POST['Nom_Diagnostic'];
    $Nom_Diagnostic = $_SESSION['Nom_Diagnostic'];

    if($_SESSION['Nom_Diagnostic'] !== "" ) {
        //On insère le nom du diagnostic dans la table diagnostic
        $requete = "INSERT INTO Diagnostics VALUES ('','$Nom_Diagnostic')";
        $resultat = mysqli_query($link, $requete);

        //On creer la variable session de l'id
        $requete2 = "SELECT Id_diagnostic FROM Diagnostics WHERE Nom = '$Nom_Diagnostic'";
        $resultat2 = mysqli_query($link, $requete2);
        $row = mysqli_fetch_assoc($resultat2);
        $_SESSION['id_diagnostic'] = $row['Id_diagnostic'];
    }
    else
    {
       header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php?erreur=1'); // nom du diagnostique vide
    }

    ?>
    
    <p>
        Pour débuter ce questionnaire, nous avons besoin d'informations préalables afin de comprendre votre système d'IA.
    </p>
    <form action="Fragilisation_Reconnaissance.php" method="post" name="Fragilisation_Reconnaissance" target="_self">

        <p>Dans quel contexte est utilis&eacute; le syst&egrave;me d&#39;IA ?&nbsp;<input maxlength="500" name="Contexte_casusage" type="text" /></p>

        <p>Quel est l&#39;objectif du syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="Objectif_sia" type="text" /></p>

        <p>Comment ce syst&egrave;me d&#39;IA fonctionne-t-il ?&nbsp;<input maxlength="500" name="Fonctionnement_sia" type="text" /></p>

        <p>Par qui est-il utilis&eacute; ?&nbsp;<input maxlength="500" name="Utilisation_sia" type="text" /></p>

        <p>Quelle est la maturit&eacute; actuelle de votre syst&egrave;me d&#39;IA ? :</p>

        <p><input name="Maturite" type="radio" value="Ideation" />Id&eacute;ation: nous sommes en train de l&#39;imaginer</p>

        <p><input name="Maturite" type="radio" value="Conception" />Conception: nous sommes en train de le concevoir</p>

        <p><input name="Maturite" type="radio" value="Experimentation" />Experimentation: nous sommes en phase de tests aupr&egrave;s des utilisateurs finaux</p>

        <p><input name="Maturite" type="radio" value="REX" />Retours d&#39;exp&eacute;rience: nous analysons les tests</p>

        <p><input name="Maturite" type="radio" value="Production" />Production: nous concevons la version industrielle du SIA pour la d&eacute;ployer</p>

        <p><input name="Maturite" type="radio" value="Autre" />Autre</p>

        <p><input name="Valider" type="submit" value="Valider" /></p>
</form>

</body>
</html>