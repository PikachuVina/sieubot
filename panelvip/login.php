<?php
session_start();
include'../system/head.php';
?>

<div class="content">
	<div class="card"><div class="header">
		<h4 class="title"> Control Panel Cộng Tác Viên</h4>
	</div>

<?php
//if($_SESSION['id']) 
//{
//header('location: /panelvip/panelctv.php');
//}

if($_POST['user'] && $_POST['pass']){
$username = mysql_real_escape_string($_POST['user']);
$password = mysql_real_escape_string($_POST['pass']);
$kiemtra = mysql_query("SELECT * FROM `congtacvien` WHERE `username`='" . trim(mb_strtolower($username)) . "' LIMIT 1");
if (mysql_num_rows($kiemtra)) {
$user = mysql_fetch_assoc($kiemtra);
if (md5($password) == $user['pass']) {
$_SESSION['id'] = $user['id'];
$_SESSION['user'] = $username;
die('<script>window.location.href="/panelvip/panelctv.php"; </script>');
exit;
} else { 
die('<script>window.location.href="/panelvip/login.php"; </script>');
}
}
}
?>


<div class="panel-body">
      <form action="" method="POST">
      <div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" class="form-control" name="user">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="pass">
</div>
<button type="submit" class="btn btn-danger">Đăng Nhập</button></form></div></div>

</div>

<?php /*
   mysql_query("CREATE TABLE IF NOT EXISTS `congtacvien` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user` varchar(32) NOT NULL,      
      `pass` varchar(32) NOT NULL,
      `soid` varchar(32) NOT NULL,
      `ctv` varchar(32) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
*/ ?>	 

<?php include'../system/foot.php'; ?> 