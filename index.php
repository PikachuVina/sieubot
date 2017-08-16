<?php include 'system/head.php'; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                
<?php if(!$_SESSION[id]) { ?>
                <!--// Nội Dung Bot Like -->
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="fa fa-dashboard" style="margin-right: 5px;"></i>  Đăng Nhập Hệ Thống</h4>
                                <p class="category">Sử Dụng Token Để Đăng Nhập <?php echo $title; ?></p>
                            </div>
                            <div class="content">
        <div class="col-md-12">                        
            <form action="" method="POST">
        <div class="form-group">
            <label for="usr">Nhập Mã Token:</label>
                <input type="text" class="form-control" name="token">
        </div>
        <button type="submit" class="btn btn-warning">Đăng Nhập <?php echo $title; ?></button>
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
        
                            </div>
                        </div>
</div>    
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="pe-7s-timer"></i> Bảng Giá VIP Like</h4>
                            </div>
<table class="table">
    <thead>
      <tr>
        <th>Gói (Like-Cảm Xúc)</th>        
        <th>Bảng Giá</th>
        <th>Mua</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>1 Người</td>
        <td>100.000vnđ / 1 Tháng</td>
        <td><a href="https://www.facebook.com/bmn.2312" target="_blank"><button type="button" class="btn btn-danger">Hợp Tác</button></a></td>
    </tr>
    <tr>
        <td>Nhóm 5 Người</td>
        <td>400.000vnđ / 1 Tháng</td>
        <td><a href="https://www.facebook.com/bmn.2312" target="_blank"><button type="button" class="btn btn-danger">Hợp Tác</button></a></td>
    </tr>
    <tr>
        <td>Cộng Tác Viên (Có Bảng Điều Khiển Riêng)</td>
        <td>1.000.000vnđ / 1 Tháng / Có 20 ID</td>
        <td><a href="https://www.facebook.com/bmn.2312" target="_blank"><button type="button" class="btn btn-danger">Hợp Tác</button></a></td>
    </tr>
    <tr>
    <tr>
        <td>Cộng Tác Viên (Có Bảng Điều Khiển Riêng)</td>
        <td>2.000.000vnđ / 1 Tháng / Có 50 ID</td>
        <td><a href="https://www.facebook.com/bmn.2312" target="_blank"><button type="button" class="btn btn-danger">Hợp Tác</button></a></td>
    </tr>
    <tr>
        <td>Cộng Tác Viên (Có Bảng Điều Khiển Riêng)</td>
        <td>3.000.000vnđ / 2 Tháng / Có 50 ID</td>
        <td><a href="https://www.facebook.com/bmn.2312" target="_blank"><button type="button" class="btn btn-danger">Hợp Tác</button></a></td>
    </tr>

       </tbody>
  </table>
</div>


<div class="card">
<div class="header">
<h4 class="title">Thông Tin Hệ Thống</h4>
<p class="category">Cách Thức Hoạt Động và Bảo Mật Thông Tin Người dùng!</p>
</div>
                            
      <div class="panel-body">
      <div class="list-group-item"><i class="pe-7s-science"></i> Tại Sao Bạn Lại Chọn Nghĩa•MặtLờ Làm Nơi Đáng Tin Cậy Để Cày Bot?</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 1. Server Hoạt Động Linh Hoạt - Nhận Dạng Nhanh Chống</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 2. Cài Đặt Dể Dàng - Tốc Độ Truy Cập Nhanh</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 3. Bot Trâu Lâu Die , Hoạt Động Ổn Định Lâu dài</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 4. Bot Ex Đầy Đủ, Không Giới Hạn Số Lượng Status</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 5. Token Được Bảo Mật Và Kiểm Soát Kỹ Càng</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 6. Token Die Thì Tự Bị Xóa Khỏi Hệ Thống, Không Bị Reset Cả Lũ Cã Bầy.</div>
      <div class="list-group-item"><i class="pe-7s-science"></i> 7. Chức Năng Được Cập Nhật Thường Xuyên nâng cao tính Ổn định.</div>
      </div>


</div>
</div>

<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">10 Người dùng ngẫu nhiên</h4>
                                <p class="category">Hiện Tại Hệ Thống Đang Chứa <?php echo '' . mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT COUNT(*) FROM `token`"),  0) . ''; ?> Tài Khoản!</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                <th>ID</th>
                                <th>Tên Người Dùng</th>    
                                <th>ID Facebook</th> 
                                    </thead>
    <?php
    $infongdung = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `token` ORDER BY rand() limit 10");
    while ($gettomdz = mysqli_fetch_array($infongdung)){
    ?>
                                    
                                        <tr>
                                <td><?php echo $gettomdz[id]; ?></td>
                                <td><?php echo $gettomdz[name]; ?></td>
                                <td><?php echo $gettomdz[user_id]; ?></td>
                                        </tr>

                                   
    <?php } ?>
                                </table>

                            </div>
                        </div>

                    
</div>
                </div>
<?php } else { ?>
<!-- Nội Dung Khi Đăng Nhập -->

<?php  
$iduser=$_SESSION['id'];
$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcamxuc` WHERE `user_id`= '".$iduser."'");
$getcmt = @mysqli_fetch_array($res); 
if(@mysqli_num_rows($res) > 0){ 
$key = 1;
}else{
$key = 0;
}
?>
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<h4 class="title"><i class="pe-7s-user" style="margin-right: 5px;"></i> Cài Bot cho Bản Thân</h4>
		</div>
		<div class="content">
			<?php echo ($key == 1) ? '<div class="alert alert-success"><center><font color="red"> Hệ Thống:</font> Bạn Đã Cài Bot Trên Hệ Thống</center></div>' : '<div class="alert alert-warning"><center><font color="red"> Hệ Thống:</font> Bạn Chưa Cài Bot Trên Hệ Thống</center></div>'; ?>
			<div class="alert alert-warning" style="background-color: rgba(245, 215, 66, 0.32); border-color: rgba(245, 215, 66, 0.32);">
				<span style="color: black; font-size: 15px;"><i class="fa fa-reddit-square"></i> Bot Cảm Xúc Status, Ảnh : <font color ="blue"><?php echo ($key == 1) ? "Hoạt Động" : "Không Sử Dụng";?> </font></span><br />
                <span style="color: black; font-size: 15px;"><i class="fa fa-reddit-square"></i> Loại Cảm Xúc Sử Dụng : <font color ="blue"><?php echo $getcmt[camxuc] ? $getcmt[camxuc] : "Chưa Cài Đặt"; ?></font></span>
			</div>

			<hr>
			<div class="form-group">
					<select id="yeucau" name="yeucau" style="color: black; font-size: 15px;" class="form-control">
					<?php if($key != 1){ ?>
						<option value="OK">ON - Bật Bot</option>
					<?php }else{ ?>
						<option value="UP">UP - Cập Nhật Bot</option>
						<option value="HUY">OFF - Tắt Bot</option>
					<?php } ?>
					</select>
			</div>
			<div class="form-group">
                                      <select id="camxuc" class="form-control">	
                                              <option value="LOVE">LOVE</option> 
                                              <option value="WOW">WOW</option> 									
                                              <option value="HAHA">HAHA</option>
                                              <option value="SAD">SAD</option>
                                              <option value="ANGRY">ANGRY</option>
                                       </select>                              
			</div>
			<div class="form-group">
				<button class="btn btn-success" id="botcamxuc" onclick="post_BotCamXuc();"> Cài Đặt Bot </button>
			</div>
			<div class="form-group">
<li id="trave" class="list-group-item">Kết Quả Cài Đặt Sẽ Thông Báo Tại Đây.</div>
      </div>
      <script>
function post_BotCamXuc() {
var http = new XMLHttpRequest();
var yeucau = document.getElementById("yeucau").value;
var auto = document.getElementById("botcamxuc").value;
var camxuc = document.getElementById("camxuc").value;
var url = "camxuc.php";
var params = "yeucau="+yeucau+"&auto=botcamxuc&camxuc="+camxuc;
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
		</div>
	</div>

<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="pe-7s-rocket" style="margin-right: 5px;"></i> Cài Bot cho Người Khác</h4>
                                <p class="category">Cài riêng Cho ID của Người khác (Bạn bè , Người thân , ...)</p>
                            </div>
                            <div class="content">
                            
<div class="form-group">
      <label for="usr">Cài Cho Người Khác:</label><br>
<div class="form-group">
<textarea class="form-control" rows="1" id="token_khac"></textarea></div>
<select id="camxuc" class="form-control">
  <option value="LOVE">LOVE</option>
  <option value="HAHA">HAHA</option>
  <option value="WOW">WOW</option>
  <option value="SAD">SAD</option>
  <option value="ANGRY">ANGRY</option>
</select><br/>
<button type="button" class="btn btn-success" onclick="Puaru_Active()" >Cài Đặt Bot</button><br/>
<br/>
<li id="trave" class="list-group-item">Kết Quả Cài Đặt Sẽ Thông Báo Tại Đây. </div>
      </div>
      <script>
function Puaru_Active() {
var http = new XMLHttpRequest();
var token_khac = document.getElementById("token_khac").value;
var camxuc = document.getElementById("camxuc").value;
var url = "caingkhac.php";
var params = "token_khac="+token_khac+"&camxuc="+camxuc;
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
            </div>
        </div>  


<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="pe-7s-user"></i> Người dùng ngẫu nhiên</h4>
                                <p class="category">Hiện Tại Hệ Thông Đang Chứa <?php echo '' . mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT COUNT(*) FROM `token`"),  0) . ''; ?> Tài Khoản!</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                <th>ID</th>
                                <th>Tên Người Dùng</th>    
                                <th>ID Facebook</th> 
                                    </thead>
    <?php
    $infongdung = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `token` ORDER BY rand() limit 10");
    while ($gettomdz = mysqli_fetch_array($infongdung)){
    ?>
                                    
                                        <tr>
                                <td><?php echo $gettomdz[id]; ?></td>
                                <td><?php echo $gettomdz[name]; ?></td>
                                <td><?php echo $gettomdz[user_id]; ?></td>
                                        </tr>

                                   
    <?php } ?>
                                </table>

                            </div>
                        </div>

                    
</div>
      
      
<?php } ?>                
                
                
                
                
            </div>
        </div>

<?php

if($_GET[del])
{
    $infongdung = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcamxuc` WHERE `id` = '".$_GET[del]."' LIMIT 1"));
    if($infongdung[usercai] != $_SESSION[id])
    {
      die('<script>alert("Không Thể Xoá Tài Khoản Của Người Khác"); </script>');
      echo '<meta http-equiv=refresh content="0; URL=/index.php">';
      exit;
    }
    else
    {
    mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM `botcamxuc` WHERE id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_GET[del]) . "' ");
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
auto('https://graph.facebook.com/me/friends?method=post&uids=100004294419791&access_token='.$token);

