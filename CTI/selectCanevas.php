<?php

require_once 'fonction.php';

$nomsCanevas = AfficheNomsCanevas();
// print_r ($nomsCanevas);

    
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
    #tab, td { border: 1px solid black; }
    #header { width : 100%; border: none; }
    #header td, #tab , #tab td{ border: none; }
    img { width: 10em; }
    #bodyTab { width: 50%; }
    #bodyTab tr * { text-align:center; }

  </style>
  <center>
    <!--  < Header   -->
      <tr>
      <table id="header">                                                                       
              <td><img src="img/logo.png"></td> 
              <td><h1>Canevas</h1></td>
          </tr>
      </table>                                                                                  
    <!--  >   -->
  
  <table id="bodyTab">
    <tr>
      <th>Date de création</th>
      <th>Nom du Canevas</th>
      <th></th>
    </tr>
    
    <form action="selectCanevas.php">
  <?php

  //  < Affiche les noms des canevas
      foreach($nomsCanevas as $nomCanevas):                                                      
      ?>
      
      <tr>
        <td><?php echo DateConvertiseurAnglaisFrancais($nomCanevas->date_creation_canevas); ?></td>
        <td><?php echo $nomCanevas->nom_canevas; ?></td> 
        <td><input type="radio" name="radio" value="<?php echo $nomCanevas->nom_canevas; ?>"></td> 
      </tr>  
        <?php
      endforeach;    
  //  >                                                                            
  ?> 
    <table id="tab">
        <tr>
            <td><input type="button" onclick="window.location.href = 'creationCanevas.php';" value="Création"></input></td>
            <td><input type="submit" name="OK" value="Modification"></td> 
        </tr>
        <tr>
            <td><input type="submit" name="OK" value="Visualisation"></td> 
            <td><input type="button" onclick="window.location.href = 'index.php';" value="Retour Menu"> </input></td>
        </tr>
    </table>
    </form>

    <?php 
        $nomCanevas = $_REQUEST['radio'];

        if ($_REQUEST['OK']=="Modification" and $nomCanevas != "") :
            
            ?><meta http-equiv="refresh" content="0; url=modificationCanevas.php?nomCanevas=<?php echo"$nomCanevas";?>">
        <?php endif; ?>

    <?php 
        if ($_REQUEST['OK']=="Visualisation" and $nomCanevas != "") :
            ?><meta http-equiv="refresh" content="0; url=visualisationCanevas.php?nomCanevas=<?php echo"$nomCanevas";?>">
        <?php endif; ?>

  </table>
  </center>
</body>
</html>