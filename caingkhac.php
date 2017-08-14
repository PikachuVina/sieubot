<?php
session_start();
include 'system/config.php';
if($_POST[camxuc] && $_POST[token_khac])
{
   if($_POST[camxuc] == 'LOVE' || $_POST[camxuc] == 'HAHA' || $_POST[camxuc] == 'WOW' || $_POST[camxuc] == 'SAD' || $_POST[camxuc] == 'ANGRY' || $_POST[camxuc] == 'SmartBot')
   {
$token = $_POST[token_khac];


   mysql_query("CREATE TABLE IF NOT EXISTS `botcamxuc` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,    
      `usercai` varchar(32) NOT NULL,    
      `name` varchar(32) NOT NULL,
      `camxuc` varchar(32) NOT NULL,
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
         `botcamxuc`
      WHERE
         user_id = '" . mysql_real_escape_string($userData['id']) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               `botcamxuc`
            WHERE
               user_id='" . mysql_real_escape_string($userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            `botcamxuc`
         SET
            `user_id` = '" . mysql_real_escape_string($userData['id']) . "',
            `name` = '" . mysql_real_escape_string($userData['name']) . "',
            `usercai` = '" . mysql_real_escape_string($_SESSION['id']) . "',
            `camxuc` = '" . mysql_real_escape_string($_POST['camxuc']) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            `botcamxuc`
         SET
            `camxuc` = '" . mysql_real_escape_string($_POST['camxuc']) . "',            
            `usercai` = '" . mysql_real_escape_string($_SESSION['id']) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo "Đã cài đặt thành công ".$userData['name'];
}else{
echo "token die";
}
}
}

?>

