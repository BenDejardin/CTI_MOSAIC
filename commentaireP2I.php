<?php

require_once 'fonction.php';
$numAgent = $_REQUEST['numAgent'];

$afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
$contenuP2i = AfficheTousP2iDuAgent($numAgent);
$suiviVoulu = AfficheSuiviVoulu($numAgent);
$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
$nbCanevas = count($nomsCanevasSelectionner);
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
    textarea { width: 100%; }

  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Commentaire</h1></td>
        </tr>
    </table>


    
<!-- Commentaire Agent apres la cloture du P2I -->

<form action="commentaireP2I.php">
<input type="hidden" name="numAgent" value="<?php echo $numAgent ;?>" />
    <table class="commentaire">
        <tr>
            <th>Appréciation générale sur la période d'intégration :</th>
        </tr>

        <tr>
            <td><textarea name="appreciationGenerale" rows="10"></textarea></td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Appréciation sur certains items en particulier :</th>
        </tr>

        <tr>
            <td><textarea name="appreciationItemParticulier" rows="10"></textarea></td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Quels ont été les points les plus positifs ?</th>
        </tr>

        <tr>
            <td><textarea name="pointsPositifs" rows="10"></textarea></td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Quelles améliorations conseilleriez-vous pour les prochains embauchés ?</th>
        </tr>

        <tr>
            <td><textarea name="conseilEmbauche" rows="10"></textarea></td>
        </tr>
    </table>

    <table class="commentaire">
        <tr>
            <th>Que pourriez-vous apporter au CTI de vos expériences précédentes ?</th>
        </tr>

        <tr>
            <td><textarea name="apportAuCTI" rows="10"></textarea></td>
        </tr>
    </table>

<!--  -->
<center>
    <table>
        <tr>
            <td><input name="valid" type="submit" onclick="window.location.href = 'suiviP2I.php';" value="Valider"></input></td>
            <td><input type="button" onclick="window.location.href = 'suiviP2I.php';" value="Fermer"></input></td>
        </tr>
    </table>
</center>

</form>

<?php
    if (isset($_REQUEST['valid'])) {
    ?>
     <?php
        $numAgent = $_REQUEST['numAgent'];
        $appreciationGeneral=$_REQUEST['appreciationGenerale'];
        $appreciationParticulier=$_REQUEST['appreciationItemParticulier'];                           
        $pointPositif=$_REQUEST['pointsPositifs'];
        $conseilEmbauche=$_REQUEST['conseilEmbauche'];
        $apportCti=$_REQUEST['apportAuCTI'];
        /** requete SQL */
        $query="INSERT INTO `commentaire`(`numAgent`, `apprehPeriodeIntegration`, `apprehItemParticulier`,
         `pointPositif`, `ameliorationEmbauche`, `apporterCti`) VALUES ($numAgent, '$appreciationGeneral','$appreciationParticulier','$pointPositif',
         '$conseilEmbauche','$apportCti')";
        // echo $query;
    ?>
    <meta http-equiv="refresh" content="0; url=suiviP2I.php?id=1&num=1">
    <?php
        $pdo->query($query)->fetchAll();
    ?> 
    <?php 
        }	
    ?>    

</body>
</html>