<?php
include '../system/head.php';
/* if(!isset($_POST['token']) && !isset($_SESSION['token'])){
$_SESSION['token'] = md5(uniqid(rand(), true));
}
*/
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Get Link Onbox.Vn</h4>
                                <p class="category">Hệ Thống Get Link Max Băng Thông Onbox</p>
                            </div>
							

<div class="content"><div class="panel-group">

<form method="POST">
<div class="form-group">
  <label for="usr">Chú ý nếu bạn Get nhiều link cùng một lúc thì hãy sắp xếp chúng đúng theo thứ tự. Và mỗi link cách nhau bới dấu ",":</label>
  <input placeholder="http://onbox.vn/nhan-dien-nhung-co-nang-co-nguy-co-fa-ca-doi-v966418.html,http://onbox.vn/365-ngay-hanh-phuc-chia-tay-vi-muon-nhuong-ban-trai-cho-em-ho-v967065.html" type="text" required="" class="form-control" name="video">
</div>
<button type="submit" name="submit" class="btn btn-danger">Get Link ^^</button> <a href="http://onbox.vn" target="_blank" class="btn btn-danger">Trang Chủ Onbox.Vn</a>
</form>




<?php
function onbox($url)
{
$ch = @curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$head[] = "Connection: keep-alive";
$head[] = "Keep-Alive: 300";
$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$head[] = "Accept-Language: en-us,en;q=0.5";
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Expect:'
));
$page = curl_exec($ch);
curl_close($ch);
return $page;
}

if(isset($_POST)){ 
$urls = explode(",",$_POST['video']); 
$count = count($urls); 
if($urls['0'] == NULL){$count = 0;} 
if($count != 0 ){ 
foreach($urls as $url){ 
$string= onbox(trim($url)); 
preg_match("#<iframe.*src='(.*)'.*>#imsU", $string, $onbox); 
$string2 = onbox($onbox[1]); 
preg_match("#file: '(.*)'#imsU", $string2, $link_video); 
$link_video = str_replace("8080", "8181", $link_video); 
$link_video = str_replace("203.190.170.158", "203.190.170.44", $link_video); 
$link_video = str_replace("203.190.170.159", "203.190.170.45", $link_video); 
echo '<video width="320" height="240" controls>
  <source src="'.$link_video[1].'" type="video/mp4">
  Your browser does not support the video tag.
</video><p>Nếu không xem được video <a style="color:#ff8a00;font-weight:bold;" href="'.$link_video[1].'" target="_blank" id="LinkSourceVideo">click vào đây</a>!</p>';
}
}
}

?>
</div></div>
</div>
</div></div>
</div></div>
<?php include '../system/foot.php'; ?>