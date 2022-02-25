<?php
    require_once "fonction.php";
    /** recupération de l'id  */
    $id=$_GET['id'];
    /** id en paramétre qui fait appèle à la fonction  */
    $postepouvoirs = ModifPostePouvoir($id);
  $services = AfficheServices();
  $qualifs = AfficheQualif();
    /** print_r($postepouvoirs);*/ 
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
            .form tr td{width:15em; }
            .form { margin-bottom: 2em;}
            .form{margin-left:200px;}
            h1{text-align:center;}
            img { width: 10em;}
            .header { margin-bottom: 2em; }
            .header { border: none; width:100%; }
            .header td{width : 33%; }
            .form{border:none;}
            input, select{ width: 400px; }
            .bouton{width: 100px}
            
          
            

        </style>
        <center>
            <table class="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Modification d'un poste à pourvoir</h1></td>
                    <td></td>
                </tr>
            </table>
        </center>

            <form action="modif_pouvoir.php" method="GET">  
                <table class="form">
                    <?php foreach ($postepouvoirs as $postepouvoir) :?>
                            <tr>
                                <input name="id" type="hidden"value="<?php echo  $postepouvoir->id; ?>" >
                            </tr>
                            <tr>
                                <td><h5>Libellé Emploi :</h5></td>
                                <td><input name="libel"  id="libel" type="text" style="text-align:center;" value="<?php echo  $postepouvoir->Libelle_Emploi; ?>" required></td>
                            </tr>
                            <tr>
                                <td><h5>Niveau de qualification :</h5></td>
                                <td>
                                    <select name="qualif" id="qualif">
                                    <option value="<?php echo  $postepouvoir->Niveau_Qualification; ?>"><?php echo  $postepouvoir->Niveau_Qualification; ?></option>
                                        <?php foreach($qualifs as $qualif){ ?>
                                            <option value="<?php echo $qualif->Niveau_Qualification; ?>"><?php echo $qualif->Niveau_Qualification; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><h5>Service concerné :</h5></td>
                                <td>
                                    <select name="service" id="service">
                                    <option value="<?php echo  $postepouvoir->Service; ?>"><?php echo  $postepouvoir->Service; ?></option>
                                        <?php foreach($services as $service){ ?>
                                            <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><h5>Profil rechercher :</h5></td>
                                <td><input name="profil"  id="profil"  type="text" style="text-align:center; width: 400px; height: 100px " value="<?php echo  $postepouvoir->Profil_Recherche; ?>" required ></td>
                            </tr>
                            <tr>
                                <td><h5>Etat :</h5></td>
                                <td>
                                    <select name="etat" id="etat<?php echo $id ?>" value="">
                                        <option value="<?php echo  $postepouvoir->Etat; ?>"><?php echo  $postepouvoir->Etat; ?></option>
                                        <option value="En cours" >En cours</option>
                                        <option value="Abandonné">Abandonné</option>
                                        <option value="Affecté">Affecté</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><h5>Ref. expression besoin :</h5></td>
                                <td><input name="ref" id="ref" type="text" style="text-align:center; width: 400px; height: 40px "value="<?php echo  $postepouvoir->Expression_besoin; ?>"  ></td>
                            </tr>
                            <tr>
                                <td><h5>Nom Prénom candidat retenu:</h5></td>
                                <td><input name="ret" id="ret" type="text" style="text-align:center; width: 400px; height: 40px "value="<?php echo  $postepouvoir->Candidat_Retenu; ?>"  ></td>
                            </tr>
                            <tr>
                                <td><h5>Motif poste :</h5></td>
                                <td><input name="motif" id="motif" type="text" style="text-align:center; width: 400px; height: 80px "value="<?php echo  $postepouvoir->Motif_Poste; ?>" ></td>
                            </tr>
                                    
                        
                </table>
                    <?php endforeach; ?>
                <center>
                    <!-- Bouton de validation et d'annulation -->
                    <input class="bouton" type="submit" name="valid" value="Validation">
                    <input class="bouton" type="button" onclick="window.location.href = 'pouvoir.php';" value="Annuler"/>
                </center>
            </form>

            <!-- modification des informations dans la base de données -->
            <?php
                if (isset($_REQUEST['valid'])) {
            ?>
                    <?php
                        $id=$_REQUEST['id'];
                        $libelle=$_REQUEST['libel'];
                        $niveau=$_REQUEST['qualif'];                           
                        $profil=$_REQUEST['profil'];
                        $service=$_REQUEST['service'];
                        $etat=$_REQUEST['etat'];
                        $date= date("Y/m/d");
                        $ref=$_REQUEST['ref'];
                        $retenu=$_REQUEST['ret'];
                        $motif=$_REQUEST['motif'];
                        /** requete SQL */
                        $query="UPDATE `postePouvoir` SET `Libelle_Emploi`='$libelle',`Niveau_Qualification`='$niveau',`Profil_Recherche`='$profil',
                        `Service`='$service',`Etat`='$etat',`Date_Modification`='$date',
                        `Expression_besoin`='$ref',`Candidat_Retenu`='$retenu',`Motif_Poste`='$motif' WHERE `id`=$id" ;
                        //  echo $query;
                    ?>
                        <meta http-equiv="refresh" content="0; url=pouvoir.php?id=1&num=1"> 
                        <?php
                            $pdo->query($query);
                        ?> 
            <?php 
                }	
            ?>    

        
    </body>
</html>
