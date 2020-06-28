
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
			$sql=mysql_query("SELECT * FROM data_mahasiswa where id_mahasiswa = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   
				<input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>" readonly  id="id_mahasiswa" required="required">		
				
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >nim <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nim" id="nim" placeholder="nim" value="<?php echo ($data['nim']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input onkeypress='return h(event)' class=''   required="required" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo ($data['nama']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Alamat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class=''    required="required" type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo ($data['alamat']); ?>">
<?php echo $data['alamat']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tempat&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class=''    required="required" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat&nbsp;Lahir" value="<?php echo ($data['tempat_lahir']); ?>">
<?php echo $data['tempat_lahir']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal&nbsp;Lahir" value="<?php echo ($data['tanggal_lahir']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jenis&nbsp;Kelamin <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select  class=' selectpicker' data-live-search='true'    required="required" type="enum" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis&nbsp;Kelamin" value="<?php echo ($data['jenis_kelamin']); ?>">
<option value='<?php echo $data[jenis_kelamin];?>'>- <?php echo $data[jenis_kelamin];?> -</option><?php combo_enum('data_mahasiswa','jenis_kelamin',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Agama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class='' type="text" name="agama" id="agama" placeholder="Agama" required="required">
				<option>Islam</option>
				<option>Kristen</option>
				<option>Hindu</option>
				<option>Budha</option>
				<option>Konghuchu</option>
				</select>


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >No&nbsp;Telepon <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input onkeypress='return a(event)' class=''   required="required" type="text" name="no_telepon" id="no_telepon" placeholder="No&nbsp;Telepon" value="<?php echo ($data['no_telepon']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kode&nbsp;Face&nbsp;Recognition <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="kode_face_recognition" id="kode_face_recognition" placeholder="Kode&nbsp;Face&nbsp;Recognition" value="<?php echo ($data['kode_face_recognition']); ?>">


		
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
