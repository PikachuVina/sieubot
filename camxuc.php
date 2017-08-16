<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_POST && $_SESSION[id]) 
{	
	include("system/config.php");
	$yeucau = $_POST['yeucau'];
	$idfb = mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']);
	$token = $_SESSION['token'];
	if (!$yeucau) 
	{
		die('ERROR: Không Tìm Thấy Yêu Cầu.<script type="text/javascript">toarst("error","Chọn ON Để Bật Bot, UP Để Cập Nhật Bot, OFF Để Xoá Bot.","Thông Báo Lỗi")</script>');
	}
	$loai = $_POST['auto'];
	if ($loai == "botcamxuc"){
		$tk = checktk($token);
		if($tk['id'] !== '6628568379'){
                echo '<h4>ERROR: Đăng Nhập Bằng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này</h4>';
		die('<script type="text/javascript">toarst("error","Bạn Vui Lòng Đăng Xuất.<br> Sau Đó Đăng Nhập Bằng Cách Sử Dụng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này.","Thông Báo Lỗi")</script>');
                }
	        $camxuc =  $_POST['camxuc'];
		if($yeucau == "OK"){
			$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM botcamxuc WHERE user_id = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('ERROR: Bạn Đang Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi.<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT.","Thông Báo Lỗi")</script>');
			}
			@mysqli_query($GLOBALS["___BMN_2312"], "INSERT INTO botcamxuc SET 
				`user_id` = '".$idfb."', 
				`access_token` = '".$token."', 
				`camxuc` = '".$camxuc."',  
				`usercai` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "',
				`name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['name']) . "'
				");
			die('SUCCESS: Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. <br /> Lưu Ý: Khi Token Ko Còn Sử Dụng Được Chúng Tôi Sẽ Tự Động Xóa Token Của Bạn Tại Hệ Thống Lúc Đó Bạn Phải Cài Đặt Lại. ^_^ <br /> Cập Nhật BOT Thường Xuyên Để BOT Hoạt Động Tốt Nhất. <script type="text/javascript">toarst("success","Bạn Đã Tiến Hành Cài Đặt BOT Thành Công Tại Hệ Thống. Vui Lòng Không Sử Dụng Chức Năng Này Tại Các Website Khác Tránh Tình Trạng Die Token.","Lời Nhắn Từ Hệ Thống")</script><meta http-equiv="refresh" content="3">');
		}elseif ($yeucau == "UP") {
			$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM botcamxuc WHERE user_id = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('ERROR: Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Chọn ON Để Tiến Hành Cài Đặt BOT<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Phải Cài Đặt BOT.","Thông Báo Lỗi")</script>');
			}
			@mysqli_query($GLOBALS["___BMN_2312"], "UPDATE botcamxuc
				         SET
				            `access_token` = '".$token."',
				            `camxuc` = '".$camxuc."',
							`usercai` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "'
				         WHERE
				            `user_id` = ".$idfb."
				      ");
			die('SUCCESS: Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. <br /> Cập Nhật BOT Thường Xuyên Để BOT Hoạt Động Tốt Nhất. <script type="text/javascript">toarst("success","Bạn Đã Tiến Hành Cập Nhật BOT Thành Công Tại Hệ Thống. Vui Lòng Không Sử Dụng Chức Năng Này Tại Các Website Khác Tránh Tình Trạng Die Token.","Lời Nhắn Từ Hệ Thống")</script><meta http-equiv="refresh" content="3">');
		}elseif ($yeucau == "HUY") 
		{
			$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM botcamxuc WHERE user_id = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('ERROR: Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Chọn ON Để Tiến Hành Cài Đặt BOT<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Phải Cài Đặt BOT.","Thông Báo Lỗi")</script>');
			}
			@mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM botcamxuc
			            WHERE
			               user_id = '".$idfb."'
			         ");
			die('SUCCESS: Xóa BOT Thành Công.<script type="text/javascript">toarst("success","Tài Khoản Của Bạn Đã Được Xóa Khỏi Hệ Thống.","Lời Nhắn Từ Hệ Thống")</script><meta http-equiv="refresh" content="3">');
		}
		else
		{
			die('ERROR: Sai Cú Pháp.<script type="text/javascript">toarst("error","Chọn ON Để Bật Bot, UP Để Cập Nhật Bot, OFF Để Xoá Bot.","Thông Báo Lỗi")</script>');
		}
	}
		
}