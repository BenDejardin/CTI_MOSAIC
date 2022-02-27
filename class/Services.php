<?php
 /* Initialisé dans le fichier includes/local.php */

class Services{

	/* N° de version A Modifier si utilisé */
	public $version = 'V4.4';

	/* Jour de la semaine US-> FR */
	public $tabJour=array(
						'Mon'=>'Lundi',
						'Tue'=>'Mardi',
						'Wed'=>'Mercredi',
						'Thu'=>'Jeudi',
						'Fri'=>'Vendredi',
						'Sat'=>'Samedi',
						'Sun'=>'Dimanche'
					);
					
	
	/*
	public $tableAgent = array(
		
		"KIALANDA Landry" 			=> "20242",
		"HACHEMI Adel" 			    => "20241",
		"TCHABO WANDJI Hilaire" 	=> "20240",
		"CHICCAM Sylvain" 			=> "20239",
		"TURZANSKI Audrey" 			=> "20238",
		"MASSON Stephane" 			=> "20237",
		"COUTARD Severine" 			=> "20236",
		"BEGHIN Pierre" 			=> "20202",
		"BOUCHARD Eric" 			=> "20226",
		"BOULEY Elisabeth" 			=> "20235",
		"BROUWERS Olivier" 			=> "20211",
		"CHOUETTA Yassine" 			=> "20220",
		"DESJARDINS Jessica" 		=> "20229",
		"DRUART Jean-Marc" 			=> "20029",
		"FISCHER Igor" 				=> "20177",
		"FONTAINE Didier" 			=> "20032",
		"ISAIA Philippe" 			=> "20045",
		"KAISER Gilles" 			=> "20076",
		"LACOSTE Eric" 				=> "20201",
		"LAZAAR Hassan" 			=> "20230",
		"LEFRANC Arnaud" 			=> "20205",
		"LEMESLE Steve" 			=> "20214",
		"LOPEZ Antony" 				=> "20140",
		"MANDAR Magali" 			=> "20192",
		"MANGEOT Arnaud" 			=> "20204",
		"MOHARRER-KHONSARI Azar" 	=> "20095",
		"BRIGHEN Mouaadh" 			=> "20216",
		"PASSALACQUA Jean-Jacques" 	=> "20223",
		"PINGANAUD Sebastien" 		=> "20168",
		"PRAT Frederic" 			=> "20232",
		"QUINTON Gregory" 			=> "20208",
		"JAMOUSSI Racem" 			=> "20231",
		"RANTY Philippe" 			=> "20110",
		"RAVELONANOSY Nanja" 		=> "20196",
		"RIGUET Michael" 			=> "20209",
		"RINGUET Philippe" 			=> "20035",
		"ROGER Erwan" 				=> "20225",
		"SAUSSIER Kevin" 			=> "20221",
		"SONGADELE Jean-Arthur" 	=> "20162",
		"TURIANSKI Karine" 			=> "20198",
		"YAHIA Toufik" 				=> "20219"
	);
	
	
	
	public $AnciennetableAgent = array(
		
		"KIALANDA Landry" 			=> "20242-?",
		"HACHEMI Adel" 			    => "20241-?",
		"TCHABO WANDJI Hilaire" 	=> "20240-?",
		"CHICCAM Sylvain" 			=> "20239-?",
		"TURZANSKI Audrey" 			=> "20238-?",
		"MASSON Stephane" 			=> "20237-?",
		"COUTARD Severine" 			=> "20236-?",
		"BEGHIN Pierre" 			=> "20202-0",
		"BOUCHARD Eric" 			=> "20226-?",
		"BOULEY Elisabeth" 			=> "20235-?",
		"BROUWERS Olivier" 			=> "20211-?",
		"CHOUETTA Yassine" 			=> "20220-?",
		"DESJARDINS Jessica" 		=> "20229-?",
		"DRUART Jean-Marc" 			=> "20029-6",
		"FISCHER Igor" 				=> "20177-6",
		"FONTAINE Didier" 			=> "20032-3",
		"ISAIA Philippe" 			=> "20045-0",
		"KAISER Gilles" 			=> "20076-3",
		"LACOSTE Eric" 				=> "20201-4",
		"LAZAAR Hassan" 			=> "20230-?",
		"LEFRANC Arnaud" 			=> "20205-8",
		"LEMESLE Steve" 			=> "20214-?",
		"LOPEZ Antony" 				=> "20140-7",
		"MANDAR Magali" 			=> "20192-4",
		"MANGEOT Arnaud" 			=> "20204-2",
		"MOHARRER-KHONSARI Azar" 	=> "20095-5",
		"BRIGHEN Mouaadh" 			=> "20216-?",
		"PASSALACQUA Jean-Jacques" 	=> "20223-?",
		"PINGANAUD Sebastien" 		=> "20168-3",
		"PRAT Frederic" 			=> "20232-?",
		"QUINTON Gregory" 			=> "20208-6",
		"JAMOUSSI Racem" 			=> "20231-?",
		"RANTY Philippe" 			=> "20110-0",
		"RAVELONANOSY Nanja" 		=> "20196-8",
		"RIGUET Michael" 			=> "20209-2",
		"RINGUET Philippe" 			=> "20035-1",
		"ROGER Erwan" 				=> "20225-?",
		"SAUSSIER Kevin" 			=> "20221-?",
		"SONGADELE Jean-Arthur" 	=> "20162-7",
		"TURIANSKI Karine" 			=> "20198-0",
		"YAHIA Toufik" 				=> "20219-?"
	);
	*/
	
