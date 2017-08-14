<?php
include 'system/head.php';
mysql_query("ALTER TABLE `idvip` ADD `tgvip` int(11) NOT NULL default '0';");
echo 'Cập Nhật Cơ Sở Dữ Liệu Thành Công - Cảm ơn bạn đã Mua và sử Dụng Source Code của TOMDZ';
?>