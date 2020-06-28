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

$query=mysql_query("update data_mahasiswa set 
nim='$nim',
nama='$nama',
alamat='$alamat',
tempat_lahir='$tempat_lahir',
tanggal_lahir='$tanggal_lahir',
jenis_kelamin='$jenis_kelamin',
agama='$agama',
no_telepon='$no_telepon',

kode_face_recognition='$kode_face_recognition'
where id_mahasiswa='$id_mahasiswa' ") or die (mysql_error());

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