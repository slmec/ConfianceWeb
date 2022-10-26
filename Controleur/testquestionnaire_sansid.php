<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/salome.css" />
</head>

<body>
<section>
    <div class="container">
        <header>
            <nav class="navbar">
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/acceuil.php">Accueil</a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
            </nav>
        </header>
    </div>
<br>
    <br>
<form action="../Modele/verification_questionnaire_sansid.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
    <p>Entrez le nom de votre diagnostic :&nbsp;
        <input maxlength="250" name="Nom_Diagnostic" type="text" />
    </p>
    <h1>La reconnaissance : </h1>
    <table>
        <tr>
            <td>Le système à base d'IA réduit-il la distinction entre les novices et les experts ?</td>
            <td>Oui <input type="radio" name="C1Q1" value="0" checked> </td>
            <td>Non <input type="radio" name="C1Q1" value="1">  </td>
        </tr>
        <tr>
            <td>Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées?</td>
            <td>Oui <input type="radio" name="C1Q2" value="0" checked></td>
            <td>Non <input type="radio" name="C1Q2" value="1"></td>
        </tr>
        <tr>
            <td>Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ?</td>
            <td>Oui <input type="radio" name="C1Q3" value="0" checked></td>
            <td>Non <input type="radio" name="C1Q3" value="1">  </td>
        </tr>
        <tr>
            <td>L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ?</td>
            <td>Oui <input type="radio" name="C1Q4" value="0" checked></td>
            <td>Non <input type="radio" name="C1Q4" value="1">  </td>
        </tr>
    </table>

    <h1>Les relations humaines : </h1>
    <table>
        <tr>
            <td>La technologie introduit-elle une communication entre des machines ?</td>
            <td>Oui <input type="radio" name="C2Q1" value="0" checked></td>
            <td>Non <input type="radio" name="C2Q1" value="1">  <br></td>
        </tr>
        <tr>
            <td>La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ?</td>
            <td>Oui <input type="radio" name="C2Q2" value="0" checked></td>
            <td>Non <input type="radio" name="C2Q2" value="1">  <br></td>
        </tr>
        <tr>
            <td>La technologie intervient-elle dans la communication entre plusieurs personnes ?</td>
            <td>Oui <input type="radio" name="C2Q3" value="0" checked></td>
            <td> Non <input type="radio" name="C2Q3" value="1"></td>
        </tr>
        <tr>
            <td>Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ?</td>
            <td>Oui <input type="radio" name="C2Q4" value="0" checked></td>
            <td>Non <input type="radio" name="C2Q4" value="1"> </td>
        </tr>
    </table>

    <h1>La surveillance : </h1>
    <table>
        <tr>
            <td>Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ?</td>
            <td>Oui <input type="radio" name="C3Q1" value="0" checked></td>
            <td>Non <input type="radio" name="C3Q1" value="1"></td>
        </tr>
        <tr>
            <td>La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ?</td>
            <td>Oui <input type="radio" name="C3Q2" value="0" checked></td>
            <td>Non <input type="radio" name="C3Q23" value="1"></td>
        </tr>
        <tr>
            <td>Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ?</td>
            <td>Oui <input type="radio" name="C3Q3" value="0" checked></td>
            <td>Non <input type="radio" name="C3Q3" value="1"></td>
        </tr>
        <tr>
            <td>La finalité de l’utilisation des données est-elle transparente ?</td>
            <td>Oui <input type="radio" name="C3Q4" value="1" checked></td>
            <td>Non <input type="radio" name="C3Q4" value="0"></td>
        </tr>
    </table>

    <h1>L'autonomie : </h1>
    <table>
        <tr>
            <td>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ?</td>
            <td>Oui <input type="radio" name="C4Q1" value="0" checked></td>
            <td>Non <input type="radio" name="C4Q1" value="1"> </td>
        </tr>
        <tr>
            <td>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</td>
            <td>Oui <input type="radio" name="C4Q2" value="0" checked></td>
            <td>Non <input type="radio" name="C4Q2" value="1"> </td>
        </tr>
        <tr>
            <td>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</td>
            <td>Oui <input type="radio" name="C4Q3" value="0" checked></td>
            <td>Non <input type="radio" name="C4Q3" value="1"> </td>
        </tr>
        <tr>
            <td>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</td>
            <td>Oui <input type="radio" name="C4Q4" value="1" checked></td>
            <td>Non <input type="radio" name="C4Q4" value="0"></td>
        </tr>
    </table>

    <h1>Le savoir-faire : </h1>
    <table>
        <tr>
            <td>Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ?</td>
            <td>Oui <input type="radio" name="C5Q1" value="0" checked></td>
            <td>Non <input type="radio" name="C5Q1" value="1"></td>
        </tr>
        <tr>
            <td>La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ?</td>
            <td>Oui <input type="radio" name="C5Q2" value="0" checked></td>
            <td>Non <input type="radio" name="C5Q2" value="1"></td>
        </tr>
        <tr>
            <td>Le système à base d'IA rend-il des savoir-faire obsolètes ?</td>
            <td>Oui <input type="radio" name="C5Q3" value="0" checked></td>
            <td>Non <input type="radio" name="C5Q3" value="1"></td>
        </tr>
        <tr>
            <td>Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur?</td>
            <td>Oui <input type="radio" name="C5Q4" value="1" checked></td>
            <td>Non <input type="radio" name="C5Q4" value="0"></td>
        </tr>
    </table>

    <h1>La responsabilité : </h1>
    <table>
        <tr>
            <td>L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?</td>
            <td>Oui <input type="radio" name="C6Q1" value="0" checked></td>
            <td>Non <input type="radio" name="C6Q1" value="1"></td>
        </tr>
        <tr>
            <td>Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ?</td>
            <td>Oui <input type="radio" name="C6Q2" value="0" checked></td>
            <td>Non <input type="radio" name="C6Q2" value="1"></td>
        </tr>
        <tr>
            <td>Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur ?</td>
            <td>Oui <input type="radio" name="C6Q3" value="0" checked></td>
            <td>Non <input type="radio" name="C6Q3" value="1"></td>
        </tr>
        <tr>
            <td>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?</td>
            <td>Oui <input type="radio" name="C6Q4" value="1" checked></td>
            <td>Non <input type="radio" name="C6Q4" value="0"></td>
        </tr>
    </table>
     <input type="submit" value="Valider les réponses">

</form>

<?php
if(isset($_GET['erreur'])){
    $err = $_GET['erreur'];
    if($err==1 || $err==2)
        echo "<p style='color:red'>Veuillez completer tous les champs </p>";
}
?>

</section>
</body>
</html>

