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

                    <input type="text" class="form-control" name="libelle" id="libelle">
                    <label for="libelle">Libellé de l'emploi</label>
                </div>
            </div>
        </div>

        <div class="row g-2 m-top-1">
            <div class="col-md">
                <div class="form-floating">

                    <select class="form-select select" id="niveau" aria-label="Niveau de qualification">
                        <option value="0"></option>
                        <option value="1">Toto</option>
                        <option value="2">Tata</option>
                        <option value="3">Tutu</option>
                    </select>
                    <label for="niveau">Niveau de qualification</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select select" id="service" aria-label="Services concerné">
                        <option value="0"></option>
                        <option value="1">Toto</option>
                        <option value="2">Tata</option>
                        <option value="3">Tutu</option>
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
</div>