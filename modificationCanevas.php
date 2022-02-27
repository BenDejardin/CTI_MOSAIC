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
    #header td, .tab td, .tab, #bouton td, #bouton { border: none; }
    img { width: 10em; }
    hr { color: black; margin: 4em 0em; }
    h2 { margin-bottom: 1em ; }
    .inputDate { width: 6em; }
    #inputAnim { width: 8em; }
    #inputInti { width: 22em; }
    /* #commentaire { width: 50em; height:20em; } */
    #tabModif tr td input { border : none; }
    .boutonInvisible { background: transparent; border: none; font-size:0;}

  </style>
  <center>
  <table id="header">
        <tr>
            <td><img src="img/logo.png"></td> 
            
                <td><h1>Canevas : <?php echo $afficheTousDuCanevas[0]->nom_canevas;?> </h1></td>
                <?php 
            ?>
        </tr>
    </table>

        <!-- affiche le contenu du canevas -->

        <table id="tabModif">
            <tr>
                <th>Intitulé</th>
                <th>Animateur</th>
                <th></th>
            </tr>   
                     <?php foreach ($afficheTousDuCanevas as $info):?>
                        <form action="modificationCanevas.php?nomCanevas=<?php echo"$nomCanevas";?>" method="GET">
                            <tr>
                                <input type="hidden" name="nomCanevas" value="<?php echo $info->nom_canevas; ?>" required>
                                <input type="hidden" name="idItem" value="<?php echo $info->id_item; ?>" required>
                                <td><input type="text" id="inputInti" name="intitule" value="<?php echo $info->intitule ?>" required></td>
                                <td><input type="text" id="inputAnim" name="animateur" value="<?php echo $info->animateur ?>" ></td>
                                <input type="submit" name="OK" value="Modifier" class="boutonInvisible">
                                <td><input type="submit" name="OK" value="Supprimer"></td>
                                
                            </tr>
                        </form>
                    <?php endforeach;?>
                        <form action="modificationCanevas.php">
                            <tr>
                                <input type="hidden" name="nomCanevas" value="<?php echo $nomCanevas ?>">
                                <td><input type="text" name="intitule" required></td>
                                <td><input type="text" name="animateur"></td>
                                <td><input type="submit" name="Ajouter" value="Ajout Ligne"></td>
                            </tr>
                        </form>
        </table>
            <table id="bouton">
                <tr>
                    
                    <td><form action="modificationCanevas.php">  
                            <input type="hidden" name="nomCanevas" value="<?php echo $nomCanevas ?>">
                            <input type="submit" name="supprimeCanevas" value="Supprimer le Canevas">
                        </form>
                    </td>
                    <td><input type="button" onclick="window.location.href = 'selectCanevas.php';" value="Retour Canevas"></input></td>
                </tr>
            </table>   
                   
         <!-- Supprime le Canevas -->
         <?php
        if ($_REQUEST['supprimeCanevas']=="Supprimer le Canevas") {
           
            $query="DELETE FROM `canevas` WHERE `canevas`.`nom_canevas` = '$nomCanevas'";
            // echo $query;
            $pdo->query($query);

            $query="DELETE FROM `Contenu_Canevas` WHERE `Contenu_Canevas`.`nom_canevas` = '$nomCanevas'";
            // echo $query;
            $pdo->query($query);

            ?><meta http-equiv="refresh" content="0; url=selectCanevas.php";?><?php
        }
        ?>
        <!--  -->

         <!-- recupere les informations en post et modifie la ligne -->
         <?php
        if ($_REQUEST['OK']=="Modifier") {
            $idItem=$_REQUEST['idItem'];
            $intitule=$_REQUEST['intitule'];
            $animateur=$_REQUEST['animateur'];

            $query="UPDATE `Contenu_Canevas` SET `intitule`='$intitule',`animateur`='$animateur' WHERE `id_item`=$idItem";
            // echo $query;
            $pdo->query($query);

            ?><meta http-equiv="refresh" content="0; url=modificationCanevas.php?nomCanevas=<?php echo"$nomCanevas";?>"><?php
        }
        ?>
        <!--  -->

        <!-- suprimer -->
        <?php
        if ($_REQUEST['OK']=="Supprimer") {
            $idItem=$_REQUEST['idItem'];

            $query="DELETE FROM `Contenu_Canevas` WHERE `Contenu_Canevas`.`id_item` = $idItem";
            // echo $query;
            $pdo->query($query);

            ?><meta http-equiv="refresh" content="0; url=modificationCanevas.php?nomCanevas=<?php echo"$nomCanevas";?>"><?php
        }
        ?>
        <!--  -->

        <!-- recupere les informations en post et ajoute la ligne -->
        <?php
        if (isset($_REQUEST['Ajouter'])) {
            $nomCanevas=$_REQUEST['nomCanevas'];
            $intitule=$_REQUEST['intitule'];
            $animateur=$_REQUEST['animateur'];

            $query="INSERT INTO `Contenu_Canevas`(`nom_canevas`,`intitule`, `animateur`) VALUES ('$nomCanevas','$intitule','$animateur')";
            // echo $query;
            $pdo->query($query);

            ?><meta http-equiv="refresh" content="0; url=modificationCanevas.php?nomCanevas=<?php echo"$nomCanevas";?>"><?php
        }
        ?>
        <!--  -->
  </center>
</body>
</html>