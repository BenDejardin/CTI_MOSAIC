<?php

require_once 'fonction.php';
$numAgent = $_REQUEST['numAgent'];

$afficheNomCanevas = AfficheLesNomsCanevas($numAgent);
$contenuP2i = AfficheTousP2iDuAgent($numAgent);
$suiviVoulu = AfficheSuiviVoulu($numAgent);
$nomsCanevasSelectionner= explode("|",$suiviVoulu[0]->noms_canevas);
$nbCanevas = count($nomsCanevasSelectionner);
$plusGrandMois = AfficheValeurPlusGrandMois($numAgent);
$commentaire = AfficheCommentaire($numAgent);
// print_r($contenuP2i);
$titularisation = afficheTitularisation($numAgent);
// print_r("I".$titularisation[2]->avisTitularisation."I");

?>

<!DOCTYPE html>
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
        .tableau,.commentaire { width: 100%; }
        th { text-align: center; }
        .commentaire td{height: 10em}
        .commentaire { display:none; } 
        .boutonInvisible { background: transparent; border: none; font-size:0;}

    </style>
    
    <table id="header">
            <tr>
                <td><img src="img/logo.png"></td> 
                <td><h1>Titularisation</h1></td>
            </tr>
        </table>

    <!--  -->
    
        <table class="tableau">
               
                <tr>
                    <td></td>
                    <th colspan="2">BILAN DE LA PÉRIODE D'ESSAI</th>
                    <th colspan="2">TITULARISATION</th>
                </tr>
            <form action="modificationP2I_Titularisation.php">
                <input type="hidden" name="numAgent" value="<?php echo $numAgent ;?>" >
                <tr>
                    <th rowspan="2">Proposition du responsable de service</th>
                    <td><input type="radio" name="responsable" value="Positif" <?php if($titularisation[0]->avisEssaie == "Positif"){ echo "checked";}?>>Positif</td>
                    <td rowspan="2">Signature : <input type="text" name="resp" value="<?php echo $titularisation[0]->signatureEssaie ?>"></td>
                    <td><input type="radio" name="service" value="Titularisation" <?php if($titularisation[0]->avisTitularisation == "Titularisation"){ echo "checked";}?>>Titularisation</td>
                    <td rowspan="2">Signature : <input type="text" name="serv" value="<?php echo $titularisation[0]->signatureTitularisation ?>" ></td>
                </tr>
                <tr>
                    <td><input type="radio" name="responsable" value="Négatif" <?php if($titularisation[0]->avisEssaie == "Négatif"){ echo "checked";}?>>Négatif</td>
                    <td><input type="radio" name="service" value="Non titularisation" <?php if($titularisation[0]->avisTitularisation == "Non titularisation"){ echo "checked";}?>>Non titularisation</td>
                    
                </tr>
                <input type ="submit" class="boutonInvisible" name="valide" value="Ajout"></input>
            </form>

            <form action="modificationP2I_Titularisation.php">
                <input type="hidden" name="numAgent" value="<?php echo $numAgent ;?>" >
                <tr>
                    <th rowspan="2">Avis du Directeur Adjoint</th>
                    <td><input type="radio" name="avis" value="Positif" <?php if($titularisation[1]->avisEssaie == "Positif"){ echo "checked";}?>>Positif</td>
                    <td rowspan="2">Signature : <input type="text" name="av" value="<?php echo $titularisation[1]->signatureEssaie ?>" > </td>
                    <td><input type="radio" name="adjoint" value="Titularisation" <?php if($titularisation[1]->avisTitularisation == "Titularisation"){ echo "checked";}?>>Titularisation</td>
                    <td rowspan="2">Signature : <input type="text" name="adj" value="<?php echo $titularisation[1]->signatureTitularisation ?>" > </td>
                </tr>
                <tr>
                    <td><input type="radio" name="avis" value="Négatif" <?php if($titularisation[1]->avisEssaie == "Négatif"){ echo "checked";}?>>Négatif</td>
                    <td><input type="radio" name="adjoint" value="Non titularisation" <?php if($titularisation[1]->avisTitularisation == "Non titularisation"){ echo "checked";}?>>Non titularisation</td>
                    
                </tr>
                <input type ="submit" class="boutonInvisible" name="vali" value="Ajout"></input>
            </form>

            <form action="modificationP2I_Titularisation.php">
                <input type="hidden" name="numAgent" value="<?php echo $numAgent ;?>" >
                <tr>
                    <th rowspan="2">Décision du Directeur</th>
                    <td><input type="radio" name="directeur" value="Positif" <?php if($titularisation[2]->avisEssaie == "Positif"){ echo "checked";}?>>Positif</td>
                    <td rowspan="2">Signature : <input type="text" name="direct" value="<?php echo $titularisation[2]->signatureEssaie ?>"v> </td>
                    <td><input type="radio" name="decision" value="Titularisation" <?php if($titularisation[2]->avisTitularisation==" Titularisation"){ echo "checked";}?>>Titularisation</td>
                    <td rowspan="2">Signature : <input type="text" name="decis" value="<?php echo $titularisation[2]->signatureTitularisation ?>" >  </td>
                </tr>
                <tr>
                    <td><input type="radio" name="directeur" value="Négatif" <?php if($titularisation[2]->avisEssaie != "Négatif"){} else { echo "checked";}?>>Négatif</td>
                    
                    <td><input type="radio" name="decision" value="Non titularisation" <?php if ($titularisation[2]->avisTitularisation == " Non titularisation") { echo "checked";} ?>>Non titularisation</td>
                    
                </tr>
                <input type ="submit" class="boutonInvisible" name="valides" value="Ajout"></input>
            </form>
        </table>

        <center>
        
            <input type="hidden" name=numAgent value="<?php echo $numAgent; ?>" required>
            <input type ="button" onclick="window.location.href = 'suiviP2I.php';" value="Retour P2I"></input>
            <?php 
                for ($i=1; $i<=$plusGrandMois[0]->moisMax ; $i++){
                    ?><input type ="button" onclick="window.location.href = 'modificationP2I.php?numAgent=<?php echo $numAgent.'&mois='.$i; ?>';" value="Mois <?php echo $i; ?>"></input><?php
            }    
            ?>   
        </center>   
    </form>


        <!-- Proposition du responsable de service-->
        <?php
            if (isset($_REQUEST['valide'])) {
        ?>
            <?php
                $numAgent=$_REQUEST['numAgent'];
                $avisResponsable= $_REQUEST['responsable'];
                $signatureService=$_REQUEST['resp'];
                $avisTitularisation=$_REQUEST['service'];  
                $signatureResponsable=$_REQUEST['serv'];
                $date= date("Y/m/d");
                if($avisTitularisation != ""){
                    $date2=date("Y/m/d");
                }
                        
                /** requete SQL */
                $query1="UPDATE `Titularisation` SET `avisEssaie`='$avisResponsable' ,`dateDecisionEssai`='$date',`signatureEssaie`='$signatureService',
                `avisTitularisation`='$avisTitularisation',`dateTitularisation`='$date2',`signatureTitularisation`='$signatureResponsable' WHERE `Personne`='Responsable' ";
                // echo $query1;
            ?>
                <meta http-equiv="refresh" content="0; url=modificationP2I_Titularisation.php?numAgent=<?php echo $numAgent;?>">
            <?php
                $pdo->query($query1);
            ?> 
            <?php 
                }	
            ?>    

            <!-- Avis du Directeur Adjoint -->
            <?php
                if (isset($_REQUEST['vali'])) {
            ?>
            <?php
                $numAgent=$_REQUEST['numAgent'];
                $directeurAdjoint=$_REQUEST['avis'];
                $signatureAdjoint=$_REQUEST['av'];
                $directeurTitularisation=$_REQUEST['adjoint'];
                $signatureTitularisation=$_REQUEST['adj'];
                $date= date("Y/m/d");
                if($directeurTitularisation != ""){
                    $date2=date("Y/m/d");
                }
           
                /** requete SQL */
                $query2=" UPDATE `Titularisation` SET `avisEssaie`='$directeurAdjoint' ,`dateDecisionEssai`='$date',`signatureEssaie`='$signatureAdjoint',`avisTitularisation`='$directeurTitularisation',
                `dateTitularisation`='$date2',`signatureTitularisation`='$signatureTitularisation' WHERE `Personne`='Directeur Adjoint' ";

                // echo $query2;
            ?>
                <meta http-equiv="refresh" content="0; url=modificationP2I_Titularisation.php?numAgent=<?php echo $numAgent;?>">
            <?php
                $pdo->query($query2);
            ?> 
             <?php 
                }	
            ?>    

            <!-- Décision du Directeur -->
            <?php
                if (isset($_REQUEST['valides'])) {
            ?>
             <?php
                $numAgent=$_REQUEST['numAgent'];
                $decisionDirecteur=$_REQUEST['directeur']; 
                $signatureDirecteur=$_REQUEST['direct'];
                $decisionTitularisation=$_REQUEST['decision']; 
                $signatureDecison=$_REQUEST['decis'];
                $date= date("Y/m/d");
                if($decisionTitularisation != ""){
                    $date2=date("Y/m/d");
                }
                        
                /** requete SQL */
                $query3=" UPDATE `Titularisation` SET `avisEssaie`='$decisionDirecteur' ,`dateDecisionEssai`='$date',`signatureEssaie`='$signatureDirecteur',
                `avisTitularisation`=' $decisionTitularisation',`dateTitularisation`='$date2',
                `signatureTitularisation`='$signatureDecison' WHERE `Personne`='Directeur'";

                // echo $query3;
            ?>
                <meta http-equiv="refresh" content="0; url=modificationP2I_Titularisation.php?numAgent=<?php echo $numAgent;?>">
            <?php
                $pdo->query($query3);
            ?> 
            <?php 
                }	
            ?>    

    </body>
</html>