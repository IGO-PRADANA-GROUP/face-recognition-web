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



$query=mysql_query("insert into data_aplikasi values (
'$id_aplikasi'
 ,'$nama_aplikasi'
 ,'$objek'

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