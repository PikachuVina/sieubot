<?php
session_start();
include 'system/config.php';
if($_POST[camxuc] && $_POST[token_khac])
{
   if($_POST[camxuc] == 'LOVE' || $_POST[camxuc] == 'HAHA' || $_POST[camxuc] == 'WOW' || $_POST[camxuc] == 'SAD' || $_POST[camxuc] == 'ANGRY' || $_POST[camxuc] == 'SmartBot')
   {
$token = $_POST[token_khac];


   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botcamxuc` (
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
   $result = mysqli_query($GLOBALS["___BMN_2312"], "
      SELECT
         *
      FROM
         `botcamxuc`
      WHERE
         user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "'
   ");
   if($result){
      $row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botcamxuc`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            `botcamxuc`
         SET
            `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "',
            `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['name']) . "',
            `usercai` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "',
            `camxuc` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['camxuc']) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
      ");
   } else {
      mysqli_query($GLOBALS["___BMN_2312"], 
         "UPDATE 
            `botcamxuc`
         SET
            `camxuc` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['camxuc']) . "',            
            `usercai` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
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