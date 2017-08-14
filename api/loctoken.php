<?
include('../system/config.php');
$result = mysql_query("SELECT * FROM token");
if($result){
while($row = mysql_fetch_array($result))
{
$token = $row[access_token];
$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true);print($userData[name]).'<br/>';
if(!$userData[name]){
mysql_query("
DELETE FROM token WHERE access_token='" . mysql_real_escape_string($token) . "'");
}
}
}

?>