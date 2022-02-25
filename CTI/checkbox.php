
<?php
  require_once "fonction.php";
  $checkbox1 = $_POST['chkl'] ; 
  if ($_POST["Submit" ]=="Submit")  
  {  
  for ($i=0; $i<sizeof ($checkbox1);$i++) {  
  $query="SELECT `id`, `Date_Creation`, `Libelle_Emploi`, `Niveau_Qualification`, `Profil_Recherche`, `Service`, `Nombre_Entretien_Telephone`,
   `Nombre_Entretien_Cadre`, `Nombre_Entretien_Direction`, `Etat`, `Date_Modification` FROM `postePouvoir`";  
  mysql_query($query) or die(mysql_error());  
  }  
  echo "Record is inserted"; 
?>