<?php function detail($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$keterangan,$proses,$namatombol)
{
?>

<?php
$sql=mysql_query("SELECT * FROM $tabel where $nama = '".mysql_real_escape_string($proses)."'");
$data=mysql_fetch_array($sql);
$id_produk = $data[$id];
$count = mysql_num_rows($sql);
if ($count<=0)
{
	?>
<script>
location.href = "index.php?p=home"; 
</script>

	<?php
}
?>

<script>
function proses()
{	
	var jumlah = document.getElementById("jumlah").value;
	var harga = document.getElementById("harga").value;
	var total = jumlah * harga;
	convertToRupiah(total);	
}

function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	document.getElementById("total").innerHTML = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
</script>

<div class="col-md-12"><br>
<div class="container"> 
	    <div class="single_grid">
				<div class="col-md-4">
						
						    
								<img  src="admin/upload/<?php echo $data["$foto"];?>" onerror="this.src='home/data/image/error/error.png'" style="display: inline; width: 300px;  opacity: 1;">
							
						
						 <div class="clearfix"></div>		
				  </div> 
				  <div class="col-md-6">
				  	 <ul class="back">
                	 <a  class="btn btn-primary" href="index.php?p=produk">Back</a>
                     </ul>
					 <h1><?php echo $data["$nama"];?></h1>
				     <div class="dropdown_top">
				     <div class="dropdown_left">					 
					 <font color="red"><?php echo ucwords($kategori);?> : <?php echo $data["$kategori"];?></font>
					 <br>
					 <font color="green">Stok Tersedia : <?php echo $data["$stok"];?></font>
					
					 <div class="price_single">
					 <div class="head">
					 <h2><span class="amount item_price"><?php echo rupiah($data["$harga"]);?></span></h2>
					 </div>
							
			         <div class="clearfix"></div>
					 <form action="index.php">
					 <input type="hidden" value="produk" name="p">
					 <input type="hidden" value="simpan" name="action">
					 <input type="hidden" value="<?php echo encrypt($data["$id"]);?>" name="<?php echo $id;?>">
					 <input type="hidden" value="<?php echo ($data["$harga"]);?>" name="harga" id="harga">
							
					 <?php 
					 $action = $_GET['action'];
					 if ($action=="beli")
					 {
						 
					
	if (isset($_COOKIE["kodene"]))
	{
	}
	else
	{
		?>
		<script>
alert("MAAF ANDA BELUM LOGIN,SILAHKAN LOGIN TERLEBIH DAHULU");
location.href = "index.php?p=login"; </script>
		<?php
	}


						 
						 ?>
					       <input type="hidden" value="<?php echo $data["$stok"];?>" name="stok">
							Jumlah : <input onchange="proses();" onkeypress="proses();" onclick="proses();" onkeydown="proses();" onkeypress="proses();" 
									 name="jumlah" id="jumlah" value="0" min="1" max="<?php echo $data["$stok"];?>"  type="number" required> 
							<br>
							
							
							<br>
							Total Harga : <b id="total"></b>
							<br>
							Catatan : <br>
							<textarea name="catatan">
							</textarea>
							<br>
						 
							<div class="size_2-right">
							<button href="index" class="btn btn-primary" value=""><?php echo $namatombol;?> </button>
							</div>
				    <?php } ?>
						    </form>
					        </div>
						    <br>
						 	<b>Deskripsi :</b>
							<p><?php echo $data["$keterangan"];?></p>
							
							<br>
							<b>Komentar/Testimoni:</b>
							<br>
							<br>
							<?php 
							
				
				$querytabel1="SELECT * FROM data_komentar where id_produk='$id_produk'";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {

			  ?>
		
	<a href="admin/upload/<?php
	echo $data1['foto'];
	?>" target="blank">
	<img 
	onerror="this.src='home/data/image/error/error.png'"
	src="admin/upload/
	<?php
	echo $data1['foto'];
	?>" width="100"></a>

	<br>
	Nama : 
		<?php
	$idp = $data1['id_pelanggan'];
	
	echo baca_database("data_pelanggan","nama_pelanggan","select * from data_pelanggan where id_pelanggan='$idp'");
	?>
	<br>
	Komentar : 
		<?php
	echo $data1['komentar'];
	?>
	<br>
	<?php
	}?>
			        </div>
			        <div class="clearfix"></div>
			        </div>
			        <div class="simpleCart_shelfItem"> 
			        </div>
				    </div>
          	    <div class="clearfix"></div>
		</div>
</div>
<?php } ?>