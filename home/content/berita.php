<?php 
function berita($tabel,$id,$tanggal,$judul,$foto,$isi)
{
	if (!(isset($_GET['Go'])))
	{
	?>

<div class="col-md-12">
    <!-- BERITA -->
    <div class="col-md-1 sidebar"></div>
    <div class="col-md-7 sidebar">
        <br>
        <form name="formcari" id="formcari" action="" method="get">
            <fieldset>
                <table>
                    <tbody>
                        <input name="p" value="berita" id="page" type="hidden">
                        <input
                            value="<?php echo $judul;?>"
                            type="hidden"
                            name="Berdasarkan"
                            id="Berdasarkan">

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
                                <a class="btn btn-primary" href="index.php?p=berita">
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
				{ ?>
        <br>

        <div class="">
            <h3><?php echo strtoupper(substr($data["$judul"],0,200)); ?></h3>
            <h4>Tanggal :
                <?php echo (format_indo($data["$tanggal"])); ?></h4>
            <a href='admin/upload/<?php echo $data["$foto"]; ?>'><img
                onerror="this.src='home/data/image/error/error.png'"
                width='200'
                height='150'
                src='admin/upload/<?php echo $data["$foto"]; ?>'></a>
            <br>
            <?php echo (substr($data["$isi"],0,300)); ?>...
            <br>
            <a
                class="btn btn-success btn-xs"
                href="index.php?p=berita&Go=<?php echo $data[$judul];?>">BACA SELENGKAPNYA...
            </a>
        </div>

        <?php } ?>
    </div>
    <!-- BERITA -->

    <!-- TERBARU -->
    <div class="col-md-3 sidebar">
        <br><br><br>
        <h2>
            <u>BERITA TERBARU</u>
        </h2>
        <?php
				$querytabel="SELECT * FROM $tabel ORDER BY $tanggal DESC LIMIT 0 ,10";
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				{ ?>

        <div class="testimonials">
            <h3><?php echo (substr($data["$judul"],0,200)); ?></h3>
            <p>
                <span class="quotes"></span><?php echo (substr($data["$isi"],0,100)); ?>.<span class="quotes-down"></span></p>
            <a
                class="btn btn-info btn-xs"
                href="index.php?p=berita&a&Go=<?php echo $data[$judul];?>">Baca Selengkapnya...
            </a>
        </div>
        <?php } ?>
    </div>
    <!-- TERBARU -->
</div>

<div class="col-md-12">
    <div class="col-md-1 sidebar"></div>
    <div class="col-md-8 sidebar">
        <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?>
        <br>
        <br><br><br>
    </div>
</div>

<?php 
} 

else {


$sql=mysql_query("SELECT * FROM $tabel where $judul = '".mysql_real_escape_string($_GET['Go'])."'");
$data=mysql_fetch_array($sql);
?>

<div class="col-md-12">
    <!-- DETAIL BERITA -->
    <div class="col-md-1 sidebar"></div>
    <div class="col-md-7 sidebar"><br>
        <button class="btn btn-primary" onclick="goBack()">Kembali</button>
        <script>
            function goBack() {
                window
                    .history
                    .go(-1);
            }
        </script>
        <br>

        <div class="">
            <h2><?php echo (substr($data["$judul"],0,200)); ?></h2>
            <h3>Tanggal :
                <?php echo (format_indo($data["$tanggal"])); ?></h3>
            <a href='admin/upload/<?php echo $data["$foto"]; ?>'><img
				onerror="this.src='home/data/image/error/error.png'" 
                width='500'
                height='300'
                src='admin/upload/<?php echo $data["$foto"]; ?>'></a>
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
            <p>
                <span class="quotes"></span><?php echo (substr($data["$isi"],0,100)); ?>.<span class="quotes-down"></span></p>
            <a
                class="btn btn-info btn-xs"
                href="index.php?p=berita&action=detail&proses=<?php echo (substr($data["
                $id"],0,100)); ?>"="$id"],0,100)); ?>"">Baca Selengkapnya...
            </a>
        </div>

        <?php } ?>
    </div>
    <!-- TERBARU -->
</div>

<?php
}
}
?>