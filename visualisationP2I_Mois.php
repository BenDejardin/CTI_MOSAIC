<?php

require_once 'fonction.php';
$numAgent = $_REQUEST['numAgent'];
$mois = $_REQUEST['mois'];
// echo $mois;

$afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
$contenuP2i = AfficheTousP2iDuAgent($numAgent);
$suiviVoulu = AfficheSuiviVoulu($numAgent);
$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
$nbCanevas = count($nomsCanevasSelectionner);
// echo $nbCanevas;
$plusGrandMois = AfficheValeurPlusGrandMois($numAgent);
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
    @page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    table,td,th { border: 1px solid black; }
    #header{ width : 100%; border: none; }
    #header tr td{ border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }
    .Date { width: 6em; }
    .Anim { width: 8em; }
    .Inti { width: 22em; }

  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Visualisation du P2I</h1></td>
        </tr>
    </table>


    <?php for($i = 0; $i<$nbCanevas;$i++){
        $afficheCanevasP2i= AfficheContenuCanevasVouluP2i($numAgent,$afficheNomCanevas[$i]->nom_canevas,$mois);
    ?>

    <table class="contenuCanevas">
        <tr>
            <th colspan="5"><?php echo $afficheNomCanevas[$i]->nom_canevas; ?></th>
            <th colspan=2><?php echo "Mois : ".$mois; ?></th>
        </tr>
        <tr>
            <th class="Inti">Intitulé</th>
            <th class="Anim">Animateur</th>
            <th class="Date">Date Présentation Prévision</th>
            <th class="Date">Date Présentation Réelle</th>
            <th class="Date">Date Quiz</th>
            <th class="Date">Date Retour Quiz</th>
            <th>0/1</th>
        </tr>
        <?php 
            $ListeBinaireCanevasComplet = []; 
            $compteur = 0;
        ?>
        <?php foreach ($afficheCanevasP2i as $canevasP2I):?>
                <?php $nbItemCompleter = 0; ?>
                <tr>
                    <td><?php echo $canevasP2I->intitule; ?></td>
                    <td><?php if ($canevasP2I->animateur != "" ) { echo $canevasP2I->animateur; $nbItemCompleter++; }?></td>
                    <td><?php if ($canevasP2I->date_presentation_prevision != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_presentation_prevision); $nbItemCompleter++; } ?></td>
                    <td><?php if ($canevasP2I->date_presentation_reelle != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_presentation_reelle); $nbItemCompleter++; } ?></td>
                    <td><?php if ($canevasP2I->date_quiz != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_quiz); $nbItemCompleter++; }?></td>
                    <td><?php if ($canevasP2I->date_retour_quiz != 0 ) { echo DateConvertiseurAnglaisFrancais($canevasP2I->date_retour_quiz); $nbItemCompleter++; } ?></td>
                    <?php if ($nbItemCompleter == 5){
                        $ListeBinaireCanevasComplet [] = 1;
                    } 

                    else{
                        $ListeBinaireCanevasComplet [] = 0;
                    }
                    ?>
                    <td><?php echo $ListeBinaireCanevasComplet [$compteur]; $compteur++; ?></td>
                </tr>
        <?php endforeach;?>

                <tr>
                    <th>Avancement %</th>
                    <th colspan="5"></th>
                    <th><?php echo $afficheCanevasP2i[$i]->avancementCanevas.' %';?></th>
                </tr>

                <tr>
                    <th>Commentaire</th>
                    <td colspan="6"><?php echo $afficheCanevasP2i[$i]->commentaire ?></td>
                </tr>

    </table>

    <?php }?>



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
            
            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Commentaire.php?numAgent=<?php echo $numAgent; ?>';" value="Commentaire Agent"></input></td>

            <td><input type="button" onclick="window.location.href = 'visualisationP2I_Titularisation.php?numAgent=<?php echo $numAgent; ?>';" value="Titularisation "></input></td>

            <td><input type="button" onclick="window.location.href = 'suiviP2I.php?numAgent=<?php echo $numAgent; ?>';" value="Retour Suivi P2I"></input></td>
        </tr>
    </table>
</center>

</body>
</html>