<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$url = "home/data/tmp/tmp 1/Moderna/";
$komponen = "home/data/tmp/tmp 1/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<link href="<?php echo $url;?>css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $url;?>css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="<?php echo $url;?>css/jcarousel.css" rel="stylesheet" />
	<link href="<?php echo $url;?>css/flexslider.css" rel="stylesheet" />
	<link href="<?php echo $url;?>css/style.css" rel="stylesheet" />
	<link href="<?php echo $url;?>skins/default.css" rel="stylesheet" />
</head>

<body>
	<div id="wrapper">
		<header>
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="#"><img width="50" src="admin/data/image/logo/logo.png" alt=" " />&nbsp;<span><?php echo $judul;?></span><hr></a>
					</div>
					
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
		 <?php $apa = $i->n;
		if ($apa=="Login")
		{
			if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
			{
				$kodene = decrypt($_COOKIE["kodene"]);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$token = sha1($ip.$useragent.$key);
				$token = crypt($token, $key);
				if ($_COOKIE['token_user'] == $token)
				{
					$token = "ada";
				}
				else
				{
					$token = "";
				}
				$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
			}
			else
			{
				$token = "";
				$kode ="";
			}
			if ($kode=="ada" && $token=="ada")
			{
			?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
			-->
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
		<?php
		$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
			<li><li>
			<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
			<?php echo $i1->n;?></a>
			</li></li>
		<?php }} ?>
		</ul>
		</li>
		<?php }} ?>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="#"><i class="fa fa-home"></i></a></li>
							<?php echo ucwords($judul);?> / <?php echo $_GET['p'];?></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
		
		
		
		<section class="content">
			<div class="container">
				<div class="row">
					<?php include 'halaman.php';?>
				</div>
			</div>
		</section>
	
	
	
	
	<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Alamat </h5>
							<h5 class="widgetheading"><?php echo $alamat;?> </h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">No Telepon</h5>
							<h5 class="widgetheading"><?php echo $telepon;?> </h5>
							
						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Email</h5>
							<h5 class="widgetheading"><?php echo $email;?> </h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Media</h5>
							<div class="clear">
							<a href=<?php echo $instagram;?>"" >instagram</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p><?php echo $copyright;?></p>
								
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="social-network">
								<li><a href="<?php echo $facebook;?>" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo $twitter;?>" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo $google;?>" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<a href="<?php echo $url;?>#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo $url;?>js/jquery.js"></script>
	<script src="<?php echo $url;?>js/jquery.easing.1.3.js"></script>
	<script src="<?php echo $url;?>js/bootstrap.min.js"></script>
	<script src="<?php echo $url;?>js/jquery.fancybox.pack.js"></script>
	<script src="<?php echo $url;?>js/jquery.fancybox-media.js"></script>
	<script src="<?php echo $url;?>js/google-code-prettify/prettify.js"></script>
	<script src="<?php echo $url;?>js/portfolio/jquery.quicksand.js"></script>
	<script src="<?php echo $url;?>js/portfolio/setting.js"></script>
	<script src="<?php echo $url;?>js/jquery.flexslider.js"></script>
	<script src="<?php echo $url;?>js/animate.js"></script>
	<script src="<?php echo $url;?>js/custom.js"></script>

</body>

</html>
