<?php
session_start();
include 'system/head.php';

if(!$_SESSION[id]){
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Bạn Chưa Đăng Nhập Hệ Thống Like.BigMMO.Com"); </script>');
exit;
} 

if($_GET[xoa])
{
   mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botex`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "' 
         ");
echo '<meta http-equiv=refresh content="0; URL=/botex.php">';
}
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
<?php
$dem = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "select count(*) from `botex` where `user_id`='".$_SESSION['id']."' "), 0);
if($dem == 0) {
    echo '<div class="alert alert-warning"><center><font color="red"> Hệ Thống:</font> Bạn Chưa Cài BotEx Trên Hệ Thống Like.BigMMO.Com</center></div>';
} else {    
    echo '<div class="alert alert-success"><center><font color="red"> Hệ Thống:</font> Bạn Đã Cài BotEx Trên Hệ Thống Like.BigMMO.Com</center></div>';
}
?>




                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Thiết Lập BOTEX</h4>
                            </div>
      <div class="panel-body">
<form action ="" method="POST">
<div class="form-group">
     <div class="list1"><select name="likecmt" class="form-control">
                 <option value="1">Like Bình Luận</option>
                 <option value="0">Không Like Bình Luận</option>
     </select>
</div><br />
<label>Cài Đặt Cho ID:</label>
<input type="text" class="form-control" name="idfb"><br />
<input type="submit" value="Cài BOT EX" class="btn btn-danger"></input>

</form>
</div></div></div>


                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Thông Tin Tài Khoản</h4>
                            </div>
      <div class="panel-body">
      <div class="form-group">
      <p><li class="list-group-item">ID: <?php echo $_SESSION[id]; ?></li></p>
      <p><li class="list-group-item">Username: <?php echo $_SESSION[name]; ?></li></p>
      <p><li class="list-group-item">Tổng <?php echo '' . mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT COUNT(*) FROM `token`"),  0) . ''; ?> Người trên Hệ Thống</li></p>
      <a href="dangxuat.php"><button type="button" class="btn btn-danger">Đăng Xuất</button></a>
      </div></div>
</div>

</div></div>
</div>


<?php
if($_POST[idfb] && $_SESSION[id])
{
$token = $_SESSION[token];
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botex` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,      
      `name` varchar(32) NOT NULL,
      `idfb` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   
   
$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$com = "https://graph.facebook.com/me?fields=id,name&access_token=".$token;
$ren = file_get_contents($com);

if($userData['id']){
   $row = null;
   $result = mysqli_query($GLOBALS["___BMN_2312"], "
      SELECT
         *
      FROM
         `botex`
      WHERE
         user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "'
   ");
   if($result){
      $row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botex`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            `botex`
         SET
            `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "',
            `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['name']) . "',
            `idfb` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['idfb']) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
      ");
   } else {
      mysqli_query($GLOBALS["___BMN_2312"], 
         "UPDATE 
            `botex`
         SET
            `idfb` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['idfb']) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo('<script>alert("Đã cài đặt thành công BotEX ... Chúc mừng bạn !!! "); </script>');
echo '<meta http-equiv=refresh content="0; URL=/botex.php">';
}else{
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại"); </script>');
echo '<meta http-equiv=refresh content="0; URL=/bot.php">';
}
}
include 'system/foot.php';
?> 