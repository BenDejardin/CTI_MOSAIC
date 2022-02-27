<?php

require_once 'fonction.php';

    $afficheCanevas = AfficheNomsCanevas();
    $numAgent = $_REQUEST['numAgent'];
    $mois = $_REQUEST['mois'];
    $suiviVoulu = AfficheSuiviVoulu($numAgent);

    $listeCheckbox = $suiviVoulu->noms_canevas;
    $nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
    // print_r($nomsCanevasSelectionner);
    $nbCanevas = count($nomsCanevasSelectionner);
    // echo $nbCanevas;

    $afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
    // print_r($afficheNomCanevas);


    $nomsCanevas = explode("|",$suiviVoulu[0]->noms_canevas);
    // print_r($nomsCanevas)

    $services = AfficheServices();
    $contexte = AfficheContexte($numAgent);

    $plusGrandMois = AfficheValeurPlusGrandMois($numAgent);
    // print_r($plusGrandMois);

    $lePlusGrandMois = $plusGrandMois[0]->moisMax;
    $moisSuivant = $lePlusGrandMois + 1;
    include('Includes/globals.php');

    $bilanEtapeResponsables = afficheBilanEtapeResponsable($numAgent,$mois);
    $comiteSuivis = afficheComiteSuivi($numAgent,$mois);

    $P2I = AfficheTousP2iDuAgentMois($numAgent,$mois);
?>

<!DOCTYPE html>
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

  <script type="text/javascript">
        // Initialisation JQUERY
        $(document).ready(function() {
        // dateTraitement = '';
        // Site Boostrap datePicker 
        // https://bootstrap-datepicker.readthedocs.io/en/latest/options.html

            $('.inputForm1').datepicker({
            maxViewMode: 2,
            language: "fr",
            orientation: "bottom left",
            //daysOfWeekDisabled: "0",
            calendarWeeks: true,
            todayHighlight:true,
            autoclose:true
            });
            
            $('.bilan').datepicker({
            maxViewMode: 2,
            language: "fr",
            orientation: "bottom left",
            // daysOfWeekDisabled: "0",
            calendarWeeks: true,
            todayHighlight:true,
            autoclose:true
            });
        });
    </script>
  
<body>
  <style>
    @page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    table,td,th,.contenuCanevas,.contenuCanevas td { border: 1px solid black; }
    #header{ width : 100%; border: none; }
    table tr td, #form { border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }
    .inputDate { width: 6em; }
    #inputAnim { width: 8em; }
    #inputInti { width: 22em; }
    .commentaire{ margin: -2em 0 5em 0; width: 100%; }
    /* td { text-align:center; } */
    .boutonInvisible { background: transparent; border: none; font-size:0;}
    .boutonTransparentAvecTexteVisible{  background: transparent; border: none; }
    .contenuCanevas input, .commentaire textarea { border: none; }
    select, .inputForm, .inputForm1 { width : 15em; }
    .boutonModifier { width: 6.2em; }
    .infoMois{ width: 24.5em;}
    .titreTableau { text-align:center; }
    hr { width: 100%; color: black; }

  </style>

<!-- header  -->

    <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Modification P2I</h1></td>
        </tr>
    </table>

<!--  -->

<!-- canvas  -->

    
        <table id="canevas">
            
            <tr>
                <th colspan="2">Canevas :</th>
            </tr>
            
    <?php 
        foreach($afficheCanevas as $canevas):
    ?>
            <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?php echo $canevas->nom_canevas; ?>"disabled="disabled"<?php if(in_array($canevas->nom_canevas,$nomsCanevas)){ echo "checked"; } ?>></td>
                <td><?php echo $canevas->nom_canevas; ?></td>
            </tr>
    <?php 
        endforeach; 
    ?>
        </table>
<!--  -->


<!-- tableau suivi  -->

