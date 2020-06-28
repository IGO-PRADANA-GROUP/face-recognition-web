
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>	

<br><br>


<center>
 <br>
<!--  <button onclick="myFunction()" class="btn btn-danger">Buka Kamera Absensi</button> -->
</center>
<script>
function myFunction() {
  window.open("open.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
  
}
 


setTimeout(myFunction, 5000);

</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<div  id="load_updates"></div>
<br>
<br>
<script>
var auto_refresh = setInterval(
function ()
{
$('#load_updates').load('absen.php?id_jadwal=<?php echo $id_jadwal;?>').fadeIn("slow");
}, 500); 
</script>
