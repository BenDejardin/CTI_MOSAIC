<?php

require_once 'fonction.php';
$nomCanevas = $_REQUEST['nomCanevas'];
$afficheTousDuCanevas = AfficheTousCanevasVoulu($nomCanevas);
// print_r($afficheTousDuCanevas)
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
    #header td, .tab td, .tab { border: none; }
    img { width: 10em; }
    hr { color: black; margin: 4em 0em; }
    h2 { margin-bottom: 1em ; }
    #bouton, #bouton tr td { border: none; }
    .Date { width: 6em; }
    .Anim { width: 8em; }
    .Inti { width: 22em; }

  </style>
  <center>
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            
                <td><h1>Canevas : <?php echo $afficheTousDuCanevas[0]->nom_canevas;?> </h1></td>
                <?php $nomCanevas = $afficheTousDuCanevas[0]->nom_canevas;
            ?>
        </tr>
    </table>

    <!-- <hr> -->

        <!-- affiche le contenu du canevas -->

        <table>
            <tr>
                <th class="Inti">Intitulé</th>
                <th class="Anim">Animateur</th>
                <th class="Date">Date Présentation Prévision</th>
                <th class="Date">Date Présentation Réelle</th>
                <th class="Date">Date Quiz</th>
                <th class="Date">Date Retour Quiz</th>
            </tr>
               
                     <?php foreach ($afficheTousDuCanevas as $info):?>
                        <tr>
                            <td><?php echo $info->intitule ?></td>
                            <td><?php echo $info->animateur ?></td>
                            <td><?php if ($info->date_presentation_prevision != 0 ) { echo $info->date_presentation_prevision; } ?></td>
                            <td><?php if ($info->date_presentation_reelle != 0 ) { echo $info->date_presentation_reelle; } ?></td>
                            <td><?php if ($info->date_quiz != 0 ) { echo $info->date_quiz; } ?></td>
                            <td><?php if ($info->date_retour_quiz != 0 ) { echo $info->date_retour_quiz; } ?></td>
                        </tr>
                    <?php endforeach;?>
        </table> 

        <table id="bouton">
            <tr>        
                    <td colspan="7"><input type="button" onclick="window.location.href = 'selectCanevas.php';" value="Fermer"> </input></td>
           
            </tr>
        </table>   
  </center>
</body>
</html>