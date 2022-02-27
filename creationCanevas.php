<?php

require_once 'fonction.php';

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
    #header { width : 100%; border: none; margin-bottom : 5em;}
    #header td, .tab td, .tab { border: none; margin-bottom : 2em; }
    img { width: 10em; }

  </style>
  <center>

  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Création de Canevas</h1></td>
        </tr>
  </table>

  <form action="creationCanevas.php" method="GET">
  
  <table class="tab">
        <tr>
            <td>Nom Canevas : </td>
            <td><input type="text" name="nomCanevas" required></td>
        </tr>
    </table>

    <table class="tab">
        <tr>
            <td>Intitulé :</td>
            <td><input type="text" name="intitule" required></td>
            <td style="width:5em;"></td>
            <td>Animateur :</td>
            <td><input type="text" name="animateur"></td>
        </tr>
        <!-- <tr>
            <td>Date Présentation Prévision :</td>
            <td><input type="date" name="datePresentPrevision"></td>
            <td style="width:5em;"></td>
            <td>Date Présentation Réelle :</td>
            <td><input type="date" name="datePresentReelle"></td>
        </tr>
        <tr>
            <td>Date Quiz:</td>
            <td><input type="date" name="dateQuiz"></td>
            <td style="width:5em;"></td>
            <td>Date Retour Quiz :</td> 
            <td><input type="date" name="dateRetourQuiz"></td>
        </tr> -->
    </table>
    <input type="submit" name="OK" value="Valider">
    <input type="button" onclick="window.location.href = 'selectCanevas.php';" value="Annuler"> </input>
  </form>
  <?php
  if (isset($_REQUEST['OK'])) {
    $nomCanevas=$_REQUEST['nomCanevas'];
    $date= date("Y/m/d");
    $intitule=$_REQUEST['intitule'];
    $animateur=$_REQUEST['animateur'];
    // $datePresentPrevision=$_REQUEST['datePresentPrevision'];
    // $datePresentReelle=$_REQUEST['datePresentReelle'];
    // $dateQuiz=$_REQUEST['dateQuiz'];
    // $dateRetourQuiz=$_REQUEST['dateRetourQuiz'];
    
    // $pdo->query("INSERT INTO `Contenu_Canevas`(`nom_canevas`, `intitule`, `animateur`, `date_presentation_prevision`, `date_presentation_reelle`, `date_quiz`, `date_retour_quiz`) VALUES ('$nomCanevas','$intitule','$animateur','$datePresentPrevision','$datePresentReelle','$dateQuiz','$dateRetourQuiz');");
    $pdo->query("INSERT INTO `Contenu_Canevas`(`nom_canevas`, `intitule`, `animateur`) VALUES ('$nomCanevas','$intitule','$animateur');");
    $query="INSERT INTO `canevas`(`nom_canevas`,`date_creation_canevas`) VALUES ('$nomCanevas','$date');";
    $pdo->query($query);
    header('Location: modificationCanevas.php?nomCanevas='.$nomCanevas);
    }?>
  </center>
</body>
</html>