<form action="modificationP2I.php">
    <table id="form">
            <tr>
                <input type="hidden" name="numAgent" value="<?php echo $suiviVoulu[0]->numAgent ?>">
                <input type="hidden" name="mois" value="<?php echo $mois ; ?>">
                <td>N° agent</td>
                <td><?php echo $suiviVoulu[0]->numAgent ?></td>
                <td style="width:5em;"></td>
                <td>Service : </td>
                <td>
                    <select name="service" id="service">
                        <option value="<?php echo $suiviVoulu[0]->serviceAgent ?>"><?php echo $suiviVoulu[0]->serviceAgent ?></option>
                        <?php foreach($services as $service){ ?>
                            <?php if($suiviVoulu[0]->serviceAgent != $service->nomService){ ?>
                                <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                <td></td>
            </tr>

            <tr>
                <td>Nom agent : </td>
                <td><input class="inputForm" type="text" name="nomAgent" value="<?php echo $suiviVoulu[0]->nomAgent ?>"></td>
                <td style="width:5em;"></td>
                <td>Prenom agent : </td>
                <td><input class="inputForm" type="text" name="prenomAgent" value="<?php echo $suiviVoulu[0]->prenomAgent ?>"></td>
            </tr>

            <tr>
                <td>Nom responsable : </td>
                <td><input class="inputForm" type="text" name="nomResponsable" value="<?php echo $suiviVoulu[0]->nomResponsable ?>"></td>
                <td style="width:5em;"></td>
                <td>Intitulé emploie : </td>
                <td><input class="inputForm" type="text" name="intituleEmploie" value="<?php echo $suiviVoulu[0]->intituleEmploi ?>"></td>
            </tr>
        
            <tr>
                <td>Période d'essai du : </td>
                <td><input class="inputForm1" type="text" name="debutDureePeriodeEssai" value="<?php if ($suiviVoulu[0]->dateDebutPeriodeEssai != 0){echo DateConvertiseurAnglaisFrancais($suiviVoulu[0]->dateDebutPeriodeEssai);} ?>"></td>
                <td style="width:5em;"></td>
                <td>Au : </td>
                <td><input class="inputForm1" type="text" name="finDureePeriodeEssai" value="<?php if ($suiviVoulu[0]->dateFinPeriodeEssai != 0){echo DateConvertiseurAnglaisFrancais($suiviVoulu[0]->dateFinPeriodeEssai);} ?>"></td>
                
            </tr>

            <tr>
                <td>Stage probatoire du : </td>
                <td><input class="inputForm1" type="text" name="debutDureeStageProbatoire" value="<?php if ($suiviVoulu[0]->dateDebutStageProbatoire != 0){echo DateConvertiseurAnglaisFrancais($suiviVoulu[0]->dateDebutStageProbatoire);} ?>"></td>
                <td style="width:5em;"></td>
                <td>Au : </td>
                <td><input class="inputForm1" type="text" name="finDureeStageProbatoire" value="<?php if ($suiviVoulu[0]->dateFinStageProbatoire != 0){echo DateConvertiseurAnglaisFrancais($suiviVoulu[0]->dateFinStageProbatoire);} ?>"></td>
            </tr>

            <tr>
                <td>Choix évaluation : </td>
                <td><?php echo $contexte[0]->ChoixContexte; ?></td>   
                <td style="width:5em;"></td>
                <td>Comité Suivi (Mois <?php echo $mois;?>) :</td>  
                <td><input class="inputForm1" type="text" name="comiteSuivi" value="<?php if ($comiteSuivis[0]->dateBilan != 0){echo DateConvertiseurAnglaisFrancais($comiteSuivis[0]->dateBilan);} ?>"></td>         
            </tr>

            <tr>
                <td colspan="3"></td>
                <td><input type="submit" name="OK1" value="Valider"> <input type ="button" onclick="window.location.href = 'suiviP2I.php';" value="Annuler"></input></td>
            </tr>
        </form>
    </table>
<!--  -->

<!-- <hr> -->

<!-- BILAN D'ÉTAPE RESPONSABLE -->

<form action="modificationP2I.php">
<table class="infoMois">
    <tr>
        <th class="titreTableau"> BILAN D'ÉTAPE RESPONSABLE </th>
        <th><?php echo "Mois ".$mois;?></th>
    </tr>

    <?php foreach($bilanEtapeResponsables as $bilanEtapeResponsable): ?>
        <tr>
            <td><?php echo DateConvertiseurAnglaisFrancais($bilanEtapeResponsable->dateBilan); ?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <input type="hidden" name="numAgent" value ="<?php echo $numAgent?>">
        <input type="hidden" name="mois" value ="<?php echo $mois?>">
        <td><input type="date" class="bilan" name="date" ></td>

        <td><input type="submit" name="ajoutDateBilan" value="Ajouter"></td>
    </tr>
</table>
</form>
<!--  -->

<!-- <hr> -->

<!-- Contenu Canevas P2I -->


<?php for($i = 0; $i<$nbCanevas;$i++){
        $afficheCanevasP2i= AfficheContenuCanevasVouluP2i($numAgent,$afficheNomCanevas[$i]->nom_canevas,$mois);
?>
    <table class="contenuCanevas">
        <tr>
            <th colspan="6"><?php echo $afficheNomCanevas[$i]->nom_canevas; ?></th>
            <th>Mois : <?php echo $mois; ?></th>
        </tr>
        <tr>
            <th class="Inti">Intitulé</th>
            <th class="Anim">Animateur</th>
            <th class="Date">Date Présentation Prévision</th>
            <th class="Date">Date Présentation Réelle</th>
            <th class="Date">Date Quiz</th>
            <th class="Date">Date Retour Quiz</th>
            <th></th>
        </tr>

        <?php 
            $ListeBinaireCanevasComplet = []; 
            $compteur = 0;
            $nomCanevas = $afficheNomCanevas[$i]->nom_canevas;
        ?>

        <?php foreach ($afficheCanevasP2i as $canevasP2I):?>
            <?php $nbItemCompleter = 0; ?>
            <form action="modificationP2I.php">
                <tr>
                    <input type="hidden" name=idItem value="<?php echo $canevasP2I->id; ?>" required>
                    <input type="hidden" name=numAgent value="<?php echo $canevasP2I->numAgent; ?>" required>
                    <input type="hidden" name=mois value="<?php echo $mois; ?>" required>
                    <input type="hidden" name=nomCanevas value="<?php echo $nomCanevas; ?>" required>
                    <td><input type="text" id="inputInti" name="intitule" value="<?php echo $canevasP2I->intitule; ?>" required></td>
                    <td><input type="text" id="inputAnim" name="animateur" value="<?php if ($canevasP2I->animateur != "" ) { echo $canevasP2I->animateur; $nbItemCompleter++; }?>"></td>
                    <td><input type="date" class="inputDate" name="datePresentPrevision" value="<?php if ($canevasP2I->date_presentation_prevision != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_presentation_prevision); $nbItemCompleter++; } ?>"></td>
                    <td><input type="date" class="inputDate" name="datePresentReelle" value="<?php if ($canevasP2I->date_presentation_reelle != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_presentation_reelle); $nbItemCompleter++; } ?>"></td>
                    <td><input type="date" class="inputDate" name="dateQuiz" value="<?php if ($canevasP2I->date_quiz != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_quiz); $nbItemCompleter++; }?>"></td>
                    <td><input type="date" class="inputDate" name="dateRetourQuiz" value="<?php if ($canevasP2I->date_retour_quiz != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_retour_quiz); $nbItemCompleter++; } ?>"></td>
                    <input type="submit" name="OK2" value="Modifier" class="boutonInvisible">
                    <td><input type="submit" name="Sup" value="Suprimer" class="boutonTransparentAvecTexteVisible"></td>
                </tr>
            </form>
            <?php if ($nbItemCompleter == 5){
                        $ListeBinaireCanevasComplet [] = 1;
                    } 

                else{
                        $ListeBinaireCanevasComplet [] = 0;
                    }
            ?>
        <?php endforeach;?>
            
        <?php
            if(isset($_REQUEST['mois'])){
                $sommeItem = 0;
                $nbItem = 0;

                foreach($ListeBinaireCanevasComplet as $item){
                    $sommeItem = $sommeItem + $item;
                    $nbItem ++;
                }

                if ($nbItem == 0) { $nbItem = 1; }
                
                $pourcentageAvancement = round(($sommeItem/$nbItem)*100,2);
                $query="UPDATE `P2I` SET avancementCanevas = $pourcentageAvancement  WHERE numAgent=$numAgent AND nom_canevas = '$nomCanevas' AND mois = $mois";
                // echo $query;
                $pdo->query($query);
            }
        ?>

        <?php 
            if(isset($_REQUEST['mois'])){
                $listePourcentageCanevas [] = $pourcentageAvancement;
            }
        ?>

            <!-- Ajout Ligne  -->
            <form action="modificationP2I.php">
                <tr>
                    <input type="hidden" name=numAgent value="<?php echo $afficheCanevasP2i[$i]->numAgent; ?>" required>
                    <input type="hidden" name=idItem value="<?php echo $afficheCanevasP2i[$i]->id; ?>" required>
                    <input type="hidden" name=nomCanevas value="<?php echo $afficheCanevasP2i[$i]->nom_canevas; ?>" required>
                    <input type="hidden" name=mois value="<?php echo $mois; ?>" required>
                    <td><input type="text" id="inputInti" name="intitule" required></td>
                    <td><input type="text" id="inputAnim" name="animateur"></td>
                    <td><input type="date" class="inputDate" name="datePresentPrevision"></td>
                    <td><input type="date" class="inputDate" name="datePresentReelle"></td>
                    <td><input type="date" class="inputDate" name="dateQuiz"></td>
                    <td><input type="date" class="inputDate" name="dateRetourQuiz"></td>
                    <td><input type="submit" name="ajout" value="Ajout Ligne" class="boutonTransparentAvecTexteVisible"> </td>
                </tr>
            </form>
            <!--  -->

        </table>

        <!-- Commentaire  -->

        <table class="commentaire">
            <form action="modificationP2I.php">
                <tr>
                    <input type="hidden" name=numAgent value="<?php echo $afficheCanevasP2i[$i]->numAgent; ?>" required>
                    <input type="hidden" name=nomCanevas value="<?php echo $afficheCanevasP2i[$i]->nom_canevas; ?>" required>
                    <input type="hidden" name=mois value="<?php echo $mois; ?>" required>
                    <th>Commentaire :</th>
                    <th class="boutonModifier"><input type="submit" name="Com" value="Modifier" class="boutonTransparentAvecTexteVisible"></th>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="commentaire" id="" cols="100" rows="5"><?php echo $afficheCanevasP2i[$i]->commentaire ?></textarea></td>
                </tr>
            </form>
        </table>
        <!--  -->
        

     <?php } ?> <!-- Fin de Boucle For -->

<!-- <hr> -->

     <!-- COMMENTAIRE : -->

    <!-- COMMENTAIRE DE L'AGENT -->

    <table class="commentaire">
        <form action="modificationP2I.php">
        <input type="hidden" name="numAgent" value ="<?php echo $numAgent;?>">
        <input type="hidden" name="mois" value ="<?php echo $mois;?>">
            <tr>
                <th colspan="2"> COMMENTAIRE DE L'AGENT (Mois <?php echo $mois; ?>)</th>
                <th class="boutonModifier"><input type="submit" name="ModifierComAgent" value="Modifier" class="boutonTransparentAvecTexteVisible"></th>
            </tr>

            <tr>
                <td colspan="3"><textarea name="commentaireAgent" cols="100" rows="5"><?php echo $P2I[0]->commentaireAgent; ?></textarea></td>
        
            </tr>
        </form>
    </table>

    <!--  -->

    <!-- APPRÉCIATION GÉNÉRAL DU RÉSPONSABLE -->

    <table class="commentaire">
        <form action="modificationP2I.php">
        <input type="hidden" name="numAgent" value ="<?php echo $numAgent;?>">
        <input type="hidden" name="mois" value ="<?php echo $mois;?>">
            <tr>
                <th colspan="2"> APPRÉCIATION GÉNÉRAL DU RÉSPONSABLE (Mois <?php echo $mois; ?>)</th>
                <th class="boutonModifier"><input type="submit" name="ModifierComResponsable" value="Modifier" class="boutonTransparentAvecTexteVisible"></th>
            </tr>

            <tr>
                <td colspan="3"><textarea name="commentaireResponsable" cols="100" rows="5"><?php echo $P2I[0]->commentaireResponsable; ?></textarea></td>
        
            </tr>
        </form>
    </table>

    <!--  -->

    <!-- COMMENTAIRE DE L'ADJOINT DIRECTEUR -->

    <table class="commentaire">
        <form action="modificationP2I.php">
        <input type="hidden" name="numAgent" value ="<?php echo $numAgent;?>">
        <input type="hidden" name="mois" value ="<?php echo $mois;?>">
            <tr>
                <th colspan="2"> COMMENTAIRE DE L'ADJOINT DIRECTEUR (Mois <?php echo $mois; ?>)</th>
                <th class="boutonModifier"><input type="submit" name="ModifierComAdjointDirecteur" value="Modifier" class="boutonTransparentAvecTexteVisible"></th>
            </tr>

            <tr>
                <td colspan="3"><textarea name="commentaireAdjointDirecteur" cols="100" rows="5"><?php echo $P2I[0]->commentaireAdjointDirecteur; ?></textarea></td>
        
            </tr>
        </form>
    </table>

    <!--  -->

    <!-- AVIS DU DIRECTEUR -->

    <table class="commentaire">
        <form action="modificationP2I.php">
        <input type="hidden" name="numAgent" value ="<?php echo $numAgent;?>">
        <input type="hidden" name="mois" value ="<?php echo $mois;?>">
            <tr>
                <th colspan="2"> AVIS DU DIRECTEUR (Mois <?php echo $mois; ?>)</th>
                <th class="boutonModifier"><input type="submit" name="ModifierComDirecteur" value="Modifier" class="boutonTransparentAvecTexteVisible"></th>
            </tr>

            <tr>
                <td colspan="3"><textarea name="commentaireDirecteur" cols="100" rows="5"><?php echo $P2I[0]->commentaireDirecteur; ?></textarea></td>
        
            </tr>
        </form>
    </table>
    
    <?php 
        if(isset($_REQUEST['mois'])){
            $avancementGoblal = round(array_sum($listePourcentageCanevas)/count($listePourcentageCanevas),2);
            $query="UPDATE `P2I` SET tauxGlobal = $avancementGoblal WHERE numAgent=$numAgent AND mois = $mois";
            // echo $query;
            $pdo->query($query);
        }
    ?>

    <!--  -->

    <center>
    <form action="modificationP2I.php">
        <input type="hidden" name=numAgent value="<?php echo $numAgent; ?>" required>
        <input type="hidden" name=mois value="<?php echo $mois; ?>" required>
        <input type ="button" onclick="window.location.href = 'suiviP2I.php';" value="Retour P2I"></input>
        <?php 
            for ($i=1; $i<=$plusGrandMois[0]->moisMax ; $i++){
                ?><input type ="button" onclick="window.location.href = 'modificationP2I.php?numAgent=<?php echo $numAgent.'&mois='.$i; ?>';" value="Mois <?php echo $i; ?>"></input><?php
        }    
        ?>    
        <input type="hidden" name="moisMax" value="<?php echo $plusGrandMois[0]->moisMax; ?>">
        <input type="submit" name="AjoutMois" value="Ajouter un Mois">
        <input type="button" onclick="window.location.href = 'modificationP2I_Titularisation.php?numAgent=<?php echo $numAgent; ?>';" value="Titularisation">
        <input type="submit" name="FermetureP2I" value="Cloturer le P2I">
    </form>
    </center>    
        
    
    
<!--  -->




<!-- PARTIE CONDITION :  -->


<!-- Condition du bouton Valider  -->

    <?php
        if(isset($_REQUEST['OK1'])){
            $numAgent = $_REQUEST['numAgent'];
            $service = $_REQUEST['service'];
            $nomAgent = $_REQUEST['nomAgent']; 
            $prenomAgent = $_REQUEST['prenomAgent']; 
            $nomResponsable = $_REQUEST['nomResponsable']; 
            $intituleEmploie = $_REQUEST['intituleEmploie']; 
            $comiteSuivi = $_REQUEST['comiteSuivi'];
            $mois= $_REQUEST['mois'];


            $debutPeriodeEssai = $_REQUEST['debutDureePeriodeEssai']; 

            if ($_REQUEST['debutDureePeriodeEssai'] != $suiviVoulu[0]->dateDebutPeriodeEssai) {
                $debutPeriodeEssai = DateConvertiseurFrancaisAnglais($debutPeriodeEssai); 
            }
            
            $finPeriodeEssai = $_REQUEST['finDureePeriodeEssai']; 

            if ($_REQUEST['finDureePeriodeEssai'] != $suiviVoulu[0]->dateFinPeriodeEssai) {
                $finPeriodeEssai = DateConvertiseurFrancaisAnglais($finPeriodeEssai);
            }

            $debutStageProbatoire = $_REQUEST['debutDureeStageProbatoire'];

            if ($_REQUEST['debutDureeStageProbatoire'] != $suiviVoulu[0]->dateDebutStageProbatoire) {
                $debutStageProbatoire = DateConvertiseurFrancaisAnglais($debutStageProbatoire);
            }
            
            $finStageProbatoire = $_REQUEST['finDureeStageProbatoire'];

            if ($_REQUEST['finDureeStageProbatoire'] != $suiviVoulu[0]->dateFinStageProbatoire) {
                $finStageProbatoire = DateConvertiseurFrancaisAnglais($finStageProbatoire);
            }    

            if ($_REQUEST['comiteSuivi'] != $comiteSuivis[0]->dateBilan) { 
                $comiteSuivi = DateConvertiseurFrancaisAnglais($comiteSuivi);
            }  

            $query="UPDATE `suivi` SET `serviceAgent`='$service',`nomAgent`='$nomAgent',`prenomAgent`='$prenomAgent',`intituleEmploi`='$intituleEmploie',`nomResponsable`='$nomResponsable',`dateDebutPeriodeEssai`='$debutPeriodeEssai',`dateFinPeriodeEssai`='$finPeriodeEssai',`dateDebutStageProbatoire`='$debutStageProbatoire',`dateFinStageProbatoire`='$finStageProbatoire'  WHERE numAgent=$numAgent ";
            // echo $query;
            $pdo->query($query);
            
            $query2="INSERT INTO `bilan`(`numAgent`, `nomTable`, `numMois`, `dateBilan`) VALUES ($numAgent, 'Comité Suivi', $mois, '$comiteSuivi')";
            // echo $query2;
            $pdo->query($query2);
            
            ?>
            <meta http-equiv="refresh" content="0; url=suiviP2I.php">
            <?php


        }
    ?>
<!--  -->

<!-- Condition du bouton Modifier Commentaire -->

    <?php
        if(isset($_REQUEST['Com'])){
            $numAgent = $_REQUEST['numAgent'];
            $nomCanevas = $_REQUEST['nomCanevas'];
            $commentaire = $_REQUEST['commentaire'];
            $mois=$_REQUEST['mois'];

            $query="UPDATE `P2I` SET commentaire = '$commentaire'  WHERE numAgent=$numAgent AND nom_canevas='$nomCanevas' AND mois = $mois";
            // echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);

        }
    ?>
<!--  -->

<!-- Condition du bouton Modifier Commentaire Agent -->

<?php
        if(isset($_REQUEST['ModifierComAgent'])){
            $numAgent = $_REQUEST['numAgent'];
            $commentaireAgent = $_REQUEST['commentaireAgent'];
            $mois=$_REQUEST['mois'];

            $query="UPDATE `P2I` SET commentaireAgent = '$commentaireAgent'  WHERE numAgent=$numAgent AND mois = $mois";
            // echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);

        }
    ?>
<!--  -->

<!-- Condition du bouton Modifier Commentaire Responsable -->

<?php
        if(isset($_REQUEST['ModifierComResponsable'])){
            $numAgent = $_REQUEST['numAgent'];
            $commentaireResponsable = $_REQUEST['commentaireResponsable'];
            $mois=$_REQUEST['mois'];

            $query="UPDATE `P2I` SET commentaireResponsable = '$commentaireResponsable'  WHERE numAgent=$numAgent AND mois = $mois";
            // echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);

        }
    ?>
<!--  -->

<!-- Condition du bouton Modifier Commentaire Adjoint Directeur -->

<?php
        if(isset($_REQUEST['ModifierComAdjointDirecteur'])){
            $numAgent = $_REQUEST['numAgent'];
            $commentaireAdjointDirecteur = $_REQUEST['commentaireAdjointDirecteur'];
            $mois=$_REQUEST['mois'];

            $query="UPDATE `P2I` SET commentaireAdjointDirecteur = '$commentaireAdjointDirecteur'  WHERE numAgent=$numAgent AND mois = $mois";
            // echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);

        }
    ?>
<!--  -->

<!-- Condition du bouton Modifier Commentaire Directeur -->

<?php
        if(isset($_REQUEST['ModifierComDirecteur'])){
            $numAgent = $_REQUEST['numAgent'];
            $commentaireDirecteur = $_REQUEST['commentaireDirecteur'];
            $mois=$_REQUEST['mois'];

            $query="UPDATE `P2I` SET commentaireDirecteur = '$commentaireDirecteur'  WHERE numAgent=$numAgent AND mois = $mois";
            // echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);

        }
    ?>
<!--  -->

<!-- Condition du bouton Modifier (INVISIBLE) pour le Contenu Canevas -->

    <?php
        if($_REQUEST['OK2']=="Modifier"){
            $idItem = $_REQUEST['idItem'];
            $numAgent = $_REQUEST['numAgent'];
            $intitule = $_REQUEST['intitule'];
            $animateur = $_REQUEST['animateur'];
            $datePresentPrevision = $_REQUEST['datePresentPrevision']; 
            $datePresentReelle = $_REQUEST['datePresentReelle']; 
            $dateQuiz = $_REQUEST['dateQuiz']; 
            $dateRetourQuiz = $_REQUEST['dateRetourQuiz'];
            $mois=$_REQUEST['mois'];
            $nomCanevas = $_REQUEST['nomCanevas'];


            // $datePresentPrevision = $_REQUEST['datePresentPrevision']; 

            // if ($_REQUEST['datePresentPrevision'] != $suiviVoulu[0]->dateDebutPeriodeEssai) {
                $datePresentPrevision = DateConvertiseurFrancaisAnglais($datePresentPrevision); 
            // }
            
            // $datePresentReelle = $_REQUEST['datePresentReelle']; 

            // if ($_REQUEST['finDureePeriodeEssai'] != $suiviVoulu[0]->dateFinPeriodeEssai) {
                $datePresentReelle = DateConvertiseurFrancaisAnglais($datePresentReelle);
            // }

            // $debutStageProbatoire = $_REQUEST['debutDureeStageProbatoire'];

            // if ($_REQUEST['debutDureeStageProbatoire'] != $suiviVoulu[0]->dateDebutStageProbatoire) {
                $dateQuiz = DateConvertiseurFrancaisAnglais($dateQuiz);
            // }
            
            // $finStageProbatoire = $_REQUEST['finDureeStageProbatoire'];

            // if ($_REQUEST['finDureeStageProbatoire'] != $suiviVoulu[0]->dateFinStageProbatoire) {
                $dateRetourQuiz = DateConvertiseurFrancaisAnglais($dateRetourQuiz);
            // }  


            
            $query="UPDATE `P2I` SET intitule = '$intitule', animateur = '$animateur', date_presentation_prevision = '$datePresentPrevision', date_presentation_reelle = '$datePresentReelle', date_quiz = '$dateQuiz', date_retour_quiz = '$dateRetourQuiz' WHERE id=$idItem";
            // echo $query;
            
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            
            $pdo->query($query);
            
            $sommeItem = 0;
            $nbItem = 0;
            foreach($ListeBinaireCanevasComplet as $item){
                $sommeItem = $sommeItem + $item;
                $nbItem ++;
            }
               if ($nbItem == 0) { $nbItem = 1; }
                $pourcentageAvancement = ($sommeItem/$nbItem)*100;
                // echo $pourcentageAvancement;
                    
                // if ( $_REQUEST['nouveauMois']!="True"){
                    $query2="UPDATE `P2I` SET avancementCanevas = '$pourcentageAvancement %'  WHERE numAgent=$numAgent AND nom_canevas = '$nomCanevas' AND mois = $mois";
                    echo $query2;
                    $pdo->query($query2);
                // }

        }
    ?>
<!--  -->

<!-- Condition du bouton Supprimer pour le Contenu Canevas -->

<?php
        if(isset($_REQUEST['Sup'])){
            $idItem = $_REQUEST['idItem'];
           
            $query="DELETE FROM `P2I` WHERE $idItem = id";
            // echo $query;
            
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            
            $pdo->query($query);
            

        }
    ?>
<!--  -->

<!-- Condition pour le Bouton Ajout Ligne -->

<?php if(isset($_REQUEST['ajout'])){
            $numAgent = $_REQUEST['numAgent'];
            $nomCanevas = $_REQUEST['nomCanevas'];
            $intitule = $_REQUEST['intitule'];
            $animateur = $_REQUEST['animateur'];
            $datePresentPrevision = $_REQUEST['datePresentPrevision']; 
            $datePresentReelle = $_REQUEST['datePresentReelle']; 
            $dateQuiz = $_REQUEST['dateQuiz']; 
            $dateRetourQuiz = $_REQUEST['dateRetourQuiz'];
            $mois=$_REQUEST['mois'];

            // print_r($listeCheckbox);

            $query="INSERT INTO `P2I`(`id`, `numAgent`, `nom_canevas`, `intitule`, `animateur`, `date_presentation_prevision`, `date_presentation_reelle`, `date_quiz`, `date_retour_quiz`, `commentaire`, `mois`, `avancementCanevas`, `tauxGlobal`, `commentaireAgent`, `commentaireResponsable`, `commentaireAdjointDirecteur`, `commentaireDirecteur`) VALUES ('',$numAgent,'$nomCanevas','$intitule','$animateur','$datePresentPrevision','$datePresentReelle','$dateQuiz','$dateRetourQuiz','',$mois,'','','','','','')";
            // echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);
            
        }
    ?>
<!--  -->

<!-- Condition pour le Bouton Ajout Bilan d'Étape Responsable -->

<?php if(isset($_REQUEST['ajoutDateBilan'])){
            $numAgent = $_REQUEST['numAgent'];
            $date = $_REQUEST['date'];
            $date = DateConvertiseurFrancaisAnglais($date);
            $mois=$_REQUEST['mois'];

            $query="INSERT INTO `bilan`(`numAgent`, `nomTable`, `numMois`, `dateBilan`) VALUES ($numAgent, 'Bilan Etape Responsable', $mois, '$date')";
            echo $query;
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent."&mois=".$mois; ?>">
            <?php
            $pdo->query($query);
            
        }
    ?>
<!--  -->

<!-- Condition du bouton Cloturer le P2I -->

<?php
        if(isset($_REQUEST['FermetureP2I'])){
            $date = date("Y-m-d");
           
            $query="UPDATE `suivi` SET dateCloture = '$date' WHERE numAgent = $numAgent";
            // echo $query;
            
            ?>
            <meta http-equiv="refresh" content="0; url=commentaireP2I.php?numAgent=<?php echo $numAgent;?>">
            <?php
            
            $pdo->query($query);
            

        }
    ?>
<!--  -->

<!-- Condition du bouton Ajout Mois -->

<?php
        if($_REQUEST['AjoutMois'] == "Ajouter un Mois"){
            $numAgent = $_REQUEST['numAgent'];
            $moisMax = $_REQUEST['moisMax'];
            // echo $numAgent;
            $query="INSERT INTO P2I SELECT '',`numAgent`,`nom_canevas`,`intitule`,`animateur`,`date_presentation_prevision`,`date_presentation_reelle`,`date_quiz`,`date_retour_quiz`,`commentaire`, mois+1, avancementCanevas,tauxGlobal,commentaireAgent,commentaireResponsable,commentaireAdjointDirecteur,commentaireDirecteur FROM P2I WHERE numAgent = $numAgent AND mois = $moisMax";
            // echo $query;
            $moisSuivant = $moisMax+1;
            
            
            $pdo->query($query);
            
            ?>
            <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo $numAgent.'&mois='.$moisSuivant.'&nouveauMois=True'; ?>">
            <?php

        }
    ?>
<!--  -->
</body>
</html>