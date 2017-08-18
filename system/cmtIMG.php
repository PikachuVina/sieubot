<meta charset="utf-8"/>
<?php
set_time_limit(0);
error_reporting(0);

$token = 'EAAAAAYsX7TsBAFCZB55l8kZCbxY9k8USzmxknFnD5kTuWiwdPWPVRIdZCmFyP3eKTmeqkjLBqgg1YOsHQxdaeeQ0lzZB8BM6dmrZCM79C3Gpg83DNpRoJiuiIVsYTmyVjDUUlfHnvYh3Hx1Qh0AgqDdBHbucUfNDwPIUGlWL6v9LqmFUJshihdMI2LGgpleq0MXI7VdzB4VjccoVRsZC37jcgfElsT8cQZD'; 
$idgroup = '670626069702684'; /* Id Group */
$post = json_decode(request('https://graph.facebook.com/v2.9/' .$idgroup. '/feed?fields=id,created_time,from&limit=1&access_token=' . $token), true); /* Get Data Post*/
$timelocpost = date('Y-m');
$hinhanh = 'http://i.imgur.com/W4oblhw.jpg';
$logpost= file_get_contents("logCMT.txt");
for ($i = 0; $i < 1000; $i++) {
    $idpost      = $post['data'][$i]['id'];
    $time        = $post['data'][$i]['created_time'];
	
    if (strpos($time, $timelocpost) !== false) {
		/* Check stt */
            if (strpos($logpost, $idpost) === FALSE) {
                $arraycmt = array(
				'­
Xin chào, ' . $post['data'][$i]['from']['name'] . '
Bạn có biết ???
Nghia•ML Bot thả thính tốc độ số 1 tại VN hiện nay đó :))
­',
				'­
Bạn gì đó ơi !!!
Bạn có biết ???
Website Nghia•ML bot thả thính hàng đầu VN đó :D
Không tin đúng không
thử vào biết liền à <3
­'
				);
				$random_cmt = array_rand($arraycmt);
			    $comment = $arraycmt[$random_cmt];
				request('https://graph.facebook.com/'. urlencode($idpost) .'/comments?attachment_url='. urlencode($hinhanh) .'&access_token='.$token.'&message='. urlencode($comment) .'&method=post');
                $luulog = fopen("logCMT.txt", "a");
                fwrite($luulog, $idpost . "\n");
                fclose($luulog);
            } else {
                echo 'Đã comment status này rồi';
            }
		/* END Check stt */
    }
}



function request($url)
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return FALSE;
    }
    
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HEADER => FALSE,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_ENCODING => '',
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.87 Safari/537.36',
        CURLOPT_AUTOREFERER => TRUE,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => 0
    );
    
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response  = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    unset($options);
    return $http_code === 200 ? $response : FALSE;
}
?>