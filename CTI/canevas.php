<?php
require_once 'fonction.php';

$presentationGenerales = AffichePresentationGenerales();

?>

<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker3.css">
      <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.css">
      <script type="text/javascript" language="javascript" src="bootstrap-4.4.1/js/jquery-3.4.1.js"></script>  
      <script src="bootstrap-4.4.1/js/bootstrap.min.js" ></script>
      <script src="bootstrap-4.4.1/js/bootstrap-datepicker.js"></script>
      <script src="bootstrap-4.4.1/js/bootstrap-datepicker.fr.min.js"></script>
	  <link rel="stylesheet" href="css/style.css">
  </head>
  
<body>
<style>
@page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
.grilleEvaluation , td , .row0 *{ border: 1px solid black; }
thead { background-color : blue; color: #FFF;}
table { margin-bottom : 2em; width: 100%;}
img { width: 10em; }
#header { width : 100%; }
#header td { border: none; }
input { border: none;  }



</style>
    <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>EVALUATION DES ACQUIS</h1></td>
            <td><p>Mois : </p></td>
        </tr>
    </table>
        
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Présentation générale</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
                    <?php $nbLigne=0;?>
                    <?php foreach ($presentationGenerales as $presentationGenerale) :?>
                        <tr>
                            <form action="canevas.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $presentationGenerale->id; ?>"> 
                                <td><input type="text" name="intitule" value="<?php echo $presentationGenerale->intitule; ?>" required></td>
                                <td><input type="text" name="animateur" value="<?php echo $presentationGenerale->animateur; ?>" required></td>
                                <td><input type="date" name="datePresentPrevision" value="<?php echo $presentationGenerale->date_presentat_prevision; ?>" ></td>
                                <td><input type="date" name="datePresentReelle" value="<?php echo $presentationGenerale->date_presentat_reelle; ?>" ></td>
                                <td><input type="date" name="dateQuiz" value="<?php echo $presentationGenerale->date_quiz; ?>" required></td>
                                <td><input type="date" name="dateRetourQuiz" value="<?php echo $presentationGenerale->date_quiz_retour; ?>" ></td>
                                <td><input type="submit" value="Modifier" name="ModifierType1"></td>
                            </form>
                        </tr>
                        <?php $nbLigne++;?>
                    <?php endforeach; ?>
                <?php
                if (isset($_REQUEST['ModifierType1'])) {
                    $id=$_REQUEST['id'];
                    $intitule=$_REQUEST['intitule'];
                    $animateur=$_REQUEST['animateur'];
                    $datePresentPrevision=$_REQUEST['datePresentPrevision'];
                    $datePresentReelle=$_REQUEST['datePresentReelle'];
                    $dateQuiz=$_REQUEST['dateQuiz'];
                    $dateRetourQuiz=$_REQUEST['dateRetourQuiz'];

                    $query="UPDATE `presentation_generale` SET `intitule`='$intitule',`animateur`='$animateur',`date_presentat_prevision`='$datePresentPrevision',`date_presentat_reelle`='$datePresentReelle',`date_quiz`='$dateQuiz',`date_quiz_retour`='$dateRetourQuiz' WHERE `id`=$id";
                    ?>
                    <meta http-equiv="refresh" content="0; url=canevas.php?id=1&num=1">
                    <?php
                    $pdo->query($query);
                }?>
                <tr class="rowFin0">
                    <form action="canevas.php" method="post">
                        <td><input type="text" name="intitule" required></td>
                        <td><input type="text" name="animateur" required></td>
                        <td><input type="date" name="datePresentPrevision" required></td>
                        <td><input type="date" name="datePresentReelle" required></td>
                        <td><input type="date" name="dateQuiz" required></td>
                        <td><input type="date" name="dateRetourQuiz" required></td>
                        <td><input type="submit" value="Ajouter une ligne" name="AjoutType1"></td>
                    </form> 
                </tr>
                <?php
                if (isset($_REQUEST['AjoutType1'])) {
                    $intitule=$_REQUEST['intitule'];
                    $animateur=$_REQUEST['animateur'];
                    $datePresentPrevision=$_REQUEST['datePresentPrevision'];
                    $datePresentReelle=$_REQUEST['datePresentReelle'];
                    $dateQuiz=$_REQUEST['dateQuiz'];
                    $dateRetourQuiz=$_REQUEST['dateRetourQuiz'];

                    $query="INSERT INTO `presentation_generale`(`intitule`, `animateur`, `date_presentat_prevision`, `date_presentat_reelle`, `date_quiz`, `date_quiz_retour`) VALUES ('$intitule','$animateur','$datePresentPrevision','$datePresentReelle','$dateQuiz','$dateRetourQuiz')";
                    ?>
                    <meta http-equiv="refresh" content="0; url=canevas.php?id=1&num=1">
                    <?php
                    $pdo->query($query);
                }
                ?>

                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>

        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">SMI</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
                
                
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>

        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Les missions nationales</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
                
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>

        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Les portails</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
                
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>

        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Les fonctions</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
               
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>
    
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Les sécurités informatiques</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
                
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>

        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Action d'intégration spécifiques liées à l'emploi</th>
                    <th></th>
                    <th colspan="2">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé de l'action</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date début</th>
                    <th class="column3">Date fin Prévision</th>
                    <th class="column4">Date fin Réelle</th>
                    <th class="column5"></th>
                </tr>
                
                <tr class="rowFin1">
                    <td>Avancement %</td>
                   <td colspan="4"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="5"></td>
                </tr>
            </tbody>
        </table>
    
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="3" class="nomCanevas">Les outils (formation à l'utilisation)</th>
                    <th></th>
                    <th colspan="3">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé</th>
                    <th class="column1">Animateur</th>
                    <th class="column2">Date présentat. Prévision</th>
                    <th class="column3">Date présentat. Réelle</th>
                    <th class="column4">Date Quiz</th>
                    <th class="column5">Date retour Quiz</th>
                    <th class="column6"></th>
                </tr>
               
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="5"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="6"></td>
                </tr>
            </tbody>
        </table>
    
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th colspan="2">Les formations</th>
                    <th></th>
                    <th colspan="2">Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th class="column0">Intitulé de la formation</th>
                    <th class="column1">Date formation prévision.</th>
                    <th class="column2">Date formation réelle</th>
                    <th class="column3">Date réception éval. à chaud</th>
                    <th class="column4"></th>
                </tr>
               
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td colspan="3"></td>
                    <td>...%</td>
                </tr>
                <tr class="rowFin2">
                    <td>Commentaire de l'agent</td>
                    <td colspan="4"></td>
                </tr>
            </tbody>
        </table>
  
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th rowspan="2">Savoir Etre</th>
                    <th colspan="4"></th>
                    <th>Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th></th>
                    <th>NMO</th>
                    <th>NA</th>
                    <th>PA</th>
                    <th>A</th>
                    <th>Commentaire</th>
                </tr>
               
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>...%</td>
                </tr>
            </tbody>
        </table>
   
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th rowspan="2">Savoir Etre</th>
                    <th colspan="4"></th>
                    <th>Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th></th>
                    <th>NMO</th>
                    <th>NA</th>
                    <th>PA</th>
                    <th>A</th>
                    <th>Commentaire</th>
                </tr>
               
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>...%</td>
                </tr>
            </tbody>
        </table>
   
        <table class="grilleEvaluation">
            <thead>
                <tr>
                    <th rowspan="2">Savoir Etre</th>
                    <th colspan="4"></th>
                    <th>Items : NbItems</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row0">
                    <th></th>
                    <th>NMO</th>
                    <th>NA</th>
                    <th>PA</th>
                    <th>A</th>
                    <th>Commentaire</th>
                </tr>
              
                <tr class="rowFin1">
                    <td>Avancement %</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>...%</td>
                </tr>
            </tbody>
        </table>
        
    <button onclick="window.location.href = '#';"> Création</button>
    <button onclick="window.location.href = '#';"> Modification</button>
    <button onclick="window.location.href = '#';"> Visualisation</button>
    <button onclick="window.location.href = '#';"> Annulation</button>
  </body>
</html>