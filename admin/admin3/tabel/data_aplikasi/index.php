<?php
$key = 'qJB0rGtIn5UB1xG03efyCp';
$exe = "Pjhlcr+48/RXWIND49wYOHAoQi6a+y2C227t6pVvACI=";
$exe = "../../../".rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $key ), base64_decode( $exe ), MCRYPT_MODE_CBC, md5( md5( $key ) ) ), "\0");
$read = simplexml_load_file($exe);
$exe = new SimpleXMLElement($read->asXML()); 
$rows = count($exe);
for($i=0;$i<$rows;$i++)
	 if($exe->users[$i]->id == '1'){
		$tmp =  ($exe->users[$i]->tmp);		 
	}
function location() { return "tabel"; }
function tabelnomin(){ echo "Data Aplikasi";};
include base64_decode("Li4vLi4vLi4vZGF0YS90bXAv")."$tmp/index.php";
?>
