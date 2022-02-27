<?php

require_once 'fonction.php';

$nomsCanevas = AfficheNomsCanevas();
// print_r ($nomsCanevas);

$title = "Canevas";
require_once('header.php');
?>
</div>
</header>

<form method="GET">
  <center>
    <div class="page col-md-8">

      <table class="table">
        <thead>
          <tr class="table-bleu">
            <th class="text-center">Date de création</th>
            <th class="text-center">Nom du Canevas</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody>
          <?php

          //  < Affiche les noms des canevas
          foreach ($nomsCanevas as $nomCanevas) :
          ?>

            <tr>
              <td><?php echo DateConvertiseurAnglaisFrancais($nomCanevas->date_creation_canevas); ?></td>
              <td><?php echo $nomCanevas->nom_canevas; ?></td>
              <td><input type="radio" name="radio" value="<?php echo $nomCanevas->nom_canevas; ?>"></td>
            </tr>

          <?php
          endforeach;
          //  >                                                                            
          ?>
        </tbody>
      </table>
    </div>
  </center>
  <div class="page text-center">
    <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'index.php';" value="Retour Menu" />
    <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'creationCanevas.php';" value="Création" />
    <input class="btn btn-outline-bleu" type="submit" name="OK" value="Modification">
    <input class="btn btn-outline-bleu" type="submit" name="OK" value="Visualisation">
  </div>

</form>

<?php

if (isset($_REQUEST['radio'])) {


  $nomCanevas = $_REQUEST['radio'];

  if ($_REQUEST['OK'] == "Modification" and $nomCanevas != "") :

?>
    <meta http-equiv="refresh" content="0; url=modificationCanevas.php?nomCanevas=<?php echo "$nomCanevas"; ?>">
  <?php endif; ?>

  <?php
  if ($_REQUEST['OK'] == "Visualisation" and $nomCanevas != "") :
  ?>
    <meta http-equiv="refresh" content="0; url=visualisationCanevas.php?nomCanevas=<?php echo "$nomCanevas"; ?>">
<?php endif;
} ?>

</table>
</center>
</body>

</html>