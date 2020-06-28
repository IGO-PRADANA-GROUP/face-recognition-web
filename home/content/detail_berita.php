<?php function detail_berita($tabel,$id,$tanggal,$judul,$foto,$isi,$proses)
{
?>

<?php
$sql=mysql_query("SELECT * FROM $tabel where $id = '".mysql_real_escape_string($proses)."'");
$data=mysql_fetch_array($sql);
?>


<div class="col-md-12">
<!-- DETAIL BERITA -->
<div class="col-md-1 sidebar"></div>
<div class="col-md-7 sidebar"><br>
<button  class="btn btn-primary" onclick="goBack()">Kembali</button> <script> function goBack() { window.history.go(-1); } </script>
<br>

			<div class="">
			<h2><?php echo (substr($data["$judul"],0,200)); ?></h2>
			<h3>Tanggal : <?php echo (format_indo($data["$tanggal"])); ?></h3>
			<a href='admin/upload/<?php echo $data["$foto"]; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='500' height='300' src='admin/upload/<?php echo $data["$foto"]; ?>'></a>
			<br>
  				<?php echo (substr($data["$isi"],0,1000000)); ?>
			<br>
  			</div>
		
</div>
<!-- DETAIL BERITA -->



<!-- TERBARU -->
<div class="col-md-3 sidebar">
<br><br><br>
<h2>BERITA TERBARU</h2>
<?php
			
			$querytabel="SELECT * FROM $tabel ORDER BY $tanggal DESC LIMIT 0 ,10";
			$proses = mysql_query($querytabel);
			while ($data = mysql_fetch_array($proses))
			  { ?>
		  		    <div class="testimonials">
		  				 <h3><?php echo (substr($data["$judul"],0,200)); ?></h3>
		  				 <p><span class="quotes"></span><?php echo (substr($data["$isi"],0,100)); ?>.<span class="quotes-down"></span></p>
						 <a class="btn btn-info btn-xs" href="index.php?p=berita&action=detail&proses=<?php echo (substr($data["$id"],0,100)); ?>">Baca Selengkapnya... </a>
		  			</div>	
		  			
			<?php } ?>
</div>
<!-- TERBARU -->
</div>

<?php }?>