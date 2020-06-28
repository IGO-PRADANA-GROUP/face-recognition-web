<?php 
include '../../../include/all_include.php';
$array_hari = array(1=>"senin","selasa","rabu","kamis","jumat", "sabtu","minggu");
$hari = $array_hari[date("N")];
$tanggal = date ("j");
$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $array_bulan[date("n")];


?>


<br><br>
<center>
<h3>
<font color="green">
Id Jadwal : <?php  echo $id_jadwal = baca_database("","id_jadwal","select * from data_jadwal where hari='$hari'");  ?><br>
Waktu Absensi : 
<?php
date_default_timezone_set('Asia/Jakarta');

echo $jam_keluar = baca_database("","jam_keluar","select * from data_jadwal where hari='$hari'");;
echo "<br>";
echo $jam_mulai = menjumlahkan_waktu($jam_keluar,'+0 day +0 hour -15 minutes +0 seconds');
echo " s/d ";
echo $jam_limit = menjumlahkan_waktu($jam_keluar,'+0 day +0 hour +15 minutes +0 seconds');
echo "<br></font>";
$jam_sekarang=  date('H:i:s'); 

//MENJUMLAHKAN WAKTU --> tambah format = '+0 day +0 hour +15 minutes +0 seconds'
function menjumlahkan_waktu($waktu,$tambah)
{
	return date('G:i:s',strtotime($tambah,strtotime($waktu)));
}

function jumlah($waktu,$tambah)
{
	return date('G',strtotime($tambah,strtotime($waktu)));
}

//SELISIH WAKTU
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
	echo  "<br><font color='#6C70B1'>Waktu Absensi Berkhir";
	}
	else
	{
		echo "<br><font color='red'>Absen Sebelum Waktunya : ";
	echo $selisih = selisih_waktu($jam_limit,$jam_sekarang);
	}
		
}
else
{
	
if (strtotime($jam_sekarang) < strtotime($jam_mulai))
{	
	echo  "<br><font color='#6C70B1'>Belum Dapat Absensi - Menunggu Absensi  ";
	echo $selisih = selisih_waktu($jam_limit,$jam_sekarang);
	
}
else
{
	echo  "<br><font color='blue'>Silahkan Absensi - Absensi Berakhir  ";
	echo $selisih = selisih_waktu($jam_limit,$jam_sekarang);

}

}
?>


<br>
Waktu Sekarang : <?php echo $hari;?>, Tanggal : <?php echo format_indo(date('Y-m-d'));?>, Jam :<?php echo $jam_sekarang;?>
</font>
<br><br>
DATA mahasiswa
</h3>
</center>

<div style="overflow-x:auto;">
<table <?php tabel(100,'%',1,'left');  ?> >
			<tr>								  
			   <th><center><h4>No</h4></center></th>
			   <th align="center" ><center><h4>nim</h4></center></th>
			   <th align="center" ><center><h4>Nama</h4></center></th>
			   <th align="center" ><center><h4>Status Absensi</h4></center></th>
			</tr>
							 
			<tbody>
			<?php
				$no = 0;
				$querytabel="SELECT * FROM data_mahasiswa";
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { ?>
               <tr class="event2">	
				 <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
                 <td align="center"><?php echo ($data['nim']); ?></td>
				 <td align="center"><?php echo ($data['nama']); ?></td>
				  <td align="center">
				 
				 <?php
 $tanggal= (date('Y-m-d'));
				 $id_mahasiswa = $data['id_mahasiswa'];				 
				 $ada =  cek_database("","","","select * from data_absensi where id_mahasiswa='$id_mahasiswa' and tanggal='$tanggal' and jenis_absensi='keluar'");
				 $id_absensi =  baca_database("","id_absensi","select * from data_absensi where id_mahasiswa='$id_mahasiswa' and id_jadwal='proses'");
				 
				 if ($ada=="ada")
				{
					?>
					<center>
					<img src="scan.gif" width="100">
					<br>
					<font color="red"><b>
					<?php
					 echo ucwords(baca_database("","status","select * from data_absensi where id_mahasiswa='$id_mahasiswa' and id_jadwal='proses'"));
					?>
					</b></font>
					</center>
					<?php
				}
				else
				{
					$id_jadwal = "proses";
				 ?>
				 <img src="load.gif" width="100">
				 <center>
				 <h6><font color="green">Proses Mendeteksi Wajah Otomatis</font></h6>
				 Absen Manual :
				 <a onclick="window.open('sakit.php?id_jadwal=<?php echo $id_jadwal;?>&id_mahasiswa=<?php echo $id_mahasiswa;?>');"  class="btn btn-info btn-xs">Sakit</a>
				 <a onclick="window.open('izin.php?id_jadwal=<?php echo $id_jadwal;?>&id_mahasiswa=<?php echo $id_mahasiswa;?>');"  class="btn btn-warning btn-xs">Izin</a>
				 <a onclick="window.open('alfa.php?id_jadwal=<?php echo $id_jadwal;?>&id_mahasiswa=<?php echo $id_mahasiswa;?>');" class="btn btn-danger btn-xs">Alfa</a>
				 <a onclick="window.open('hadir.php?id_jadwal=<?php echo $id_jadwal;?>&id_mahasiswa=<?php echo $id_mahasiswa;?>');" class="btn btn-success btn-xs">Hadir</a>
				 </center>
				<?php } ?>
				 
				 </td>
               </tr>
			<?php } ?>
			</tbody>
</table>
</div>
<?php
$id_jadwal = baca_database("","id_jadwal","select * from data_jadwal where hari='$hari'");
?>
<center>
<a href="selesai.php?id_jadwal=<?php echo $id_jadwal;?>" class="btn btn-info"> SELESAI </a>
</center>
<br>
NB: Jika telah selesai Absensi silahkan tekan tombol selesai diatas.
<br>
<br>
<br>
<br>
<br>

