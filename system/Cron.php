<?php
include'config.php';
if($_GET[hanhdong] == 'like')
{
$res = mysql_query("SELECT * FROM `botlike` ORDER BY RAND() LIMIT 0,70");
while ($post = mysql_fetch_array($res)){
$token= $post['access_token'];
$stat=json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='.$token.'&offset=0&limit=20'),true);
for($i=0;$i<count($stat[data]);$i++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/likes?access_token='.$token.'&method=post');
}}
}

if($_GET[hanhdong] == 'botex')
{
$result = mysql_query("SELECT * FROM `botex` ORDER BY RAND() LIMIT 0,5");
while($row = mysql_fetch_array($result)){
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
$res = mysql_query("SELECT * FROM `botcomment` ORDER BY RAND() LIMIT 0,70");
while ($post = mysql_fetch_array($res)){
$token= $post['access_token'];
$message = $post['noidung'];
$stat = json_decode(auto('https://graph.beta.facebook.com/me/home?fields=id,from&limit=25&access_token='.$token),true);
for($i=0;$i<count($stat[data]);$i++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?message='.urlencode($message).'&access_token='.$token.'&method=post');
}}
}


if($_GET[hanhdong] == 'cx')
{
$res = mysql_query("SELECT * FROM `botcamxuc` ORDER BY RAND() LIMIT 0,70");
while ($post = mysql_fetch_array($res)){
$token= $post['access_token'];
$camxuc= $post['camxuc'];
$stat=json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='.$token.'&offset=0&limit=20'),true);
for($i=0;$i<count($stat[data]);$i++){
if($camxuc == 'SmartBot')
{
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `SmartBot`"), 0);
$req = mysql_query("SELECT * FROM `SmartBot`");
while ($check = mysql_fetch_assoc($req)) {
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