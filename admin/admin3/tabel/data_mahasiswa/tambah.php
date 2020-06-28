
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>	
	

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Tambah<h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			  
				<input type="hidden" readonly value="<?php echo id_otomatis("data_mahasiswa","id_mahasiswa","10");?>" name="id_mahasiswa" placeholder="id_mahasiswa" id="id_mahasiswa" required="required">		
				 
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >nim <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="nim" id="nim" placeholder="nim" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input onkeypress='return h(event)' class=''  type="text" name="nama" id="nama" placeholder="Nama" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Alamat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea  class=''  type="text" name="alamat" id="alamat" placeholder="Alamat" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tempat&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea  class=''  type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat&nbsp;Lahir" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  class='' value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal&nbsp;Lahir" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jenis&nbsp;Kelamin <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				
<select class=' selectpicker' data-live-search='true'  type="enum" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis&nbsp;Kelamin" required="required">
<option></option><?php combo_enum('data_mahasiswa','jenis_kelamin',''); ?>
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
				<input onkeypress='return a(event)' class=''  type="text" name="no_telepon" id="no_telepon" placeholder="No&nbsp;Telepon" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kode&nbsp;Face&nbsp;Recognition <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="kode_face_recognition" id="kode_face_recognition" placeholder="Kode&nbsp;Face&nbsp;Recognition" required="required">





				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_simpan(' SIMPAN'); ?>
</center>
</div>		
</div>
</div>
</form>
