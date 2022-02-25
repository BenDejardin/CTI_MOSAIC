<?php
    require_once "fonction.php";

   $id=$_GET['id'];
   $entretiens = AfficheEntretiens($id);
   $radios= radiosEntretien($id);
   $personnes = listePersonne();
 
   /** id en paramétre qui fait appèle à la fonction  */
   
   $postepouvoirs = creationEntretienPouvoir($id);
    
    /**print_r($postepouvoirs);*/
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
            table, th, .head { border: 1px solid black; margin-bottom:2em}
            h1{text-align: center;}
            img { width: 10em;}
            #header { width : 100%; margin-bottom: 2em; }
            #header{ border: none; }
            #header td{width : 33%; }
            .l{border: 1px solid black;}
            th{text-align:center;}
            tr td{text-align:center;}
        </style>
        <center>
            <table id="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Création d'un entretien</h1></td>
                    <td></td>
                </tr>
            </table>
            <!-- création d'un entretien pour un poste sélectionner -->
            <form action="entretien_pouvoir.php" method="GET">  
                <table class="body">
                    <?php foreach ($postepouvoirs as $postepouvoir) :?>
                    <tr>
                        <td><h5 style="text-align:center;">Poste : </h5> </td>
                        <td><?php echo $postepouvoir->Libelle_Emploi; ?></td>
                        <input type="hidden" name="poste" value="<?php echo $postepouvoir->id; ?>">
                    </tr>

                    <tr>
                        <td><h5 style="text-align:center;">Etat : </h5></td>
                        <td><?php echo $postepouvoir->Etat; ?> </td>
                        <input type="hidden" name="etat" value="<?php echo $postepouvoir->Etat; ?>">
                    </tr>

                    <tr> 
                        <td><h5 style="text-align:center;">Service : </h5></td>
                        <td>  <?php echo $postepouvoir->Service; ?></td>
                        <input type="hidden" name="service" value="<?php echo $postepouvoir->Service; ?>">
                    </tr>
                    <?php endforeach; ?> 

                    <tr>
                        <td>Date de l'entretien :</td>
                        <td><input name="dat" type="date" class="Datedeb" value="<?php echo $_REQUEST['dat'] ?>" style="text-align:center;" ></td>
                    </tr>
                    <tr>
                        <td>Nom Du canditat: </td>
                        <td><input name="nom" type="text" style="text-align:center;" value="<?php echo $_REQUEST['nom'] ?>" > </td>
                    </tr>
                    <tr>
                        <td>Prénom du candidat :</td>
                        <td><input name="prenom" type="text" style="text-align:center;" value="<?php echo $_REQUEST['prenom'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Type d'entretien :</td>
                        <td >
                            <select name="type" id="type" >
                                <option value="<?php echo $_REQUEST['type'] ?>"> <?php echo $_REQUEST['type'] ?> </option>
                                <option value="Telephonique">Telephonique</option>
                                <option value="Présentiel Direction">Présentiel Direction</option>
                                <option value="Présentiel Cadre">Présentiel Cadre</option>
                            </select>
                        </td>
                    </tr>
