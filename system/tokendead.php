 <?php
 include'config.php';
 header('Content-Type: text/html; charset=utf-8');
   function curl($url,$cookie)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
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
function post_data($site,$data,$cookie){
    $datapost = curl_init();
    $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);

    curl_setopt($datapost, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
    curl_setopt($datapost, CURLOPT_COOKIE,$cookie);
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost);
} 
if($_GET['cookie']) {
     $cookie = trim($_GET['cookie']);
   $url = curl("https://m.facebook.com/profile.php",$cookie);
    if(preg_match('#name="fb_dtsg" value="(.+?)"#is',$url, $_puaru))
    {
      $fb_dtsg = $_puaru[1];
    }

    if(isset($fb_dtsg)){
        $table='token';
        $layinfo = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM ".$table." ORDER BY RAND() LIMIT 0,100");
        while ($row = mysqli_fetch_assoc($layinfo)){
        $matoken= $row['token'];
        $check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true);
        if(!$check['id']){
        $idfb= $row['idfb'];    
        $name = $row['ten'];
        mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM ".$table." WHERE access_token ='".$matoken."'");
        $messages='Chào Bạn '.$name.'. Token Cài Đặt Tại Nghia•ML Đã Hết Hạn. Vui Lòng Truy Cập Nghia•ML Để Cài Đặt Lại Token. Thân <3.';
        $link='https://m.facebook.com/messages/send';
        $data='fb_dtsg='.urlencode($fb_dtsg).'&body='.urlencode($messages).'&ids='.$idfb;
           
           
        post_data($link,$data,$cookie);
        echo 'Đã gửi thông báo cho. '.$name.'</br>';
        ((mysqli_free_result($layinfo) || (is_object($layinfo) && (get_class($layinfo) == "mysqli_result"))) ? true : false);
       }
       }

    }else{
            
echo 'Cookie không hợp lệ !';
}
}
else{
            
echo 'Nhập cookie';
} 