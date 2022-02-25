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
    #header, #search { width : 100%; border: none; }
    #header td, #search td { border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }

  </style>
  <center>
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Suivi PAI</h1></td>
        </tr>
    </table>

    <table id="search">
        <form action="suiviPAI.php">
            <tr>
                <td>N° agent : </td>
                <td><input type="int" name="numAgent"></td>
                <td>Nom agent : </td>
                <td><input type="int" name="nomAgent"></td>
                <td></td>
            </tr>

            <tr>
                <td>Service : </td>
                <td><input type="int" name="service"></td>
                <td>Prenom agent : </td>
                <td><input type="int" name="prenomAgent"></td>
                <td><input type="submit" name="OK" value="Rechercher"></td>
            </tr>
        </form>
    </table>

    <table>
        <tr>
            <th>Date de création du PAI</th>
            <th>N° Agent</th>
            <th>Nom de l’agent</th>
            <th>Prénom de l’agent</th>
            <th>Service de l’agent</th>
            <th>Pourcentage Evolution du PAI</th>
            <th>Date clôture PAI</th>
            <th></th>
        </tr>
        <tr>
           <td>2020-01-01</td>
           <td>09426842</td>
           <td>Dejardin</td>
           <td>Benjamin</td>
           <td>National</td>
           <td>60%</td>
           <td></td>
           <td><input type="radio" name="radio" value="<?php echo "b"; ?>"></td>
        </tr>
    </table>
    <button onclick="window.location.href = 'creationPAI.php';">Création</button>
    <button onclick="window.location.href = 'modificationPAI.php';">Modification</button>
    <button onclick="window.location.href = 'visualisationPAI.php';">Visualisation</button>
    <button onclick="window.location.href = 'index.php';">Annulation</button>
  </center>
</body>
</html>