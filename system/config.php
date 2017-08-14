<?php
session_start();

//***Ghi Chú***//
$title = 'nhacvui.me';
$hometitle = 'nhacvui.me - AutoBot Cảm Xúc - Thả Thính Online';
$tags = 'nhacvui.me - Auto Like Bot Cảm Xúc - Thả Thính Online';
$hometitle = 'Auto Bot Like - Bot Like Cảm Xúc Thả Thính Online';
$home = 'https://sieubot.herokuapp.com';
//***End***//
$host = "mysql5.gear.host";
$username = "sieubot";
$password = "Kc9Mfn~2~olT";
$dbname = "sieubot";

$connection = ($GLOBALS["___BMN_2312"] = mysqli_connect($host, $username, $password));
if (!$connection)
  {
  die('Could not connect: ' . mysqli_error($GLOBALS["___BMN_2312"]));
  }
mysqli_select_db($GLOBALS["___BMN_2312"], $dbname) or die(mysqli_error($GLOBALS["___BMN_2312"]));
mysqli_query($GLOBALS["___BMN_2312"], "SET NAMES utf8");
function auto($url){
    $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $ch = curl_exec($curl);
        curl_close($curl);
    return $ch;
    }
function get($url){
    $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $ch = curl_exec($curl);
        curl_close($curl);
    return $ch;
    }
function checkout($str, $br = 0, $tags = 0)
    {
        $str = htmlentities(trim($str), ENT_QUOTES, 'UTF-8');
        if ($br == 1) {
            // Вставляем переносы строк
            $str = nl2br($str);
        } elseif ($br == 2) {
            $str = str_replace("\r\n", ' ', $str);
        }
        return trim($str);
    }
function check($str)
    {
        $str = htmlentities(trim($str), ENT_QUOTES, 'UTF-8');
        $str = self::checkin($str);
        $str = nl2br($str);
        $str = mysqli_real_escape_string($GLOBALS["___BMN_2312"], $str);

        return $str;
    }




    
    
?> 