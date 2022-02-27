<?php

    require_once 'fonction.php';

    $afficheCanevas = AfficheNomsCanevas();
    $services = AfficheServices();
    // include('Includes/globals.php');
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

  <script type="text/javascript">
        // Initialisation JQUERY
        $(document).ready(function() {
        // dateTraitement = '';
        // Site Boostrap datePicker 
        // https://bootstrap-datepicker.readthedocs.io/en/latest/options.html

            $('.inputForm1').datepicker({
            maxViewMode: 2,
            language: "fr",
            orientation: "bottom left",
            //daysOfWeekDisabled: "0",
            calendarWeeks: true,
            todayHighlight:true,
            autoclose:true
            });
            
        });
    </script>
  
<body>
  <style>
    @page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    table,td,th { border: 1px solid black; }
    #header{ width : 100%; border: none; }
    table tr td, #form { border: none; }
    img { width: 10em; }
    table { margin-bottom:3em; }
    select, .inputForm, .inputForm1 { width : 15em; }

  </style>
  
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            <td><h1>Création P2I</h1></td>
        </tr>
    </table>
<form action="creationP2I.php">
    <table id="canevas">
        
            <tr>
                <th colspan="2">Canevas :</th>
            </tr>
        
        <?php 
            foreach($afficheCanevas as $canevas):
        ?>
                <tr>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $canevas->nom_canevas; ?>" ></td>
                    <td><?php echo $canevas->nom_canevas; ?></td>
                </tr>
        <?php 
            endforeach; 
        ?>
    </table>

    <table id="form">
            <tr>
                <td>N° agent</td>
                <td><input class="inputForm" type="int" name="numAgent" required></td>
                <td style="width:5em;"></td>
                <td>Service : </td>
                <td>
                    <select name="service" id="service">
                        <?php foreach($services as $service){ ?>
                            <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td></td>
            </tr>

            <tr>
                <td>Nom agent : </td>
                <td><input class="inputForm" type="text" name="nomAgent" required></td>
                <td style="width:5em;"></td>
                <td>Prenom agent : </td>
                <td><input class="inputForm" type="text" name="prenomAgent" required></td>
            </tr>

            <tr>
                <td>Nom responsable : </td>
                <td><input class="inputForm" type="text" name="nomResponsable" required></td>
                <td style="width:5em;"></td>
                <td>Intitulé emploie : </td>
                <td><input class="inputForm" type="text" name="intituleEmploie" required></td>
            </tr>

            <tr>
                <td>Période d'essai du : </td>
                <td><input class="inputForm1" type="text" name="debutDureePeriodeEssai"></td>
                <td style="width:5em;"></td>
                <td>Au : </td>
                <td><input class="inputForm1" type="text" name="finDureePeriodeEssai"></td>
                
            </tr>

            <tr>
                <td>Stage probatoire du : </td>
                <td><input class="inputForm1" type="text" name="debutDureeStageProbatoire"></td>
                <td style="width:5em;"></td>
                <td>Au : </td>
                <td><input class="inputForm1" type="text" name="finDureeStageProbatoire"></td>
            </tr>
<!--  -->
            <tr>
                <td>Choix évaluation</td>
                <td>
                    <select name="choix" id="choix" require>
                        <option value=""></option>
                        <option value="Nouvel Emploie">Nouvel Emploie</option>
                        <option value="Mesure Promotionnel">Mesure Promotionne</option>
                        <option value="Mutation">Mutation</option>
                    </select>   
                </td>                    
            </tr>


            <tr>
                <td colspan="3"></td>
                <td><input type="submit" name="OK" value="Valider"> <input type ="button" onclick="window.location.href = 'suiviP2I.php';" value="Annuler"></input></td>
            </tr>
        </form>
    </table>

    <?php
        if(isset($_REQUEST['OK'])){
            $numAgent = $_REQUEST['numAgent'];
            $service = $_REQUEST['service'];
            $nomAgent = $_REQUEST['nomAgent']; 
            $prenomAgent = $_REQUEST['prenomAgent']; 
            $nomResponsable = $_REQUEST['nomResponsable']; 
            $intituleEmploie = $_REQUEST['intituleEmploie'];
            $choix = $_REQUEST['choix']; 

            $debutPeriodeEssai = $_REQUEST['debutDureePeriodeEssai']; 
            $dateAnglais = DateConvertiseurFrancaisAnglais($debutPeriodeEssai); 
            $finPeriodeEssai = $_REQUEST['finDureePeriodeEssai']; 
            $dateAnglaise = DateConvertiseurFrancaisAnglais($finPeriodeEssai); 

            $debutStageProbatoire = $_REQUEST['debutDureeStageProbatoire'];
            $debutStageProbatoires = DateConvertiseurFrancaisAnglais($debutStageProbatoire); 

            $finStageProbatoire = $_REQUEST['finDureeStageProbatoire'];
            $finStageProbatoires = DateConvertiseurFrancaisAnglais($finStageProbatoire); 

            $dateCreation = date("Y/m/d");
            $listeCheckbox= $_REQUEST['checkbox'];
            $checkbox=implode("|",$listeCheckbox);

            // print_r($listeCheckbox);

            $query="INSERT INTO `suivi`(`typeSuivi`, `dateCloture`, `nomResponsable`, `intituleEmploi`, `dateDebutPeriodeEssai`, `dateFinPeriodeEssai`, `dateDebutStageProbatoire`, `dateFinStageProbatoire`, `noms_canevas`, `dateCreation`, `numAgent`, `nomAgent`, `prenomAgent`, `serviceAgent`) VALUES ('P2I','','$nomResponsable','$intituleEmploie','$dateAnglais','$dateAnglaise','$debutStageProbatoires','$finStageProbatoires','$checkbox','$dateCreation','$numAgent','$nomAgent','$prenomAgent','$service')";
            // echo $query;
            $pdo->query($query);

            $query2 = "INSERT INTO P2I SELECT '', suivi.numAgent,Contenu_Canevas.nom_canevas,Contenu_Canevas.intitule,Contenu_Canevas.animateur,Contenu_Canevas.date_presentation_prevision,Contenu_Canevas.date_presentation_reelle,Contenu_Canevas.date_quiz,Contenu_Canevas.date_retour_quiz,Contenu_Canevas.commentaire,'','','','','','','' FROM suivi, Contenu_Canevas WHERE suivi.numAgent = $numAgent AND(";
            
            foreach($listeCheckbox as $checkboxx){ 
                $query2 = "$query2 Contenu_Canevas.nom_canevas = '$checkboxx' OR"; 
            };
            $query2 = "$query2 0)";
            
            // echo $query2;
            $pdo->query($query2);

            $query3 = "UPDATE `P2I` SET `mois`= 1 WHERE `numAgent` = $numAgent";
            // echo $query3;
            $pdo->query($query3);
            
            $query4 = "UPDATE `P2I` SET `avancementCanevas`= '0 %', `tauxGlobal`= '0 %' WHERE `numAgent` = $numAgent";
            // echo $query3;
            $pdo->query($query4);

            $query5="INSERT INTO `ContexteEvaluation`(`NumAgent`,`ChoixContexte`) VALUES ($numAgent, '$choix' )";
            // echo $query;
            $pdo->query($query5);

            $query6="INSERT INTO `Titularisation`(`numAgent`,`Personne`, `avisEssaie`, `dateDecisionEssai`, `signatureEssaie`,
            `avisTitularisation`, `dateTitularisation`, `signatureTitularisation`)
            VALUES ($numAgent, 'Responsable' ,'', '' , '','', '','')";
            // echo $query;
            $pdo->query($query6);

            $query7="INSERT INTO `Titularisation`(`numAgent`,`Personne`, `avisEssaie`, `dateDecisionEssai`, `signatureEssaie`,
            `avisTitularisation`, `dateTitularisation`, `signatureTitularisation`)
            VALUES ($numAgent, 'Directeur Adjoint' ,'', '' , '','', '','')";
            // echo $query;
            $pdo->query($query7);

            $query8="INSERT INTO `Titularisation`(`numAgent`,`Personne`, `avisEssaie`, `dateDecisionEssai`, `signatureEssaie`,
            `avisTitularisation`, `dateTitularisation`, `signatureTitularisation`)
            VALUES ($numAgent, 'Directeur' ,'', '' , '','', '','')";
            // echo $query;
            $pdo->query($query8);

            ?>
            <meta http-equiv="refresh" content="0; url=suiviP2I.php">
            <?php
            

            
            

            
        }
    ?>
    
  
</body>
</html>