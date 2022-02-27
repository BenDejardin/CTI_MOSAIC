<?php

require_once 'connexionBDD.php';

function postePouvoir()
{
    global $pdo;
    $query = 'SELECT DISTINCT Libelle_Emploi FROM `postePouvoir` ';
    return $pdo->query($query)->fetchAll();
    
}

function AffichePostePouvoir()
{
    global $pdo;
    $query = 'SELECT * FROM `postePouvoir` where `Etat`="En cours" ';                  
    return $pdo->query($query)->fetchAll();
}

/** recupération de id de ligne dès qu'on fait une selection  */
function ModifPostePouvoir($id)
{
    global $pdo;
    $query = 'SELECT * FROM postePouvoir where `id`=:id'; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();

}

function ModifEntretien($id)
{
    global $pdo;
    $query = 'SELECT * FROM entretien where `id`=:id'  ; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();

}

function radiosEntretien($id)
{
    global $pdo;
    $query = 'SELECT entretien.id FROM entretien where Poste_id=:id;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function VisPouvoir($id)
{
    global $pdo;
    $query = 'SELECT * FROM `postePouvoir` where `id`=:id'; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();

}

function AfficheEntretien()
{
    global $pdo;
    $query = 'SELECT * FROM `entretien`';                  
    return $pdo->query($query)->fetchAll();
}

function AfficheType()
{
    global $pdo;
    $query = 'SELECT DISTINCT `Type` FROM `entretien`';                  
    return $pdo->query($query)->fetchAll();
}

function VisualisationEntretien($id)
{
    global $pdo;
    $query = 'SELECT * FROM entretien where `id`=:id'; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();

}

function entretien()
{
    global $pdo;
    $query = 'SELECT * FROM entretien;';
    return $pdo->query($query)->fetchAll();
}


function AfficheEntretiens($id)
{
    global $pdo;
    $query = 'SELECT * FROM entretien, postePouvoir where postePouvoir.`id`=:id and postePouvoir.id=entretien.Poste_id'; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}
// type téléphone
function telephone($id)
{
    global $pdo;
    $query = 'SELECT count(entretien.Type) as nbTelephone FROM entretien, postePouvoir where postePouvoir.`id`=:id and postePouvoir.id=entretien.Poste_id and  entretien.Type="Telephonique" '; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}
// /type cadre
function cadre($id)
{
    global $pdo;
    $query = 'SELECT count(entretien.Type) as nbCadre FROM entretien, postePouvoir where postePouvoir.`id`=:id and postePouvoir.id=entretien.Poste_id and  entretien.Type="Présentiel Cadre" '; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}
// type direction
function direction($id)
{
    global $pdo;
    $query = 'SELECT count(entretien.Type) as nbDirection FROM entretien, postePouvoir where postePouvoir.`id`=:id and postePouvoir.id=entretien.Poste_id and  entretien.Type="Présentiel Direction" '; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function creationEntretienPouvoir($id)
{
    global $pdo;
    $query = 'SELECT * FROM postePouvoir where `id`=:id'; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

// barre de recherche pour poste à pourvoir
function RecherchePouvoir($libelle, $qualification, $etat, $dateDeb, $dateFin, $dateDu)
{
    global $pdo;
    $query = 'SELECT * FROM postePouvoir WHERE `Libelle_Emploi`=:libelle or `Niveau_Qualification`=:qualification 
    or `Etat`=:etat or (`Date_Creation`between :dateDeb and :dateFin) or `Date_Creation`=:dateDu ';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':libelle', $libelle, PDO::PARAM_STR);
    $prep->bindValue(':qualification', $qualification, PDO::PARAM_STR);
    $prep->bindValue(':etat', $etat, PDO::PARAM_STR);
    $prep->bindValue(':dateDeb', $dateDeb, PDO::PARAM_STR);
    $prep->bindValue(':dateFin', $dateFin, PDO::PARAM_STR);
    $prep->bindValue(':dateDu', $dateDu, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

// Barre de recherche pour l'entretien
function  RechercheEntretien($nom, $prenom, $entretienType, $pouvoir, $dateDeb, $dateFin, $dateDu)
{
    global $pdo;
    $query = 'SELECT * FROM entretien,postePouvoir WHERE postePouvoir.id = entretien.Poste_id and (`Nom_Candidat`=:nom or `Prenom_Candidat`=:prenom or postePouvoir.Libelle_Emploi=:pouvoir or `Type` =:entretienType
    or (`Date_Debut_Entretien` between :dateDeb and :dateFin) or `Date_Debut_Entretien`=:dateDu)';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':nom', $nom, PDO::PARAM_STR);
    $prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $prep->bindValue(':pouvoir', $pouvoir, PDO::PARAM_STR);
    $prep->bindValue(':entretienType', $entretienType, PDO::PARAM_STR);
    $prep->bindValue(':dateDeb', $dateDeb, PDO::PARAM_STR);
    $prep->bindValue(':dateFin', $dateFin, PDO::PARAM_STR);
    $prep->bindValue(':dateDu', $dateDu, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}


// Fonction pour les 2 Parties

function AfficheServices()
{
    global $pdo;
    $query = 'SELECT * FROM services';
    return $pdo->query($query)->fetchAll();
}


function AfficheQualif()
{
    global $pdo;
    $query = 'SELECT * FROM qualification';
    return $pdo->query($query)->fetchAll();
}

function DateConvertiseurFrancaisAnglais($date)
{
    $listeInfoDate = explode("/", $date);
    $dateAnglais = $listeInfoDate[2]."/".$listeInfoDate[1]."/".$listeInfoDate[0];
    return $dateAnglais;
}

function DateConvertiseurAnglaisFrancais($date)
{
    $listeInfoDate = explode("-", $date);
    $dateFrancais = $listeInfoDate[2]."/".$listeInfoDate[1]."/".$listeInfoDate[0];
    return $dateFrancais;
}

function listePersonne()
{
    global $pdo;
    $query = 'SELECT * FROM personnePresente';
    return $pdo->query($query)->fetchAll();
}



// Fonction Partie P2I PAI
function AffichePresentationGenerales()
{
    global $pdo;
    $query = 'SELECT * FROM presentation_generale;';
    return $pdo->query($query)->fetchAll();
}

function AfficheNomsCanevas()
{
    global $pdo;
    $query = 'SELECT * FROM canevas;';
    return $pdo->query($query)->fetchAll();
}

function AfficheTousCanevasVoulu($nomCanevas)
{
    global $pdo;
    $query = 'SELECT * FROM Contenu_Canevas WHERE `nom_canevas`=:nomCanevas';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':nomCanevas', $nomCanevas, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheSuivi()
{
    global $pdo;
    $query = 'SELECT * FROM suivi;';
    return $pdo->query($query)->fetchAll();
}

function AfficheSuiviVoulu($numAgent)
{
    global $pdo;
    $query = 'SELECT * FROM suivi WHERE `numAgent`=:numAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheLesNomsCanevas($numAgent)
{
    global $pdo;
    $query = 'SELECT DISTINCT nom_canevas FROM `P2I` WHERE numAgent = :numAgent'; 
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheContenuCanevasVouluP2i($numAgent,$nomCanevas,$mois)
{
    global $pdo;
    $query = 'SELECT * FROM P2I WHERE `numAgent`=:numAgent AND nom_canevas=:nomCanevas AND mois=:mois';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->bindValue(':nomCanevas', $nomCanevas, PDO::PARAM_STR);
    $prep->bindValue(':mois', $mois, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheTousP2iDuAgent($numAgent)
{
    global $pdo;
    $query = 'SELECT * FROM P2I WHERE `numAgent`=:numAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheTousP2iDuAgentMois($numAgent,$mois)
{
    global $pdo;
    $query = 'SELECT * FROM P2I WHERE `numAgent`=:numAgent AND mois=:mois';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->bindValue(':mois', $mois, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheSuiviRechercher($numAgent,$nomAgent,$service,$prenomAgent)
{
    global $pdo;
    $query = 'SELECT * FROM suivi WHERE `numAgent`=:numAgent OR nomAgent=:nomAgent OR serviceAgent=:serviceAgent OR prenomAgent=:prenomAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->bindValue(':nomAgent', $nomAgent, PDO::PARAM_STR);
    $prep->bindValue(':serviceAgent', $service, PDO::PARAM_STR);
    $prep->bindValue(':prenomAgent', $prenomAgent, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

function EntretienCreation()
{
    global $pdo;
    $query = 'SELECT * FROM postePouvoir';
    return $pdo->query($query)->fetchAll();
}

function AfficheLibelleId($Poste_id)
{
    global $pdo;
    $query = 'SELECT postePouvoir.Libelle_Emploi FROM postePouvoir , entretien where :id=postePouvoir.id and postePouvoir.id=entretien.Poste_id
    ';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $Poste_id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheValeurPlusGrandMois($numAgent)
{
    global $pdo;
    $query = 'SELECT DISTINCT MAX(mois) AS moisMax FROM `P2I` WHERE numAgent = :numAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheContexte($numAgent)
{
    global $pdo;
    $query = 'SELECT `ChoixContexte` FROM `ContexteEvaluation`  WHERE numAgent = :numAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function afficheTauxGlobal($numAgent,$mois)
{
    global $pdo;
    $query = 'SELECT DISTINCT(tauxGlobal) FROM P2I WHERE `numAgent`=:numAgent AND mois=:mois';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->bindValue(':mois', $mois, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function afficheTauxMax($numAgent)
{
    global $pdo;
    $query = 'SELECT MAX(tauxGlobal) AS tauxMax FROM P2I WHERE `numAgent`=:numAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function AfficheCommentaire($numAgent)
{
    global $pdo;
    $query = 'SELECT * FROM commentaire WHERE `numAgent`=:numAgent';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function afficheBilanEtapeResponsable($numAgent,$mois)
{
    global $pdo;
    $query = 'SELECT * FROM `bilan` WHERE `numAgent`=:numAgent AND numMois=:mois AND nomTable ="Bilan Etape Responsable"';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->bindValue(':mois', $mois, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function afficheComiteSuivi($numAgent,$mois)
{
    global $pdo;
    $query = 'SELECT * FROM `bilan` WHERE `numAgent`=:numAgent AND numMois=:mois AND nomTable ="Comité Suivi"';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->bindValue(':mois', $mois, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function afficheTousBilanEtapeResponsable($numAgent)
{
    global $pdo;
    $query = 'SELECT * FROM `bilan` WHERE `numAgent`=:numAgent AND nomTable ="Bilan Etape Responsable"';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function afficheTitularisation($numAgent)
{
    global $pdo;
    $query = 'SELECT * FROM `Titularisation` WHERE `numAgent`=:numAgent ';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':numAgent', $numAgent, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}


?>






