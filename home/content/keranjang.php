<?php
function keranjang_belanja($field,$tabel,$id,$tabel_produk,$id_produk,$nama_produk,$foto,$harga,$jumlah,$id_pelanggan,$judul,$pakai_ongkir,$tombolfinish)
	{
		$ids="";
		
		if (isset($_COOKIE["kodene"]))
		{
			$ids= decrypt($_COOKIE['kodene']);
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

	
	<div class="col-md-12">
	<h4>
	<b>DAFTAR <?php echo $judul;?></b>
	</h4>
	<div style="overflow-x:auto;">
	<table <?php tabel(100,'%',1,'left');  ?> >
		<tr>								  
			<th>No</th>
			<th align="center" class="th_border cell"  ><?php $nama_produk = str_replace('_', ' ',$nama_produk);	echo ucwords($nama_produk);?>, Catatan</th>
			<th align="center" class="th_border cell"  ><?php echo ($harga);?></th>
			<th align="center" class="th_border cell"  ><?php echo ($jumlah);?></th>
			<th align="center" class="th_border cell"  >Total</th>
			<th>Action</th>
		</tr>
		<tbody>
			<?php
			error_reporting(0);
			$total_keseluruhan;
			$jumlah_keseluruhan;
			$no = 0;
			//$startRow=($page-1)*$dataPerPage;
			$no = 0;//$startRow;
			$querytabel="SELECT * FROM $tabel where status='proses' and id_pelanggan='$ids'";
				
			$proses = mysql_query($querytabel);
			while ($data = mysql_fetch_array($proses))
			{ 
		$idproduknya = ($data["$id_produk"]);
		?>
        <tr class="event2">	
			<td align="left" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
			<td align="left">
			<img width="70" height="50" 
			onerror="this.src='home/data/image/error/error.png'"
			src="admin/upload/<?php echo baca_database("","$foto","select * from $tabel_produk where $id_produk='$idproduknya'")?>">
			&nbsp;
			&nbsp;
			<b>
				<?php 
					echo baca_database("","nama_produk","select * from data_produk where $id_produk='$idproduknya'")
				?></b>, <?php echo $data['catatan']; ?>
			
			</td>
			<td align="left"><font color="green"><b><?php echo rupiah($data["$harga"]); ?></b></font></td>
			<td align="left">
				<form action="" method="get">
				<input type="hidden" value="keranjang" name="p">
				<input type="hidden" value="update" name="action">
				<input type="hidden" value="<?php echo encrypt($data["$id"]); ?>" name="proses">
				<input type="hidden" value="<?php echo $data["$id_produk"]; ?>" name="id">
				
				<?php
				 $stok =  baca_database("data_produk","jumlah","select * from data_produk where id_produk='$idproduknya'");
				$jml =  $data["$jumlah"];
				$max = $stok + $jml;
				?>
				
				<input type="number" style="width: 3em" min="1" max="<?php echo $max;?>"  value="<?php $jumlah_keseluruhan = $jumlah_keseluruhan +  ($data["$jumlah"]); echo  ($data["$jumlah"]); ?>" name="jumlah">
				
				<input type="hidden" style="width: 3em"  value="<?php echo $max;?>" name="max">
				
				
				<?php 
				
				btn_edit("Update $jumlah"); ?>
				
				</form>
			</td>
			<td align="left"><font color="green"><b><?php  
				$total_keseluruhan = $total_keseluruhan + (($data["$harga"]) * ($data["$jumlah"]));
				echo rupiah(($data["$harga"]) * ($data["$jumlah"]));?></b></font></td>
			<td class="th_border cell" align="left" width="200">
						<table border="0">
							<tr>
								<td>
									<a href="<?php index(); ?>?p=keranjang&action=delete&proses=<?php echo $data["$id"]; ?>&id_produk=<?php echo $data["$id_produk"]; ?>&jumlah=<?php echo $data["$jumlah"]; ?>">
									<?php btn_hapus('Hapus'); ?></a>
								</td>
							</tr>
						</table>
			</td>
        </tr>
			<?php }
			
			if ($no==0)
			{
				echo "<center><h1>KERANJANG BELANJA KOSONG</h1></center>";
				$pakai_ongkir="tidak";
			}
			
			?>
		</tbody>
</table>
</div>
</div>


<form  method="get">
<input name="p" value="keranjang" type="hidden">
<input name="action" value="selesai" type="hidden">
<?php if($pakai_ongkir=="ya")
{ ?>
	<script src="admin/data/javascript/jquery/jquery.js"></script>
	<script>
	
	
				 function proses() { 
				 var sub_total = document.getElementById('sub_total').value;
				 var input = document.getElementById('tujuan').value;
				 var kurir = document.getElementById('kurir').value;
				 
				  $.ajax({ url: 'home/include/function/ongkir.php', 
				  type: 'POST', 
				  dataType: 'json', 
				  data: {'isi': input,'tabel':'data_ongkir','field':'tujuan','field2':'kurir','isi2': kurir}, success: function (proses) 
				  {
					 var ongkir = proses['biaya'];
					 if (ongkir=="undefined")
					 {
						 ongkir = 0;
					 }
					document.getElementById('biaya_pengiriman').value = ongkir;
					convertToRupiah(ongkir);
					document.getElementById('total_pembayaran').value = parseInt(ongkir) + parseInt(sub_total);
					convertToRupiah2(parseInt(ongkir) + parseInt(sub_total));
					 } }); 
				 }
				 
				function convertToRupiah(angka)
				{
				var rupiah = '';		
				var angkarev = angka.toString().split('').reverse().join('');
				for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
				document.getElementById("biaya_pengiriman_tampil").innerHTML = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
				}
				
				function convertToRupiah2(angka)
				{
				var rupiah = '';		
				var angkarev = angka.toString().split('').reverse().join('');
				for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
				document.getElementById("total_pembayaran_tampil").innerHTML = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
				}
	 </script>




<div class="col-md-8">
<h4>
 <b>METODE PENGIRIMAN</b>
</h4>
<div class="col-md-6">
<table class="table">
	<tr>
	<td>Kurir </td>
	<td>:</td>
	<td>
		<select onchange="proses();" required class='form-control selectpicker' data-live-search='true'  name="kurir" id="kurir" placeholder="id&nbsp;menu1" required="required">
		<?php combo_database('data_ongkir','kurir','select * from data_ongkir group by kurir'); ?>
		</select>
	</td>
	</tr>
	
	<tr>
	<td>Wilayah / Kota Tujuan</td>
	<td>:</td>
	<td>
		<select  onchange="proses();" required class='form-control selectpicker' data-live-search='true' name="tujuan" id="tujuan" placeholder="id&nbsp;menu1" required="required">
		<option value="">--PILIH TUJUAN--</option>
		<?php combo_database('data_ongkir','tujuan','select * from data_ongkir'); ?>
		</select>
	</td>
	</tr>
	
	<tr>
	<td>Alamat Lengkap </td>
	<td>:</td>
	<td>
		<textarea required value="" name="alamat_pengiriman">
		<?php echo baca_database("","alamat","select * from data_pelanggan where id_pelanggan='$ids'");?>
		</textarea>
	</td>
	</tr>
	
	<tr>
	<td>No Telepon </td>
	<td>:</td>
	<td>
		<input required value="<?php echo baca_database("","no_telepon","select * from data_pelanggan where id_pelanggan='$ids'");?>"  name="no_telepon_penerima" type="number">
	</td>
	</tr>
	
	<tr>
	<td>Nama Penerima </td>
	<td>:</td>
	<td>
		<input value="<?php echo baca_database("","nama_pelanggan","select * from data_pelanggan where id_pelanggan='$ids'");?>" required name="nama_penerima" id="nama_penerima" >
	</td>
	</tr>
</table>
</div>
</div>
<?php }
else
{
 ?>
 <div class="col-md-8">
 </div>
<?php } ?>


<div class="col-md-4">
<h4>
 <b>PEMBAYARAN</b>
</h4>
<div  class="col-md-4">
<table class="table">
	<tr>
	<td>Jumlah <?php echo $field;?> </td>
	<td>:</td>
	<td>
		 <font color="red"><b><?php echo $jumlah_keseluruhan;?> <?php echo $field;?></b></font></b> 
	</td>
	</tr>
<?php if($pakai_ongkir=="ya") { ?>
	<tr>
	<td>Sub Total </td>
	<td>:</td>
	<td>
		<font color="red"><b><?php echo rupiah($total_keseluruhan);?></b></font>
		<input name="sub_total" id="sub_total" value="<?php echo ($total_keseluruhan);?>" type="hidden">
	</td>
	</tr>

	<tr>
	<td>Biaya Pengiriman </td>
	<td>:</td>
	<td>
		<font color="red"><b id="biaya_pengiriman_tampil">Rp.0</b></font>
		<input name="biaya_pengiriman" id="biaya_pengiriman" value="0" type="hidden">
	</td>
	</tr>
<?php } ?>

	<tr>
	<td>Total Pembayaran </td>
	<td>:</td>
	<td>
		<font color="red"><b id="total_pembayaran_tampil"><?php echo rupiah($total_keseluruhan);?></b></font>
		<input name="total_pembayaran" value="<?php echo ($total_keseluruhan);?>" id="total_pembayaran" type="hidden">
	</td>
	</tr>
	
	
	<tr>
	<td></td>
	<td></td>
	<td>
	<?php
	if ($no>0)
	{
		?>
			<button class="btn btn-danger"><?php echo $tombolfinish;?> </button>
		<?php
	}
	?>
	
	</td>
	</tr>

	
</table>
</div>
</div>
</form>

<?php 
	
}

	?>