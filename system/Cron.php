<?php
include'config.php';
if($_GET[hanhdong] == 'like')
{
$res = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botlike` ORDER BY RAND() LIMIT 0,70");
while ($post = mysqli_fetch_array($res)){
$token= $post['access_token'];
$stat=json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='.$token.'&offset=0&limit=20'),true);
for($i=0;$i<count($stat[data]);$i++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/likes?access_token='.$token.'&method=post');
}}
}

if($_GET[hanhdong] == 'botex')
{
$result = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botex` ORDER BY RAND() LIMIT 0,5");
while($row = mysqli_fetch_array($result)){
$cmt = $row['likecmt'];
$token = $row['access_token'];
$stat = json_decode(auto('https://graph.facebook.com/'.$row['idfb'].'/feed?fields=id&access_token='.$token.'&offset=0&limit=1'),true);
for($i=1;$i<=count($stat[data]);$i++){
$com = json_decode(auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?access_token='.$token.'&limit=5&fields=id'),true);

for($c=1;$c<=count($com[data]);$c++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/likes?access_token='.$token.'&method=post');
if($cmt=="1"){
echo auto('https://graph.facebook.com/'.$com[data][$c-1][id].'/likes?access_token='.$token.'&method=post');
}
}
}} 
}

    
if($_GET[hanhdong] == 'cmt')
{
$res = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcomment` ORDER BY RAND() LIMIT 0,70");
while ($post = mysqli_fetch_array($res)){
$token= $post['access_token'];
$message = $post['noidung'];
$stat = json_decode(auto('https://graph.beta.facebook.com/me/home?fields=id,from&limit=25&access_token='.$token),true);
for($i=0;$i<count($stat[data]);$i++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?message='.urlencode($message).'&access_token='.$token.'&method=post');
}}
}


if($_GET[hanhdong] == 'cx')
{
$res = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcamxuc` ORDER BY RAND() LIMIT 0,70");
while ($post = mysqli_fetch_array($res)){
$token= $post['access_token'];
$camxuc= $post['camxuc'];
$stat=json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='.$token.'&offset=0&limit=20'),true);
for($i=0;$i<count($stat[data]);$i++){
if($camxuc == 'SmartBot')
{
$total = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT COUNT(*) FROM `SmartBot`"),  0);
$req = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `SmartBot`");
while ($check = mysqli_fetch_assoc($req)) {
for ($u=0; $u<=$total; $u++) {
$key = strtolower($check['tukhoa']);
$txtcheck = strtolower($stat[data][$i-1][message]);
$txt = $check['camxuc'];
if(preg_match('|'.$key.'|', $txtcheck)) {
$camxuc = $txt;
}
}
}
if(!$camxuc || $camxuc == 'SmartBot')
{
    $camxuc ='LOVE';
}    
}    
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/reactions?type='.$camxuc.'&access_token='.$token.'&method=post');
}}
}
?> 