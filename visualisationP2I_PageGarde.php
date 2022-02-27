<?php

require_once 'fonction.php';
$numAgent = $_REQUEST['numAgent'];

$afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
$contenuP2i = AfficheTousP2iDuAgent($numAgent);
$suiviVoulu = AfficheSuiviVoulu($numAgent);
$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
$nbCanevas = count($nomsCanevasSelectionner);
$plusGrandMois = AfficheValeurPlusGrandMois($numAgent);
$suivi = AfficheSuiviVoulu($numAgent);
$contexte = AfficheContexte($numAgent);
// print_r($suivi);
// print_r($contenuP2i);

$lePlusGrandMois = $plusGrandMois[0]->moisMax;

$tousBilanEtapeResponsable = afficheTousBilanEtapeResponsable($numAgent);
// print_r($tousBilanEtapeResponsable);

$tailleEnPourcentageMois = 100 / $lePlusGrandMois;
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
  
<body>
  <style>
    @page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    table,td,th { border: 1px solid black; }
    #header{ width : 100%; border: none; }
    #header tr td, #infoAgent, #infoAgent tr td { border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }
    .Date { width: 6em; }
    .Anim { width: 8em; }
    .Inti { width: 22em; }
    .infoAgent { padding-left: 1em; } 
    #contexteEvaluation, .infoMois, .commentaire { width: 100%; }
    .infoMois td { width: <?php echo $tailleEnPourcentageMois.'%' ; ?>; }
    th{ text-align:center; }
    .infoMois td, #contexteEvaluation td { text-align:center; }
    #contexteEvaluation td { width: 33%; }
    .boxCommentaire{ height: 10em; }
    /* .mois { float: right; border: none; padding: 0em 5em; } */
  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Page de Garde du P2I</h1></td>
        </tr>
    </table>

<!-- INFORMATION DE L'AGENT -->

    <table id="infoAgent">
        
            <tr>
                <td>Nom :</td>
                <td class="infoAgent"> <?php echo $suivi[0]->nomAgent; ?> </td>
                <td style="width: 5em;"></td>
                <td>Nom du Responsable :</td>
                <td class="infoAgent"> <?php echo $suivi[0]->nomResponsable; ?> </td>
            </tr>

            <tr>
                <td>Prénom :</td>
                <td class="infoAgent"> <?php echo $suivi[0]->prenomAgent; ?> </td>
                <td style="width: 5em;"></td>
                <td>Intitulé d'emploie :</td>
                <td class="infoAgent"> <?php echo $suivi[0]->intituleEmploi; ?> </td>
            </tr>

            <tr>
                <td>Période Essai du :</td>
                <td class="infoAgent"> <?php if ($suivi[0]->dateDebutPeriodeEssai != 0 ) { echo DateConvertiseurAnglaisFrancais ($suivi[0]->dateDebutPeriodeEssai); } ?> </td>
             
                <td style="width: 5em;"></td>
                <td>Au :</td>
                <td class="infoAgent"> <?php if ($suivi[0]->dateFinPeriodeEssai != 0 ) { echo DateConvertiseurAnglaisFrancais ($suivi[0]->dateFinPeriodeEssai); } ?> </td>
            </tr>

            <tr>
                <td>Stage Probatoire du :</td>
                <td class="infoAgent"> <?php if ($suivi[0]->dateDebutStageProbatoire != 0 ) { echo DateConvertiseurAnglaisFrancais ($suivi[0]->dateDebutStageProbatoire); } ?> </td>
              
                <td style="width: 5em;"></td>
                <td>Au :</td>
                <td class="infoAgent"> <?php if ($suivi[0]->dateFinStageProbatoire != 0 ) {echo DateConvertiseurAnglaisFrancais ($suivi[0]->dateFinStageProbatoire); }?> </td>
            </tr>
       
    </table>

<!--  -->

<!-- CONTEXTE DE L'ÉVALUATION -->

<table id="contexteEvaluation">
    <tr>
        <th colspan="3"> CONTEXTE DE L'ÉVALUATION </th>
    </tr>

    <tr>
        <td>Nouvel Emploie</td>
        <td>Mesure Promotionnel</td>
        <td>Mutation</td>
    </tr>

    <tr>
        <td>
            <?php if($contexte[0]->ChoixContexte == "Nouvel Emploie"){ ?>
                <option value="X">X</option>
            <?php } ?>
        </td>
        <td>
            <?php if($contexte[0]->ChoixContexte == "Mesure Promotionnel"){ ?>
                <option value="X">X</option>
            <?php } ?>
        </td>
        <td>
            <?php if($contexte[0]->ChoixContexte == "Mutation"){ ?>
                <option value="X">X</option>
            <?php } ?>
        </td>
    </tr>
</table>

<!--  -->

<!-- BILAN D'ÉTAPE RESPONSABLE -->

