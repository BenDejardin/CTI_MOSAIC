<?php
class Commune {

	/* Variables communes */
	public $application;
	public $version = 'V1.1';
	public $envoiOuiNon  = 'oui';

	/*  Variable pour les mails*/
	public $mHtml='true';
	public $encodage = 'utf-8';
	public $fromP1='nepasrepondre.cti-melun@assurance-maladie.fr';
	public $fromP2='Ne pas repondre';
	public $logoP1='/var/www/html/phpmailer/images/logoCti.png';
	public $logoP2='logo';
	public $logoP3='logoCti.png';
	public $marge='&nbsp;&nbsp;';

	public $destinataire       = '';
	/* Adresses mails direction */
	public $mailDirecteur    = 'jean-jacques.passalacqua@assurance-maladie.fr';
	public $mailDirecteurAdj = 'igor.fischer@assurance-maladie.fr';
	public $mailRssi         = 'antony.lopez@assurance-maladie.fr' ;

	public $nomNumeroAgent;		
	public $nomPrenom;	
	public $idUser;	
	public $mailUser;	

	/* Id Manager */
	public $managerId = array(85,86,92,101,103,109,113,117,509);
	/* 
		FISCHER Igor             85
		FONTAINE Didier          86
		JAILLARDON Dominique     92
		LECOMTE Fabien          101 
		LOPEZ Antony RSSI       103 
		PERRIER Jean-Luc        109
		RINGUET Philippe        113
		SONGADELE Jean-Arthur   117 
		PASSALAQUA Jean-Jacques 509
	*/

	public function getUser(){
		
		define( '_JEXEC', 1 ); 
		define('JPATH_BASE', '/var/www/html');
		define( 'DS', DIRECTORY_SEPARATOR ); 
		require_once ( JPATH_BASE.DS.'includes'.DS.'defines.php' ); 
		require_once ( JPATH_BASE.DS.'includes'.DS.'framework.php' ); 
		$mainframe = JFactory::getApplication('site');
		$alias = &JFactory::getURI()->getPath();
		$mainframe->initialise();
		$user = JFactory::getuser();
		$this->nomNumeroAgent  = $user->username;
		$this->nomPrenom       = $user->name;
		$this->idUser          = $user->id;
		$this->mailUser        = $user->email;
		$this->urlAlias        = $alias;

	}	


}



?>