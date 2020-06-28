<?php 
include '../../../include/all_include.php';
//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_absensi");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_absensi = mysqli_query($con_mysqli,"SELECT max(id_absensi) as id_absensi FROM data_absensi");
	$data_absensi = mysqli_fetch_array($id_absensi);
	$id_absensi_akhir = $data_absensi['id_absensi'];
	$id_absensi_otomatis = autonumber($id_absensi_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_absensi');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_absensi_otomatis = $kodedepan."001";	
}


$id_jadwal = $_GET['id_jadwal'];
$id_mahasiswa = $_GET['id_mahasiswa'];
$id_absensi=$id_absensi_otomatis;
$tanggal=date('Y-m-d');
$jam= date("h:i:sa");
$status="izin";



$query=mysql_query("insert into data_absensi values (
'$id_absensi'
 ,'proses'
 ,'$tanggal'
 ,'$jam'
 ,'$id_mahasiswa'
 ,'$status'
 ,'keluar'
)");
	?>
<script>location.href = "index.php?input=tambah&id_jadwal=<?php echo $id_jadwal;?>"; </script>

