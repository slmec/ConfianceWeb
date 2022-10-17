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
    <form action="../Modele/verification_nom_diagnostique.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
        <p>Vous allez devoir r&eacute;pondre &agrave; 24 questions. Ces questions sont r&eacute;parties en 6 crit&egrave;res diff&eacute;rents.</p>
        <p>Entrez le nom de votre diagnostic :&nbsp;
            <input maxlength="250" name="Nom_Diagnostic" type="text" />
        </p>
        <p>
            <input name="Creation_Diagnostic" type="submit" value="Débuter le diagnostic" />
        </p>
    </form>

    <?php
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1){
            echo "<p style='color:red'>Veuillez rentrer un nom pour votre diagnostic </p>";
        }
        elseif($err==2){
            echo "<p style='color:red'>Nom du diagnostic déjà existant, veuillez entrer un autre nom</p>";
        }
    }
    ?>

</body>
</html>