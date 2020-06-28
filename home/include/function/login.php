 <?php
if(isset($_POST["login"])){ 
include 'home/include/settings/settings.php';
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysql_real_escape_string($username);
$password = md5(mysql_real_escape_string($password));
$r = mysql_query("select * from $tabel_login_home where $field_password_login_home='$password' and $field_username_login_home='$username'");
$data = mysql_fetch_array ($r);
if (empty($username) && empty($password)) {
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
} else if (empty($username)) {
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
} else if (empty($password)) {
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
}else
if (mysql_num_rows($r) == 1) 
{
		$kodene=encrypt($data[$kodene_home]);
		setcookie('kodene', $kodene, time() + (6000 * 6000), '/');
		
		$ip = $_SERVER['REMOTE_ADDR']; 
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$token = sha1($ip.$useragent.$key);
		$token = crypt($token, $key);
		setcookie('token_user', $token, time() + (6000 * 6000), '/');
		
		echo "<script> window.location = 'index.php?p=home'</script>";		
} 
else 
{
	
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "index.php?p=login";</script><?php
}
}

if (isset($_GET['action']))
{
	$action = $_GET['action'];
	 if ($action=="logout")
    {
        error_reporting(0); 
        setcookie('kodene', '', 0, '/');
		setcookie('token_user', '', 0, '/');
        ?>
        <script>location.href = "index.php?p=login";</script>
        <?php
    }  
}
 ?>