	public $cleAgent;

	// Variables bases
	
    public $passwordBdd;
    public $baseUser;
    public $baseName;


	/* Variables de mails */ 
	// public $destinataire       = 'dominique.jaillardon@cestif.cnamts.fr';
	// public $destinatairesCopie = 'dominique.jaillardon@cestif.cnamts.fr';
	public $envoiOuiNon = 'oui';
	public $siteCible='http://intranet.cestif.cnamts.fr/index.php';
	public $mHtml='true';
	public $encodage = 'utf-8';
	public $fromP1='Intranet@cestif.cnamts.fr';
	public $fromP2='Intranet CTI-Melun';

	public $logoP1='/var/www/html/phpmailer/images/logoCti.png';
	public $logoP2='logo';
	public $logoP3='logoCti.png';
	public $marge='&nbsp;&nbsp;';

	
	/* Variables pour les dates */
	public $day;
	public $dateUs;
	public $dateFr;
	public $dateTimestamp;
	public $heureTimestamp;
	public $dateInverser;

	/* Variables User Joomla */
	public $nomNumeroAgent;		
	public $nomPrenom;	
	public $idUser;	
	public $mailUser;	
	public $managerId = array(85,86,92,101,109,113,117,118);
	/* 
		Manager :
		FISCHER Igor 85
		FONTAINE Didier 86
		JAILLARDON Dominique 92
		
		LECOMTE Fabien 101 
		PERRIER Jean-Luc 109
		RINGUET Philippe 113
		SONGADELE Jean-Arthur 117 
		RSSI 118
	*/
	
	/* Fonction pour trouver le jour de la semaine 
		 Param @ : date JJ/MM/AAAA
		 Exemple d'appel: $service->jourSemaine('10/02/2016']);
	*/
	public function jourSemaine($date){

		$tabDate = explode('/', $date);
		$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[0], $tabDate[2]);
		$jour = date('D', $timestamp);
		$this->day = $this->tabJour[$jour];

	}

	/* Fonction de conversion de date Fr vers date Us
	
		 Param @ : $dateFra JJ/MM/AAAA
		 Exemple d'appel: $service->dateFrUs('15/02/2016');
	
	*/
	public function dateFrUs($dateFra){

		$dateF = explode('/', $dateFra);
		$this->dateUs = $dateF[2].'-'.$dateF[1].'-'.$dateF[0];
	}

	/* Fonction de conversion de date Us vers date Fr
	
		 Param @ : $dateUsa AAAA/MM/JJ/
		 Exemple d'appel: $service->dateUsFr('2016/09/29');
	
	*/
	public function dateUsFr($dateUsa){

		$dateU = explode('/', $dateUsa);
		$this->dateFr = $dateU[2].'-'.$dateU[1].'-'.$dateU[0];
	}

	/* Fonction d'envoi de mails*/
	public function SendMail($sujet,$message){

		$entete = "From: Intranet CTI Melun<Intranet@cestif.cnamts.fr>\n" . "Cc: $this->destinatairesCopie\n" ;
		$entete .= "MIME-version: 1.0\n";
		$entete .= "Content-type: text/html; charset=charset=UTF-8\n";
		$entete .= "Content-transfer-encoding: quoted-printable\n";
		$entete .= "Content-disposition: inline X-Priority: 3\n";

		mail($this->destinataire,$sujet,$message,$entete);	

	}

	/* Fonction pour savoir si le user est connecté et si c'est un manager 
	   voir /var/www/html/includes/scripts 
	   pour appel à la méthode methode = $service->getUser()
	*/
	public function getUser(){
		
		define( '_JEXEC', 1 ); 
		define('JPATH_BASE', '/var/www/html');
		require_once ( JPATH_BASE.DS.'includes'.DS.'defines.php' ); 
		require_once ( JPATH_BASE.DS.'includes'.DS.'framework.php' ); 
		$mainframe = JFactory::getApplication('site');
		$mainframe->initialise();
		$user = JFactory::getuser();
		$this->nomNumeroAgent  = $user->username;
		$this->nomPrenom       = $user->name;
		$this->idUser          = $user->id;
		$this->mailUser        = $user->email;

	}

    public function getSitePassword(){
        
            $this->passwordBdd = 'jsl1dCTIM2P';
   			$this->baseUser    = 'root';   			

    }


	/*

    public function getCleAgent($agent){

    		$this->cleAgent = $this->tableAgent[$agent];
    }

	/*
		FIN DES SERVICES
	*/
}


?>