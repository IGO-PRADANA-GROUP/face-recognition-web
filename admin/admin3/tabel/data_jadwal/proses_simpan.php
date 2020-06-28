<?php include '../../../include/all_include.php';

if (!isset($_POST['id_jadwal']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_jadwal=$_POST['id_jadwal'];
$hari=$_POST['hari'];
$jam_masuk=$_POST['jam_masuk'];
$jam_keluar=$_POST['jam_keluar'];



$query=mysql_query("insert into data_jadwal values (
'$id_jadwal'
 ,'$hari'
 ,'$jam_masuk'
 ,'$jam_keluar'

)");

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_tambah"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>