<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body onload="init();">
<section>
    <div class="block_entete">
        <div class="container">
            <header>
                <nav class="navbar">
                    <a href="../index.php" target="_blank" > MAIAT </a>
                    <a href="inscription.php">Inscription</a>
                    <a  href="identification.php">Connexion</a>
                    <a href="testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                    <a class="active" href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                </nav>
            </header>
        </div>
    </div>
    <div class ="block_page">
        <div class ="block_titre">
            <h1>Diagnostic hors ligne</h1>
            <br>
        </div>

        <!--<div class ="block_form">
            <form action="" >
                <p>Vous avez choisit de ne pas r&eacute;aliser le test via notre outil en ligne.</p>
                <p>Pour ce faire vous devez faire la demande par mail sur le mail suivant : <strong>yann.ferguson@icam.fr</strong></p>
                <p>Par la suite, vous recevrez dans les meilleurs d&eacute;lais <strong>un fichier excel</strong>.</p>
                 <a href="../Medias/MAIAT (3).xlsm" download > Telecharger</a>
                <p>Celle-ci est une version hors-ligne de l&#39;outil de mesure d&#39;acceptabilit&eacute; sociale de l&#39;IA au travail.&nbsp;</p>
            </form>
        </div>-->
        <div class="block_form">
            <form action="" >
                <p>Vous avez choisit de ne pas réaliser le test via notre outil en ligne.</p>
                <p>Pour ce faire vous devez télécharger sur votre ordinateur le fichier Excel ci-dessous : </p>
                <p>Il y a deux versions, une presentation <a href="../Medias/MAIAT_Horizontal.xlsm" download > horizontale</a> et une presentation <a href="../Medias/MAIAT_Vertical.xlsm" download > verticale</a> </p>
                <p>Vous avez juste à choisir la presentation la plus adaptée à votre utilisation.</p>
                <br>
                <p>Une fois le téléchargement effectué, il faut ouvrir le fichier sous Excel. </p>
                <p>A l'ouverture, il faudra enlever le mode protégé en activant la modification du fichier.</p>
                <p>Si le bandeau rouge, sur l'image ci-dessous, est present, je vous invite à suivre les étapes suivantes.   </p>
                <br>
                <figure role="figure" aria-label="Erreur">
                    <img src="../Medias/rouge.png">
                    <figcaption>
                        Message d'erreur indicant que les macros du fichiers sont bloquées
                    </figcaption>
                </figure>
                <br>
                <p> - fermer le fichier Excel</p>
            </form>

        </div>
        <div class="bas">
            <br>
            <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
            <br>
        </div>
</section>
</body>

