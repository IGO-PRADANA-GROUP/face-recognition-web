<?php include '../../../include/all_include.php';

if (!isset($_POST['id_aplikasi']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_aplikasi=$_POST['id_aplikasi'];
$nama_aplikasi=$_POST['nama_aplikasi'];

$objek=$_POST['objek'];

$query=mysql_query("update data_aplikasi set 
nama_aplikasi='$nama_aplikasi',

objek='$objek'
where id_aplikasi='$id_aplikasi' ") or die (mysql_error());

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