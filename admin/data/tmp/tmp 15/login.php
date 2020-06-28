<?php 
include '../include/function/login.php';
$default_url = '../data/tmp/tmp 15';
$tema = 'adminhero/';
$url = $default_url.'/'.$tema;
?>


<!DOCTYPE html>
<html lang="en-us">
  <head>
 

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/ionicons.css">
    <link rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/font-awesome.css">

    <link id="mainstyle" rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/skin.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/demo.css">

    <script src="<?php echo $url;?>assets/scripts/modernizr-custom.js"></script>
    <script src="<?php echo $url;?>assets/scripts/respond.js"></script>

    <body class="orchid login">
      <form class="login-form widget widget-v" id="userlogin" method="post" autocomplete="off" action="">
        <div class="w-center"><img class="demo-logo" src="../data/image/logo/logo.png" width="100"> </div>
        <div class="w-section">
          <div class="form-group">
            <label class="sr-only" for="formBasicFirstName">Username</label>
            <input class="form-control" id="username" type="text" name="username" placeholder="username" autocomplete="off">
          </div>
        
          <div class="form-group">
            <label class="sr-only" for="formBasicPassword">Password</label>
            <input class="form-control" id="password" type="password" name="password" placeholder="password" autocomplete="off">
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <a href="../../" class="btn btn-danger  btn-block btn-flat"><center>Cancel</center></a>
            </div>
             <div class="col-sm-6">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">login</button>
            </div>
          </div>
        </div>
      </form>
    </body>
  </head>
</html>