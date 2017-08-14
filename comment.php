<?php
session_start();
include 'system/head.php';
if($_GET[xoa])
{
   mysql_query("
            DELETE FROM
               `botcomment`
            WHERE
               user_id='" . mysql_real_escape_string($_SESSION['id']) . "' 
         ");
header('location: index.php');
}
if($_POST[comment] && $_SESSION[id])
{
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
            `noidung` = '" . mysql_real_escape_string($_POST[comment]) . "',
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

?>