<!--  Choix multiple de personnes présentes-->
                   
                        <tr>
                            <td>Personnes présentes : </td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input name="pers1" type="text" value="<?php echo $_REQUEST['personnePresente']; ?>" >
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
                   

                    <tr> 
                        <td>Commentaires</td>
                        <td><textarea name="comm" id="" cols="50" rows="8"></textarea></td>
                    </tr>

                </table>
                <!--les boutons -->
                <input class="bouton" type="submit" name="valid" value="Création">
                <!-- <td> <input type="button" onclick="window.location.href = '#';" value="Visualisation"/></td> -->
                <td> <input type="button" onclick="window.location.href = 'pouvoir.php';" value="Annuler"/></td>
                
                <!-- affichage des information de l'entretien créer -->
                <table >
                    <h2 style="margin-top: 1.5em;">Les entretiens pour ce poste</h2>
                        <tr>
                            <th>Nom Candidat </th>
                            <th>Prénom Candidat </th>
                            <th>Date de l'entretien </th>
                            <th>Type </th>
                            <th>Personnes Présentes </th>
                            <th>Commentaires </th>
                            <th></th>
                        </tr>
                        <!-- boucle variable à 0 pour les radios -->
                        <?php $i=0;
                        foreach ($entretiens as $entretien) :?>
                            <tr>
                            <input type="hidden" name="id" value="<?php echo $entretien->id; ?>">
                                <td class="head"> <?php echo $entretien->Nom_Candidat; ?> </td>
                                <td class="head"> <?php echo $entretien->Prenom_Candidat; ?> </td>
                                <td class="head"> <?php if ($entretien->Date_Debut_Entretien != 0 )  {echo DateConvertiseurAnglaisFrancais($entretien->Date_Debut_Entretien);} ?> </td>
                               
                                <td class="head"> <?php echo $entretien->Type; ?> </td>
                                <td class="head"> <?php echo $entretien->Nom_Personne_Presente; ?> </td>
                                <td class="head"> <?php echo $entretien->Commentaires; ?> </td>
                              
                                    <td><input type="radio" name="radio" value="<?php echo $radios[$i]->id; ?>"></td>
                                    <?php $i++; ?>
                            </tr> 
                        <?php endforeach; ?>

                        <table class="tab2">
                            <tr> 
                                <td><input type="submit"  onclick="window.location.href = 'entretien_modif.php';" name="mod" value="Modification"></td>              
                                                   
                            </tr>
                        </table>
                </table>
                
                
            </form>
        </center>
         <!-- boutton modification -->  
         <?php 
                        if ($_REQUEST['mod']=="Modification") :
                            $id = $_REQUEST['radio'];
                            ?><meta http-equiv="refresh" content="0;url=entretien_modif.php?id=<?php echo("$id"); ?>">
                         <?php endif;
                    ?>

         <!-- ajouter (validation) des donnés supplémentaire dans la base de données -->
         <?php
                if (isset($_REQUEST['valid'])) {
            ?>
                    <?php
                        $date= $_REQUEST['dat'];  
                        // Conversion date de anglais en français 
                        $dateAnglais = DateConvertiseurFrancaisAnglais($date);                 
                        $nom=$_REQUEST['nom'];
                        $prenom=$_REQUEST['prenom'];
                        $type=$_REQUEST['type'];  
                        $personne=$_REQUEST['pers1'];
                        $commentaire=$_REQUEST['comm'];
                        $poste=$_REQUEST['poste'];
                        /** requete SQL */
                        $query="INSERT INTO `entretien`(`Date_Debut_Entretien`,`Nom_Candidat`, `Prenom_Candidat`, `Type`,Poste_id, `Nom_Personne_Presente`, `Commentaires`) VALUES ('$dateAnglais','$nom','$prenom','$type',$poste,'$personne','$commentaire')";
                        // echo $query;
                    ?>
                    <meta http-equiv="refresh" content="0; url=entretien_pouvoir.php?id=<?php echo($id);?>"> 
                    <?php
                        $pdo->query($query)->fetchAll();
                    ?> 
            <?php 
                }	
            ?>    
<!-- Validation de la personne cocher dans le select -->
            <?php 
                if(isset($_REQUEST['ok'])){
                    $personnePresente = $_REQUEST['pers'].",";
                    $id = $_REQUEST['id'];
                    $date= $_REQUEST['dat']; 
                    $nom = $_REQUEST['nom'];
                    $prenom=$_REQUEST['prenom'];
                    $type=$_REQUEST['type'];

                    ?> <meta http-equiv="refresh" content="0; url=entretien_pouvoir.php?personnePresente=<?php echo($personnePresente."&id=".$id. "&dat=".$date. "&nom=".$nom. "&prenom=".$prenom. "&type=". $type );?>">  <?php
                }
            ?>


    </body>
</html>


             





 