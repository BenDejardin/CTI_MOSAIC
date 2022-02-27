<?php
    require_once "fonction.php";
    /** recupération de l'id  */
    $id=$_GET['id'];
    /** id en paramétre qui fait appèle à la fonction  */
    $entretiens = VisualisationEntretien($id);
  
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
            .body tr td{width:15em; }
            .body tr { margin-bottom: 10em;}
            .body{margin-left:200px; margin-bottom:2em}
            h1{text-align:center;}
            img { width: 10em;}
            .header { margin-bottom: 2em; }
            .header { border: none; width:100%; }
            .header td{width : 33%; }
            input, select, textarea { width: 400px; }
            .but { width: 150px; }
            
            
        </style>
        <center>
            <table class="header">
                <tr>
                    <td><img src="img/logo.png"></td> 
                    <td><h1> Visualisation de l'entretien</h1></td>
                    <td></td>
                </tr>
            </table>
        </center>

            <!-- Ajout des données dans la base de données-->
            <form action="entretien_visualisation.php" method="GET">  
                <?php foreach ($entretiens as $entretien) :?>
                    <table class="body">
                        <tr>
                            <td><h5>Nom Candidat :</h5></td>
                            <td class="head"> <?php echo $entretien->Nom_Candidat; ?> </td>
                        </tr>
                        <tr>
                            <td><h5>Prénom Candidat :</h5></td>
                            <td class="head"> <?php echo $entretien->Prenom_Candidat; ?> </td>
                        </tr>
                        <tr>
                            <td><h5>Date de l'entretien :</h5></td>
                            <td class="head"> <?php if ($entretien->Date_Debut_Entretien != 0 ) { echo $entretien->Date_Debut_Entretien; } ?> </td>
                            
                        </tr>
                        <tr>
                            <td><h5>Poste id :</h5></td>
                            <td class="head"> <?php echo $entretien->Poste_id; ?> </td>
                        </tr>
                        <tr>
                            <td><h5>Type d'entretien :</h5></td>
                            <td class="head"> <?php echo $entretien->Type; ?> </td>
                        </tr>
                        <tr>
                            <td><h5>Personnes Présentes :</h5></td>
                            <td class="head"> <?php echo $entretien->Nom_Personne_Presente; ?> </td>
                        </tr>
                        <tr>
                            <td><h5>Commentaires :</h5></td>
                            <td class="head"> <?php echo $entretien->Commentaires; ?> </td>
                        </tr>
                    </table> 
                    <?php endforeach; ?>
                <center>
                <!-- Bouton de validation et d'annulation -->
                    <input class="but" type="button" onclick="window.location.href = 'entretien.php';" value="Retour au Menu"/> 
                </center>  
               
            </form>

    </body>
</html>



