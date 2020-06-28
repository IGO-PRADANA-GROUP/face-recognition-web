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

$query=mysql_query("update data_jadwal set 
hari='$hari',
jam_masuk='$jam_masuk',

jam_keluar='$jam_keluar'
where id_jadwal='$id_jadwal' ") or die (mysql_error());

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_edit"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>