
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
			Detail data&nbsp;jadwal
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
			$sql=mysql_query("SELECT * FROM data_jadwal where id_jadwal = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;jadwal</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_jadwal']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">hari</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['hari']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jam&nbsp;masuk</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jam_masuk']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jam&nbsp;keluar</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jam_keluar']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>