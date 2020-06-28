
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
			$sql=mysql_query("SELECT * FROM data_admin where id_admin = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;admin <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_admin" value="<?php echo $data['id_admin']; ?>" readonly  id="id_admin" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="username" id="username" placeholder="Username" value="<?php echo ($data['username']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >password Lama<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   type="password" name="password_lama" id="password_lama" placeholder="password lama" value="">
				<input  type="hidden" name="password_validasi" id="password_validasi" placeholder="password_validasi" value="<?php echo encrypt($data['password']);?>">
				<br>Masukkan password Lama untuk Validasi, Kosongkan jika tidak ingin mengganti password
				</td>
			   </tr>
			   
			    <tr>
				<td width="25%" class="leftrowcms">					
				<label >password Baru<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''    type="password" name="password" id="password" placeholder="password baru" value="">
				<br>Kosongkan jika tidak ingin mengganti password
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
