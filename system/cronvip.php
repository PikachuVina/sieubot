<?php
include 'config.php';
date_default_timezone_set("Asia/Ho_Chi_Minh"); 
$gio_rs= date('H');
if($gio_rs == 0) { 
mysql_query("DELETE FROM `log_gioihan`");	//Xóa Log Giới Hạn Post Khi Đến 12h Đêm
}
$vip = mysql_query("SELECT * FROM idvip ORDER BY RAND() LIMIT 0,5");
if($vip){
while($vipi = mysql_fetch_array($vip))
  {  	
	$idvip = $vipi['id_user'];
	$limitlike = $vipi['limitlike']  + $vipi['liketrungbinh'];
	$limitpost = $vipi['limitpost'];	
	$camxuc = $vipi['camxuc'];
	$checkgioihanstt = mysql_result(mysql_query("SELECT COUNT(*) FROM `log_gioihan` WHERE `id_user` ='" . $idvip. "'"), 0);
	if($checkgioihanstt <= $limitpost)
  {
$result = mysql_query("SELECT * FROM token ORDER BY RAND() LIMIT 0,500");
if($result){
while($row = mysql_fetch_array($result))
  {
$access_token = $row[access_token];
$name_token = $row[name]; 
//**LIKE**//
$puaru = auto('https://graph.facebook.com/'.$idvip.'/feed?fields=id&access_token='.$access_token.'&limit=1');
//$puaru = auto('https://graph.facebook.com/'.$idvip.'/feed?limit=1&access_token='.$access_token.'');
$arraypuaru = json_decode($puaru, true);
$puaruid = $arraypuaru[data][0][id];
$likepost = $arraypuaru[data][0][likes][count];
$ghi_log = mysql_result(mysql_query("SELECT COUNT(*) FROM `log_gioihan` WHERE `id_stt` ='" . $puaruid . "'"), 0);	
if($ghi_log == 0){	
mysql_query("INSERT INTO log_gioihan SET `id_user` = '" . $idvip . "',`id_stt` = '" . $puaruid . "'");
}
if($likepost <= $limitlike){
if (empty($camxuc)){
echo auto('https://graph.facebook.com/'.$puaruid.'/likes?access_token='.$access_token.'&method=post');
//echo auto('https://graph.facebook.com/'.$puaruid.'/likes?method=post&access_token='.$access_token);
echo '<br/>Đang Chạy Like - TOMDZ!';
} else {
//echo auto('https://graph.facebook.com/'.$puaruid.'/reactions?type='.$camxuc.'&method=post&access_token='.$access_token);
echo auto('https://graph.facebook.com/'.$puaruid.'/reactions?type='.$camxuc.'&access_token='.$access_token.'&method=post');
echo '<br/>Đang Thả Cảm Xúc - TOMDZ!';
}
}
//**ENDLIKE**//
}
//////==//**REACTIONS**//==///////
// BOT CRON by Hoàng Minh Thuận //
////////==//**END**//==///////////
}}
}
}

?>