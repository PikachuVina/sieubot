<?php
session_start();
include 'system/head.php';

if($_SESSION['admin']) 
{
echo '<meta http-equiv=refresh content="0; URL=/panelvip">';
}
if($_POST['user'] && $_POST['pass'])
{
$user = $_POST['user'];
$pass = $_POST['pass'];
if($user == 'admin' && $pass == 'sgktyemlnn')
{
$_SESSION['admin'] = $user;
echo '<meta http-equiv=refresh content="0; URL=/panelvip">';
exit;
} else { 
echo '<meta http-equiv=refresh content="0; URL=/">';
die('<script>alert("Tính Làm Gì Vậy? Đéo Phải ADMIN Thì Cút Địt Mẹ Mày!"); </script>');
exit;
}
}
?>
<div class="content">
            <div class="container-fluid">

<div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Đăng Nhập Bằng Tài Khoản</h4>
                                <p class="category">Hệ Thống Đăng Nhập Không CheckPoint 100%</p>
                            </div>
							

<div class="content">
  
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
<button type="submit" class="btn btn-info">Đăng Nhập</button></form></div></div>


</div></div>
</div>
            </div>
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
*/ 
include 'system/foot.php';
?>	  