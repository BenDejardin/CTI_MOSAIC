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
// print_r($contenuP2i);

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
    .commentaire { width: 100%; }
    th { text-align: center; }
    .commentaire td{height: 10em}

  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Commentaire</h1></td>
        </tr>
    </table>


    
<!-- Commentaire Agent apres la cloture du P2I -->

    <table class="commentaire">
        <tr>
            <th>Appréciation générale sur la période d'intégration :</th>
        </tr>

        <tr>
            <td> <?php echo $commentaire[0]->apprehPeriodeIntegration; ?> </td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Appréciation sur certains items en particulier :</th>
        </tr>

        <tr>
        <td> <?php echo $commentaire[0]->apprehItemParticulier; ?> </td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Quels ont été les points les plus positifs ?</th>
        </tr>

        <tr>
        <td> <?php echo $commentaire[0]->pointPositif; ?> </td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Quelles améliorations conseilleriez-vous pour les prochains embauchés ?</th>
        </tr>

        <tr>
        <td> <?php echo $commentaire[0]->ameliorationEmbauche; ?> </td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Que pourriez-vous apporter au CTI de vos expériences précédentes ?</th>
        </tr>

        <tr>
        <td> <?php echo $commentaire[0]->apporterCti; ?> </td>
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
            
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Titularisation.php?numAgent=<?php echo $numAgent; ?>';" value="Titularisation "></input></td>
            
            <td><input type="button" onclick="window.location.href = 'suiviP2I.php?numAgent=<?php echo $numAgent; ?>';" value="Retour Suivi P2I"></input></td>
            
        </tr>
    </table>
</center>

</body>
</html>