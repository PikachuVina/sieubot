<?php
session_start();
include 'system/head.php';
if($_GET['cai'])
{
$token = $_SESSION['token'];
$userData = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$com = "https://graph.facebook.com/me?fields=id,name&access_token=".$token;
$ren = file_get_contents($com);

if($userData['id']){
   $row = null;
   $result = mysqli_query($GLOBALS["___BMN_2312"], "
      SELECT
         *
      FROM
         `botlike`
      WHERE
         user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "'
   ");
   if($result){
      $row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botlike`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            `botlike`
         SET
            `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['id']) . "',
            `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $userData['name']) . "',
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
      ");
   } else {
      mysqli_query($GLOBALS["___BMN_2312"], 
         "UPDATE 
            `botlike`
         SET
            `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo('<script>alert("Đã cài đặt thành công .. Chúc mừng bạn !!! ");window.location.href="/index.php"; </script>');
}else{
die('<script>alert("Token đã hết hạn sử dụng ... Vui lòng nhập lại");window.location.href="/index.php"; </script>');
}
}
if($_GET['xoa'])
{
   mysqli_query($GLOBALS["___BMN_2312"], "
            DELETE FROM
               `botlike`
            WHERE
               user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_SESSION['id']) . "' 
         ");
        die('<script>alert("Đã xóa thành công .. Chúc mừng bạn !!! ");window.location.href="/index.php"; </script>');
}
?> 