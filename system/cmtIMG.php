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

$token = 'EAAAAAYsX7TsBAPJlRZB1UhfepLLv3t7HuciUlRbSjWQmuM5SZApfMJtu8jQZAZCMIkPmCuD85vDMTwAFDZBd40MlS381XGQIrHPwGLu6xBKBJu5R0rYtiFQU0ZAunu7gb5x3kr5gV6WAlVSjUnZC25piXBs6i2oPycOhQKWWKqNORSMPSOUJvJx9AgdpCF9rZABP0ffzFfUJzr3pDcKziGYzn4FueDZA8ZC3MZD'; 
//hiển thị danh sách group và tách lấy random
$listgroup = '670626069702684';
$tachgr = explode("\n",$listgroup);
$idgroup = $tachgr[rand(0,count($tachgr)-1)];

//hiển thị danh sách hình ảnh và tách lấy random
$listhinhanh = 'http://i.imgur.com/1OLDaHu.jpg
http://i.imgur.com/O1SIUc9.jpg
http://i.imgur.com/kMkaEP7.jpg
http://i.imgur.com/1OLDaHu.jpg
http://i.imgur.com/O1SIUc9.jpg
http://i.imgur.com/kMkaEP7.jpg';
$tachanh = explode("\n",$listhinhanh);
$hinhanh = $tachanh[rand(0,count($tachanh)-1)];

$post = json_decode(request('https://graph.facebook.com/v2.9/' .$idgroup. '/feed?fields=id,created_time,from&limit=1&access_token=' . $token), true); /* Get Data Post*/

$timelocpost = date('Y-m');
$logpost= file_get_contents('logCMT.txt');

for ($i = 0; $i < 1000; $i++) {
    $idpost      = $post['data'][$i]['id'];
    $time        = $post['data'][$i]['created_time'];
	
    if (strpos($time, $timelocpost) !== false) {
		/* Check stt */
            if (strpos($logpost, $idpost) === FALSE) {
                $arraycmt = array(
				'Chào [ten] [icon] !!! Bạn có đang bán hàng online ???
Kem trộn, sữa tắm, mặt nạ lột mụn, đồ ăn nhanh, dịch vụ facebook ....
Bạn có muốn tiếp cận sản phẩm của mình cho nhiều người biết ?
Hệ thống Bot Quảng Cáo sản phẩm của mình tại website Nghĩa•Vn sẽ tự động làm tất cả cho bạn
Với lượng người tương tác với sản phẩm bên bạn 100% người thật, giá thành chỉ từ 50k/1 tháng mà bạn có thể kiếm được 1 số lượng lớn khách hàng tiềm năng
Bạn muốn tìm hiểu thêm ???
Website: Nghĩa•Vn
Hotline: 0985.389.299 Gặp #Nghĩa [icon]'
				/*'­
Xin chào, @[' . $post['data'][$i]['from']['id'] . ':0]
Bạn có biết ???
Nghia•ML Bot thả thính tốc độ số 1 tại VN hiện nay đó :)) ' . $getEmo . '
­',*/
				'­
HêLô [ten] [icon]
Trong 30 triệu người dùng Facebook tại Việt Nam này
Rất may mắn khi hôm nay mình gặp được bạn :*
À thôi đéo có gì đâu !!! Mình PR cái website Nghia•Vn thôi.
Hệ thống Bot Quảng Cáo tốt nhất hiện nay đó :)
­',

/*				'­
Rảnh share cho chúng mày cái API get link drive nè
Tiện cmt tao giới thiệu cho chúng mày biết. Tao là #BOT của thằng Nghĩa Mặt Lồn nhé ' . $getEmo . '
À Link API nè: Nghia•ML/api/getdrive.php
­',
				'­
Rảnh nữa nên share cho chúng bạn con API SimSimi đang hoạt động bình thường....
.
.
.
.
.
.
.
Có cái lồn ý !!! Thả thính đấy ngu ạ !!! Tất nhiên là lại PR Nghia•ML rồi ' . $getEmo . '
­',
				'­
Bạn gì đó ơi !!! ' . $getEmo . '
Bạn có biết ???
Website Nghia•ML bot thả thính hàng đầu VN đó :D
Không tin đúng không
thử vào biết liền à <3
­'*/
				);
				$random_cmt = array_rand($arraycmt);
			    $comment = $arraycmt[$random_cmt];
			    $tuychon = array(
					'[tag]' => '@[' . $post['data'][$i]['from']['id'] . ':0]',
					'[ten]' => $post['data'][$i]['from']['name'];
					'[icon]' => $getEmo,
			    );
			    $noidung =  strtr($comment, $tuychon);
				request('https://graph.facebook.com/'. urlencode($idpost) .'/comments?attachment_url='. urlencode($hinhanh) .'&access_token='.$token.'&message='. urlencode($noidung) .'&method=post');
                $luulog = fopen('logCMT.txt', 'a');
                fwrite($luulog, $idpost . "\n");
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