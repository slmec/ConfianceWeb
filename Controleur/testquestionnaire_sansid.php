<!DOCTYPE html>
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
                            <a href="identification.php">Connexion</a>
                            <a class="active" href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                            <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                        </nav>
                    </div>
                    <div class="right">
                        <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                    </div>
                </header>
            </div>
            <div class ="block_page">
                <div class ="block_titre">
                    <h1>Diagnostic sans connexion</h1>
                    <br>
                </div>
                <div class ="block_form">
                    <form action="../Modele/verification_questionnaire_sansid.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
                        <p>Entrez le nom de votre diagnostic :&nbsp;<input maxlength="250" name="Nom_Diagnostic" type="text" /></p>
                        <h1>La reconnaissance : </h1>
                        <table>
                            <tr>
                                <td class="question">Le système à base d'IA réduit-il la distinction entre les novices et les experts ?</td>
                                <td>Oui <input type="radio" name="C1Q1" value="0"> </td>
                                <td>Non <input type="radio" name="C1Q1" value="1">  </td>
                            </tr>
                            <tr>
                                <td class="question">Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées?</td>
                                <td>Oui <input type="radio" name="C1Q2" value="0"></td>
                                <td>Non <input type="radio" name="C1Q2" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question">Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ?</td>
                                <td>Oui <input type="radio" name="C1Q3" value="0"></td>
                                <td>Non <input type="radio" name="C1Q3" value="1">  </td>
                            </tr>
                            <tr>
                                <td>L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ?</td>
                                <td>Oui <input type="radio" name="C1Q4" value="0"></td>
                                <td>Non <input type="radio" name="C1Q4" value="1">  </td>
                            </tr>
                        </table>
                        <br>
                        <h1>Les relations humaines : </h1>
                        <table>
                            <tr>
                                <td class="question">La technologie introduit-elle une communication entre des machines ?</td>
                                <td>Oui <input type="radio" name="C2Q1" value="0"></td>
                                <td>Non <input type="radio" name="C2Q1" value="1">  <br></td>
                            </tr>
                            <tr>
                                <td class="question">La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ?</td>
                                <td>Oui <input type="radio" name="C2Q2" value="0"></td>
                                <td>Non <input type="radio" name="C2Q2" value="1">  <br></td>
                            </tr>
                            <tr>
                                <td class="question">La technologie intervient-elle dans la communication entre plusieurs personnes ?</td>
                                <td>Oui <input type="radio" name="C2Q3" value="0"></td>
                                <td> Non <input type="radio" name="C2Q3" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question">Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ?</td>
                                <td>Oui <input type="radio" name="C2Q4" value="0"></td>
                                <td>Non <input type="radio" name="C2Q4" value="1"> </td>
                            </tr>
                        </table>
                        <br>
                        <h1>La surveillance : </h1>
                        <table>
                            <tr>
                                <td class="question"> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ?</td>
                                <td>Oui <input type="radio" name="C3Q1" value="0"></td>
                                <td>Non <input type="radio" name="C3Q1" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ?</td>
                                <td>Oui <input type="radio" name="C3Q2" value="0"></td>
                                <td>Non <input type="radio" name="C3Q23" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ?</td>
                                <td>Oui <input type="radio" name="C3Q3" value="0"></td>
                                <td>Non <input type="radio" name="C3Q3" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> La finalité de l’utilisation des données est-elle transparente ?</td>
                                <td>Oui <input type="radio" name="C3Q4" value="1"></td>
                                <td>Non <input type="radio" name="C3Q4" value="0"></td>
                            </tr>
                        </table>
                        <br>
                        <h1>L'autonomie : </h1>
                        <table>
                            <tr>
                                <td class="question"> Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ?</td>
                                <td>Oui <input type="radio" name="C4Q1" value="0"></td>
                                <td>Non <input type="radio" name="C4Q1" value="1"> </td>
                            </tr>
                            <tr>
                                <td class="question"> Le système à base d'IA émet-il des notifications à l’adresse du travailleur ?</td>
                                <td>Oui <input type="radio" name="C4Q2" value="0"></td>
                                <td>Non <input type="radio" name="C4Q2" value="1"> </td>
                            </tr>
                            <tr>
                                <td class="question"> Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ?</td>
                                <td>Oui <input type="radio" name="C4Q3" value="0"></td>
                                <td>Non <input type="radio" name="C4Q3" value="1"> </td>
                            </tr>
                            <tr>
                                <td class="question"> Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ?</td>
                                <td>Oui <input type="radio" name="C4Q4" value="1"></td>
                                <td>Non <input type="radio" name="C4Q4" value="0"></td>
                            </tr>
                        </table>
                        <br>
                        <h1>Le savoir-faire : </h1>
                        <table>
                            <tr>
                                <td class="question"> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ?</td>
                                <td>Oui <input type="radio" name="C5Q1" value="0"></td>
                                <td>Non <input type="radio" name="C5Q1" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ?</td>
                                <td>Oui <input type="radio" name="C5Q2" value="0"></td>
                                <td>Non <input type="radio" name="C5Q2" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> Le système à base d'IA rend-il des savoir-faire obsolètes ?</td>
                                <td>Oui <input type="radio" name="C5Q3" value="0"></td>
                                <td>Non <input type="radio" name="C5Q3" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur?</td>
                                <td>Oui <input type="radio" name="C5Q4" value="1"></td>
                                <td>Non <input type="radio" name="C5Q4" value="0"></td>
                            </tr>
                        </table>
                        <br>
                        <h1>La responsabilité : </h1>
                        <table>
                            <tr>
                                <td class="question"> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?</td>
                                <td>Oui <input type="radio" name="C6Q1" value="0"></td>
                                <td>Non <input type="radio" name="C6Q1" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ?</td>
                                <td>Oui <input type="radio" name="C6Q2" value="0"></td>
                                <td>Non <input type="radio" name="C6Q2" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur ?</td>
                                <td>Oui <input type="radio" name="C6Q3" value="0"></td>
                                <td>Non <input type="radio" name="C6Q3" value="1"></td>
                            </tr>
                            <tr>
                                <td class="question"> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?</td>
                                <td>Oui <input type="radio" name="C6Q4" value="1"></td>
                                <td>Non <input type="radio" name="C6Q4" value="0"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Valider les réponses">
                    </form>
                </div>
                <br>
                <div class="erreur">
                    <?php
                        if(isset($_GET['erreur'])){
                            $err = $_GET['erreur'];
                            if($err==1 )
                                echo "<p style='color:#ffffff'>Veuillez completer tous les champs </p>";
                        }
                    ?>
                </div>
                <div class="bas">
                    <br>
                    <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                    <br>
                </div>
            </div>
        </section>
    </body>
</html>

