<?php
$mail->IsHTML($service->mHtml);

// Spécial méssagerie CNAM
$mail->isSMTP();
// $mail->Host = 'preprod.smtp.ramage' ;
$mail->Host = 'smtp.ramage' ;
$mail->SMTPAuth = true ;

$mail->Username = 'C159401-MSG-INTRANET@cnamts.fr' ;
$mail->Password = 'Cestif159401' ;
$mail->SMTPAutoTLS = true ;
$mail->SMTPSecure = 'tls';
$mail->SMTPOptions = array(
		
		'ssl' => array(
			'verify_peer'		 => true ,
			'verify_peer_name'   => true ,
			'allow_self_signed'  => false ,
			'cafile' 			 => 'ac_cnam_racine.crt'
		)
	);
// Fin des param CNAM

$mail->CharSet = $service->encodage ;
$mail->SetFrom($service->fromP1,$service->fromP2);
//$mail->AddAddress($service->destinataire); 
//$mail->AddCC($service->destinatairesCopie);
$mail->AddEmbeddedImage($service->logoP1,$service->logoP2,$service->logoP3);
?>