<?php 
error_reporting(0);
set_time_limit(0); 
ob_start('ob_gzhandler'); 
include'config.php';
$gettoken = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcomment` ORDER BY RAND() LIMIT 0,4"); 
while ($row = mysqli_fetch_array($gettoken)){ 
$matoken= $row['access_token']; 
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true); 
if(!$check['id']){ 
@mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM botcomment 
            WHERE 
               access_token ='".$matoken."' 
         "); 
continue; 
} 
$timelocpost = date('Y-m');
$logpost= file_get_contents("logCMT.txt");

while ($post = mysqli_fetch_array($res)){
$token= $post['access_token'];
$message = $post['noidung'];
$stat = json_decode(auto('https://graph.beta.facebook.com/me/home?fields=id,created_time,from&limit=1&access_token='.$token),true);
$b=count($stat[data]);
    for($i=0; $i<=$b; $i++){
    $idpost      = $stat['data'][$i]['id'];
    $time        = $stat['data'][$i]['created_time'];
    if (strpos($time, $timelocpost) !== false) {
    /* Check stt */
    if (strpos($logpost, $idpost) === FALSE) {
    // Hành Động...
	auto('https://graph.facebook.com/'.$stat['data'][$i-1]['id'].'/comments?message='.urlencode($message).'&access_token='.$token.'&method=post');
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
?>