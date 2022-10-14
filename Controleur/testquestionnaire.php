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

<form action="../Modele/verification_questionnaire.php" method="post" name="Fragilisation_Reconnaissance" target="_self">

    <h1>La reconnaissance : </h1>
    <p>Le système à base d'IA réduit-il la distinction entre les novices et les experts ?
        Oui <input type="radio" name="C1Q1" value="0" checked>
        Non <input type="radio" name="C1Q1" value="1">  <br>
    </p>
    <p>Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées?
        Oui <input type="radio" name="C1Q2" value="0" checked>
        Non <input type="radio" name="C1Q2" value="1">  <br>
    </p>
    <p>Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ?
        Oui <input type="radio" name="C1Q3" value="0" checked>
        Non <input type="radio" name="C1Q3" value="1">  <br>
    </p>
    <p>L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ?
        Oui <input type="radio" name="C1Q4" value="0" checked>
        Non <input type="radio" name="C1Q4" value="1">  <br>
    </p>

    <h1>Les relations humaines : </h1>
    <p>La technologie introduit-elle une communication entre des machines ?
        Oui <input type="radio" name="C2Q1" value="0" checked>
        Non <input type="radio" name="C2Q1" value="1">  <br>
    </p>
    <p>La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ?
        Oui <input type="radio" name="C2Q2" value="0" checked>
        Non <input type="radio" name="C2Q2" value="1">  <br>
    </p>
    <p>La technologie intervient-elle dans la communication entre plusieurs personnes ?
        Oui <input type="radio" name="C2Q3" value="0" checked>
        Non <input type="radio" name="C2Q3" value="1">  <br>
    </p>
    <p>Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ?
        Oui <input type="radio" name="C2Q4" value="0" checked>
        Non <input type="radio" name="C2Q4" value="1">  <br>
    </p>

    <h1>La surveillance : </h1>
    <p>Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ?
        Oui <input type="radio" name="C3Q1" value="0" checked>
        Non <input type="radio" name="C3Q1" value="1">  <br>
    </p>
    <p>La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ?
        Oui <input type="radio" name="C3Q2" value="0" checked>
        Non <input type="radio" name="C3Q2" value="1">  <br>
    </p>
    <p>Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ?
        Oui <input type="radio" name="C3Q3" value="0" checked>
        Non <input type="radio" name="C3Q3" value="1">  <br>
    </p>
    <p>La finalité de l’utilisation des données est-elle transparente ?
        Oui <input type="radio" name="C3Q4" value="1" checked>
        Non <input type="radio" name="C3Q4" value="0">  <br>
    </p>

    <h1>L'autonomie : </h1>
    <p>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ?
        Oui <input type="radio" name="C4Q1" value="0" checked>
        Non <input type="radio" name="C4Q1" value="1">  <br>
    </p>
    <p>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?
        Oui <input type="radio" name="C4Q2" value="0" checked>
        Non <input type="radio" name="C4Q2" value="1">  <br>
    </p>
    <p>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?
        Oui <input type="radio" name="C4Q3" value="0" checked>
        Non <input type="radio" name="C4Q3" value="1">  <br>
    </p>
    <p>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?
        Oui <input type="radio" name="C4Q4" value="1" checked>
        Non <input type="radio" name="C4Q4" value="0">  <br>
    </p>

    <h1>Le savoir-faire : </h1>
    <p>Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine?
        Oui <input type="radio" name="C5Q1" value="0" checked>
        Non <input type="radio" name="C5Q1" value="1">  <br>
    </p>
    <p>La technologie rend-elle l'activité plus facile à réaliser par tout un chacun?
        Oui <input type="radio" name="C5Q2" value="0" checked>
        Non <input type="radio" name="C5Q2" value="1">  <br>
    </p>
    <p>Le système à base d'IA rend-il des savoir-faire obsolètes ?
        Oui <input type="radio" name="C5Q3" value="0" checked>
        Non <input type="radio" name="C5Q3" value="1">  <br>
    </p>
    <p>Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur?
        Oui <input type="radio" name="C5Q4" value="0" checked>
        Non <input type="radio" name="C5Q4" value="1">  <br>
    </p>

    <h1>La responsabilité : </h1>
    <p>L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?
        Oui <input type="radio" name="C6Q1" value="0" checked>
        Non <input type="radio" name="C6Q1" value="1">  <br>
    </p>
    <p>Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ?   Oui
        Oui <input type="radio" name="C6Q2" value="0" checked>
        Non <input type="radio" name="C6Q2" value="1">  <br>
    </p>
    <p>Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?   Oui
        Oui <input type="radio" name="C6Q3" value="0" checked>
        Non <input type="radio" name="C6Q3" value="1">  <br>
    </p>
    <p>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités? Oui
        Oui <input type="radio" name="C6Q4" value="0" checked>
        Non <input type="radio" name="C6Q4" value="1">  <br>
    </p>

    <input type="submit" value="Valider les réponses">

</form>

<?php
if(isset($_GET['erreur'])){
    $err = $_GET['erreur'];
    if($err==1 || $err==2)
        echo "<p style='color:red'>Veuillez completer tous les champs </p>";
}
?>


</body>
</html>
