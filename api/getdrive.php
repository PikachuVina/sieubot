<?php
include '../system/head.php';
include "drive.php";

function getlink($id)
{
	$link = "https://drive.google.com/uc?export=download&id=$id";
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $link);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/google.mp3");
	curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/google.mp3");

	$page = curl_exec($ch);
	$chuyen =  locheader($page);
	if ($chuyen != ""){
		
	} else {
	$html = str_get_html($page);
	$link = urldecode(trim($html->find('a[id=uc-download-link]',0)->href));
	$tmp = explode("confirm=",$link);
	$tmp2 = explode("&",$tmp[1]);
	$confirm = $tmp2[0];
	$linkdowngoc = "https://drive.google.com/uc?export=download&id=$id&confirm=$confirm";
	curl_setopt ($ch, CURLOPT_URL, $linkdowngoc);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/google.mp3");
	curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/google.mp3");

	// Getting binary data
	$page = curl_exec($ch);
	$chuyen =  locheader($page);
		
}
curl_close($ch);
return $chuyen; 
}
function locheader($page)
{
	$temp = explode("\r\n", $page);
	foreach ($temp as $item) {
		$temp2 = explode(": ", $item);
		$infoheader[$temp2[0]] = $temp2[1];
	}
	$location = $infoheader['Location'];
	return $location;
}

if($_POST['submit'] != "")
{
	$url = $_POST['url'];
	$tmp = explode("file/d/",$url);
	$tmp2 = explode("/",$tmp[1]);
	$id = $tmp2[0];
	$linkdown = trim(getlink($id));
}




?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Get Link Drive Google</h4>
                                <p class="category">Hệ Thống Lấy Link Download Trực Tiếp Google Drive</p>
                            </div>
							

<div class="content"><div class="panel-group">

<form action="" method="POST">
<div class="form-group">
  <label for="usr">Nhập Link:</label>
  <input value="https://drive.google.com/file/d/0BxG6kVC7OXgrYW1DVVVuZTZndmM/view?usp=sharing" type="text" required="" class="form-control" name="url">
</div>
<button type="submit" value="GET" name="submit" class="btn btn-danger">Get Link</button>
</form>

<?php echo '</br><div class="form-group"><label for="usr">Copy Link Dán Vào IDM Nhé:</label><input value="'.$linkdown.'" type="text" class="form-control" name="lik"></div>';?>
</div></div>
</div>
</div></div>
</div></div>
<?php include '../system/foot.php'; ?>