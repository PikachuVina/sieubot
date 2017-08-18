<meta charset="utf-8"/>
<?php
set_time_limit(0);
error_reporting(0);

$emoticon=array(
urldecode('%F3%BE%80%80'),
urldecode('%F3%BE%80%81'),
urldecode('%F3%BE%80%82'),
urldecode('%F3%BE%80%83'),
urldecode('%F3%BE%80%84'),
urldecode('%F3%BE%80%85'),
urldecode('%F3%BE%80%87'), 
urldecode('%F3%BE%80%B8'), 
urldecode('%F3%BE%80%BC'),
urldecode('%F3%BE%80%BD'),
urldecode('%F3%BE%80%BE'),
urldecode('%F3%BE%80%BF'),
urldecode('%F3%BE%81%80'),
urldecode('%F3%BE%81%81'),
urldecode('%F3%BE%81%82'),
urldecode('%F3%BE%81%83'),
urldecode('%F3%BE%81%85'),
urldecode('%F3%BE%81%86'),
urldecode('%F3%BE%81%87'),
urldecode('%F3%BE%81%88'),
urldecode('%F3%BE%81%89'), 
urldecode('%F3%BE%81%91'),
urldecode('%F3%BE%81%92'),
urldecode('%F3%BE%81%93'), 
urldecode('%F3%BE%86%90'),
urldecode('%F3%BE%86%91'),
urldecode('%F3%BE%86%92'),
urldecode('%F3%BE%86%93'),
urldecode('%F3%BE%86%94'),
urldecode('%F3%BE%86%96'),
urldecode('%F3%BE%86%9B'),
urldecode('%F3%BE%86%9C'),
urldecode('%F3%BE%86%9D'),
urldecode('%F3%BE%86%9E'),
urldecode('%F3%BE%86%A0'),
urldecode('%F3%BE%86%A1'),
urldecode('%F3%BE%86%A2'),
urldecode('%F3%BE%86%A4'),
urldecode('%F3%BE%86%A5'),
urldecode('%F3%BE%86%A6'),
urldecode('%F3%BE%86%A7'),
urldecode('%F3%BE%86%A8'),
urldecode('%F3%BE%86%A9'),
urldecode('%F3%BE%86%AA'),
urldecode('%F3%BE%86%AB'),
urldecode('%F3%BE%86%AE'),
urldecode('%F3%BE%86%AF'),
urldecode('%F3%BE%86%B0'),
urldecode('%F3%BE%86%B1'),
urldecode('%F3%BE%86%B2'),
urldecode('%F3%BE%86%B3'), 
urldecode('%F3%BE%86%B5'),
urldecode('%F3%BE%86%B6'),
urldecode('%F3%BE%86%B7'),
urldecode('%F3%BE%86%B8'),
urldecode('%F3%BE%86%BB'),
urldecode('%F3%BE%86%BC'),
urldecode('%F3%BE%86%BD'),
urldecode('%F3%BE%86%BE'),
urldecode('%F3%BE%86%BF'),
urldecode('%F3%BE%87%80'),
urldecode('%F3%BE%87%81'),
urldecode('%F3%BE%87%82'),
urldecode('%F3%BE%87%83'),
urldecode('%F3%BE%87%84'),
urldecode('%F3%BE%87%85'),
urldecode('%F3%BE%87%86'),
urldecode('%F3%BE%87%87'), 
urldecode('%F3%BE%87%88'),
urldecode('%F3%BE%87%89'),
urldecode('%F3%BE%87%8A'),
urldecode('%F3%BE%87%8B'),
urldecode('%F3%BE%87%8C'),
urldecode('%F3%BE%87%8D'),
urldecode('%F3%BE%87%8E'),
urldecode('%F3%BE%87%8F'),
urldecode('%F3%BE%87%90'),
urldecode('%F3%BE%87%91'),
urldecode('%F3%BE%87%92'),
urldecode('%F3%BE%87%93'),
urldecode('%F3%BE%87%94'),
urldecode('%F3%BE%87%95'),
urldecode('%F3%BE%87%96'),
urldecode('%F3%BE%87%97'),
urldecode('%F3%BE%87%98'),
urldecode('%F3%BE%87%99'),
urldecode('%F3%BE%87%9B'), 
urldecode('%F3%BE%8C%AC'),
urldecode('%F3%BE%8C%AD'),
urldecode('%F3%BE%8C%AE'),
urldecode('%F3%BE%8C%AF'),
urldecode('%F3%BE%8C%B0'),
urldecode('%F3%BE%8C%B2'),
urldecode('%F3%BE%8C%B3'),
urldecode('%F3%BE%8C%B4'),
urldecode('%F3%BE%8C%B6'),
urldecode('%F3%BE%8C%B8'),
urldecode('%F3%BE%8C%B9'),
urldecode('%F3%BE%8C%BA'),
urldecode('%F3%BE%8C%BB'),
);
$getEmo=$emoticon[rand(0,count($emoticon)-1)];

$token = 'EAAAAAYsX7TsBAFCZB55l8kZCbxY9k8USzmxknFnD5kTuWiwdPWPVRIdZCmFyP3eKTmeqkjLBqgg1YOsHQxdaeeQ0lzZB8BM6dmrZCM79C3Gpg83DNpRoJiuiIVsYTmyVjDUUlfHnvYh3Hx1Qh0AgqDdBHbucUfNDwPIUGlWL6v9LqmFUJshihdMI2LGgpleq0MXI7VdzB4VjccoVRsZC37jcgfElsT8cQZD'; 
$idgroup = '670626069702684'; /* Id Group */
$post = json_decode(request('https://graph.facebook.com/v2.9/' .$idgroup. '/feed?fields=id,created_time,from&limit=1&access_token=' . $token), true); /* Get Data Post*/
$timelocpost = date('Y-m');
$hinhanh = 'http://i.imgur.com/W4oblhw.jpg';
$logpost= file_get_contents('logCMT.txt');
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
Nghia•ML Bot thả thính tốc độ số 1 tại VN hiện nay đó :)) ' . $getEmo . '
­',
				'­
Bạn gì đó ơi !!! ' . $getEmo . '
Bạn có biết ???
Website Nghia•ML bot thả thính hàng đầu VN đó :D
Không tin đúng không
thử vào biết liền à <3
­'
				);
				$random_cmt = array_rand($arraycmt);
			    $comment = $arraycmt[$random_cmt];
				request('https://graph.facebook.com/'. urlencode($idpost) .'/comments?attachment_url='. urlencode($hinhanh) .'&access_token='.$token.'&message='. urlencode($comment) .'&method=post');
                $luulog = fopen('logCMT.txt', 'a');
                fwrite($luulog, $idpost . '\n');
                fclose($luulog);
            } else {
                echo 'Đã comment status này rồi</br>';
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