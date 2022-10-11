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
    <p>
        Pour débuter ce questionnaire, nous avons besoin d'informations préalables afin de comprendre votre système d'IA.
    </p>
    <form action="../Modele/verification_question_prequestionnaire.php" method="post" name="Fragilisation_Reconnaissance" target="_self">

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

    <?php
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1 || $err==2)
            echo "<p style='color:red'>Veuillez completer tous les champs </p>";
    }
    ?>

</body>
</html>