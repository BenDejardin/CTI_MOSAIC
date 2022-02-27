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
    #header{ width : 100%; border: none; }
    table tr td, table { border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }

  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Création PAI</h1></td>
        </tr>
    </table>

    <table id="canevas">
        <?php 
        // foreach($ as $):
        ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?php echo"Présentation Générale"; ?></td>
            </tr>

            <tr>
                <td><input type="checkbox"></td>
                <td><?php echo"SMI"; ?></td>
            </tr>

            <tr>
                <td><input type="checkbox"></td>
                <td><?php echo"Poste DMP"; ?></td>
            </tr>
        <? 
        // endforeach; ?>
    </table>

    <table id="form">
        <form action="suiviPAI.php">
            <tr>
                <td>N° agent</td>
                <td><input type="int" name="numAgent"></td>
                <td style="width:5em;"></td>
                <td>Service : </td>
                <td><input type="text" name="service"></td>
                <td></td>
            </tr>

            <tr>
                <td>Nom agent : </td>
                <td><input type="text" name="nomAgent"></td>
                <td style="width:5em;"></td>
                <td>Prenom agent : </td>
                <td><input type="text" name="prenomAgent"></td>
            </tr>

            <tr>
                <td>Nom responsable : </td>
                <td><input type="text" name="nomResponsable"></td>
                <td style="width:5em;"></td>
                <td>Intitulé emploie : </td>
                <td><input type="text" name="intituleEmploie"></td>
            </tr>

            <tr>
                <td>Durée période d'essai : </td>
                <td><input type="text" name="debutDureePeriodeEssai"></td>
                <td style="width:5em;"></td>
                <td>Au : </td>
                <td><input type="text" name="finDureePeriodeEssai"></td>
                
            </tr>

            <tr>
                <td>Durée stage probatoire : </td>
                <td><input type="text" name="debutDureeStageProbatoire"></td>
                <td style="width:5em;"></td>
                <td>Au : </td>
                <td><input type="text" name="finDureeStageProbatoire"></td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td><input type="submit" name="OK" value="Valider"> <button onclick="window.location.href = 'suiviPAI.php';">Annuler</button></td>
            </tr>
        </form>
    </table>
    
  
</body>
</html>