<!DOCTYPE html>
<?php include("../Modele/connexion_bdd.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MAIAT</title>
        <link rel="stylesheet" href="../Vue/style_guide.css" />
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
                            <a href="../index.php">Accueil</a>
                            <a href="critere.php">Base théorique</a>
                            <a class="active" href="guide.php">Fonctionnement</a>
                            <a href="projet.php">Equipes et partenaires</a>
                            <a href="identification.php" target="_blank">Accès à l'outil</a>
                        </nav>
                    </div>
                    <div class="right">
                        <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150"></a>
                    </div>
                </header>
                <div class="guide">
                    <h1>Présentation de MAIAT</h1>
                    <br>
                    <h3>Analyse par questionnaire</h3>
                    <br>
                    <div class="block_questionnaire">
                        <img class="img_questionnaire" src="../Medias/img_questionnaire.png">
                        <p>L’analyse se veut rapide et accessible à tous, sans prérequis théorique. Vous serez ainsi invités à répondre à un questionnaire de 24 questions.</p>
                    </div>
                    <br>
                    <br>
                    <h3>Diagnostic</h3>
                    <br>
                    <p>Le diagnostic se décompose en deux parties : </p>
                    <br>
                    <div class="image_guide">
                        <div class="image_guide_left">
                            <img src="../Medias/img_radar.png" width=400 height=301.6>
                            <p>Le radar vous permet d’avoir une vision globale de votre diagnostic. Les axes dont le score tend vers 0 sont considérés comme potentiellement les plus à risque. </p>
                        </div>
                        <div class="image_guide_right">
                            <img src="../Medias/img_compterendu.png" width=400 height=353>
                            <p>Suite à cela, une analyse détaillée par critère vous permet de donner du sens aux différents risques. Les points critiques sont signalés par la police rouge et le panneaux « Warning ». Les champs « Interprétations » et « Plans d’actions » permettent de vous approprier le diagnostic.</p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h3>Comparaison des diagnostics</h3>
                    <br>
                    <img class="img_radar2" src="../Medias/img_radar2.png">
                    <p>Votre compte MAIAT vous permettra de comparer vos différents diagnostics afin de vous aider à prendre du recul et vous construire des repères sur ce qui peut impacter les différents critères de risques.</p>
                    <br>
                    <h3>Différentes options de connexion</h3>
                    <br>
                    <img class="img_comparaison_diagnostics" src="../Medias/img_comparaison_diagnostics.png">
                    <p>Le site MAIAT est sécurisé afin de répondre aux besoins et exigences des partenaires industriels. Nous avons cependant conçu trois
                    expériences afin de permettre à tout à chacun d’accéder à MAIAT, quelle que soit la politique de gestion des données de l’entreprise.
                    A minima, l’option hors ligne vous permettra de télécharger un fichier Excel afin d’éviter de faire transiter des informations sur le site.</p>
                <br>
                <div class="bas">
                    <p>Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                </div>
            </div>
        </section>
    </body>
</html>