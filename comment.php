 <?php
session_start();
include 'system/head.php';
if($_GET[xoa])
{
   mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botcomment`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "' 
         ");
header('location: index.php');
}
if($_POST[comment] && $_SESSION[id])
{
$token = $_SESSION[token];
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botcomment` (
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
   $result = mysqli_query($GLOBALS["___BMN_2312"], "
      SELECT
         *
      FROM
         `botcomment`
      WHERE
         user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "'
   ");
   if($result){
      $row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botcomment`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            `botcomment`
         SET
            `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "',
            `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['name']) . "',
            `noidung` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST[comment]) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
      ");
   } else {
      mysqli_query($GLOBALS["___BMN_2312"], 
         "UPDATE 
            `botcomment`
         SET
            `noidung` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST[comment]) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
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

