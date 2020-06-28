<?php 
function url_halaman($page)
{
	if ($page=="")
	{
		$page = $_GET['p'];
		echo "index.php?p=".$page;
	}
	else
	{
		echo "index.php?p=".$page;
	}

}


function postget_halaman($page)
{
	if ($page=="")
	{
		$page = $_GET['p'];
		echo "<input type='hidden' value='$page' name='p'>";
	}
	else
	{
		echo "<input type='hidden' value='$page' name='p'>";
	}

}





function lihatget()
{
	echo "<table border='1'>";
		foreach($_GET as $key => $value)
		{
			echo "<tr>";
		echo '<td>' . $key ;
		echo '</td><td>' . $value. '</td>';
		echo "</tr>";
		}
		echo "</table>";
	
}
?>