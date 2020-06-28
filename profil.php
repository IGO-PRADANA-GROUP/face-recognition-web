<?php if(empty($p)) { header("Location: index.php?p=home"); die(); } ?>

<br>
<center>
    <h2>
        PROFIL
    </h2>
</center>
<br>
					<?php
					$sql=mysql_query("SELECT * FROM data_profil");
					$data=mysql_fetch_array($sql);
					?>
<div class="container">
    <div class="col-md-12">
	<center>
        <img onerror="this.src='home/data/image/error/error.png'" src="admin/upload/<?php echo $data['gambar'];?>" width="500">
        
            <h2><?php echo strtoupper($data['nama']); ?>
            </h2>
        </center>
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
                <tr>
                    <td class="clleft" width="25%">deskripsi</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['deskripsi']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4"></div>
</div>
<!-- PROFIL -->