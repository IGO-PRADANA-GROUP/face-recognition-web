<?php include '../../../include/all_include.php';

if (!isset($_POST['id_mahasiswa']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_mahasiswa=$_POST['id_mahasiswa'];
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$no_telepon=$_POST['no_telepon'];
$kode_face_recognition=$_POST['kode_face_recognition'];



$query=mysql_query("insert into data_mahasiswa values (
'$id_mahasiswa'
 ,'$nim'
 ,'$nama'
 ,'$alamat'
 ,'$tempat_lahir'
 ,'$tanggal_lahir'
 ,'$jenis_kelamin'
 ,'$agama'
 ,'$no_telepon'
 ,'$kode_face_recognition'

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