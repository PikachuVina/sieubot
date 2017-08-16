<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_POST && $_SESSION[id]) 
{	
	include("system/config.php");
	$yeucau = isset($_POST['yeucau']) ? baove($_POST['yeucau']) : FALSE;
	$idfb = mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']);
	$token = $_SESSION['token'];
	if (!$yeucau) 
	{
		echo('ERROR: Không Tìm Thấy Yêu Cầu.');
	}
	$loai = $_POST['auto'];
	if ($loai == "botcamxuc"){
		$tk = checktk($token);
		if($tk['id'] !== '6628568379'){
                echo '<h4>ERROR: Đăng Nhập Bằng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này</h4>';
                }
	        $camxuc =  isset($_POST['camxuc']) ? baove($_POST['camxuc']) : FALSE;
		if($yeucau == "OK"){
			$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM botcamxuc WHERE user_id = $idfb");
			if (mysqli_num_rows($res) > 0) {
				echo('ERROR: Bạn Đang Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi.');
			}
			@mysqli_query($GLOBALS["___BMN_2312"], "INSERT INTO botcamxuc SET 
				`user_id` = '".$idfb."', 
				`access_token` = '".$token."', 
				`camxuc` = '".$camxuc."',  
				`usercai` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "',
				`name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['name']) . "'
				");
			echo('SUCCESS: Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.<meta http-equiv="refresh" content="3">');
		}elseif ($yeucau == "UP") {
			$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM botcamxuc WHERE user_id = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				echo('ERROR: Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Chọn ON Để Tiến Hành Cài Đặt BOT');
			}
			@mysqli_query($GLOBALS["___BMN_2312"], "UPDATE botcamxuc
				         SET
				            `access_token` = '".$token."',
				            `camxuc` = '".$camxuc."',
							`usercai` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "'
				         WHERE
				            `user_id` = ".$idfb."
				      ");
			echo('SUCCESS: Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.<meta http-equiv="refresh" content="3">');
		}elseif ($yeucau == "HUY") 
		{
			$res = @mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM botcamxuc WHERE user_id = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('ERROR: Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Chọn ON Để Tiến Hành Cài Đặt BOT');
			}
			@mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM botcamxuc
			            WHERE
			               user_id = '".$idfb."'
			         ");
			echo('SUCCESS: Xóa BOT Thành Công.<meta http-equiv="refresh" content="3">');
		}
		else
		{
			echo('ERROR: Sai Cú Pháp.');
		}
	}
		
}