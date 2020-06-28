<?php
include '../../../admin/include/koneksi/koneksi.php';
$tabel = $_POST['tabel'];
$field = $_POST['field'];
$field2 = $_POST['field2'];
$isi = $_POST['isi'];
$isi2 = $_POST['isi2'];
$querytabel="SELECT * FROM $tabel WHERE $field='$isi' and $field2='$isi2'";
$proses = mysql_query($querytabel);
$data = mysql_fetch_array($proses);
echo json_encode($data);
?>