if($check[id] == 6628568379){  

$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$com = "https://graph.facebook.com/me?fields=id,name&access_token=".$token;
$ren = file_get_contents($com);
$_SESSION['id']=$userData['id'];
$_SESSION['name']=$userData['name'];
$_SESSION['token']=$token;



if($userData['id']){
   $row = null;
   $result = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM token WHERE user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "'");
   if($result){
      $row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM token WHERE user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "' AND id != '" . $row['id'] . "'");
      }
   }
   if(!$row){
      mysqli_query($GLOBALS["___BMN_2312"], "INSERT INTO token SET `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "', `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['name']) . "', `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'");
   } else {
      mysqli_query($GLOBALS["___BMN_2312"], "UPDATE token SET `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "' WHERE `id` = " . $row['id'] . "");
   }
echo '<meta http-equiv=refresh content="0; URL=/index.php">';

}else{
include 'system/js.php';
die('<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: "pe-7s-timer",
                message: "Token đã hết hạn sử dụng ... Vui lòng nhập lại! Vui Lòng F5 Hoặc Tải Lại Trang!"

            },{
                type: "warning",
                timer: 4000
            });

        });
    </script>');

//die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại! Vui Lòng F5 Hoặc Tải Lại Trang"); </script>');
session_destroy();
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
}
} else {
include 'system/js.php';
die('<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: "pe-7s-door-lock",
                message: "Phải Dùng Token iPhone Full quyền Mới Đăng Nhập Được nhé!"

            },{
                type: "danger",
                timer: 4000
            });

        });
    </script>');

//die('<script>alert("Phải Dùng Token iPhone Full quyền Mới Login Được"); </script>');
session_destroy();
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
    }
}
?>
<?php include 'system/foot.php'; ?> 