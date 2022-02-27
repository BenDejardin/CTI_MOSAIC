<?php
require_once "fonction.php";
/** print_r($postepouvoirs);*/
$qualifs = AfficheQualif();
$libels = postePouvoir();
// barre de recherche
if (isset($_GET['recherche'])) {
    $libelle = $_GET['libel'];
    $qualification = $_GET['qualif'];
    $etat = $_GET['etat'];
    $dateDeb = $_GET['dateDeb'];
    $dateFin = $_GET['dateFin'];
    $dateDu = $_GET['dateDeb'];


    if (empty($libelle)) {
        $libelle = "*";
    }

    if (empty($qualification)) {
        $qualification = "*";
    }

    if (empty($etat)) {
        $etat = "*";
    }

    if (empty($dateDeb)) {
        $dateDeb = "*";
    }

    if (empty($dateFin)) {
        $dateFin = "*";
    }

    if (empty($dateDu)) {
        $dateDu = "*";
    }


    if ($dateDeb != "*") {
        $dateDeb = DateConvertiseurFrancaisAnglais($dateDeb);
    }

    if ($dateFin != "*") {
        $dateFin = DateConvertiseurFrancaisAnglais($dateFin);
    }

    if ($dateDu != "*") {
        $dateDu = DateConvertiseurFrancaisAnglais($dateDu);
    }

    $postepouvoirs =  RecherchePouvoir($libelle, $qualification, $etat, $dateDeb, $dateFin, $dateDu);
    // print_r($postePouvoirs);

} else {
    $postepouvoirs =  AffichePostePouvoir();
}

$title = "Poste à Pourvoir";
require_once('header.php');

?>

</div>

</header>

<div class="container page">
    <button class="btn btn-outline-bleu boutonRecherche" id="afficheRecherche">
        <i id="icone" class="bi bi-chevron-expand"></i> Recherche
    </button>
</div>
<div class="container m-top-1" id="recherche">

    <form method="GET">
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="libel" id="libelle" aria-label="Libellé">
                        <option value="" selected></option>
                        <?php foreach ($libels as $libel) { ?>
                            <option value="<?php echo $libel->Libelle_Emploi; ?>"><?php echo $libel->Libelle_Emploi; ?></option>
                        <?php } ?>
                    </select>
                    <label for="libelle">Libellé</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="qualif" id="niveau" aria-label="Niveau de qualification">
                        <option value="" selected></option>
                        <?php foreach ($qualifs as $qualif) { ?>
                            <option value="<?php echo $qualif->Niveau_Qualification; ?>"><?php echo $qualif->Niveau_Qualification; ?></option>
                        <?php } ?>
                    </select>
                    <label for="niveau">Niveau de qualification</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="etat" id="etat" aria-label="Etat">
                        <option value="" selected></option>
                        <option value="En cours">En cours</option>
                        <option value="Affecté">Affecté</option>
                        <option value="Abandonné">Abandonné</option>
                    </select>
                    <label for="etat">Etat</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="dateDu" name="dateDeb">
                    <label for="dateDu">Date du</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <input type="text" class="form-control" id="dateAu" name="dateFin">
                    <label for="dateAu">Date Au</label>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-bleu m-top-1" type="submit" name="recherche">Rechercher</button>
    </form>
</div>
<form method="GET">
    <div class="page">

        <table class="table">
            <thead>
                <tr class="table-bleu">
                    <th class="text-center" scope="col" rowspan="2">Date de création</th>
                    <th class="text-center" scope="col" rowspan="2">Libellé Emploi</th>
                    <th class="text-center" scope="col" rowspan="2">Niveau de qualification</th>
                    <th class="text-center" scope="col" rowspan="2">Profil recherché</th>
                    <th class="text-center" scope="col" rowspan="2">Service concerné</th>
                    <th class="text-center" scope="col" colspan="3">Nombres d'entretiens</th>
                    <th class="text-center" scope="col" rowspan="2">Etat</th>
                    <th class="text-center" rowspan="2"></th>
                </tr>
                <tr class="table-bleu">
                    <th class="text-center">Telephone</th>
                    <th class="text-center">Cadre</th>
                    <th class="text-center">Direction</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($postepouvoirs as $postepouvoir) : ?>
                    <tr>
                        <!-- <input type="hidden" name="id" value="<?php echo $postepouvoir->id; ?>"> -->
                        <td class="head"> <?php {
                                                echo DateConvertiseurAnglaisFrancais($postepouvoir->Date_Creation);
                                            } ?> </td>

                        <td class="head"> <?php echo $postepouvoir->Libelle_Emploi; ?> </td>
                        <td class="head"> <?php echo $postepouvoir->Niveau_Qualification; ?> </td>
                        <td class="head"> <?php echo $postepouvoir->Profil_Recherche; ?> </td>
                        <td class="head"> <?php echo $postepouvoir->Service; ?> </td>

                        <!-- le nombre de type dentretien telephonique effectier pour un poste -->
                        <?php $telephones = telephone($postepouvoir->id); ?>
                        <?php foreach ($telephones as $telephone) : ?>
                            <td class="head"><?php echo $telephone->nbTelephone ?></td>
                        <?php endforeach; ?>

                        <!-- le nombre de type dentretien cadre effectier pour un poste -->
                        <?php $cadres = cadre($postepouvoir->id); ?>
                        <?php foreach ($cadres as $cadre) : ?>
                            <td class="head"><?php echo $cadre->nbCadre; ?></td>
                        <?php endforeach; ?>


                        <!-- le nombre de type dentretien direction effectier pour un poste -->
                        <?php $directions = direction($postepouvoir->id); ?>
                        <?php foreach ($directions as $direction) : ?>
                            <td class="head"><?php echo $direction->nbDirection; ?></td>
                        <?php endforeach; ?>

                        <td class="head"> <?php echo $postepouvoir->Etat; ?> </td>


                        <!--<td><input type="submit" name="chk" value="modification"></td> -->
                        <td><input type="radio" name="radio" value="<?php echo $postepouvoir->id; ?>"></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="page text-center">
        <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'creation_pouvoir.php';" value="Création" />
        <input class="btn btn-outline-bleu" type="submit" name="mod" value="Modification">
        <input class="btn btn-outline-bleu" name="entr" type="submit" value="Entretien" />
        <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'index.php';" value="Menu principale" />
    </div>
</form>
</body>

<!-- boutton modification -->
<?php
if (isset($_GET['mod']) and isset($_GET['radio']) and $_GET['radio'] != 0) :
    $id = $_GET['radio'];
?>
    <meta http-equiv="refresh" content="0;url=modif_pouvoir.php?id=<?php echo ("$id") ?>">
<?php endif;
?>



<!-- boutton entretien -->
<?php
if (isset($_GET['entr']) && $_GET['entr'] == "Entretien" and isset($_GET['radio']) and $_GET['radio'] != 0) :
    $id = $_GET['radio'];
?>
    <meta http-equiv="refresh" content="0;url=entretien_pouvoir.php?id=<?php echo ("$id") ?>">
<?php endif;
?>


<script>
    let togg1 = document.getElementById("afficheRecherche");
    let d1 = document.getElementById("recherche");

    function togg() {
        if (getComputedStyle(d1).display != "none") {
            d1.style.display = "none";
            document.getElementById("icone").className = 'bi bi-chevron-expand';
        } else {
            d1.style.display = "block";
            document.getElementById("icone").className = 'bi bi-chevron-contract';
        }
    };
    togg1.onclick = togg;
</script>

</html>