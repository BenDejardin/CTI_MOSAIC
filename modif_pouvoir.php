<?php
require_once "fonction.php";
/** recupération de l'id  */
$id = $_GET['id'];
/** id en paramétre qui fait appèle à la fonction  */
$postepouvoir = ModifPostePouvoir($id)[0];
$services = AfficheServices();
$qualifs = AfficheQualif();
// print_r($postepouvoir);

$title = "Modification d'un poste à pourvoir";
require_once('header.php');
?>

</div>

</header>


<div class="container page">
    <form>
        <input name="id" type="hidden" value="<?php echo  $postepouvoir->id; ?>">
        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="libel" id="libelle" aria-label="Libellé de l'emploi">
                        <option value="<?= $postepouvoir->Libelle_Emploi; ?>"><?= $postepouvoir->Libelle_Emploi; ?></option>
                        <option value="Integration">Intégration</option>
                        <option value="Analyste">Analyste </option>
                        <option value="Production">Production</option>
                        <option value="Manager">Manager</option>
                        <option value="Reseau">Reseau</option>
                        <option value="Cadre">Cadre</option>
                    </select>
                    <label for="libelle">Libellé de l'emploi</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="libel" id="libelle" aria-label="État">
                        <option value="<?= $postepouvoir->Etat; ?>"><?= $postepouvoir->Etat; ?></option>
                        <option value="En cours">En cours</option>
                        <option value="Abandonné">Abandonné</option>
                        <option value="Affecté">Affecté</option>
                    </select>
                    <label for="libelle">État</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="qualif" id="niveau" aria-label="Niveau de qualification">
                        <option value="<?= $postepouvoir->Niveau_Qualification; ?>"><?= $postepouvoir->Niveau_Qualification; ?></option>
                        <?php foreach ($qualifs as $qualif) { ?>
                            <option value="<?php echo $qualif->Niveau_Qualification; ?>"><?php echo $qualif->Niveau_Qualification; ?></option>
                        <?php } ?>
                    </select>
                    <label for="niveau">Niveau de qualification</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select select" name="service" id="service" aria-label="Services concerné">
                        <option value="<?= $postepouvoir->Service; ?>"><?= $postepouvoir->Service; ?></option>
                        <?php foreach ($services as $service) { ?>
                            <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                        <?php } ?>
                    </select>
                    <label for="service">Services concerné</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <input type="text" class="form-control" name="profil" id="profil" value="<?= $postepouvoir->Profil_Recherche; ?>">
                    <label for="profil">Profile recherché</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <input type="text" class="form-control" name="ref" id="besoin" value="<?= $postepouvoir->Expression_besoin; ?>">
                    <label for="besoin">Ref. expression besoin</label>
                </div>
            </div>
        </div>

        <div class="page text-center">
            <input class="btn btn-outline-bleu float-start" type="button" onclick="window.location.href = 'pouvoir.php';" value="Retour liste" />
            <button class="btn btn-outline-bleu float-end" type="submit" name="valid">Valider</button>
        </div>

    </form>

    <!-- modification des informations dans la base de données -->
    <?php
    if (isset($_REQUEST['valid'])) {
    ?>
        <?php
        $id = $_REQUEST['id'];
        $libelle = $_REQUEST['libel'];
        $niveau = $_REQUEST['qualif'];
        $profil = $_REQUEST['profil'];
        $service = $_REQUEST['service'];
        $etat = $_REQUEST['etat'];
        $date = date("Y/m/d");
        $ref = $_REQUEST['ref'];
        $retenu = $_REQUEST['ret'];
        $motif = $_REQUEST['motif'];
        /** requete SQL */
        $query = "UPDATE `postePouvoir` SET `Libelle_Emploi`='$libelle',`Niveau_Qualification`='$niveau',`Profil_Recherche`='$profil',
                        `Service`='$service',`Etat`='$etat',`Date_Modification`='$date',
                        `Expression_besoin`='$ref',`Candidat_Retenu`='$retenu',`Motif_Poste`='$motif' WHERE `id`=$id";
        //  echo $query;
        ?>
        <meta http-equiv="refresh" content="0; url=pouvoir.php?id=1&num=1">
        <?php
        $pdo->query($query);
        ?>
    <?php
    }
    ?>


    </body>

    </html>