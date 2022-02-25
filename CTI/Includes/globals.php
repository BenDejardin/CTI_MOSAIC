<?php
$string=getcwd();
$repertoireAppTmp=explode('/', $string);
$repertoireApp=$repertoireAppTmp[4];

header('Content-Type: text/html; charset=utf-8');
header('x-ua-compatible: ie=edge');

date_default_timezone_set('Europe/Paris');
setlocale (LC_TIME, 'fr-FR');

define('PATH_BASE_INCLUDE', '/app/www/html/includes');
define('PATH_BASE_APP', "/app/www/html/$repertoireApp");
define('PATH_PHP_MAILER', '/app/www/html/phpmailer');
define( 'DS', DIRECTORY_SEPARATOR ); 

require_once(PATH_BASE_APP.DS.'class'.DS.'Commune.php');
require_once(PATH_BASE_APP.DS.'class'.DS.'Environnement.php'); 
require_once(PATH_BASE_APP.DS.'class'.DS.'Fonctions.php'); 
require_once(PATH_BASE_APP.DS.'class'.DS.'Services.php'); 
require_once(PATH_BASE_APP.DS.'class'.DS.'Formulaire.php'); 
require_once(PATH_BASE_APP.DS.'class'.DS.'Database.php'); 
require_once(PATH_BASE_APP.DS.'class'.DS.'App.php'); 
require_once(PATH_PHP_MAILER.DS.'Class'.DS.'Phpmailer.php'); 

$environnement = new Environnement();
$commune       = new Commune();
$fonctions     = new Fonctions();
$service       = new Services();
$formulaire    = new Formulaire();
$database      = new Database();
$app           = new App();
$mail          = new PHPMailer();

$mail->IsHTML($service->mHtml);
$mail->CharSet = $service->encodage ;
$mail->SetFrom($service->fromP1,$service->fromP2);
// $mail->AddAddress($service->destinataire);
// $mail->AddCC($service->destinatairesCopie);
$mail->AddEmbeddedImage($service->logoP1,$service->logoP2,$service->logoP3);

$param = array(
	'baseName' => 'MOSAIC_2.0', // Nom de la BDD -- A changer
	'baseUser' => 'root',
	'basePswd' => $environnement->passwordBdd,
	);

$database->openDB($param); // On demande l'ouverture de la base de données


?>