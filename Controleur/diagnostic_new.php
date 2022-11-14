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
<section>
    <div class="container">
        <header>
            <nav class="navbar">
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
            </nav>
        </header>
        <div class="block_tableau">
            <br><hr><br>
            <h1 class="blanc">Nouveau Diagnostic</h1>
            <br><hr><br>
        </div>
        <nav class="navbar">
            <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php"> Nouveau Diagnostic </a>
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php">Consulter mes diagnostics</a>
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php">Mon profil </a>
            <a href="../Modele/deconnexion.php">Deconnexion</a>
        </nav>
        <div class="block_tableau">
            <br><hr><br>
        </div>
    </div>
    <div class ="block_page">
        <div class ="block_titre">
            <p>Vous allez devoir r&eacute;pondre &agrave; 24 questions. Ces questions sont r&eacute;parties en 6 crit&egrave;res diff&eacute;rents.</p>
            <br>
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
</section>
<div class="bas">
    <br>
    <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
    <br>
</div>
</body>
</html>