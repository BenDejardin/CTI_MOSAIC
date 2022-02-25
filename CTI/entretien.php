<?php
    require_once "fonction.php";

    $pouvoirs = postePouvoir();
    $types = AfficheType();
    // print_r($types);

// barre de recherche
    if ($_REQUEST['recher'] == "Recherche"){
        $nom =$_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $entretienType = $_REQUEST['type'];
        $pouvoir = $_REQUEST['pouvoir'];
        $dateDeb = $_REQUEST['dateDeb'];
        $dateFin = $_REQUEST['dateFin'];
        $dateDu = $_REQUEST['dateDeb'];

        if (empty($nom)){
            $nom="*";
        }

        if (empty($prenom)){
            $prenom="*";
        }

        if (empty($entretienType)){
            $entretienType="*";
        }

        if (empty($pouvoir)){
            $pouvoir="*";
        }

        if (empty($dateDeb)){
            $dateDeb="*";
        }

        if (empty($dateFin)){
            $dateFin="*";
        }

        if (empty($dateDu)){
            $dateDu="*";
        }

        if ($dateDeb != "*"){
            $dateDeb= DateConvertiseurFrancaisAnglais($dateDeb);
        }
   
        if($dateFin != "*"){
            $dateFin= DateConvertiseurFrancaisAnglais($dateFin);
        }

         if($dateDu != "*"){
            $dateDu= DateConvertiseurFrancaisAnglais($dateDu);
        }


    $entretiens =  RechercheEntretien($nom, $prenom, $entretienType, $pouvoir, $dateDeb, $dateFin, $dateDu);
    // print_r($postePouvoirs);

    ?>
        
    <?php       
}

    
    else{
        $entretiens = AfficheEntretien();
    }

    if($nom == "*" && $prenom == "*"  && $entretienType == "*"  && $pouvoir == "*" && $dateDeb == "*" && $dateFin == "*" && $dateDu == "*" ){ 
        $entretiens = AfficheEntretien();
    }
    
   
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

            $('.periode').datepicker({
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
            .rech, th, .head{ border: 1px solid black; }
            .champ{border: none; margin-bottom:2em}
            h1{text-align: center;}
            img { width: 10em;}
            .header { width : 100%; margin-bottom: 2em; }
            .header, .rech{ border: none; }
            .header td{width : 33%; }
            th{text-align:center;}
            tr td{text-align:center;}
            select, .rech input{width: 13.5em;}
            
        </style>
        <center>
            <table class="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Suivi des Entretiens</h1></td>
                    <td></td>
                </tr>
            </table>

            <form action="entretien.php">
                <table class="rech">
                    <tr>
                        <td >
                            Nom : 
                        </td>
                        <td>
                            <input name="nom" type="texte" placeholder="Nom…">
                        </td>
                        
                        <td >Prénom : </td>
                        <td >
                            <input name="prenom" type="texte" placeholder="Prénom…">
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="" >Date entretien : </td>
                            <td >
                                <input class="periode" name="dateDeb" type="date" placeholder="Du…" >
                                <input class="periode" name="dateFin" type="dateFin" placeholder="Au…" >
                               
                            </td>
                            
                    </tr>
                    <tr>
                            <!-- liste déroulante de poste a pouvoir -->
                        <td>  Poste à pouvoir : </td>
                        <td colspan="">
                            <select name="pouvoir" id="pouvoir">
                                <option value=""></option>
                                <?php foreach($pouvoirs as $pouvoir){ ?>
                                    <option value="<?php echo $pouvoir->Libelle_Emploi; ?>"><?php echo $pouvoir->Libelle_Emploi; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        
                        <td > Type d'entretien : </td>
                        <td colspan="">
                            <select name="type" id="type">
                            <option value=""></option>
                                <?php foreach($types as $type){ ?>
                                    <option value="<?php echo $type->Type; ?>"><?php echo $type->Type; ?></option>
                                <?php } ?>
                            </select>
                        </td>      
                    </tr>
                    
                    <tr>
                            <td colspan=8>
                                <input type="submit" name="recher" id="recher"  value="Recherche" style="margin-top:1.5em;" />
                            </td>
                        </tr>
                </table>
            </form>
            <!-- liste vide avec tout les champs -->
            <table class="champ" style="margin-top:2em;">
                    <thead >
                        <tr>
                            <th scope="col">Date de l'entretien</th>
                            <th scope="col">Nom du candidat</th>
                            <th scope="col">Prénom du candidat</th>
                            <th scope="col">Poste de l'entretien</th>
                            <th scope="col">Type d'entretien</th>
                            <th scope="col">Noms personnes présentes</th>
                            <th scope="col">Commentaire</th>
                            <th></th>
                        </tr>
                    </thead> 
                    
                    <form action="entretien.php" method="GET">
                        <?php foreach ($entretiens as $entretien) :?>
                            <tr>
                                <input type="hidden" name="id" value="<?php echo $entretien->id; ?>">
                                <td class="head"> <?php {echo DateConvertiseurAnglaisFrancais($entretien->Date_Debut_Entretien);} ?> </td>
                                <td class="head"> <?php echo $entretien->Nom_Candidat; ?> </td>
                                <td class="head"> <?php echo $entretien->Prenom_Candidat; ?> </td>
                                    
                         <!-- Remplacer l'affichage du poste_id par son libelléèEmploi -->
                                <?php
                                 $postes = AfficheLibelleId($entretien->Poste_id); 
                                ?>
                                <td class="head"><?php echo $postes[0]->Libelle_Emploi; ?></td>
                                <input type="hidden" name="poste" value="<?php echo $postes[0]->id; ?>">
                                
                                <td class="head"> <?php echo $entretien->Type; ?> </td>
                                <td class="head"> <?php echo $entretien->Nom_Personne_Presente; ?> </td>
                                <td class="head"> <?php echo $entretien->Commentaires; ?> </td>
                                <td class="head"><input type="radio" name="radio" value="<?php echo $entretien->id; ?>"></td> 
                            </tr>
                        <?php endforeach; ?> 
                        
                         <!-- les boutons d'accès -->
                        <table class="tab2">
                            <tr>
                                <!-- <td> <input type="button" onclick="window.location.href = 'entretien_creation.php';" value="Création"/></td>  -->
                                <td><input type="submit" name="mod" value="Modification"></td> 
                                <td> <input type="button" onclick="window.location.href = 'index.php';" value="Menu principal"/></td>               
                                                   
                            </tr>
                        </table>
                    </form>

                   <!-- boutton modification -->  
                    <?php 
                        if ($_REQUEST['mod']=="Modification" and $_REQUEST['radio'] != 0) :
                            $id = $_REQUEST['radio'];
                            ?><meta http-equiv="refresh" content="0;url=modif_entretien.php?id=<?php echo("$id") ?>">
                         <?php endif;
                    ?>
                    
        </center>

</body>
</html>


