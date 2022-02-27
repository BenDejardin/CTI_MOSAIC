<?php

	/*  Class Database -> réalise des actions sur une base de données
		Auteur : Dominique Jaillardon
	*/

	class Database  {

		/* Déclaration des variables
		*/
		private $DB;
		private $baseName;
		public  $baseUser;
		private $basePswd;
		public  $table;

		/* 	OUVERTURE DE LA BASE DE DONNEES
			@ param : tableau->$t qui contient :
			@ param : nom de la base
			@ param : nom du user 
			@ param : password du user
		*/
		public function openDB($param){

			$this->baseName = $param["baseName"];
			$this->baseUser = $param["baseUser"];
			$this->basePswd = $param["basePswd"];

			try{
				$this->DB = new PDO("mysql:host=localhost;dbname=$this->baseName",$this->baseUser,$this->basePswd);
			}catch(PDOException $e){
				if(stripos($e->getMessage(), 'using password')){
					die('<h4> Connexion à la base impossible, Password inconnu !<h4>');
				}
				if(stripos($e->getMessage(), 'Access denied for user')){
					die('<h4> Connexion à la base impossible, User inconnu !<h4>');
				}
				if(stripos($e->getMessage(), 'Unknown database')){
					die('<h4> Connexion à la base impossible, Base inconnue !<h4>');
				}
			}
			$this->DB->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
			$this->DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
			$this->DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			$this->DB->exec('SET NAMES utf8');
		}

		/* 	SELECTION DE LA TABLE
			@ param : Table a traiter
		*/
		public function table($table){
			$this->table = $table;
		}


		/* 	LECTURE DE LA BASE
			@ param  : $colonne->les champs à récupérer dans la base, si NULL on rapatrie tous les champs
			@ param  : $condition->les conditions de lecture, si NULL on rapatrie toutes les lignes
			@ param  : $tri -> colonne de tri et type de tri 
			@ return : le resultat de la requete
		*/
		public function select ($colonne=NULL,$condition=NULL,$tri=NULL){

	        if($colonne==NULL){
	            $colonne = "*";
	        }
	        if($condition==NULL){
	            $condition = "1=1";
	        }
	        if($tri==NULL){
	            $tri = "";
	        }
			$Ssql = $this->DB->prepare("SELECT $colonne FROM $this->table WHERE $condition $tri");
			$Ssql->execute();
			
			return $Ssql->fetchAll(); 

		}	

		/* 	INSERT EN BASE
			@ param  : $_POST
			@ return : status de la requete
		*/
		public function insert($post){

		    $Isql = "INSERT INTO ".$this->table." (";
		    foreach($post as $k=>$v){
	            $Isql .= "`".$k."`,";
		    }
		    $Isql = substr($Isql,0,-1);
		    $Isql .=") VALUES (";
		    foreach($post as $v){
		    	if(is_string($v)) {
		    		$v=addslashes($v);
		    	}
	            $Isql .= "'$v',";
		    }
		    $Isql = substr($Isql,0,-1);
		    $Isql .= ");";
			$Ireq = $this->DB->query($Isql);
			if (!$Ireq){
				echo "Problème dans la requète mysql : $Isql,";
			}
		} 	

		public function update($post){

	      
	        $Usql = "UPDATE ".$this->table." SET ";
	        foreach($post as $k=>$v){
		    	if(is_string($v)) {
		    		$v=addslashes($v);
		    	}

	            if($k!="id" && $k!=""){
	                $Usql .= "$k='$v',";
	            }
	        }
	        $Usql = substr($Usql,0,-1);
	        $Usql .= " WHERE id=".$post["id"];
	        $Sreq = $this->DB->query($Usql);
	     	return $mess='Mise à jour Effectuée';
	    }

		public function delete($id){
			$Dsql = $this->DB->prepare("DELETE FROM $this->table WHERE numeroOrdre='$id' ");
			$Dsql->execute();
			if (!$Dsql){
				echo ",Problème dans la requète mysql : $Dsql,";
				
			}

		}

		public function raz(){

			$Dsql = $this->DB->prepare("TRUNCATE TABLE $this->table");
			$Dsql->execute();
			if (!$Dsql){
				echo ",Problème dans la requète mysql : $Dsql,";
				
			}

		}		
	
	/* Fin de Class
	*/

	}
?>