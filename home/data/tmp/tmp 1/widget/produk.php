<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
    
?>

<div class="col-md-12">

    <br><br>
    <form name="formcari" id="formcari" action="" method="get">
        <fieldset>
            <table>
                <tbody>
                    <input name="p" value="produk" id="page" type="hidden">
                    <input
                        name="Berdasarkan"
                        value="<?php echo $nama; ?>"
                        id="Berdasarkan"
                        type="hidden">
                    <tr>
                        <td>Pencarian</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="isi" value="">
                            <?php
						if (isset($_GET['Berdasarkan']))
						{
							btn_cari('Cari');
							?>
                            <a class="btn btn-primary" href="index.php?p=produk">
                                Reset
                            </a>
                        <?php
						}
						else
						{
							?>

                            <?php
							btn_cari('Cari');
							
						}
						?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <br>
</div>

<div class="col-md-12">
<?php
				if (isset($_GET['page']) && !empty($_GET['page'])){ $page = (int)$_GET['page']; }
				else { $page = 1; }
				if (isset($_GET['perPage']) && !empty($_GET['perPage'])){ $dataPerPage = (int)$_GET['perPage']; }
				else { $dataPerPage = 12; }
				
				
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan = $_GET['Berdasarkan'];
				$isi = $_GET['isi'];
				$querytabel="SELECT * FROM $tabel where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM $tabel  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { 
                    $nama_data = $data[$nama];
                    $nama_link = str_replace('-', 'x~x',$nama_data);
					$nama_link = str_replace(' ', '-',$nama_link);
					
			  
			?>

    
    <div class="col-lg-4">
  <div class="pricing-box-alt">		
					<div class="pricing-terms">
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>">
                        <img
                            width="350"
                            height="200"
							onerror="this.src='home/data/image/error/error.png'"
                            src="admin/upload/<?php echo $data[$foto];?>" alt="item4">
                    </a>
								</div>
								<div class="pricing-content">
								 <center>
                    
                    <?php echo $data["$nama"];?>
                    <br>
                    <font color="red">
                        <?php echo ucwords($kategori);?>
                        :
                        <?php echo $data["$kategori"];?>
                    </font>
                    <br>
                    <font color="green">
                        Stok :
                        <?php echo $jmlstok = $data["$stok"];?>
                    </font>
                    <br>
                    <b><?php echo rupiah($data["$harga"]);?></b>
                    <br>
                    <br>
                    <a
                        href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" class="btn btn-info">
                        Detail
                    </a>
                    <?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');" class="btn btn-danger">
                        <?php echo $namatombol;?>
                    </a>
                <?php
										}
										else
										{
										?>
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>"class="btn btn-danger">

                        <?php echo $namatombol;?>
                    </a>
                    <?php } ?>
                    <br>
                    <br>
                </center>
								</div>
							
							</div></div>


    <?php
			  
			  } ?>
</div>

<div class="col-md-12">
    <br>
    <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?>
    <br>
    <br>
</div>
<?php } ?>