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
            .body tr td{width:15em; }
            .body tr { margin-bottom: 10em;}
            .body{margin-left:200px; margin-bottom:2em}
            h1{text-align:center;}
            img { width: 10em;}
            .header { margin-bottom: 2em; }
            .header { border: none; width:100%; }
            .header td{width : 33%; }
            input, select, textarea { width: 400px; }
            .but{ float:center; width: 150px}
          
            
            
        </style>
        <center>
            <table class="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Création d'un poste à pourvoir</h1></td>
                    <td></td>
                </tr>
            </table>
        </center>

            <!-- Ajout des données dans la base de données-->
            <form action="creation_pouvoir.php" method="GET">  
                <table class="body">
                    <!-- libellé emploie en liste déroulante-->
                    <tr>
                        <td><h5>Libellé Emploi :</h5></td>
                        <td>
                            <select name="libel" id="libel<?php echo $i; ?>" value="">
                                <option value=""></option>
                                <option value="Integration">Intégration</option>
                                <option value="Analyste">Analyste </option>
                                <option value="Production">Production</option>
                                <option value="Manager">Manager</option>
                                <option value="Reseau">Reseau</option>
                                <option value="Cadre">Cadre</option>
                            </select>
                        </td>
                    </tr>
                    <!-- niveau qualification -->
                    <tr>
                        <td><h5>Niveau de qualification :</h5></td>
                        <td>
                            <select name="qualif" id="qualif">
                                <?php foreach($qualifs as $qualif){ ?>
                                    <option value="<?php echo $qualif->Niveau_Qualification; ?>"><?php echo $qualif->Niveau_Qualification; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <!-- service -->
                    <tr> 
                        <td><h5>Service concerné :</h5></td>
                        <td>
                            <select name="service" id="service">
                                <?php foreach($services as $service){ ?>
                                    <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                      <!-- profil -->
                      <tr>
                        <td><h5>Profil recherché :</h5></td>
                        <td><textarea name="profil" id="" cols="50" rows="10"></textarea></td>
                    </tr>
                </table> 

                <center>
                <!-- Bouton de validation et d'annulation -->
                    <input class="but" type="submit" name="valid" value="Validation">
                    <input class="but" type="button" onclick="window.location.href = 'pouvoir.php';" value="Retour au Menu"/>
                    
                </center>  
            </form>

            <!-- ajouter (validation) des donnés supplémentaire dans la base de données -->
            <?php
                if (isset($_REQUEST['valid'])) {
            ?>
                    <?php
                        $libelle=$_REQUEST['libel'];
                        $niveau=$_REQUEST['qualif'];                           
                        $profil=$_REQUEST['profil'];
                        $service=$_REQUEST['service'];
                        $date= date("Y/m/d");
                        $etat="En cours";
                        $cadre="0";
                        $telephone="0";
                        $direction="0";
                        /** requete SQL */
                        $query="INSERT INTO `postePouvoir`(`Date_Creation`,`Libelle_Emploi`, `Niveau_Qualification`, `Profil_Recherche`, `Service`, `Etat`,`Nombre_Entretien_Cadre`,`Nombre_Entretien_Telephone`,`Nombre_Entretien_Direction`) VALUES ('$date','$libelle','$niveau','$profil','$service','$etat','$cadre','$telephone','$direction')";
                        // echo $query;
                    ?>
                    <meta http-equiv="refresh" content="0; url=pouvoir.php?id=1&num=1">
                    <?php
                        $pdo->query($query)->fetchAll();
                    ?> 
            <?php 
                }	
            ?>    

    </body>
</html>



