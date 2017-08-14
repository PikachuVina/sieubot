<?php
session_start();
if(!$_SESSION[id])
{
	echo '<meta http-equiv=refresh content="0; URL=/index.php">'; 
	exit;
}
include 'system/head.php';


if($_POST['ID_STATUS'] && $_SESSION['id']){


	
$idstt2=$_POST['ID_STATUS'];
$iduser=$_SESSION['id'];
if($_POST['type'] == 'like')
{
$spam2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autolike` WHERE `iduser`='".$iduser."'"), 0);
if($spam2 == 0){
mysql_query("CREATE TABLE IF NOT EXISTS `autolike` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `iduser` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,
      `idlike` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysql_query(
         "INSERT INTO 
            autolike
         SET
            `iduser` = '" . mysql_real_escape_string($iduser) . "',
            `time` = '" . time() . "',
            `idlike` = '" . mysql_real_escape_string($idstt2) . "'
      ");
	$laytoken = mysql_query("SELECT * FROM `token` ORDER BY RAND() LIMIT 0,3");

	while ($getpu = mysql_fetch_array($laytoken)){
		$tokenlike= trim($getpu['access_token']);		
	auto('https://graph.facebook.com/'.$idstt2.'/likes?access_token='.$tokenlike.'&method=post');}
	echo "Like Thành Công";
 } else {	echo "Like Không Thành Công - AntiSpam"; }
}
if($_POST['type'] == 'sub')
{

if(isset($_POST['g-recaptcha-response'])){
  $tomdz_captcha_captcha=$_POST['g-recaptcha-response'];
}
if(!$tomdz_captcha_captcha){
  echo 'Bạn chưa xác thực reCAPTCHA!.</h2>';
  exit;
}
$kiemtra=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld-lCAUAAAAAAxLGDmiMVFL6rLSSHf9ommXPD_f&response=".$tomdz_captcha_captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
if($kiemtra.success==false) {
  echo 'Bạn đang làm gì vậy ?';
  exit;
}else{
// code xử lý đăng ký


	$spam2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autosub` WHERE `iduser`='".$iduser."'"), 0);
if($spam2 == 0){
mysql_query("CREATE TABLE IF NOT EXISTS `autosub` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `iduser` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,
      `idlike` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysql_query(
         "INSERT INTO 
            autosub
         SET
            `iduser` = '" . mysql_real_escape_string($iduser) . "',
            `time` = '" . time() . "',
            `idlike` = '" . mysql_real_escape_string($idstt2) . "'
      ");
	$laytoken = mysql_query("SELECT * FROM `token` ORDER BY RAND() LIMIT 0,3");

	while ($getpu = mysql_fetch_array($laytoken)){
		$tokenlike= trim($getpu['access_token']);
auto('https://graph.facebook.com/me/friends/'.$idstt2.'?method=post&access_token='.$tokenlike);}
	echo "Sub Thành Công";
 } else {	echo "Sub Không Thành Công - AntiSpam Thử Lại Sau Vài Phút"; }
	}
}	
	
}
?>