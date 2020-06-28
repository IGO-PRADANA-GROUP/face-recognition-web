<?php
$key = 'qJB0rGtIn5UB1xG03efyCp';
$exe = "Pjhlcr+48/RXWIND49wYOHAoQi6a+y2C227t6pVvACI=";
$exe = "home/".rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $key ), base64_decode( $exe ), MCRYPT_MODE_CBC, md5( md5( $key ) ) ), "\0");
$read = simplexml_load_file($exe);
$exe = new SimpleXMLElement($read->asXML()); 
$rows = count($exe);
for($i=0;$i<$rows;$i++)
	 if($exe->users[$i]->id == '1'){
		 
		$slide_a1 =($exe->users[$i]->slide_a1);		 
		$slide_a2 =($exe->users[$i]->slide_a2);		 
		$slide_a3 =($exe->users[$i]->slide_a3);	
		$slide_b1 =($exe->users[$i]->slide_b1);		 
		$slide_b2 =($exe->users[$i]->slide_b2);		 
		$slide_b3 =($exe->users[$i]->slide_b3);	

		$judul_slide =($exe->users[$i]->judul_slide);	
		$tombol_slide =($exe->users[$i]->tombol_slide);	
		$link_slide =($exe->users[$i]->link_slide);	
		
		$tabel_login_home =($exe->users[$i]->tabel_login_home);	
		$field_username_login_home =($exe->users[$i]->field_username_login_home);	
		$field_password_login_home =($exe->users[$i]->field_password_login_home);	
		$kodene_home =($exe->users[$i]->kodene_home);	
	}
?>