<?php include '../../../include/all_include.php';

if (!isset($_POST['id_absensi']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_absensi=$_POST['id_absensi'];
$id_jadwal=$_POST['id_jadwal'];
$tanggal=$_POST['tanggal'];
$jam=$_POST['jam'];
$id_mahasiswa=$_POST['id_mahasiswa'];

$status=$_POST['status'];

$query=mysql_query("update data_absensi set 
id_jadwal='$id_jadwal',
tanggal='$tanggal',
jam='$jam',
id_mahasiswa='$id_mahasiswa',

status='$status'
where id_absensi='$id_absensi' ") or die (mysql_error());

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