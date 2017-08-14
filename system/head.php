<?php
session_start();

//***Ghi Chú***//
$title = 'Nghia.ML';
$hometitle = 'Nghia.ML - AutoBot Cảm Xúc - Thả Thính Online';
$tags = 'Nghia.ML - Auto Like Bot Cảm Xúc - Thả Thính Online';
$hometitle = 'Auto Bot Like - Bot Like Cảm Xúc Thả Thính Online';
$home = 'http://nghiaml.herokuapp.com';
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


<!--








                                               _____                            _      _ _        
                                              / ____|                          | |    (_) |       
                                             | (___   ___  _   _ _ __ ___ ___  | |     _| | _____ 
                                              \___ \ / _ \| | | | '__/ __/ _ \ | |    | | |/ / _ \
                                              ____) | (_) | |_| | | | (_|  __/ | |____| |   <  __/
                                             |_____/ \___/ \__,_|_|  \___\___| |______|_|_|\_\___|
                                                                                                      
                                                                                                      

                                            ====================================================
                                                
                                                    -=* SOURCE Edit By Mạnh Nghĩa *=-
                                                    -=**  Facebook.Com/BMN.2312 **=-
                                                
                                            ====================================================

-->
<?php

    
// RESET thành viên VIP Khi Quá Hạn Sử Dụng
    $time = time();
    $timelike = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `idvip`");
    if(time() > $timelike['tgvip']){
    mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM `idvip` WHERE `tgvip` < '.$time.'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title><?php echo $hometitle ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:site_name" content="detail"/> 
        <meta property="og:url" content="http://Nghia.ML"/> 
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="<?php echo $title; ?> Hệ Thống Auto Bot Thả Thính , Bot Cảm Xúc Số 1 Việt Nam" /> 
        <meta property="og:description" content="Hệ Thống Bot Like Facebook Tốt Nhất Dành Cho Thanh Viên tại <?php echo $title; ?> " />  
        <link rel="shortcut icon" href="https://i.imgur.com/h6NWYI8.png">
        <meta property="og:image" content="https://i.imgur.com/FBYFvb8.jpg" />
    <!-- Bootstrap core CSS     -->
        <link href="<?php echo $home; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
        <link href="<?php echo $home; ?>/assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo $home; ?>/assets/css/tomdz-thathinh-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo $home; ?>/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo $home; ?>/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
</head>

<body>

<div class="wrapper">
    <!--

        Tip 1: Bạn Có Thể Chọn Màu Thanh Slider Tùy thích tại : data-color="blue | azure | green | orange | red | purple"
        Tip 2: data-image Bạn Có Thể ADD Hình nền Slider có sẵn tại data-image="/assets/img/xxxxx.jpg" hoặc Link ảnh bên ngoài 

    -->
    <div class="sidebar" data-color="orange" data-image="/assets/img/sidebar-1.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                   <?php echo $title; ?>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/">
                        <i class="pe-7s-graph"></i>
                        <p>Trang Chủ</p>
                    </a>
                </li>
                <li>
                    <a href="/api/gettoken.php">
                        <i class="pe-7s-user"></i>
                        <p>GET Access Token</p>
                    </a>
                </li>
                
                <?php if(!$_SESSION[id]) { ?>
                <li>
                    <a href="/nick.php">
                        <i class="pe-7s-id"></i>
                        <p>Đăng Nhập Tài Khoản</p>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/blogcuongphieu">
                        <i class="pe-7s-science"></i>
                        <p>Nhóm Facebook Groups</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-bell"></i>
                        <p>Đang Cập Nhật</p>
                    </a>
                </li>
                <?php } else { ?>
                <li>
                    <a href="/info.php">
                        <i class="pe-7s-users"></i>
                        <p>Thông Tin Tài Khoản</p>
                    </a>
                </li>             
                <li>
                    <a href="/TOMCMT.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>BOT Bình Luận</p>
                    </a>
                </li>
                <li>
                    <a href="/botex.php">
                        <i class="pe-7s-way"></i>
                        <p>BOT Tréo Like Nhau</p>
                    </a>
                </li>        
                <li>
                    <a href="/">
                        <i class="pe-7s-refresh-2"></i>
                        <p>Đang Cập Nhật ...</p>
                    </a>
                </li>                <?php } ?>
                
                <li class="active-pro">
                    <a href="https://fb.me/cuongphieu9x">
                        <i class="pe-7s-rocket"></i>
                        <p>Hợp Tác - Quảng Cáo</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><i class="pe-7s-share"></i> <?php echo $title; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">2</span>
                                    <p class="hidden-lg hidden-md">
                                        2 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="https://like1phut.com">BotLike No.1 Việt Nam!</a></li>
                                <li><a href="#"><?php echo $title; ?></a></li>
                              </ul>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                    <?php if($_SESSION[admin]) { ?>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        <i class="pe-7s-user"></i> Control Panel
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Thông Tin</a></li>
                                <li><a href="/admin.php" style="color:red;font-weight:bold;">Administrator</a></li>
                                <li><a href="/dangxuat.php">Đăng Xuất</a></li>
                              </ul>
                        </li>
                        <?php } ?>
                        
                        <?php if(!$_SESSION[id]) { ?>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        <i class="pe-7s-refresh-2"></i> Tính Năng
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="/api/gettoken.php"><i class="pe-7s-user"></i> GET Token Full</a></li>
                              </ul>
                        </li>
                        <?php } else { ?>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Account
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><?php echo $_SESSION[id]; ?></a></li>
                                <li><a href="#"><?php echo $_SESSION[name]; ?></a></li>
                                <li><a href="/dangxuat.php">Đăng Xuất</a></li>
                              </ul>
                        </li>
                        <?php } ?>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
