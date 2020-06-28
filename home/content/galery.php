<?php function galery($tabel,$id,$judul,$foto,$keterangan)
{

	if (!(isset($_GET['Go'])))
	{
?>

<div class='list-group gallery'>
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
			?>

    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
        <a
            class="thumbnail fancybox"
            rel="ligthbox"
            href="index.php?p=Galery&Go=<?= $data[$judul];?>">
            <img
                class="img-responsive"
                alt=""
                onerror="this.src='home/data/image/error/error.png'"
                src="admin/upload/<?= $data[$foto];?>"/>
            <div class='text-right'>
                <small class='text-muted'><?= $data[$judul];?></small>
            </div>
        </a>
    </div>
    <?php
				} ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <center>
                <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?>
            </center>
            <br>
            <br>
        </div>
    </div>
</div>
<?php }
else {
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="index.php?p=Galery" class="btn btn-primary">Kembali</a>
            <br>
            <br>
            <?php 
				$sql=mysql_query("SELECT * FROM $tabel where $judul = '".mysql_real_escape_string($_GET['Go'])."'");
				$data=mysql_fetch_array($sql);
				?>
						<img 
						width="800" 
						src="admin/upload/<?= $data[$foto];?>"
						onerror="this.src='home/data/image/error/error.png'" 
						/>
            <h3><?= $data[$judul];?></h3>
            <hr>
            <p>
                <?= $data[$keterangan];?>
            </p>
            <br>
            <br>
        </div>
    </div>
</div>
<?php }

}?>