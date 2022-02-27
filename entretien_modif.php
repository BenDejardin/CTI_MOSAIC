<?php
     require_once "fonction.php";
     /** recupération de l'id  */
     $id=$_GET['id'];
     /** id en paramétre qui fait appèle à la fonction  */
     $modifs = ModifEntretien($id);
     $personnes = listePersonne();
    //  $postes = afficheEntrPoste($id);
   
    //  print_r($entretiens);
    //  echo($id); 
    include('Includes/globals.php');
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

            $('.Datedeb').datepicker({
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
            .form tr td{width:15em; }
            .form { margin-bottom: 2em;}
            .form{margin-left:200px;}
            h1{text-align:center;}
            img { width: 10em;}
            .header { margin-bottom: 2em; }
            .header { border: none; width:100%; }
            .header td{width : 33%; }
            .form{border:none;}
            /* input, select{ width: 400px; } */
            .bouton{width: 100px}
            
        </style>
        <center>
            <table class="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Modification d'un entretien</h1></td>
                    <td></td>
                    
                </tr>
            </table>
        </center>
        
            <form action="entretien_modif.php" method="GET">  
                <table class="form">
                    <?php foreach ($modifs as $modif) :?>
                        <tr>
                            <input name="id" type="hidden"value="<?php echo $modif->id; ?>" >
                            <input name="posteid" type="hidden"value="<?php echo $modif->Poste_id; ?>" >
                        </tr>
                            <tr>
                                <td><h5>Nom Candidat :</h5></td>
                                <td style="text-align:center;" ><?php echo $modif->Nom_Candidat; ?> </td>
                                <td><input name="nom" type="hidden" style="text-align:center;" value="<?php echo  $modif->Nom_Candidat; ?>" ></td>
                                
                            </tr>
                            <tr>
                                <td ><h5>Prénom Candidat :</h5></td>
                                <td style="text-align:center;" ><?php echo $modif->Prenom_Candidat; ?> </td>
                                <td><input name="prenom" type="hidden" style="text-align:center;" value="<?php echo  $modif->Prenom_Candidat; ?>" ></td>
                            </tr>
                            <tr>
                                <td><h5>Date de l' entretien :</h5></td>
                                <td style="text-align:center;" ><?php {echo DateConvertiseurAnglaisFrancais($modif->Date_Debut_Entretien);} ?> </td>  
                                <td><input name="Datedeb" type="hidden" class="Datedeb" style="text-align:center;" value="<?php if ($modif->Date_Debut_Entretien != 0 ) {echo DateConvertiseurAnglaisFrancais($modif->Date_Debut_Entretien);} ?>" required></td>
                                
                        </tr>
                        <tr>
                            <td><h5>Type :</h5></td>
                            <td style="text-align:center;"><?php echo $modif->Type; ?> </td>
                            <td><input name="type" type="hidden" style="text-align:center;" value="<?php echo  $modif->Type; ?>" ></td>
                        </tr>
 <!--  -->
                        <form action="entretien_modif.php">
                            <tr>
                                <td><h5>Personnes présentes : </h5> </td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input name="pers1" type="text" value="<?php echo  $modif->Nom_Personne_Presente; echo $_REQUEST['personnePresente']; ?>"  >
                                    <select name="pers" id="pers"  >
                                    <option value=""></option>
                                        <?php foreach($personnes as $personne){ ?>
                                            <!-- trigramme personnes présentes -->
                                            <option value="<?php echo $_REQUEST['personnePresente'].$personne->Prenom[0]; ?><?php echo $personne->Nom [0].$personne->Nom [1]; ?>"><?php echo $personne->Prenom[0]; ?><?php echo $personne->Nom [0].$personne->Nom [1]; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <input class="bouton" type="submit" name="ok" value="Ajout">
                                </td>
                            </tr>
                        </form>
<!--  -->
                        <tr>
                            <td><h5>Commentaires :</h5></td>
                            
                            <td><textarea name="comm" id="" cols="44" rows="8" style="text-align:center;" ><?php echo  $modif->Commentaires; ?></textarea></td>
                        </tr>
                </table>
                    <?php endforeach; ?>
                <center>
                    <!-- Bouton de validation et d'annulation -->
                    <input class="bouton" type="submit" name="valid" value="Validation">
                    <input class="bouton" type="button" onclick="window.location.href = 'entretien_pouvoir.php';" value="Annuler"/>
                </center>
            </form>
    
        <!-- modification des informations dans la base de données -->
        <?php
                if (isset($_REQUEST['valid'])) {
            ?>
                    <?php
                        $id=$_REQUEST['id'];
                        $poste_id=$_REQUEST['posteid'];                          
                        $personne=$_REQUEST['pers1'];
                        $commentaire=$_REQUEST['comm'];
                        /** requete SQL */
                        $query="UPDATE `entretien` SET `Nom_Personne_Presente`='$personne',`Commentaires`='$commentaire'  WHERE `id`=$id" ;
                        //  echo $query;
                    ?>
                    
                        <meta http-equiv="refresh" content="0; url=entretien_pouvoir.php?id=<?php echo("$poste_id") ?>"> 
                        <?php
                            $pdo->query($query);
                        ?> 
            <?php 
                }	
            ?>    

            <!-- Validation de la personne cocher dans le select -->
            <?php 
                if(isset($_REQUEST['ok'])){
                    $personnePresente = $_REQUEST['pers'].",";
                    $id = $_REQUEST['id'];
                    ?> <meta http-equiv="refresh" content="0; url=entretien_modif.php?personnePresente=<?php echo($personnePresente."&id=".$id);?>">  <?php
                }
            ?>
       
    </body>

</html>