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


$id_jadwal = baca_database("","id_jadwal","select * from data_jadwal where hari='$hari'"); 
date_default_timezone_set('Asia/Jakarta');

$jam_keluar = baca_database("","jam_keluar","select * from data_jadwal where hari='$hari'");;
$jam_mulai = menjumlahkan_waktu($jam_keluar,'+0 day +0 hour -15 minutes +0 seconds');
$jam_limit = menjumlahkan_waktu($jam_keluar,'+0 day +0 hour +15 minutes +0 seconds');
$jam_sekarang=  date('H:i:s'); 
function menjumlahkan_waktu($waktu,$tambah)
{
	return date('G:i:s',strtotime($tambah,strtotime($waktu)));
}

function jumlah($waktu,$tambah)
{
	return date('G',strtotime($tambah,strtotime($waktu)));
}


function selisih_waktu($awal, $akhir)
{
$seconds = 0;
$detik =0;
$selisih = 0;
if(strtotime($awal)>strtotime($akhir)){
$mulai = $akhir;
$selesai = $awal;
}else{
$mulai = $awal;
$selesai = $akhir;
}
list( $g, $i, $s ) = explode( ':', $mulai );
$seconds += $g * 3600;
$seconds += $i * 60;
$seconds += $s;
$newSeconds = $seconds;

list( $g, $i, $s ) = explode( ':', $selesai );
$detik += $g * 3600;
$detik += $i * 60;
$detik += $s;
$detikbaru = $detik;

$selisih = $detikbaru - $newSeconds;

$jam = floor( $selisih / 3600 );
$selisih -= $jam * 3600;
$menit = floor( $selisih / 60 );
$selisih -= $menit * 60;

if($jam<10){ $jam='0'.$jam;}
if($menit<10){ $menit='0'.$menit;}
if($selisih<10){ $selisih='0'.$selisih;}

return "{$jam}:{$menit}:{$selisih}";
}


$jam_limit_pindah = menjumlahkan_waktu($jam_keluar,'+0 day +3 hour +15 minutes +0 seconds');

if (strtotime($jam_sekarang) > strtotime($jam_limit))
{
	if (strtotime($jam_sekarang) > strtotime($jam_limit_pindah))
	{
	  $status="absen keluar";
	}
	else
	{
		$status="absen keluar";
	}
		
}
else
{
	
if (strtotime($jam_sekarang) < strtotime($jam_mulai))
{	
	$status="Absen Sebelum Waktunya";
	
}
else
{
	$status="absen keluar";

}

}


 $kode_face_recognition = $_GET['nama'];
 $id_mahasiswa =  baca_database("","id_mahasiswa","select * from data_mahasiswa where kode_face_recognition='$kode_face_recognition'");

if (!(empty($id_mahasiswa)))
	
	{
		
		
		echo $ada =  cek_database("","","","select * from data_absensi where id_mahasiswa='$id_mahasiswa' and jenis_absensi='keluar' and tanggal='$tanggal'");
		if ($ada == "ada")
		{
		}
		else
		{
			$id_absensi=$id_absensi_otomatis;
			$id_jadwal="proses";
			$tanggal=date('Y-m-d');
			$jam= date("h:i:sa");
			$id_mahasiswa =  baca_database("","id_mahasiswa","select * from data_mahasiswa where kode_face_recognition='$kode_face_recognition'");
			

			$query=mysql_query("insert into data_absensi values (
			'$id_absensi'
			,'$id_jadwal'
			,'$tanggal'
			,'$jam'
			,'$id_mahasiswa'
			,'$status'
			,'keluar'
			
			)");
		}
		
		

	}
	else
	{
		//NTAH
		
	}

?>










