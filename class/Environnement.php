<?php

class Environnement {

    public $siteCible; 
    public $passwordBdd;
    public $baseUser;

    public function __construct(){
        
        if($_SERVER['HTTP_HOST'] == '55.250.32.92'){

            $this->siteCible = 'http://intranet.cestif.cnamts.fr/index.php/';
            $this->passwordBdd = 'jsl1dCTIM2P';

        }elseif($_SERVER['HTTP_HOST'] == 'intranet.cestif.cnamts.fr'){

            $this->siteCible = 'http://intranet.cestif.cnamts.fr/index.php/';
            $this->passwordBdd = 'jsl1dCTIM2P';

        }elseif($_SERVER['HTTP_HOST'] == '55.250.32.93'){

             $this->siteCible = 'http://55.250.32.93/index.php/';
             $this->passwordBdd = 'jsl1dCTIM2P';

        }elseif($_SERVER['HTTP_HOST'] == '55.250.32.96'){

             $this->siteCible = 'http://55.250.32.96/index.php/';
             $this->passwordBdd = 'jsl1dCTIM2P';
        }else{
             echo 'Page en erreur : Environnement.php '.$_SERVER['HTTP_HOST'];
             exit;
        }
    }
   
}
?>



