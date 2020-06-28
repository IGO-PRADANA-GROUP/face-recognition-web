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



$query=mysql_query("insert into data_absensi values (
'$id_absensi'
 ,'$id_jadwal'
 ,'$tanggal'
 ,'$jam'
 ,'$id_mahasiswa'
 ,'$status'

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