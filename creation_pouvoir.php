<?php
require_once "fonction.php";
/**$postepouvoirs = AffichePostePouvoir();
    /** print_r($postepouvoirs);*/
$services = AfficheServices();
$qualifs = AfficheQualif();

$title = "Création d'un poste";
require_once('header.php');
?>

</div>

</header>

<div class="container page">
    <form>
        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="libel" id="libelle" aria-label="Libellé de l'emploi">
                        <option value=""></option>
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
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="qualif" id="niveau" aria-label="Niveau de qualification">
                        <option value=""></option>
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
                        <option value=""></option>
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

                    <input type="text" class="form-control" name="profil" id="profil">
                    <label for="profil">Profile recherché</label>
                </div>
            </div>
        </div>

        <div class="page text-center">
            <input class="btn btn-outline-bleu float-start" type="button" onclick="window.location.href = 'pouvoir.php';" value="Retour liste" />
            <button class="btn btn-outline-bleu float-end" type="submit" name="valid">Valider</button>
        </div>

    </form>

    <?php
    if (isset($_REQUEST['valid'])) {
        $libelle = $_REQUEST['libel'];
        $niveau = $_REQUEST['qualif'];
        $profil = $_REQUEST['profil'];
        $service = $_REQUEST['service'];
        $date = date("Y/m/d");
        $etat = "En cours";
        $cadre = "0";
        $telephone = "0";
        $direction = "0";
        /** requete SQL */
        $query = "INSERT INTO `postePouvoir`(`Date_Creation`,`Libelle_Emploi`, `Niveau_Qualification`, `Profil_Recherche`, `Service`, `Etat`,`Nombre_Entretien_Cadre`,`Nombre_Entretien_Telephone`,`Nombre_Entretien_Direction`) VALUES ('$date','$libelle','$niveau','$profil','$service','$etat','$cadre','$telephone','$direction')";
        // echo $query;
    ?>
        <meta http-equiv="refresh" content="0; url=pouvoir.php?id=1&num=1">
        <?php
        $pdo->query($query)->fetchAll();
        ?>
    <?php
    }
    ?>
</div>