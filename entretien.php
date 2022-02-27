<?php
require_once "fonction.php";

$pouvoirs = postePouvoir();
$types = AfficheType();
// print_r($types);

// barre de recherche
if (isset($_REQUEST['recher']) && $_REQUEST['recher'] == "Recherche") {
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $entretienType = $_REQUEST['type'];
    $pouvoir = $_REQUEST['pouvoir'];
    $dateDeb = $_REQUEST['dateDeb'];
    $dateFin = $_REQUEST['dateFin'];
    $dateDu = $_REQUEST['dateDeb'];

    if (empty($nom)) {
        $nom = "*";
    }

    if (empty($prenom)) {
        $prenom = "*";
    }

    if (empty($entretienType)) {
        $entretienType = "*";
    }

    if (empty($pouvoir)) {
        $pouvoir = "*";
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


    $entretiens =  RechercheEntretien($nom, $prenom, $entretienType, $pouvoir, $dateDeb, $dateFin, $dateDu);
    // print_r($postePouvoirs);

?>

<?php
} else {
    $entretiens = AfficheEntretien();
}

$title = "Entretiens";
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

                    <select class="form-select select" name="nom" id="nom" aria-label="Nom">
                        <option value="" selected></option>

                    </select>
                    <label for="nom">Nom</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="prenom" id="prenom" aria-label="Prénom">
                        <option value="" selected></option>
                        <option value="En cours">En cours</option>
                        <option value="Affecté">Affecté</option>
                        <option value="Abandonné">Abandonné</option>
                    </select>
                    <label for="prenom">Prénom</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="dateDu" name="dateDeb">
                    <label for="dateDu">Date d'entretien du</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <input type="text" class="form-control" id="dateAu" name="dateFin">
                    <label for="dateAu">Au</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="pouvoir" id="poste" aria-label="Poste à pourvoir">
                        <option value="" selected></option>
                        <?php foreach ($pouvoirs as $pouvoir) { ?>
                            <option value="<?php echo $pouvoir->Libelle_Emploi; ?>"><?php echo $pouvoir->Libelle_Emploi; ?></option>
                        <?php } ?>
                    </select>
                    <label for="poste">Poste à pourvoir</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" name="type" id="type" aria-label="Type d'entretien">
                        <option value="" selected></option>
                        <?php foreach ($types as $type) { ?>
                            <option value="<?php echo $type->Type; ?>"><?php echo $type->Type; ?></option>
                        <?php } ?>
                    </select>
                    <label for="type">Type d'entretien</label>
                </div>
            </div>
        </div>

        <button class="btn btn-outline-bleu m-top-1" type="submit" name="recherche">Rechercher</button>
    </form>
</div>


<!-- liste vide avec tout les champs -->
<form method="GET">
    <div class="page">

        <table class="table">
            <thead>
                <tr class="table-bleu">
                    <th class="text-center" scope="col">Date de l'entretien</th>
                    <th class="text-center" scope="col">Nom du candidat</th>
                    <th class="text-center" scope="col">Prénom du candidat</th>
                    <th class="text-center" scope="col">Poste de l'entretien</th>
                    <th class="text-center" scope="col">Type d'entretien</th>
                    <th class="text-center" scope="col">Noms personnes présentes</th>
                    <th class="text-center" scope="col">Commentaire</th>
                    <th class="text-center"></th>
                </tr>
            </thead>

            <?php foreach ($entretiens as $entretien) : ?>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $entretien->id; ?>">
                    <td class="head"> <?php {
                                            echo DateConvertiseurAnglaisFrancais($entretien->Date_Debut_Entretien);
                                        } ?> </td>
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
        </table>
    </div>
    <!-- les boutons d'accès -->

    <div class="page text-center">
        <input class="btn btn-outline-bleu" type="submit" name="mod" value="Modification">
        <input class="btn btn-outline-bleu" type="button" onclick="window.location.href = 'index.php';" value="Menu principale" />
    </div>
</form>

<!-- boutton modification -->
<?php
if (isset($_REQUEST['mod']) && $_REQUEST['mod'] == "Modification" and isset($_REQUEST['radio']) && $_REQUEST['radio'] != 0) :
    $id = $_REQUEST['radio'];
?>
    <meta http-equiv="refresh" content="0;url=modif_entretien.php?id=<?php echo ("$id") ?>">
<?php endif;
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