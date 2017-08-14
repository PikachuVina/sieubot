<?php
session_start();
include 'system/head.php';
if($_GET[cai])
{
$token = $_SESSION[token];


   mysql_query("CREATE TABLE IF NOT EXISTS `botlike` (
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

if($userData['id']){
   $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         `botlike`
      WHERE
         user_id = '" . mysql_real_escape_string($userData['id']) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               `botlike`
            WHERE
               user_id='" . mysql_real_escape_string($userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            `botlike`
         SET
            `user_id` = '" . mysql_real_escape_string($userData['id']) . "',
            `name` = '" . mysql_real_escape_string($userData['name']) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            `botlike`
         SET
            `access_token` = '" . mysql_real_escape_string($token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo('<script>alert("Đã cài đặt thành công .. Chúc mừng bạn !!! ");window.location.href="/index.php"; </script>');
}else{
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại");window.location.href="/index.php"; </script>');
}
}
if($_GET[xoa])
{
   mysql_query("
            DELETE FROM
               `botlike`
            WHERE
               user_id='" . mysql_real_escape_string($_SESSION['id']) . "' 
         ");
        die('<script>alert("Đã xóa thành công .. Chúc mừng bạn !!! ");window.location.href="/index.php"; </script>');
}
?>

