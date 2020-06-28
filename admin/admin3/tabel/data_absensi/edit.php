
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Edit<h3></h3></div>
<form action="proses_update.php"  enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>	
	<tbody>
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
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;absensi <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_absensi" value="<?php echo $data['id_absensi']; ?>" readonly  id="id_absensi" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Jadwal <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!-- -->
<select  class=' selectpicker' data-live-search='true'   required="required" type="text" name="id_jadwal" id="id_jadwal" placeholder="Id&nbsp;Jadwal" value="<?php echo ($data['id_jadwal']); ?>">
<option value='<?php echo $data[id_jadwal];?>'>- <?php echo $data[id_jadwal];?> -</option><?php combo_database2('data_jadwal','id_jadwal','hari',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo ($data['tanggal']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jam <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="jam" id="jam" placeholder="Jam" value="<?php echo ($data['jam']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;mahasiswa <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!-- -->
<select  class=' selectpicker' data-live-search='true'   required="required" type="text" name="id_mahasiswa" id="id_mahasiswa" placeholder="Id&nbsp;mahasiswa" value="<?php echo ($data['id_mahasiswa']); ?>">
<option value='<?php echo $data[id_mahasiswa];?>'>- <?php echo $data[id_mahasiswa];?> -</option><?php combo_database2('data_mahasiswa','id_mahasiswa','nama',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select  class=' selectpicker' data-live-search='true'    required="required" type="enum" name="status" id="status" placeholder="Status" value="<?php echo ($data['status']); ?>">
<option value='<?php echo $data[status];?>'>- <?php echo $data[status];?> -</option><?php combo_enum('data_absensi','status',''); ?>
</select>
		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_update(' UPDATE'); ?>
</center>
</div>		
</div>
</div>
</form>
