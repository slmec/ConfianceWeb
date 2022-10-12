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

    <h1>Le premier critère concerne la fragilisation de la reconnaissance.</h1>
    <p>Le système à base d'IA réduit-il la distinction entre les novices et les experts ?  &nbsp;
        Oui <input type="radio" name="C1Q1" value="0" checked>
        Non <input type="radio" name="C1Q1" value="1">  <br>
    </p>
    <p>Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? Oui
        Oui <input type="radio" name="C1Q2" value="0" checked>
        Non <input type="radio" name="C1Q2" value="1">  <br>
    </p>
    <p>Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ?  Oui
        Oui <input type="radio" name="C1Q3" value="0" checked>
        Non <input type="radio" name="C1Q3" value="1">  <br>
    </p>
    <p>L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur? Oui
        Oui <input type="radio" name="C1Q1" value="0" checked>
        Non <input type="radio" name="C1Q1" value="1">  <br>
    </p>

    <h1>Le deuxième critère concerne le désengagement relationnel. </h1>
    <p>La technologie introduit-elle une communication entre des machines ? &nbsp;Oui
        <input name="Oui_C2Q1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_C2Q1" type="checkbox" value = "1"/>
    </p>
    <p>La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes?  Oui
        <input name="Oui_C2Q2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C2Q2" type="checkbox" value = "1"/>
    </p>
    <p>La technologie intervient-elle dans la communication entre plusieurs personnes?   Oui
        <input name="Oui_C2Q3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C2Q3" type="checkbox" value = "1"/>
    </p>
    <p>Le  système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? Oui
        <input name="Oui_C2Q4" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C2Q4" type="checkbox" value = "1"/>
    </p>

    <h1>Le troisième critère concerne la surveillance.</h1>
    <p>Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? &nbsp;Oui
        <input name="Oui_C3Q1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_C3Q1" type="checkbox" value = "1"/>
    </p>
    <p>La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ?   Oui
        <input name="Oui_C3Q2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C3Q2" type="checkbox" value = "1"/>
    </p>
    <p>Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ?  Oui
        <input name="Oui_C3Q3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C3Q3" type="checkbox" value = "1"/>
    </p>
    <p>La finalité de l’utilisation des données est-elle transparente ? Oui
        <input name="Oui_C3Q4" type="checkbox" value = "1"/>&nbsp;Non <input name="Non_C3Q4" type="checkbox" value = "0"/>
    </p>

    <h1>Le quatrième critère concerne la perte d'autonomie.</h1>
    <p>Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? &nbsp;Oui
        <input name="Oui_C4Q1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_C4Q1" type="checkbox" value = "1"/>
    </p>
    <p>Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?   Oui
        <input name="Oui_C4Q2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C4Q2" type="checkbox" value = "1"/>
    </p>
    <p>Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?  Oui
        <input name="Oui_C4Q3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C4Q3" type="checkbox" value = "1"/>
    </p>
    <p>Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ? Oui
        <input name="Oui_C4Q4" type="checkbox" value = "1"/>&nbsp;Non <input name="Non_C4Q4" type="checkbox" value = "0"/>
    </p>

    <h1>Le cinquième critère concerne le sentiment de dépossession.</h1>
    <p>Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine?  &nbsp;Oui
        <input name="Oui_C5Q1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_C5Q1" type="checkbox" value = "1"/>
    </p>
    <p>La technologie rend-elle l'activité plus facile à réaliser par tout un chacun?    Oui
        <input name="Oui_C5Q2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C5Q2" type="checkbox" value = "1"/>
    </p>
    <p>Le système à base d'IA rend-il des savoir-faire obsolètes ?   Oui
        <input name="Oui_C5Q3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C5Q3" type="checkbox" value = "1"/>
    </p>
    <p>Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur?  Oui
        <input name="Oui_C5Q4" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C5Q4" type="checkbox" value = "1"/>
    </p>

    <h1>Le sixième critère concerne la déresponsabilité.</h1>
    <p>L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  &nbsp;Oui
        <input name="Oui_C6Q1" type="checkbox" value = "0"/>&nbsp; Non<input name="Non_C6Q1" type="checkbox" value = "1"/>
    </p>
    <p>Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ?   Oui
        <input name="Oui_C6Q2" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C6Q2" type="checkbox" value = "1"/>
    </p>
    <p>Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?   Oui
        <input name="Oui_C6Q3" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C6Q3" type="checkbox" value = "1"/>
    </p>
    <p>Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités? Oui
        <input name="Oui_C6Q4" type="checkbox" value = "0"/>&nbsp;Non <input name="Non_C6Q4" type="checkbox" value = "1"/>
    </p>

    <input type="submit" value="Valider les réponses">

</form>


</body>
</html>
