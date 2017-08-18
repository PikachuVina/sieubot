<?php
session_start();
include 'system/head.php';

if(!$_SESSION['id']){
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Bạn Chưa Đăng Nhập Hệ Thống"); </script>');
exit;
} 

?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">


<?php
$dem = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "select * from `botcomment` where `user_id`='".$_SESSION['id']."' "));
if($dem == 0) {
    echo '<div class="alert alert-warning"><center><font color="red"> Hệ Thống:</font> Bạn Chưa Cài Bot Trên Hệ Thống</center></div>';
} else {    
    echo '<div class="alert alert-success"><center><font color="red"> Hệ Thống:</font> Bạn Đã Cài Bot Trên Hệ Thống</center></div>';
    echo '<div class="alert alert"><center><a href="/TOMCMT.php?xoa=NghiaML"><button class="btn btn-danger">Hủy Cài BOT</button></a></center></div>';
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
if($_GET['xoa']){
mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM `botcomment` WHERE user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "' ");
echo '<meta http-equiv=refresh content="0; URL=/TOMCMT.php">';
}

if($_POST['comment'] && $_SESSION['id']){
$token = $_SESSION[token];
$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$com = "https://graph.facebook.com/me?fields=id,name&access_token=".$token;
$ren = file_get_contents($com);

if($userData['id']){
   $row = null;
   $result = mysqli_query($GLOBALS["___BMN_2312"], "
      SELECT
         *
      FROM
         `botcomment`
      WHERE
         user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "'
   ");
   if($result){
      $row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botcomment`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            `botcomment`
         SET
            `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "',
            `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['name']) . "',
            `noidung` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['comment']) . " - Thả thính tại Nghia•ML',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
      ");
   } else {
      mysqli_query($GLOBALS["___BMN_2312"], 
         "UPDATE 
            `botcomment`
         SET
            `noidung` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['comment']) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo('<script>alert("Đã cài đặt thành công .. Chúc mừng bạn !!! "); </script>');
echo '<meta http-equiv=refresh content="0; URL=/TOMCMT.php">';
}else{
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại"); </script>');
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
}
}




include 'system/foot.php';
?> 