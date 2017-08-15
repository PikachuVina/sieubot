<?php 
error_reporting(0);
include("config.php"); 
$config['user'] = 'bmn2312'; 
$config['pass'] = 'admin'; 
  
if ($_SERVER['PHP_AUTH_USER'] != $config['user'] || $_SERVER['PHP_AUTH_PW'] != $config['pass']){ 
header('WWW-Authenticate: Basic realm="Login Install"'); 
header('HTTP/1.0 401 Unauthorized'); 
die('<center>À Được</center>'); 
} 
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `token` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botcomment` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,      
      `name` varchar(32) NOT NULL,
      `noidung` text NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botex` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,      
      `name` varchar(32) NOT NULL,
      `idfb` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botlike` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `botcamxuc` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,    
      `usercai` varchar(32) NOT NULL,    
      `name` varchar(32) NOT NULL,
      `camxuc` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `autolike` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `iduser` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,
      `idlike` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `autosub` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `iduser` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,
      `idlike` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `idvip` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `limitlike` varchar(32) NOT NULL,      
      `liketrungbinh` varchar(32) NOT NULL,            
      `limitpost` varchar(32) NOT NULL,
      `camxuc` varchar(32) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `log_gioihan` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `id_stt` varchar(32) NOT NULL, 
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   "); 
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `congtacvien` (
      `khoa` varchar(32) NOT NULL,
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(32) NOT NULL,
      `pass` varchar(32) NOT NULL,
      `fullname` varchar(255) NOT NULL,
      `soid` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `idvip` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `limitlike` varchar(32) NOT NULL,      
      `liketrungbinh` varchar(32) NOT NULL,            
      `limitpost` varchar(32) NOT NULL,
      `camxuc` varchar(32) NOT NULL,
      `idctv` int(11),
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysqli_query($GLOBALS["___BMN_2312"], "CREATE TABLE IF NOT EXISTS `log_gioihan` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `id_stt` varchar(32) NOT NULL, 
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
?>