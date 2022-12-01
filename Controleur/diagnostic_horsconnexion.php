<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body background="../Medias/background_v2.jpg">
<section>
    <div class="block_entete">
        <div class="container">
            <header>
                <nav class="navbar">
                    <a href="../index.php" target="_blank" > MAIAT </a>
                    <a href="inscription.php">Inscription</a>
                    <a  href="identification.php">Connexion</a>
                    <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
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
                <p>Ce mode vous permet de réaliser un diagnostic sans stockage de données et sans connexion grâce à un fichier Excel.</p>
                <p>Pour se faire, nous vous invitons à <span class="gras">télécharger le format Excel de MAIAT</span> en cliquant sur l’un des boutons suivants : </p>
                <br>
                <div class="bouton_telechargement">
                    <a href="../Medias/MAIAT_Horizontal.xlsm" class="tableur" download >Tableur MAIAT horizontal (adapté aux écrans supérieurs 17'')</a>
                    <a href="../Medias/MAIAT_Vertical.xlsm" class="tableur" download >Tableur MAIAT vertical (adapté aux ordinateurs portables)</a>
                </div>
                <br>
                <p>Attention, le fichier comporte des « macros » permettant de générer des diagnostics. Par conséquent, il risque de présenter ce bandeau : </p>
                <br>
                <figure role="figure" aria-label="Erreur">
                    <img src="../Medias/rouge.png" width="600" height="24">
                </figure>
                <br>
                <p> Dès lors que vous téléchargerez le fichier depuis notre serveur, nous vous garantissons sa sécurité. Pour déverrouiller les macros, il vous faudra : </p>
                <p> 1 - Fermer le fichier Excel</p>
                <p> 2 - Ouvrez l’Explorateur de fichiers Windows, puis accédez au dossier dans lequel vous avez enregistré le fichier.</p>
                <p> 3 - Cliquez avec le bouton droit sur le fichier, puis sélectionnez "Propriétés" dans le menu contextuel.</p>
                <p> 4 - En bas de l’onglet Général, cochez la case Débloquer et sélectionnez OK. </p>
                <p> 5 - Ouvrer votre fichier</p>
                <br>
                <p> Bonne utilisation de MAIAT ! </p>
            </form>

        </div>
        <div class="bas">
            <br>
            <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
            <br>
        </div>
    </div>
</section>
</body>

