<?php
function transaksi($tabel,$id,$tabel_produk,$id_produk,$nama_produk,$foto,$harga,$jumlah,$id_pelanggan,$judul,$kode_transaksi,$tanggal)
	{ 
		$no=0;
		$id= "";
		if (isset($_COOKIE["kodene"]))
	{
		$id= decrypt($_COOKIE['kodene']);
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
	<br>
	<?php 
	function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
	}

	$query_kode = "select * from $tabel where status<>'proses' and id_pelanggan='$id' group by $kode_transaksi order by $tanggal DESC";
	$proses_kode = mysql_query($query_kode);
	while ($data_kode = mysql_fetch_array($proses_kode))
			{ 
		$kodenya = $data_kode["$kode_transaksi"];
		$biaya_ongkir = baca_database("","biaya_ongkir","select * from data_pemesanan where $kode_transaksi='$kodenya'");
		
		$Kurir = baca_database("","kurir","select * from data_pemesanan where $kode_transaksi='$kodenya'");
		$tanggalan = $data_kode["$tanggal"];
		$kodetampil = $kode_transaksi;
		?>
	<h4>
	KODE <?php echo $judul;?>:  <font color="red"><?php echo ($kodenya);?> </font> <br>
	Tanggal : <font color="blue"><?php echo format_indo($tanggalan) ?></font>
	</h4>
	
	<!-- ------------ -->
	<div style="overflow-x:auto;">
	<table <?php tabel(100,'%',1,'left');  ?> >
		<tr>								  
			<th>No</th>
			<th align="center" class="th_border cell"  ><?php $nama_produk = str_replace('_', ' ',$nama_produk);	echo ucwords($nama_produk);?>, Catatan</th>
			<th align="center" class="th_border cell"  ><?php echo ucwords($harga);?></th>
			<th align="center" class="th_border cell"  ><?php echo ucwords($jumlah);?></th>
			<th align="center" class="th_border cell"  >Total</th>
			<th align="center" class="th_border cell"  ><center>Status</center></th>
		</tr>
		<tbody>
			<?php
			$total_keseluruhan = 0;
			$jumlah_keseluruhan = 0;
			$no = 0;
			//$startRow=($page-1)*$dataPerPage;
			//$no = $startRow;
			$querytabel="SELECT * FROM $tabel where status<>'proses' and $kode_transaksi='$kodenya'";
			$proses = mysql_query($querytabel);
			while ($data = mysql_fetch_array($proses))
			{ 
		
		$idproduknya = ($data["$id_produk"]);
		?>
        <tr class="event2">	
			<td align="left" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
			<td align="left">
			<img width="70" height="50" onerror="this.src='home/data/image/error/error.png'" src="admin/upload/<?php echo baca_database("","$foto","select * from $tabel_produk where $id_produk='$idproduknya'")?>">
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
				<input type="hidden" value="keranjang_belanja" name="p">
				<input type="hidden" value="update" name="action">
				<input type="hidden" value="<?php echo $data["$id"]; ?>" name="proses">
				<?php $jumlah_keseluruhan = $jumlah_keseluruhan +  ($data["$jumlah"]); echo  ($data["$jumlah"]); ?>
				
				
				</form>
			</td>
			<td align="left"><font color="green"><b><?php  
				
				$total_keseluruhan = $total_keseluruhan + (($data["$harga"]) * ($data["$jumlah"]));
				echo rupiah(($data["$harga"]) * ($data["$jumlah"]));?></b></font></td>
			
			<td  class="th_border cell" align="left" width="200">
			<center>
			<b><?php $s = $data['status'];   ?> <?php $st = str_replace('_', ' ',$s);	echo ucwords($st);?></b>
			</center>
			<br>
<?php
if ($s=="selesai")
{ 

global $con_mysqli;
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_komentar");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_komentar = mysqli_query($con_mysqli,"SELECT max(id_komentar) as id_komentar FROM data_komentar");
	$data_komentar = mysqli_fetch_array($id_komentar);
	$id_komentar_akhir = $data_komentar['id_komentar'];
	$id_komentar_otomatis = autonumber($id_komentar_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_komentar');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_komentar_otomatis = $kodedepan."001";	
}

?>	
	<?php 
	
	
	$idd=$kodenya."-".$idproduknya;
	$ada = cek_database("data_komentar","foto","","select * from data_komentar where id_komentar='$idd'");
	if ($ada=="ada")
	{
		?>
		
	<center>
	<img 
	onerror="this.src='home/data/image/error/error.png'"
	src="admin/upload/
	<?php
	echo baca_database("data_komentar","foto","select * from data_komentar where id_komentar='$idd'");
	?>" width="100">
	<br>
	Komentar : 
		<?php
	echo baca_database("data_komentar","komentar","select * from data_komentar where id_komentar='$idd'");
	?>
	</center>
	<?php
	}
	else
	{
	?>
	<center>
			<br>Silahkan beri testimoni dibawah ini :
<br>
<br>
<form action="index.php?p=transaksi&action=testimoni" enctype="multipart/form-data"  method="post">

				<input type="hidden" readonly value="<?php echo $kodenya."-".$idproduknya;?>" name="id_komentar" placeholder="id_komentar" id="id_komentar" required="required">		
				
				<input type="hidden" value="<?php echo $idproduknya;?>" name="id_produk" id="id_produk" placeholder="id&nbsp;produk" required="required">

		
				<input type="hidden" value="<?php echo $_COOKIE['kodene'];?>" name="id_pelanggan" id="id_pelanggan" placeholder="id&nbsp;pelanggan" required="required">

		<center>
				<input type="file" name="foto" id="foto" placeholder="foto" required="required">

		<br>
			Komentar :
			<br>
				<textarea class='ckeditor'  type="textarea" name="komentar" id="komentar" placeholder="komentar" required="required">

</textarea>		

				<br>
<?php btn_simpan(' KIRIM TESTIMONI'); ?> 
</center>
</form>
	</center>
<?php
	}

 } ?>

			</td>
        </tr>
			<?php } 
			
			
			?>
		</tbody>
		<tr>
			<th align="center" colspan="3" class="th_border cell"  ></th>
			<th align="center" class="th_border cell"  >Biaya Pengiriman : </th>
			<th align="center" class="th_border cell"  ><?php echo rupiah($biaya_ongkir);?></th>
			<td class="th_border cell" align="left" width="200">
			<b>  Kurir : <?php echo $Kurir; ?></b>&nbsp;&nbsp;
			</td>
</tr>	
 <tr>
			<th align="center" colspan="3" class="th_border cell"  ></th>
			<th align="center" class="th_border cell"  >Total Pembayaran : </th>
			<th align="center" class="th_border cell"  ><?php echo rupiah($total_keseluruhan + $biaya_ongkir);?></th>
			<td class="th_border cell" align="left" width="200">
						<table border="0">
							<tr>
								<td>
								<?php 
								if ($s=="menunggu_konfirmasi")
								{
									?>
									<font color="magenta" size="2">Bukti Telah Diupload, Menunggu Konfirmasi</font>
									
									<?php
								}
								elseif ($s=="pengiriman")
								{
								?>
									<a href="<?php index(); ?>?p=transaksi&action=cek_resi&proses=<?php echo $kodenya; ?>">
									<?php btn_edit('Cek Resi & Konfirmasi Diterima'); ?></a>
								<?php } 
								elseif ($s=="selesai")
								{
								?>
									
								<?php } 
								elseif ($s=="pengajuan")
								{
								?>
									<a href="<?php index(); ?>?p=transaksi&action=upload_bukti&berapa=<?php echo ($total_keseluruhan);?>&proses=<?php echo $kodenya; ?>">
									<?php btn_edit('Upload Bukti Pembayaran'); ?></a>
									
								<?php }
								elseif ($s=="order")
								{
								?>
									<a href="<?php index(); ?>?p=transaksi&action=upload_bukti&berapa=<?php echo ($total_keseluruhan);?>&proses=<?php echo $kodenya; ?>">
									<?php btn_edit('Upload Bukti Pembayaran'); ?></a>
									
								<?php }
								elseif ($s=="booking")
								{
								?>
									<a href="<?php index(); ?>?p=transaksi&action=upload_bukti&berapa=<?php echo ($total_keseluruhan);?>&proses=<?php echo $kodenya; ?>">
									<?php btn_edit('Upload Bukti Pembayaran'); ?></a>
									
								<?php }
								else
								{
									?>
									<a href="<?php index(); ?>?p=transaksi&action=upload_bukti&berapa=<?php echo ($total_keseluruhan);?>&proses=<?php echo $kodenya; ?>">
									<?php btn_edit('Upload Bukti Pembayaran'); ?></a>
									
									<a href="index.php?p=transaksi&action=batal&proses=<?php echo $kodenya; ?>">
									<?php btn_hapus('Batal Pemesanan'); ?></a>
									<?php 
								}
								?>
								</td>
								</tr>
								<tr>
								
							</tr>
						</table>
			</td>
</tr>			
</table>
</div>
			<?php } ?>
</div>
<?php 


if ($no==0)
{
	echo "<center><h1>BELUM ADA TRANSAKSI</h1></center>";
}

	} ?>
