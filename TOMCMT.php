<?php
session_start();
include 'system/head.php';

if(!$_SESSION[id]){
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Bạn Chưa Đăng Nhập Hệ Thống Like.BigMMO.Com"); </script>');
exit;
} 

?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">


<?php
$dem = mysql_result(mysql_query("select count(*) from `botcomment` where `user_id`='".$_SESSION['id']."' "),0);
if($dem == 0) {
	echo '<div class="alert alert-warning"><center><font color="red"> Hệ Thống:</font> Bạn Chưa Cài Bot Trên Hệ Thống Like.BigMMO.Com</center></div>';
} else {	
	echo '<div class="alert alert-success"><center><font color="red"> Hệ Thống:</font> Bạn Đã Cài Bot Trên Hệ Thống Like.BigMMO.Com</center></div>';
	echo '<div class="alert alert"><center><a href="/TOMCMT.php?xoa"><button class="btn btn-danger">Hủy Cài BOT</button></a></center></div>';
}
?>



                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Thông Tin Tài Khoản</h4>
                            </div>
      <div class="panel-body">
      <div class="form-group">
      <p><li class="list-group-item">ID: <?php echo $_SESSION[id]; ?></li></p>
      <p><li class="list-group-item">Username: <?php echo $_SESSION[name]; ?></li></p>
      <a href="dangxuat.php"><button type="button" class="btn btn-danger">Đăng Xuất</button></a>
	  </div></div>
</div>


                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Cài đặt BOT Auto Comment</h4>
                            </div>
						<div class="content">	
<form action ="" method="POST">
<label>Nội Dung Bot Comment:</label>
<textarea class="form-control" rows="5" name="comment"></textarea><br/>
<input type="submit" value="Cài BOT Comment" class="btn btn-danger"></input>
</form>



</div></div></div>
</div></div>

<?php
if($_GET[xoa]){
mysql_query("DELETE FROM `botcomment` WHERE user_id='" . mysql_real_escape_string($_SESSION['id']) . "' ");
echo '<meta http-equiv=refresh content="0; URL=/TOMCMT.php">';
}

if($_POST[comment] && $_SESSION[id]){
$token = $_SESSION[token];
   mysql_query("CREATE TABLE IF NOT EXISTS `botcomment` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,      
      `name` varchar(32) NOT NULL,
      `noidung` text NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   
   
$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$com = "https://graph.facebook.com/me?fields=id,name&access_token=".$token;
$ren = file_get_contents($com);

if($userData['id']){
   $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         `botcomment`
      WHERE
         user_id = '" . mysql_real_escape_string($userData['id']) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               `botcomment`
            WHERE
               user_id='" . mysql_real_escape_string($userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            `botcomment`
         SET
            `user_id` = '" . mysql_real_escape_string($userData['id']) . "',
            `name` = '" . mysql_real_escape_string($userData['name']) . "',
            `noidung` = '" . mysql_real_escape_string($_POST[comment]) . " - Thả thính tại Thathinh•Me',
            `access_token` = '" . mysql_real_escape_string($token) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            `botcomment`
         SET
            `noidung` = '" . mysql_real_escape_string($_POST[comment]) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo('<script>alert("Đã cài đặt thành công .. Chúc mừng bạn !!! "); </script>');
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
}else{
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại"); </script>');
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
}
}




include 'system/foot.php';
?>