<table class="infoMois">
    <tr>
        <th colspan="<?php echo $lePlusGrandMois; ?>"> BILAN D'ÉTAPE RESPONSABLE </th>
    </tr>

    <tr>
        <?php for ($i=1; $i<=$lePlusGrandMois; $i++):?>
            <th><?php echo "Mois ".$i; ?></th>
        <?php endfor; ?>
    </tr>

        <?php 
            $max = 0;
            for ($i=1; $i<=$lePlusGrandMois; $i++):
                $bilanEtapeResponsable = afficheBilanEtapeResponsable($numAgent,$i);  
                $nbBilanEtapeResponsable = count($bilanEtapeResponsable); 
                if($nbBilanEtapeResponsable > $max){
                    $max = $nbBilanEtapeResponsable;
                }
                ?>
            <?php endfor; ?>
            <?php
             for($a=0; $a<$max; $a++){
                 ?><tr><?php
                for ($i=1; $i<=$lePlusGrandMois; $i++):
                    $bilanEtapeResponsable = afficheBilanEtapeResponsable($numAgent,$i);?>
                    <td><?php if ($bilanEtapeResponsable[$a]->dateBilan != "") { echo DateConvertiseurAnglaisFrancais($bilanEtapeResponsable[$a]->dateBilan); }?></td>
                <?php endfor; 
                ?></tr><?php
             }
            ?>
</table>

<!--  -->

<!-- COMITÉ DE SUIVI -->

<table class="infoMois">
    <tr>
        <th colspan="<?php echo $lePlusGrandMois; ?>"> COMITÉ DE SUIVI </th>
    </tr>

    <tr>
        <?php for ($i=1; $i<=$lePlusGrandMois; $i++):?>
            <th><?php echo "Mois ".$i; ?></th>
        <?php endfor; ?>
    </tr>

    <tr>
        <?php for ($i=1; $i<=$lePlusGrandMois; $i++):
                $comiteSuivi = afficheComiteSuivi($numAgent,$i);?>
                <td><?php if ($comiteSuivi[0]->dateBilan != "") { echo DateConvertiseurAnglaisFrancais($comiteSuivi[0]->dateBilan); } ?></td>
        <?php endfor; ?>
    </tr>
</table>

<!--  -->

<!-- TAUX GLOBAL D'AVANCEMENT EN % -->

<table class="infoMois">
    <tr>
        <th colspan="<?php echo $lePlusGrandMois; ?>"> TAUX GLOBAL D'AVANCEMENT EN % </th>
    </tr>

    <tr>
        <?php for ($i=1; $i<=$lePlusGrandMois; $i++):?>
            <th><?php echo "Mois ".$i; ?></th>
        <?php endfor; ?>
    </tr>

    <tr>
        <?php for ($i=1; $i<=$lePlusGrandMois; $i++):
            $tauxGlobal = afficheTauxGlobal($numAgent,$i);?>
            <td><?php echo $tauxGlobal[0]->tauxGlobal.' %'; ?></td>
        <?php endfor; ?>
    </tr>
</table>

<!--  -->


<?php for ($i=1; $i<=$lePlusGrandMois; $i++):
        $P2I = AfficheTousP2iDuAgentMois($numAgent,$i);
?>
        <table class="commentaire">
            <tr>
                <th>Mois <?php echo $i;?></th>
            </tr>
            <tr>
                <th> COMMENTAIRE DE L'AGENT </th>
            </tr>
            <tr>
                <td class="boxCommentaire"><?php echo $P2I[0]->commentaireAgent;?></td>
            </tr>

            <tr>
                <th> APPRÉCIATION GÉNÉRAL DU RÉSPONSABLE </th>
            </tr>
            <tr>
                <td class="boxCommentaire"><?php echo $P2I[0]->commentaireResponsable;?></td>
            </tr>

            <tr>
                <th> COMMENTAIRE DE L'ADJOINT DIRECTEUR </th>
            </tr>
            <tr>
                <td class="boxCommentaire"><?php echo $P2I[0]->commentaireAdjointDirecteur;?></td>
            </tr>

            <tr>
                <th> AVIS DU DIRECTEUR </th>
            </tr>
            <tr>
                <td class="boxCommentaire"><?php echo $P2I[0]->commentaireDirecteur;?></td>
            </tr>
        </table>
<?php endfor; ?>

<!--  -->
<center>
    <table>
        <tr>
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Sythese.php?numAgent=<?php echo $numAgent; ?>';" value="Synthèse"></input></td>
            
            <!-- Bouton Mois -->
            <?php for ($i=1; $i<=$plusGrandMois[0]->moisMax ; $i++){
                ?><input type ="button" onclick="window.location.href = 'visualisationP2I_Mois.php?numAgent=<?php echo $numAgent.'&mois='.$i; ?>';" value="Mois <?php echo $i; ?>"></input><?php
            }?>
            <!--  -->

            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Commentaire.php?numAgent=<?php echo $numAgent; ?>';" value="Commentaire Agent"></input></td>
            
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Titularisation.php?numAgent=<?php echo $numAgent; ?>';" value="Titularisation "></input></td>

            <td><input type="button" onclick="window.location.href = 'suiviP2I.php?numAgent=<?php echo $numAgent; ?>';" value="Retour Suivi P2I"></input></td>
        </tr>
    </table>
</center>


    
    


</body>
</html>