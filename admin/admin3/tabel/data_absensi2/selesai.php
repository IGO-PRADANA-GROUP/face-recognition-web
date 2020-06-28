<?php 
include '../../../include/all_include.php';
$id_jadwal = $_GET['id_jadwal'];
$query=mysql_query("update data_absensi set 
id_jadwal='$id_jadwal'
where id_jadwal='proses' ") or die (mysql_error());
?>
<script>location.href = "index.php?input=tampil"; </script>

