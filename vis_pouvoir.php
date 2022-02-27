
<?php
    require_once "fonction.php";
    /** recupération de l'id  */
    $id=$_GET['id'];
    /** id en paramétre qui fait appèle à la fonction  */
    $postepouvoirs = visPouvoir($id);

    $telephones= telephone($id);
    $cadres= cadre($id);
    $directions = direction($id);
    // print_r($telephones);
  
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
            h1{text-align: center;}
            img { width: 10em;}
            #header { width : 100%; margin-bottom: 2em; }
            #header{ border: none; }
            .tab2{ border: none; }
            #header td{width : 33%; }
            th{text-align:center;}
            .body tr td{width:25em; }
            .body tr { margin-bottom: 10em;}
            .body{margin-left:200px; margin-bottom:2em}
        </style>
        <center>
                <table id="header">
                    <tr>
                        <td ><img src="img/logo.png"></td> 
                        <td ><h1>Visualisation du poste</h1></td>
                        <td ></td>
                    </tr>
                </table>
        </center>
            <form action="pouvoir.php" method="GET">
               
                <table class="body">
                    <?php foreach ($postepouvoirs as $postepouvoir) :?>
                        <tr>
                            <td><h5>Date de création :</h5></td>
                            <td> <?php echo $postepouvoir->Date_Creation; ?> <td>
                        </tr>
                        <tr>
                            <td><h5>Poste :</h5></td>
                            <td><?php echo $postepouvoir->Libelle_Emploi; ?></td>
                        </tr>
                        <tr>
                            <td><h5>Niveau de qualification :</h5></td>
                            <td><?php echo $postepouvoir->Niveau_Qualification; ?></td>
                        </tr>
                        <tr>
                            <td><h5>Profil rechercher :</h5></td>
                            <td><?php echo $postepouvoir->Profil_Recherche; ?> </td>
                        </tr>
                        <tr>
                            <td><h5>Service concerné :</h5></td>
                            <td><?php echo $postepouvoir->Service; ?></td>
                        </tr>
                    <!-- le nombre de type dentretien effectier pour un poste -->
                        <?php foreach ($telephones as $telephone) :?>
                            <tr>
                                <td><h5>Nombre d'entretiens téléphone effectués :</h5></td>
                                <td><?php echo $telephone->nbTelephone ?></td>
                            </tr>
                        <?php endforeach; ?>  

                        <?php foreach ($cadres as $cadre) :?>
                            <tr>
                                <td><h5>Nombre d'entretiens cadre effectués :</h5></td>
                                <td><?php echo $cadre->nbCadre; ?></td>
                            </tr>
                        <?php endforeach; ?> 

                         <?php foreach ($directions as $direction) :?>          
                            <tr>
                                <td><h5>Nombre d'entretiens direction effectués :</h5></td>
                                <td><?php echo $direction->nbDirection; ?></td>
                            </tr>
                        <?php endforeach; ?> 

                        <tr>
                            <td><h5>Etat :</h5></td>
                            <td><?php echo $postepouvoir->Etat; ?></td>
                        </tr>
                        <tr>
                            <td><h5>Date de modification :</h5></td>
                            <td><?php echo $postepouvoir->Date_Modification; ?> </td>
                        </tr>
                    <?php endforeach; ?>    

                </table>
               
    
                <!-- les boutons d'accès -->
                <center>
                    <!-- Bouton de validation et d'annulation -->
                    <input class="but" type="button" onclick="window.location.href = 'pouvoir.php';" value="Retour au Menu"/> 
                </center>
            </form>

    </body>

</html>

