<?php
/* error_reporting(E_ALL);
ini_set("display_errors", 0);

include('Includes/globals.php'); */

/* On recupère les infos du user connecté

$service->getUser();
$service->getCleAgent($service->nomPrenom);
 
if (!isset($service->idUser) || $service->idUser==0 ) {
    echo "<script>top.window.location = '/index.php/component/users/?view=login'</script>";
}

*/


$title = "MOSAIC 2.0";
require_once('header.php');
?>



<div class="row align-items-center d-flex justify-content-center conteneur-item">
    <div class="col-lg-5">
        <div class="py-5 px-4 masthead-cards">
            <div class="d-flex">
                <a href="pouvoir.php" class="w-50 pl-3 pb-4">
                    <div class="card border-0 border-bottom-blue shadow-lg shadow-hover item-menu">
                        <div class="card-body text-center">
                            <div class="text-center">
                                <i class="fa fa-address-book-o fa-4x my-2"></i>
                            </div>
                            POSTE DISPONIBLE
                        </div>
                    </div>
                </a>
                <a href="entretien.php" class="w-50 pl-3 pb-4">
                    <div class="card border-0 border-bottom-blue shadow-lg shadow-hover item-menu">
                        <div class="card-body text-center">
                            <div class="text-center">
                                <i class="fa fa-address-book fa-4x my-2"></i>
                            </div>
                            PARTIE ENTRETIEN
                        </div>
                    </div>
                </a>
                <a href="suiviP2I.php" class="w-50 pl-3 pb-4">
                    <div class="card border-0 border-bottom-blue shadow-lg shadow-hover item-menu">
                        <div class="card-body text-center">
                            <div class="text-center">
                                <i class="fa fa-address-card-o fa-4x my-2"></i>
                            </div>
                            PARTIE <br> P2I
                        </div>
                    </div>
                </a>
            </div>


            <div class="d-flex ligne-item">
                <a href="suiviPAI.php" class="w-50 pl-3 pb-4">
                    <div class="card border-0 border-bottom-blue shadow-lg shadow-hover item-menu">
                        <div class="card-body text-center">
                            <div class="text-center">
                                <i class="fa fa-address-card fa-4x my-2"></i>
                            </div>
                            PARTIE <br> PAI
                        </div>
                    </div>
                </a>
                <a href="visualisationP2I_Sythese.php?numAgent=1111" class="w-50 pl-3 pb-4">
                    <div class="card border-0 border-bottom-blue shadow-lg shadow-hover item-menu">
                        <div class="card-body text-center">
                            <div class="text-center">
                                <i class="fa fa-bar-chart fa-4x my-2"></i>
                            </div>
                            PARTIE STATISTIQUE
                        </div>
                    </div>
                </a>
                <a href="selectCanevas.php" class="w-50 pl-3 pb-4">
                    <div class="card border-0 border-bottom-blue shadow-lg shadow-hover item-menu">
                        <div class="card-body text-center">
                            <div class="text-center">
                                <i class="fa fa-plus-square fa-4x my-2"></i>
                            </div>
                            PARTIE CANEVAS
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

</header>

</body>

</html>