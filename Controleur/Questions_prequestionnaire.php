<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body>
<?php $Nom_Diagnostic = $_SESSION['Nom_Diagnostic']; ?>
<section>
    <div class="container">
        <header>
            <nav class="navbar">
                <a href="../index.php" target="_blank" > MAIAT </a>
                <a href="inscription.php">Inscription</a>
                <a class="active" href="identification.php">Connexion</a>
                <a href="testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
            </nav>
        </header>
        <div class="block_tableau">
            <br><hr><br>
        </div>
        <nav class="navbar">
            <a class="active" href="diagnostic_new.php"> Nouveau Diagnostic </a>
            <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
            <a href="profil.php">Mon profil </a>
            <a href="../Modele/deconnexion.php">Deconnexion</a>
        </nav>
        <div class="block_tableau">
            <br><hr><br>
            <h1 class="blanc">Diagnostic <?php echo $Nom_Diagnostic ?></h1>
            <br><hr><br>
        </div>
    </div>
    <div class ="block_page">
        <div class="block_form">
                <form action="../Modele/verification_question_prequestionnaire.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
                    <h4>Pour débuter ce questionnaire, nous avons besoin d'informations préalables afin de comprendre votre syst&egrave;me &agrave; base d&#39;IA.</h4>
                    <br>
                    <p>Dans quel contexte est utilis&eacute; le syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="Contexte_casusage" type="text" /></p>
                    <p>Quel est l&#39;objectif du syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="Objectif_sia" type="text" /></p>
                    <p>Quelle est l'interaction entre l’homme et le syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="Fonctionnement_sia" type="text" /></p>
                    <p>Par qui est-il utilis&eacute; ?&nbsp;<input maxlength="500" name="Utilisation_sia" type="text" /></p>
                    <p>Quelle est la maturit&eacute; actuelle de votre syst&egrave;me &agrave; base d&#39;IA ? :</p>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <p><input name="Maturite" type="radio" value="Ideation" /> Id&eacute;ation: nous sommes en train de l&#39;imaginer</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><input name="Maturite" type="radio" value="Conception" /> Conception: nous sommes en train de le concevoir</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><input name="Maturite" type="radio" value="Experimentation" /> Experimentation: nous sommes en phase de tests aupr&egrave;s des utilisateurs finaux</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><input name="Maturite" type="radio" value="Production" /> Production: la version industrielle du SIA est déployée</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><input name="Maturite" type="radio" value="Autre" /> Autre</p>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <p><input name="Valider" type="submit" value="Valider" /></p>

            </form>
        </div>
        <br>
        <div class="erreur">
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:#ffffff'>Veuillez completer tous les champs </p>";
            }
            ?>
        </div>
</section>
<footer>
    <br>
    <p>Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
    <br>
</footer>
</body>
</html>