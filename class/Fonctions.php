<?php

class Fonctions {

	/* Tableau des adresses ip pour en déduire la région */
	public $regionRetourIp;
	public $ipRegion=array(
						'9'=>'CN CEN',
						'37'=>'CN CNAMTS',
						'64'=>'CPAM Côtes-d Armor',
						'68'=>'CPAM Doubs',
						'72'=>'CPAM Finistère',
						'73'=>'CPAM Finistère',
						'77'=>'CPAM Gironde',
						'80'=>'CPAM Ille-et-Vilaine',
						'91'=>'CPAM Loire-Atlantique',
						'97'=>'CPAM Maine-et-Loire',
						'98'=>'CPAM Maine-et-Loire',
						'102'=>'CPAM Mayenne',
						'106'=>'CPAM Morbihan',
						'141'=>'CPAM Sarthe',
						'144'=>'CPAM Ile-de-France',
						'150'=>'CPAM Seine-et-Marne',
						'151'=>'CPAM Yvelines',
						'158'=>'CPAM Vendée',
						'164'=>'CPAM Essonne',
						'165'=>'CPAM Hauts-de-Seine',
						'166'=>'CPAM Seine-Saint-Denis',
						'167'=>'CPAM Val-de-Marne',
						'168'=>'CPAM Val-d Oise',
						'169'=>'DRSM île de France',
						'171'=>'CRAM Ile-de-France',
						'227'=>'CSH DM-INFRA',
						'250'=>'CTI Melun'
					);
	
	
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
				
	/* Variables pour les dates */
	public $day;
	public $dateUs;
	public $dateFr;
	public $dateTimestamp;
	public $heureTimestamp;
	public $dateInverser;

	
	/* fonction pour trouver le jour de la semaine
	 	Param @ : $date = JJ/MM/AAAA
		Exemple d'appel: $fonctions->jourSemaine('15/02/2016');
	*/
	public function jourSemaine($date){

		$tabDate = explode('/', $date);
		$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[0], $tabDate[2]);
		$jour = date('D', $timestamp);
		$this->day = $this->tabJour[$jour];

	}

	/* Fonction de conversion de date Fr vers date Us
	
		 Param @ : $dateFra JJ/MM/AAAA
		 Exemple d'appel: $fonctions->dateFrUs('15/02/2016','-','/');
	
	*/
	public function dateFrUs($dateFra,$separateurOrigine=NULL,$separateurCible=NULL){

		if ($separateurOrigine==NULL) {
			$separateurOrigine='-';
		}
		if ($separateurCible==NULL) {
			$separateurCible='-';
		}	
		$dateF = explode($separateurOrigine, $dateFra);
		return $this->dateUs = $dateF[2].$separateurCible.$dateF[1].$separateurCible.$dateF[0];

	}

	/* Fonction de conversion de date Us vers date Fr
	
		 Param @ : $dateUsa AAAA/MM/JJ/
		 Exemple d'appel: $fonctions->dateUsFr('2016/09/29','/','-');
	
	*/
	public function dateUsFr($dateUsa,$separateurOrigine=NULL,$separateurCible=NULL){

		if ($separateurOrigine==NULL) {
			$separateurOrigine='-';
		}
		if ($separateurCible==NULL) {
			$separateurCible='-';
		}		
		$dateU = explode($separateurOrigine, $dateUsa);
		return $this->dateFr = $dateU[2].$separateurCible.$dateU[1].$separateurCible.$dateU[0];

	}



	/* Fonction d'envoie de mails*/
	public function SendMail($sujet,$message){

		$entete = "From: Intranet CTI Melun<Intranet@cestif.cnamts.fr>\n" . "Cc: $this->destinatairesCopie\n" ;
		$entete .= "MIME-version: 1.0\n";
		$entete .= "Content-separateur: text/html; charset=charset=UTF-8\n";
		$entete .= "Content-transfer-encoding: quoted-printable\n";
		$entete .= "Content-disposition: inline X-Priority: 3\n";
		mail($this->destinataire,$sujet,$message,$entete);	

	}

	/* Fonction qui déduit la région par rapport à l'adresse IP 
	   methode = $fonctions->transformIpRegion('55.250.32.163');
	*/
	public function transformIpRegion($paramIp){

		$ip = explode('.', $paramIp);
		$octet=$ip[1];
		$this->regionRetourIp = $this->ipRegion[$octet];	

	}
	
	public $dateRetour ;
	public $separateur;
	public $serialise;

	// 
	// $fonctions->setDateLanguage($dateChange,'Fr');
	// $fonctions->setDateLanguage($dateChange,'Us');
	public function setDateLanguage($dateChange,$language=NULL){
		$findSeparateur=strpos($dateChange, '-');		
		
		if($findSeparateur !== false){
			$this->separateur = '-';
		}else{
			$this->separateur = '/';			
		}
		$dateTableau = explode($this->separateur,$dateChange);
		$dateOrigine=strlen($dateTableau[0]);

		if ($language!=NULL) {
		
			if ($language=='Fr' && $dateOrigine==4) {
				$this->dateRetour = $dateTableau[2].$this->separateur.$dateTableau[1].$this->separateur.$dateTableau[0];
				
			}elseif($language=='Us' && $dateOrigine==2){
				$this->dateRetour = $dateTableau[2].$this->separateur.$dateTableau[1].$this->separateur.$dateTableau[0];
			}else{
				$this->dateRetour = $dateTableau[0].$this->separateur.$dateTableau[1].$this->separateur.$dateTableau[2];
			}
		}
		
	}

	/*
		FIN DES SERVICES
	*/
}


?>