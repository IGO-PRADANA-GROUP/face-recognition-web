<?php
$key = "FAJAR-RIDIKC-!;0’50&+D!@!`+047+*;+J+)6A!+@!4;&";

	function encrypt($str) {
		global $key;
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		$hasil = base64_encode($hasil);
		$hasil = urlencode($hasil);
		$hasil = str_replace('%','xxx',$hasil);
		$hasil = str_replace('&','yyy',$hasil);
		$hasil = str_replace('+','zzz',$hasil);
		
		return ($hasil);
	}
	 
	function decrypt($str) {
		global $key;
		$str = str_replace('xxx','%',$str);
		$str = str_replace('yyy','&',$str);
		$str = str_replace('zzz','+',$str);
		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		return $hasil;
	}
	
	function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}

	function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}


	?>