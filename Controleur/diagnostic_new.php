<!DOCTYPE html>
<?php include("../Modele/connexion_bdd.php"); ?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body background="../Medias/background_v2.jpg">
    <section>
        <div class="container">
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
                <h1 class="blanc">Nouveau Diagnostic</h1>
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
            </div>
            <div class ="block_page">
                <div class ="block_titre">
                    <p>Vous allez devoir r&eacute;pondre &agrave; 24 questions. Ces questions sont r&eacute;parties en 6 crit&egrave;res diff&eacute;rents.</p>
                </div>
                <div class ="block_form">
                <form action="../Modele/verification_nom_diagnostique.php" method="post" name="Fragilisation_Reconnaissance" target="_self">

                    <p>Entrez le nom de votre diagnostic :&nbsp;
                        <input maxlength="250" name="Nom_Diagnostic" type="text" />
                    </p>
                    <p>
                        <input name="Creation_Diagnostic" type="submit" value="Débuter le diagnostic" />
                    </p>
                </form>
            </div>
            <br>
            <div class="erreur">
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:#ffffff'>Veuillez rentrer un nom pour votre diagnostic </p>";
                    }
                    elseif($err==2){
                        echo "<p style='color:#ffffff'>Nom du diagnostic déjà existant, veuillez entrer un autre nom</p>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="bas">
            <br>
            <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
            <br>
        </div>
    </section>
</body>
</html>