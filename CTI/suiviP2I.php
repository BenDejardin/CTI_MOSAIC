<?php

require_once 'fonction.php';

if ($_REQUEST['OK'] == "Rechercher"){
    $numAgent = $_REQUEST['numAgent'];
    $nomAgent = $_REQUEST['nomAgent'];
    $service = $_REQUEST['service'];
    $prenomAgent = $_REQUEST['prenomAgent'];

    if (empty($numAgent)){
        $numAgent="*";
    }

    if (empty($nomAgent)){
        $nomAgent="*";
    }

    if (empty($service)){
        $service="*";
    }

    if (empty($prenomAgent)){
        $prenomAgent="*";
    }

    $infoSuivi =  AfficheSuiviRechercher($numAgent,$nomAgent,$service,$prenomAgent);
    // print_r($infoSuivi);

    ?>
        
    <?php       
}

else {
    $infoSuivi =  AfficheSuivi();
}

if($numAgent == "*" && $nomAgent == "*" && $service == "*" && $prenomAgent == "*"){ 
    $infoSuivi =  AfficheSuivi();
} 

// print_r($infoSuivi);

$services = AfficheServices();


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
    select, .inputForm { width : 15em; }


  </style>
  <center>
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Suivi P2I</h1></td>
        </tr>
    </table>

    <table id="search">
        <form action="suiviP2I.php">
            <tr>
                <td>N° agent : </td>
                <td><input class="inputForm" type="int" name="numAgent"></td>
                <td>Nom agent : </td>
                <td><input class="inputForm" type="int" name="nomAgent"></td>
                <td></td>
            </tr>

            <tr>
                <td>Service : </td>
                <td>
                    <select name="service" id="service">
                        <option value=""></option>
                        <?php foreach($services as $service){ ?>
                            <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>Prenom agent : </td>
                <td><input class="inputForm" type="int" name="prenomAgent"></td>
                <td><input type="submit" name="OK" value="Rechercher"></td>
            </tr>
        </form>
    </table>

<?php 
    if(isset($infoSuivi[0]->numAgent)){ 
?>
<form action="suiviP2I.php">
    <table>
        <tr>
            <th>Date de création du P2I</th>
            <th>N° Agent</th>
            <th>Nom de l’agent</th>
            <th>Prénom de l’agent</th>
            <th>Service de l’agent</th>
            <th>Pourcentage Evolution du P2I</th>
            <th>Date clôture P2I</th>
            <th></th>
        </tr>
    
    <?php $ligne=0; ?>
    <?php foreach($infoSuivi as $infoSuivi):?>
        <tr>
           <td><?php echo DateConvertiseurAnglaisFrancais($infoSuivi->dateCreation); ?></td>
           <td><?php echo $infoSuivi->numAgent; ?></td>
           <td><?php echo $infoSuivi->nomAgent; ?></td>
           <td><?php echo $infoSuivi->prenomAgent; ?></td>
           <td><?php echo $infoSuivi->serviceAgent; ?></td>
           <?php $tauxMax = afficheTauxMax($infoSuivi->numAgent);?>
           <td><?php echo $tauxMax[0]->tauxMax.' %' ; ?></td>
           <td><?php if ($infoSuivi->dateCloture != 0 ) { echo DateConvertiseurAnglaisFrancais($infoSuivi->dateCloture); } ?></td>
           <td><input type="radio" name="radio" value="<?php echo $infoSuivi->numAgent; ?>"></td>
        </tr>
    <?php endforeach; ?> 
    
    </table>
    <input type ="button" onclick="window.location.href = 'creationP2I.php';" value="Création"></input>
    <input type="submit" name="OK" value="Modification">
    <input type="submit" name="OK" value="Visualisation">
    <input type ="button" onclick="window.location.href = 'index.php';" value="Retour Menu"></input>

</form>
<?php    
    }    
    //////////////////////// 
    $numAgent = $_REQUEST['radio'];
    $numLigne = $_REQUEST['numLigne'];
    
    $suiviVoulu = AfficheSuiviVoulu($numAgent);
    // print_r($suiviVoulu);

        if ($_REQUEST['OK'] == "Modification" and $suiviVoulu[0]->dateCloture == 0 and $numAgent != 0){    
            ?><meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo"$numAgent";?>&mois=1"><?php       
        }

        elseif ($_REQUEST['OK'] == "Visualisation" and $numAgent != 0){
            ?><meta http-equiv="refresh" content="0; url=visualisationP2I_PageGarde.php?numAgent=<?php echo"$numAgent";?>&mois=1"><?php       
        }
    ?>
  </center>
</body>
</html>