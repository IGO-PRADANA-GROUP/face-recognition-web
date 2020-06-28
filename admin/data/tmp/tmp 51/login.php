		<?php
$default_url = '../data/tmp/tmp 51';
$tema = 'Notebook-AdminPanel-master/';
$url = $default_url.'/'.$tema;
?>
<?php include '../include/function/login.php';?>


<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Notebook | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo $url;?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $url;?>css/app.css" type="text/css" />

</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="#"> <?php echo ucwords($judul); ?></a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>FORM LOGIN</strong>
        </header>
        <form action="" method="post" class="panel-body wrapper-lg">
          <div class="form-group">
            <label class="control-label">Username</label>
            <input  class="form-control" name="username" type="text" placeholder="Username">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
           <input class="form-control" name="password" placeholder="Password" type="password">
          </div>
          <div class="checkbox">
            
          </div>
       <a href="../../" class="btn btn-primary my-4">CANCEL</a>
			<button type="submit" type='submit' name="login" class="btn btn-primary my-4">LOGIN</button>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
      <?php echo $copyright; ?>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="<?php echo $url;?>js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo $url;?>js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo $url;?>js/app.js"></script>
  <script src="<?php echo $url;?>js/app.plugin.js"></script>
  <script src="<?php echo $url;?>js/slimscroll/jquery.slimscroll.min.js"></script>
  
</body>
</html>