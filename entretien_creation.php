<?php
    require_once "fonction.php";
    $creations = EntretienCreation();
    $personnes = listePersonne();
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
 
    <script type="text/javascript">
        // Initialisation JQUERY
        $(document).ready(function() {
        // dateTraitement = '';
        // Site Boostrap datePicker 
        // https://bootstrap-datepicker.readthedocs.io/en/latest/options.html

            $('.dat').datepicker({
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
            .body tr td{width:15em; }
            .body tr { margin-bottom: 10em;}
            .body{margin-left:200px; margin-bottom:2em}
            h1{text-align:center;}
            img { width: 10em;}
            .header { margin-bottom: 2em; }
            .header { border: none; width:100%; }
            .header td{width : 33%; }
            input, select, textarea { width: 400px; }
            .bouton{width: 150px}
           
            
        </style>
        <center>
            <table class="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Création d'un entretien</h1></td>
                    <td></td>
                </tr>
            </table>
        </center>

            <!-- Ajout des données dans la base de données-->
            <form action="entretien_creation.php" method="GET">  
                <table class="body">
                 <!-- date entretien -->
                    <tr>
                        <td><h5> Date de l'entretien</h5></td>
                        <td><input name="dat"  id="dat" class="dat" type="date" style="text-align:center;" ></td>
                    </tr>
                     <!-- liste déroulante des poste à pouvoir -->
                    <tr>
                        <td><h5>Poste à pourvoir</h5></td>
                        <!-- <td colspan="2"><input name="post"  id="post"  type="int" style="text-align:center;" ></td> -->
                        <td> 
                            
                            <select name="creat" id="creat">
                                <?php foreach($creations as $creation){ ?>
                                    <option value="<?php echo $creation->id; ?>"><?php echo $creation->Libelle_Emploi; ?></option>
                                    
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <!--Nom du candidat-->
                    <tr>
                        <td><h5>Nom Candidat</h5> </td>
                        <td><input name="nom"  id="nom"  type="text" style="text-align:center;" ></td>
                    </tr>
                    <!--Prénom du candidat-->
                    <tr>
                        <td><h5>Prénom Candidat </h5></td>
                        <td><input name="prenom"  id="prenom"  type="text" style="text-align:center;" ></td>
                    </tr>
                    <!-- type entretien -->
                    <tr>
                        <td><h5>Type d'entretien</h5></td>
                        <td>
                            <select name="type" id="type">
                                <option value=""></option>
                                <option value="Telephonique">Telephonique</option>
                                <option value="Présentiel Direction">Présentiel Direction</option>
                                <option value="Présentiel Cadre">Présentiel Cadre</option>
                            </select>
                        </td>
                    </tr>
                    <!-- Personne présentes -->
                    <tr> 
                    <td><h5>Personnes présentes :</h5</td>
                        <td>
                            <select name="pers" id="pers" >
                                <?php foreach($personnes as $personne){ ?>
                                    
                                    <option value="<?php echo $personne->Prenom[0]; ?><?php echo $personne->Nom [0].$personne->Nom [1]; ?>"><?php echo $personne->Prenom[0]; ?><?php echo $personne->Nom [0].$personne->Nom [1]; ?> </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <!-- zone commentaire -->
                    <tr> 
                        <td><h5>Commentaires</h5></td>
                        <td><textarea name="comm" id="" cols="50" rows="3"></textarea></td>
                    </tr>
                    <!-- case à cocher -->
                    <tr>
                        <td><h5>Entretien Cadre prévu :</h5></td> 
                        <td><input type="radio" name="radio"></td> 
                    </tr>
                    <tr>
                        <td><h5>Entretien Direction prévu :</h5></td> 
                        <td><input type="radio" name="radio"></td> 
                    </tr>
                </table> 
                <center>
                <!-- Bouton de validation et d'annulation -->
                
                    <input class="bouton" type="submit" name="valid" value="Validation">
                    <input class="bouton" type="button" onclick="window.location.href = 'entretien.php';" value="Annuler"/> 
                </center>  
            </form>

            <!-- ajouter (validation) des donnés supplémentaire dans la base de données -->
            <?php
                if (isset($_REQUEST['valid'])) {
            ?>
                    <?php
                        $date= $_REQUEST['dat'];
                        // Conversion date de anglais en français 
                        $dateAnglais = DateConvertiseurFrancaisAnglais($date);   
                        $poste=$_REQUEST['creat'];                           
                        $nom=$_REQUEST['nom'];
                        $prenom=$_REQUEST['prenom'];
                        $type=$_REQUEST['type'];
                        $personne=$_REQUEST['pres'];  
                        $comm=$_REQUEST['comm']; 
                    
                        /** requete SQL */
                        $query="INSERT INTO `entretien`(`Date_Debut_Entretien`,`Poste_id`,`Nom_Candidat`, `Prenom_Candidat`, `Type`, `Nom_Personne_Presente`, `Commentaires`) VALUES ('$dateAnglais','$poste','$nom','$prenom','$type','$personne','$comm')";
                        // echo $query;
                    ?>
                    <meta http-equiv="refresh" content="0; url=entretien.php?id=1&num=1">
                    <?php
                        $pdo->query($query)->fetchAll();
                    ?> 
            <?php 
                }	
            ?>    
                

    </body>
</html>



