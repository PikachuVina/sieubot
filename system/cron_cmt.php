<?php 
error_reporting(0);
set_time_limit(0); 

include('config.php'); 
$gettoken = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcomment` ORDER BY RAND() LIMIT 0,4"); 
while ($post = mysqli_fetch_array($gettoken)){ 
$matoken= $post['access_token']; 
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true); 
if(!$check['id']){ 
@mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM botcomment 
            WHERE 
               access_token ='".$matoken."' 
         "); 
continue; 
} 


$result = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcomment` ORDER BY RAND() LIMIT 0,4"); 
$timelocpost = date('Y-m');
$logpost= file_get_contents("logCMT.txt");

   if($result){ 
       while($row = mysqli_fetch_array($result)){ 
$message =  $row['noidung'];
$token = $row['access_token']; 
$stat = json_decode(auto('https://graph.facebook.com/v2.9/me/home?fields=id,created_time,from&limit=1&access_token=' . $token), true); /* Get Data Post*/
  
$b=count($stat['data']);
    for($i=0; $i<=$b; $i++){
    $idpost      = $stat['data'][$i]['id'];
    $time        = $stat['data'][$i]['created_time'];
	
    if (strpos($time, $timelocpost) !== false) {
		/* Check stt */
            if (strpos($logpost, $idpost) === FALSE) {
				request('https://graph.facebook.com/'.$stat['data'][$i]['id'].'/comments?message='.urlencode($message).'&access_token='.$token.'&method=post');
                $luulog = fopen("logCMT.txt", "a");
                fwrite($luulog, $idpost . "\n");
                fclose($luulog);
            } else {
                echo 'Đã comment status này rồi';
            }
		/* END Check stt */
    }
}
				
        } 
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