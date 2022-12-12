<!DOCTYPE html>
<?php include("../Modele/connexion_bdd.php"); ?>
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
                <a class="active"  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/accueil.php">Accueil</a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
            </nav>
        </header>
    </div>

    <p>&nbsp;</p>

    <p>Vous n&#39;&ecirc;tes pas encore inscrit ? <a href="inscription.php">Inscrivez-vous</a></p>

    <p>&nbsp;</p>

    <p>Vous souhaitez proc&eacute;der au test sans laisser de trace ? <a href="testquestionnaire_sansid.php">Cliquez-ici</a></p>


    <p>Vous ne souhaitez plus r&eacute;aliser le diagnostic ? <a href="../index.php">Retourner &agrave; l&#39;accueil</a></p>
    <div class="bas">
        <br>
        <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
        <br>
    </div>
</section>
</body>
</html>
