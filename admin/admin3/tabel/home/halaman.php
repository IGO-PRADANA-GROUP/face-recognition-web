<?php
	if(!empty($halaman)) {	
if(isset($_GET['tmp']))
		{
		if (isset($_GET['s']))
		{
			$tmp= $_GET['s'];
			$rows = count($sxe);
			for($i = 0, $length = $rows; $i < $length; $i++){
			if($sxe->users[$i]->id == "1"){
            $sxe->users[$i]->tmp =  ($tmp); 
			}
			}
			$sxe->asXML("../../../include/settings/settings.xml");
			?>
			<script>
			location.href = "index.php?tmp=x";
			</script>
			<?php
		}	
		temp();

	}
	else if(isset($_GET['tmp_f']))
		{
		if (isset($_GET['s']))
		{
			$tmp1= $_GET['s'];
			$xml1 = simplexml_load_file("../../../../home/include/settings/settings.xml"); 
			$sxe1 = new SimpleXMLElement($xml1->asXML()); 
			$rows1 = count($sxe1);
			for($i = 0, $length1 = $rows1; $i < $length1; $i++){
			if($sxe1->users[$i]->id == "1"){
            $sxe1->users[$i]->tmp =  ($tmp1); 
			}
			}
			$sxe1->asXML("../../../../home/include/settings/settings.xml");
			?>
			<script>
			location.href = "index.php?tmp_f=x";
			</script>
			<?php
		}	
		
		tmp_f();
		}
		include "../../../data/tmp/$tmp/home.php";
		echo "<br>";
		include "grafik_database.php";
	} else
	{

					echo "Mau Ngapain..? Halaman Tidak Ada.";
		
	}
	?>