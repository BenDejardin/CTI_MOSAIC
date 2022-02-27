<?php

require_once 'fonction.php';
$numAgent = $_REQUEST['numAgent'];

$afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
$contenuP2i = AfficheTousP2iDuAgent($numAgent);
$suiviVoulu = AfficheSuiviVoulu($numAgent);
$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
$nbCanevas = count($nomsCanevasSelectionner);
$plusGrandMois = AfficheValeurPlusGrandMois($numAgent);
// print_r($contenuP2i);


$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
// print_r($nomsCanevasSelectionner);
$nbCanevas = count($nomsCanevasSelectionner);

$lePlusGrandMois = $plusGrandMois[0]->moisMax;
// echo $lePlusGrandMois;

$tailleEnPourcentageMois = 80 / $lePlusGrandMois;

$tauxGlobals = AfficheContenuCanevasVouluP2i($numAgent,'SMI',1);

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
    .avancementCanevas, #tauxGlobal { width: 100%; }
    .mois { width: <?php echo $tailleEnPourcentageMois.'%' ; ?>; }
    /* #tauxGlobal { background-color: #efefef; } */
    #tauxGlobal td { font-weight: bold; }
    th, .avancement { text-align: center; }
    #titre { font-size : 18px; }
    .avancement { text-align: center; }
  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Synthèse du P2I</h1></td>
        </tr>
    </table>


    
<!-- AVANCEMENT CANEVAS -->

<table class="avancementCanevas">
    <tr>
        <th colspan="<?php echo $lePlusGrandMois +1; ?>" id="titre">AVANCEMENT EN %</th>
    </tr>
        
    <tr>
        <th></th>
    <?php for ($i=1; $i<=$lePlusGrandMois; $i++):?>
        <th class="mois">mois <?php echo $i; ?> </th>
    <?php endfor; ?>
    </tr>

<?php for($a=0; $a<$nbCanevas; $a++){ ?>

    <tr>
        <td><?php echo $afficheNomCanevas[$a]->nom_canevas; ?></td>

    <?php for ($i=1; $i<=$lePlusGrandMois; $i++):
        $avancementDuCanevas = AfficheContenuCanevasVouluP2i($numAgent,$afficheNomCanevas[$a]->nom_canevas,$i);?>
        <td class="avancement"><?php echo $avancementDuCanevas[0]->avancementCanevas.' %'; ?></td>
    <?php endfor;?>
    </tr>

<?php } ?>

    </tr>

    <tr id="tauxGlobal">
        <td>TAUX GLOBAL en %</td>
    <?php for ($i=1; $i<=$lePlusGrandMois; $i++):
        $tauxGlobal = afficheTauxGlobal($numAgent,$i);?>
        <td class="avancement"><?php echo $tauxGlobal[0]->tauxGlobal.' %'; ?></td>
    <?php endfor; ?>
    </tr>
</table>

<!--  -->

<center>
    <table>
        <tr>
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_PageGarde.php?numAgent=<?php echo $numAgent; ?>';" value="Page de Garde"></input></td>
            
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