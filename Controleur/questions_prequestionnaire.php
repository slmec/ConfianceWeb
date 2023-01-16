<!DOCTYPE html>
<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
    <body background="../Medias/background_v2.jpg">
        <?php $Nom_diagnostic = $_SESSION['Nom_diagnostic']; ?>
        <section>
            <div class="container">
                <!-- Barre de navigation !-->
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
                <div class="block_tableau">
                    <br><hr><br>
                </div>
                <div class="navbar_deux">
                    <a class="active" href="diagnostic_new.php"> Nouveau Diagnostic </a>
                    <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                    <a href="profil.php">Mon profil </a>
                    <a href="../Modele/deconnexion.php">Deconnexion</a>
                </div>
                <div class="block_tableau">
                    <br><hr><br>
                    <h1 class="blanc">Diagnostic <?= $Nom_diagnostic ?></h1>
                    <br><hr><br>
                </div>
                <!-- Corps de Page!-->
                <div class ="block_page">
                    <div class="block_form">
                        <!-- Formulaire du questionnaire!-->
                            <form action="../Modele/verification_question_prequestionnaire.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
                                <h4>Pour débuter ce questionnaire, nous avons besoin d'informations préalables afin de comprendre votre syst&egrave;me &agrave; base d&#39;IA.</h4>
                                <br>
                                <p>Dans quel contexte est utilis&eacute; le syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="SIA_contexte" type="text" /></p>
                                <p>Quel est l&#39;objectif du syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="SIA_objectif" type="text" /></p>
                                <p>Quelle est l'interaction entre l’homme et le syst&egrave;me &agrave; base d&#39;IA ?&nbsp;<input maxlength="500" name="SIA_fonctionnement" type="text" /></p>
                                <p>Par qui est-il utilis&eacute; ?&nbsp;<input maxlength="500" name="SIA_utilisation" type="text" /></p>
                                <p>Quelle est la maturit&eacute; actuelle de votre syst&egrave;me &agrave; base d&#39;IA ? :</p>
                                <br>
                                <table>
                                    <tr>
                                        <td>
                                            <p><input name="SIA_maturite" type="radio" value="Ideation" /> Id&eacute;ation: nous sommes en train de l&#39;imaginer</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><input name="SIA_maturite" type="radio" value="Conception" /> Conception: nous sommes en train de le concevoir</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><input name="SIA_maturite" type="radio" value="Experimentation" /> Experimentation: nous sommes en phase de tests aupr&egrave;s des utilisateurs finaux</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><input name="SIA_maturite" type="radio" value="Production" /> Production: la version industrielle du SIA est déployée</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><input name="SIA_maturite" type="radio" value="Autre" /> Autre</p>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <p><input name="Valider" type="submit" value="Valider" /></p>

                        </form>
                    </div>
                    <br>
                    <!-- Gestion des erreurs !-->
                    <div class="erreur">
                        <?php
                        if(isset($_GET['erreur'])){
                            $err = $_GET['erreur'];
                            if($err==1 || $err==2)
                                echo "<p style='color:#ffffff'>Veuillez completer tous les champs </p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Bas de page !-->
            <div class="bas">
                <br>
                <p>Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                <br>
            </div>
        </section>
    </body>
</html>