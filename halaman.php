
<?php

if (isset($_GET['p']))
{
		if(!empty($_GET['p'])){
			$p = $_GET['p'];
			$lokasi_file = "$p".".php";
			if(file_exists($lokasi_file))
			{
				include "$lokasi_file";
			}
			else
			{
				//TIDAK ADA FILE
				echo "HALAMAN TIDAK ADA";
			}

		}
		else
		{
			$P="home";
			include "home.php";
			
		}
}
else
{
			error_reporting(0);
			?>
			<script>location.href = "index.php?p=home";</script>	
			<?php
}
?>