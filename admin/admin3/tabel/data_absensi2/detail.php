
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Detail
<h3 style="cursor: s-resize;"></h3></div>
<div class="content-box-content">
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
	<tr class="event3">
		<td class="clleft" colspan="3">
			Detail data&nbsp;absensi
		</td>
	</tr>	
			<?php

if (!isset($_GET['proses']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
}
			$proses = decrypt(mysql_real_escape_string($_GET['proses']));
			$sql=mysql_query("SELECT * FROM data_absensi where id_absensi = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;absensi</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_absensi']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">id&nbsp;jadwal</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_jadwal']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Hari</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "hari", " select * from data_jadwal where id_jadwal ='$data[id_jadwal]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tanggal</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jam</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jam']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">id&nbsp;mahasiswa</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_mahasiswa']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_mahasiswa where id_mahasiswa ='$data[id_mahasiswa]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">status</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['status']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>