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
            <td><h1>Modification du PAI</h1></td>
        </tr>
    </table>

    <table>
        <tr>
            <th>N° Agent</th>
            <th>Nom de l’agent</th>
            <th>Prénom de l’agent</th>
            <th>Service de l’agent</th>
            <th>Pourcentage Evolution du PAI</th>
            <th>Date clôture PAI</th>
        </tr>
        <tr>
           <td><input type="int" value="09426842"></td>
           <td><input type="int" value="Dejardin"></td>
           <td><input type="int" value="Benjamin"></td>
           <td><input type="int" value="National"></td>
           <td><input type="int" value="60%"></td>
           <td><input type="int" value="2022-01-01"></td>
        </tr>

        <tr>
            <td><button onclick="window.location.href = 'suiviPAI.php';">Valider</button>  <button onclick="window.location.href = 'suiviPAI.php';">Annuler</button></td>
        </tr>
    </table>
    
  
</body>
</html>