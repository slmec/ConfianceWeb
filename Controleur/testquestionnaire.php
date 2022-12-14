<!DOCTYPE html>
<?php include("../Modele/connexion_bdd.php"); ?>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MAIAT</title>
        <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
    </head>
    <body background="../Medias/background_v2.jpg">
    <?php $Nom_diagnostic = $_SESSION['Nom_diagnostic']; ?>
        <section>
            <div class="container">
                <!-- Barre de navigation !-->
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
                </div>
                <div class="navbar_deux">
                    <a class="active" href="diagnostic_new.php"> Nouveau Diagnostic </a>
                    <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                    <a href="profil.php">Mon profil </a>
                    <a href="../Modele/deconnexion.php">Deconnexion</a>
                </div>
                <div class="block_tableau">
                    <br><hr><br>
                    <h1 class="blanc">Diagnostic <?php echo $Nom_diagnostic ?></h1>
                    <br><hr><br>
                </div>
                <div class ="block_page">
                    <!-- Corps de page !-->
                    <!-- Gestion des erreurs !-->
                    <div class="erreur">
                        <?php
                        if(isset($_GET['erreur'])){
                            $err = $_GET['erreur'];
                            if($err==1 )
                                echo "<p style='color:#ffffff'>Veuillez completer tous les champs </p>";
                        }
                        ?>
                    </div>
                    <!-- Formulaire questionnaire !-->
                    <div class="block_form">
                        <form action="../Modele/verification_questionnaire.php" method="post" name="Fragilisation_Reconnaissance" target="_self">
                            <table>
                                <tr>
                                    <td class="col_image"><img src="../Medias/logo_reconnaissance.png" width="60px" height="60px"/></td>
                                    <td class="col_titre"><h1>La reconnaissance : </h1></td>
                                </tr>
                            </table>
                            <table>
                                <tr>

                                    <td class="question">Le syst??me ?? base d'IA r??duit-il la distinction entre les novices et les experts ?</td>
                                    <td>Oui <input type="radio" name="C1Q1" value="0" > </td>
                                    <td>Non <input type="radio" name="C1Q1" value="1">  </td>
                                </tr>
                                <tr>
                                    <td class="question">Des t??ches requ??rant auparavant de l'expertise sont-elles d??sormais partiellement ou totalement automatis??es?</td>
                                    <td>Oui <input type="radio" name="C1Q2" value="0" ></td>
                                    <td>Non <input type="radio" name="C1Q2" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question">Le syst??me ?? base d'IA supprime-t-il des t??ches p??nibles, r??p??titives ou dangereuses ?</td>
                                    <td>Oui <input type="radio" name="C1Q3" value="0" ></td>
                                    <td>Non <input type="radio" name="C1Q3" value="1">  </td>
                                </tr>
                                <tr>
                                    <td>L'introduction de la technologie rend-elle moins visible le r??sultat de l'activit?? du travailleur ?</td>
                                    <td>Oui <input type="radio" name="C1Q4" value="0" ></td>
                                    <td>Non <input type="radio" name="C1Q4" value="1">  </td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td class="col_image"><img src="../Medias/logo_relations_humaines.png" width="60px" height="60px"/></td>
                                    <td class="col_titre"><h1>Les relations humaines : </h1></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="question">La technologie introduit-elle une communication entre des machines ?</td>
                                    <td>Oui <input type="radio" name="C2Q1" value="0" ></td>
                                    <td>Non <input type="radio" name="C2Q1" value="1">  <br></td>
                                </tr>
                                <tr>
                                    <td class="question">La technologie cr??e-t-elle une interaction humain-machine au d??triment d'une communication entre personnes ?</td>
                                    <td>Oui <input type="radio" name="C2Q2" value="0" ></td>
                                    <td>Non <input type="radio" name="C2Q2" value="1">  <br></td>
                                </tr>
                                <tr>
                                    <td class="question">La technologie intervient-elle dans la communication entre plusieurs personnes ?</td>
                                    <td>Oui <input type="radio" name="C2Q3" value="0" ></td>
                                    <td> Non <input type="radio" name="C2Q3" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question">Le syst??me ?? base d'IA impose-t-il des lexiques et des syntaxes standardis??s pour communiquer ?</td>
                                    <td>Oui <input type="radio" name="C2Q4" value="0" ></td>
                                    <td>Non <input type="radio" name="C2Q4" value="1"> </td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td class="col_image"><img src="../Medias/logo_surveillance.png" width="60px" height="60px"/></td>
                                    <td class="col_titre"><h1>La surveillance : </h1></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA int??gre-t-il une cam??ra/micro susceptible de filmer/??couter le travailleur ou d?????tre per??u comme tel ?</td>
                                    <td>Oui <input type="radio" name="C3Q1" value="0" ></td>
                                    <td>Non <input type="radio" name="C3Q1" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> La technologie implique-t-elle des identifiants permettant de collecter des donn??es sur son utilisateur ?</td>
                                    <td>Oui <input type="radio" name="C3Q2" value="0" ></td>
                                    <td>Non <input type="radio" name="C3Q2" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> Les donn??es collect??es par le syst??me ?? base d'IA sont-elles exploit??es pour mesurer la productivit?? de son utilisateur ?</td>
                                    <td>Oui <input type="radio" name="C3Q3" value="0" ></td>
                                    <td>Non <input type="radio" name="C3Q3" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> La finalit?? de l???utilisation des donn??es est-elle transparente ?</td>
                                    <td>Oui <input type="radio" name="C3Q4" value="1" ></td>
                                    <td>Non <input type="radio" name="C3Q4" value="0"></td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td class="col_image"><img src="../Medias/logo_autonomie.png" width="60px" height="60px"/></td>
                                    <td class="col_titre"><h1>L'autonomie : </h1></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA d??termine-t-il un d??roulement de l???action du travailleur ?</td>
                                    <td>Oui <input type="radio" name="C4Q1" value="0" ></td>
                                    <td>Non <input type="radio" name="C4Q1" value="1"> </td>
                                </tr>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA ??met-il des notifications ?? l???adresse du travailleur ?</td>
                                    <td>Oui <input type="radio" name="C4Q2" value="0" ></td>
                                    <td>Non <input type="radio" name="C4Q2" value="1"> </td>
                                </tr>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA r??duit-il ou rend-il plus difficile la prise d???initiative pour le travailleur ?</td>
                                    <td>Oui <input type="radio" name="C4Q3" value="0" ></td>
                                    <td>Non <input type="radio" name="C4Q3" value="1"> </td>
                                </tr>
                                <tr>
                                    <td class="question"> Le travailleur dispose-t-il de marge man??uvre convenue dans l???utilisation ou l???interpr??tation du syst??me ?? base d'IA ?</td>
                                    <td>Oui <input type="radio" name="C4Q4" value="1" ></td>
                                    <td>Non <input type="radio" name="C4Q4" value="0"></td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td class="col_image"><img src="../Medias/logo_savoir_faire.png" width="60px" height="60px"/></td>
                                    <td class="col_titre"><h1>Le savoir faire : </h1></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA modifie t-il l'??quilibre entre intervention directe sur le produit et supervision de la machine ?</td>
                                    <td>Oui <input type="radio" name="C5Q1" value="0" ></td>
                                    <td>Non <input type="radio" name="C5Q1" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> La technologie rend-elle l'activit?? plus facile ?? r??aliser par tout un chacun ?</td>
                                    <td>Oui <input type="radio" name="C5Q2" value="0" ></td>
                                    <td>Non <input type="radio" name="C5Q2" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA rend-il des savoir-faire obsol??tes ?</td>
                                    <td>Oui <input type="radio" name="C5Q3" value="0" ></td>
                                    <td>Non <input type="radio" name="C5Q3" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA g??n??re t-il de nouvelles t??ches pour le travailleur?</td>
                                    <td>Oui <input type="radio" name="C5Q4" value="0" ></td>
                                    <td>Non <input type="radio" name="C5Q4" value="1"></td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td class="col_image"><img src="../Medias/logo_responsabilit??.png" width="60px" height="60px"/></td>
                                    <td class="col_titre"><h1>La responsabilit?? : </h1></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="question"> L???imputation de responsabilit??s en cas de probl??me est-elle un enjeu majeur de l???activit?? et de l???organisation ?</td>
                                    <td>Oui <input type="radio" name="C6Q1" value="0" ></td>
                                    <td>Non <input type="radio" name="C6Q1" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA utilise des algorithmes d???apprentissage lui permettant de s???adapter de fa??on autonome dans un environnement al??atoire ?</td>
                                    <td>Oui <input type="radio" name="C6Q2" value="0" ></td>
                                    <td>Non <input type="radio" name="C6Q2" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> Le syst??me ?? base d'IA r??duit-il la libert?? de prise d'initiative du travailleur ?</td>
                                    <td>Oui <input type="radio" name="C6Q3" value="0" ></td>
                                    <td>Non <input type="radio" name="C6Q3" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="question"> Pensez-vous que le syst??me ?? base d'IA pourrait pousser le travailleur ?? moins s'investir dans ses t??ches et/ou de ses responsabilit??s ?</td>
                                    <td>Oui <input type="radio" name="C6Q4" value="0" ></td>
                                    <td>Non <input type="radio" name="C6Q4" value="1"></td>
                                </tr>
                            </table>
                            <br>
                            <input type="submit" value="Valider les r??ponses">
                        </form>
                    </div>
                    <br>

                </div>
            </div>
            <!-- Bas de page !-->
            <div class="bas">
                <br>
                <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                <br>
            </div>
        </section>
    </body>
</html>
