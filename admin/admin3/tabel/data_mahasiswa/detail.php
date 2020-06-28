
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
			Detail data&nbsp;mahasiswa
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
			$sql=mysql_query("SELECT * FROM data_mahasiswa where id_mahasiswa = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			  
			   
			   <tr>
				<td class="clleft" width="25%">nim</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nim']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">alamat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['alamat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tempat&nbsp;lahir</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['tempat_lahir']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tanggal&nbsp;lahir</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal_lahir'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jenis&nbsp;kelamin</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jenis_kelamin']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">agama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['agama']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">no&nbsp;telepon</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['no_telepon']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">kode&nbsp;face&nbsp;recognition</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['kode_face_recognition']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>