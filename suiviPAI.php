<?php

require_once 'fonction.php';

if (isset($_REQUEST['OK']) && $_REQUEST['OK'] == "Rechercher") {
    $numAgent = $_REQUEST['numAgent'];
    $nomAgent = $_REQUEST['nomAgent'];
    $service = $_REQUEST['service'];
    $prenomAgent = $_REQUEST['prenomAgent'];

    if (empty($numAgent)) {
        $numAgent = "*";
    }

    if (empty($nomAgent)) {
        $nomAgent = "*";
    }

    if (empty($service)) {
        $service = "*";
    }

    if (empty($prenomAgent)) {
        $prenomAgent = "*";
    }

    $infoSuivi =  AfficheSuiviRechercher($numAgent, $nomAgent, $service, $prenomAgent);
    // print_r($infoSuivi);

?>

<?php
} else {
    $infoSuivi =  AfficheSuivi();
}

// print_r($infoSuivi);

$services = AfficheServices();

$title = "Suivi PAI";
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
        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="numAgent" name="numAgent">
                    <label for="numAgent">Num Agent</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <input type="text" class="form-control" id="nomAgent" name="nomAgent">
                    <label for="nomAgent">Nom Agent</label>
                </div>
            </div>
        </div>


        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="service" id="service" aria-label="Service">
                        <option value="" selected></option>
                        <?php foreach ($services as $service) { ?>
                            <option value="<?php echo $service->nomService; ?>"><?php echo $service->nomService; ?></option>
                        <?php } ?>
                    </select>
                    <label for="service">Service</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <input type="text" class="form-control" id="prenomAgent" name="prenomAgent">
                    <label for="prenomAgent">Nom Agent</label>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-bleu m-top-1" type="submit" name="recherche">Rechercher</button>
    </form>
</div>

<?php
if (isset($infoSuivi[0]->numAgent)) {
?>
    <form method="GET">
        <div class="page">

            <table class="table">
                <thead>
                    <tr class="table-bleu">
                        <th class="text-center">Date de création du PAI</th>
                        <th class="text-center">N° Agent</th>
                        <th class="text-center">Nom de l’agent</th>
                        <th class="text-center">Prénom de l’agent</th>
                        <th class="text-center">Service de l’agent</th>
                        <th class="text-center">Pourcentage Evolution du PAI</th>
                        <th class="text-center">Date clôture PAI</th>
                        <th class="text-center"></th>
                    </tr>

                    <?php $ligne = 0; ?>
                    <?php foreach ($infoSuivi as $infoSuivi) : ?>
                        <tr>
                            <td><?php echo DateConvertiseurAnglaisFrancais($infoSuivi->dateCreation); ?></td>
                            <td><?php echo $infoSuivi->numAgent; ?></td>
                            <td><?php echo $infoSuivi->nomAgent; ?></td>
                            <td><?php echo $infoSuivi->prenomAgent; ?></td>
                            <td><?php echo $infoSuivi->serviceAgent; ?></td>
                            <?php $tauxMax = afficheTauxMax($infoSuivi->numAgent); ?>
                            <td><?php echo $tauxMax[0]->tauxMax . ' %'; ?></td>
                            <td><?php if ($infoSuivi->dateCloture != '0000-00-00') {
                                    echo DateConvertiseurAnglaisFrancais($infoSuivi->dateCloture);
                                } ?></td>
                            <td><input type="radio" name="radio" value="<?php echo $infoSuivi->numAgent; ?>"></td>
                        </tr>
                    <?php endforeach; ?>

            </table>
        </div>
        <div class="page text-center">
            <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'index.php';" value="Retour Menu" />
            <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'creationP2I.php';" value="Création" />
            <input class="btn btn-outline-bleu" type="submit" name="OK" value="Modification">
            <input class="btn btn-outline-bleu" type="submit" name="OK" value="Visualisation">
        </div>

    </form>
<?php
}
//////////////////////// 

if (isset($_REQUEST['radio'])) {
    $numAgent = $_REQUEST['radio'];
    $suiviVoulu = AfficheSuiviVoulu($numAgent);
}



// print_r($suiviVoulu);

if (isset($_REQUEST['radio']) && isset($_REQUEST['OK']) && $_REQUEST['OK'] == "Modification" and $suiviVoulu[0]->dateCloture == '0000-00-00' and $numAgent != null) {
?>
    <meta http-equiv="refresh" content="0; url=modificationP2I.php?numAgent=<?php echo "$numAgent"; ?>&mois=1">
<?php
} elseif (isset($_REQUEST['OK']) && $_REQUEST['OK'] == "Visualisation" and $numAgent != 0) {
?>
    <meta http-equiv="refresh" content="0; url=visualisationP2I_PageGarde.php?numAgent=<?php echo "$numAgent"; ?>&mois=1"><?php
                                                                                                                        }
                                                                                                                            ?>
</body>

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