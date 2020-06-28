<title>Launcher Webcam..</title>
<?php
$myfile = fopen("baca.txt", "w") or die("Unable to open file!");
$txt = $_GET['kode'];
fwrite($myfile, $txt);
fclose($myfile);
?>

<?php 
error_reporting(0);
exec( 'buat.exe');
?>
SELESAI, SILAHKAN CLOSE

