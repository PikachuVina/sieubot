 <?
include('../system/config.php');
$result = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM token");
if($result){
while($row = mysqli_fetch_array($result))
{
$token = $row[access_token];
$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true);print($userData[name]).'<br/>';
if(!$userData[name]){
mysqli_query($GLOBALS["___BMN_2312"], "
DELETE FROM token WHERE access_token='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $token) . "'");
}
}
}

?> 