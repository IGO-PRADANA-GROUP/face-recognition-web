<?php

function Pagination_font_end($pagedefault,$limit,$querypagination)
{
	
	if (isset($_GET['p']))
	{
		$pg = $_GET['p'];
		$go_pg =  "index.php?p=".$pg;
	}
	else
	{
		$go_pg = "index.php?p=".$pg;
	}
	
	if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
	{
		$berdasarkan = $_GET['Berdasarkan'];
		$isi = $_GET['isi'];
		$countTotalRow = mysql_query($querypagination);
	}
	else
	{
		$countTotalRow = mysql_query($querypagination);
	}
    $queryResult = mysql_fetch_assoc($countTotalRow);
    $totalRow = $queryResult['total'];
    $totalPage = ceil($totalRow / $limit);
    $page = 1;
	?>
		<p>
		<?php 
		if (isset($_GET['perPage']) && !empty($_GET['perPage']))
		{
			echo "Jumlah ".$totalRow." data, "; 
		}
		else
		{
			echo "Jumlah ".$totalRow." data, "; 
		}
		if (isset($_GET['page']) && !empty($_GET['page']))
		{
			echo "Halaman ".$_GET['page']." Dari ".$totalPage." Halaman"; 
		}
		else
		{
			echo "Halaman ".$pagedefault." Dari ".$totalPage." Halaman"; 
		}
		?>
		</p>	
<a href="<?php echo $go_pg;?>&page=1&perPage=<?php echo $limit; ?>">
<?php btn_pagination('« sebelumnya'); ?>
</a>
	<?php
    while ($page <= $totalPage) 
    {
	?>
<a href="<?php echo $go_pg;?>&page=<?php echo $page; ?>&perPage=<?php echo $limit; ?>">
<?php btn_pagination($page); ?>
</a>
		<?php
        if ($page < $totalPage)
            echo " ";
			$page++;
    }
	?>
<a href="<?php echo $go_pg;?>&page=<?php echo $totalPage; ?>&perPage=<?php echo $limit; ?>">
<?php btn_pagination('berikutnya »'); ?>
</a>
<br>
	<?php } ?>

