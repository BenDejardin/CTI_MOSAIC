<?php

require_once 'fonction.php';
$numAgent = $_REQUEST['numAgent'];

$afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
$contenuP2i = AfficheTousP2iDuAgent($numAgent);
$suiviVoulu = AfficheSuiviVoulu($numAgent);
$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
$nbCanevas = count($nomsCanevasSelectionner);
$plusGrandMois = AfficheValeurPlusGrandMois($numAgent);
$commentaire = AfficheCommentaire($numAgent);

$titularisation = afficheTitularisation($numAgent);
// print_r($titularisation);

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
    @page { margin-left : 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    table,td,th { border: 1px solid black; }
    #header{ width : 100%; border: none; }
    #header tr td { border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }
    .tableau,.commentaire { width: 100%; }
    th { text-align: center; }
    .commentaire td{height: 10em}
    /* .commentaire { display:none; }  */

  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Titularisation</h1></td>
        </tr>
    </table>

<!--  -->

    <table class="tableau">
        <tr>
            <td></td>
            <th colspan="2">BILAN DE LA PÉRIODE D'ESSAI</th>
            <th colspan="2">TITULARISATION</th>
           
        </tr>

        <tr>
            <th rowspan="2">Proposition du responsable de service</th>
            <td rowspan="2"><?php  echo $titularisation[0]->avisEssaie ;?></td>
            <td><?php if ($titularisation[0]->dateDecisionEssai != 0 ) { echo DateConvertiseurAnglaisFrancais($titularisation[0]->dateDecisionEssai); }?></td>
            <td rowspan="2"><?php  echo $titularisation[0]->avisTitularisation ;?></td>
            <td><?php if ($titularisation[0]->dateTitularisation != 0 ) { echo DateConvertiseurAnglaisFrancais($titularisation[0]->dateTitularisation); }?></td>
            
            
            
        </tr>
        <tr>
            <td>Signature : <?php  echo $titularisation[0]->signatureEssaie ;?></td>
            <td>Signature : <?php  echo $titularisation[0]->signatureTitularisation ;?> </td>
        </tr>

        <tr>
            <th rowspan="2">Avis du Directeur Adjoint</th>
            <td rowspan="2"><?php  echo $titularisation[1]->avisEssaie ;?></td>
            <td><?php if ($titularisation[1]->dateDecisionEssai != 0 ) { echo DateConvertiseurAnglaisFrancais($titularisation[1]->dateDecisionEssai); }?></td>
            <td rowspan="2"><?php  echo $titularisation[1]->avisTitularisation ;?></td>
            <td><?php if ($titularisation[1]->dateTitularisation != 0 ) { echo DateConvertiseurAnglaisFrancais($titularisation[1]->dateTitularisation); }?></td>
            
        </tr>
        <tr>
            <td>Signature : <?php  echo $titularisation[1]->signatureEssaie ;?></td>
            <td>Signature : <?php  echo $titularisation[1]->signatureTitularisation ;?> </td>
        </tr>

        <tr>
            <th rowspan="2">Décision du Directeur</th>
            <td rowspan="2"><?php  echo $titularisation[2]->avisEssaie ;?></td>
            <td><?php if ($titularisation[2]->dateDecisionEssai != 0 ) { echo DateConvertiseurAnglaisFrancais($titularisation[2]->dateDecisionEssai); }?></td>
            <td rowspan="2"><?php  echo $titularisation[2]->avisTitularisation ;?></td>
            <td><?php if ($titularisation[2]->dateTitularisation != 0 ) { echo DateConvertiseurAnglaisFrancais($titularisation[2]->dateTitularisation); }?></td>
            
        </tr>
        <tr>
        <td>Signature : <?php  echo $titularisation[2]->signatureEssaie ;?></td>
            <td>Signature : <?php  echo $titularisation[2]->signatureTitularisation ;?> </td>
        </tr>
    </table>
<!--  -->


<center>
    <table> 
        <tr>
            
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_PageGarde.php?numAgent=<?php echo $numAgent; ?>';" value="Page de Garde"></input></td>
            
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Sythese.php?numAgent=<?php echo $numAgent; ?>';" value="Synthèse"></input></td>
            
            <!-- Bouton Mois -->
            <?php for ($i=1; $i<=$plusGrandMois[0]->moisMax ; $i++){
                ?><input type ="button" onclick="window.location.href = 'visualisationP2I_Mois.php?numAgent=<?php echo $numAgent.'&mois='.$i; ?>';" value="Mois <?php echo $i; ?>"></input><?php
            }?>
            <!--  -->
            
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Commentaire.php?numAgent=<?php echo $numAgent; ?>';" value="Commentaire "></input></td>
            
            <td><input type="button" onclick="window.location.href = 'suiviP2I.php?numAgent=<?php echo $numAgent; ?>';" value="Retour Suivi P2I"></input></td>
            
        </tr>
    </table>
</center>

</body>
</html>