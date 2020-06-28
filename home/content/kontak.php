<?php function kontak($nama_perusahaan,$no_telepon,$alamat,$longitude,$latitude)
{
?>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script>
		function initialize() {
		var options = {
			center:new google.maps.LatLng(<?php echo $longitude.",".$latitude?>),
			zoom:15,
			mapTypeId:google.maps.MapTypeId.ROADMAP 
		};
		var map=new google.maps.Map(document.getElementById("idmaps"),options);
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo $longitude.",".$latitude?>), 
			map: map,
			title: 'Bandung'
		});
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	    </script>
<?php
					$sql=mysql_query("SELECT * FROM data_profil");
					$data=mysql_fetch_array($sql);
					?>
<div class="container">
    <div class="col-md-12">
	<center>
      
        <table <?php tabel_in(100,'%',0,'center'); ?>>
            <tbody>

                <tr>
                    <td class="clleft" width="25%">no&nbsp;telepon</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['no_telepon']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">email</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['email']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">alamat</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['alamat']; ?></td>
                </tr>
               
            </tbody>
        </table>
    </div>

    <div class="col-md-4"></div>
</div>
<?php 
} ?>