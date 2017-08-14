<?php
include'../system/head.php';
$info = mysql_fetch_array(mysql_query("SELECT * FROM `congtacvien` WHERE `id` = '".$_SESSION[id]."' LIMIT 1"));
if(!$_SESSION['admin']) {
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Không Phận Sự Miễn Vào"); </script>');
exit;
}
?>
<div class="content">
            <div class="container-fluid">
<div class="row">
<div class="col-md-12">

<?php

mysql_query("CREATE TABLE IF NOT EXISTS `idvip` (
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
mysql_query("CREATE TABLE IF NOT EXISTS `log_gioihan` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `id_stt` varchar(32) NOT NULL, 
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");     
echo'<div class="content">';
echo'<div class="card"><div class="header">
<h4 class="title">Quản Lý VIP Like</h4>
</div>';	
echo'<div class="content">';  
echo'<form action ="" method="POST">';
echo 'ID_USER:<br/><input name="id_user" class="form-control"/><br/>';
echo 'Giới Hạn Like:<br/><input name="limitlike" class="form-control"/><br/>';
echo 'Like Trung Bình Hiện Có Của Khách Để Cộng Dồn :v<br/><input name="liketrungbinh" class="form-control"/><br/>'; //Nếu Khách Có Sẳn Trung Bình 200 Like Mỗi Post, khi điền vào sẽ cộng dồng lên cho khách để có giới hạn like chất
echo 'Giới Hạn Post 1 Ngày:<br/><input name="limitpost" class="form-control"/><br/>';

echo 'Ngày Sử Dụng:<br/>';
echo '<select name="tgvip" class="form-control">
  <option value="30">1 Tháng</option>
  <option value="60">2 Tháng</option>
  <option value="90">3 Tháng</option>
  <option value="180">6 Tháng</option>
  <option value="365">1 Năm</option>
</select><br/>';

echo '<label class="checkbox-inline"><input type="checkbox" value="dongy" name="botcx"> Sử Dụng BOT Cảm Xúc </label><br/>';
echo '<select name="camxuc" class="form-control">
  <option value="LOVE">LOVE</option>
  <option value="HAHA">HAHA</option>
  <option value="WOW">WOW</option>
  <option value="SAD">SAD</option>
  <option value="ANGRY">ANGRY</option>
</select>';
echo 'Không Đánh Tích Nếu như Không Sử Dụng <br/><br/>';

echo'<input type="submit" value="Thực Hiện Add VIP" class="btn btn-danger"></input></form>';
echo'</div></div>';
echo'</div>';
echo'</div>';




if($_POST['id_user'] && $_POST['limitlike'] && $_POST['liketrungbinh'] && $_POST['limitpost'] )
{
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `idvip` WHERE `id_user` ='" . $_POST['id_user'] . "'"), 0);	

if($_POST['tgvip'] == 30){
$times = time() + 2592000;
} elseif($_POST['tgvip'] == 60) {
$times = time() + 5184000;
} elseif($_POST['tgvip'] == 90) {
$times = time() + 7617000;
} elseif($_POST['tgvip'] == 180) {
$times = time() + 15552000;
} elseif($_POST['tgvip'] == 365) {
$times = time() + 30879000;
}

if($_POST['botcx'] == 'dongy'){

if($tong == 1) {
	mysql_query(
         "UPDATE 
            idvip
         SET
            `limitlike` = '" . mysql_real_escape_string($_POST['limitlike']) . "',
            `liketrungbinh` = '" . mysql_real_escape_string($_POST['liketrungbinh']) . "',
            `limitpost` = '" . mysql_real_escape_string($_POST['limitpost']) . "',
            `camxuc` = '" . mysql_real_escape_string($_POST['camxuc']) . "',
            `tgvip` = '" . $times . "'
			WHERE
            `id_user` = '" . mysql_real_escape_string($_POST['id_user']) . "'
      ");
echo '<div class="alert alert-warning"> ID Đã Tồn Tại Trên Hệ Thống - đã Update Lượng Like + POST Do Bạn Cung Cấp! BOT: '.$_POST['camxuc'].' </div>';
} else {
mysql_query(
         "INSERT INTO 
            idvip
         SET
            `id_user` = '" . mysql_real_escape_string($_POST['id_user']) . "',
            `limitlike` = '" . mysql_real_escape_string($_POST['limitlike']) . "',
            `liketrungbinh` = '" . mysql_real_escape_string($_POST['liketrungbinh']) . "',
            `limitpost` = '" . mysql_real_escape_string($_POST['limitpost']) . "',
            `camxuc` = '" . mysql_real_escape_string($_POST['camxuc']) . "',
            `tgvip` = '" . $times . "'
      ");
echo '<div class="alert alert-success"> Đã Thêm ID VIP Thành Công! BOT: '.$_POST['camxuc'].'</div>';
}

} else {


if($tong == 1)
{
	mysql_query(
         "UPDATE 
            idvip
         SET
            `limitlike` = '" . mysql_real_escape_string($_POST['limitlike']) . "',
            `liketrungbinh` = '" . mysql_real_escape_string($_POST['liketrungbinh']) . "',
            `limitpost` = '" . mysql_real_escape_string($_POST['limitpost']) . "',
            `tgvip` = '" . $times . "'
			WHERE
            `id_user` = '" . mysql_real_escape_string($_POST['id_user']) . "'
      ");
echo '<div class="alert alert-warning"> ID Đã Tồn Tại Trên Hệ Thống - đã Update Lượng Like + POST Do Bạn Cung Cấp! </div>';
}
else
{
	

mysql_query(
         "INSERT INTO 
            idvip
         SET
            `id_user` = '" . mysql_real_escape_string($_POST['id_user']) . "',
            `limitlike` = '" . mysql_real_escape_string($_POST['limitlike']) . "',
            `liketrungbinh` = '" . mysql_real_escape_string($_POST['liketrungbinh']) . "',
            `limitpost` = '" . mysql_real_escape_string($_POST['limitpost']) . "',
            `tgvip` = '" . $times . "'
      ");
echo '<div class="alert alert-success"> Đã Thêm ID VIP Thành Công! </div>';
}
}


}
?>
</div>
<div class="content">
	<div class="card"><div class="header">
		<h4 class="title"> Quản Lý Cộng Tác Viên</h4>
	</div>
  
      <div class="content">
	  <a class="list-group-item" href="/panelvip/congtacvien.php"><i class="fa fa-plus-square"></i> Thêm Cộng Tác Viên cho hệ thống! </a>
	  <a class="list-group-item" href="/panelvip/quanlycmt.php"><i class="fa fa-plus-square"></i> Quản Lý Bot Bình Luận của Thành Viên </a>
	  </div>
</div>	  

<div class="content">
	<div class="card"><div class="header">
		<h4 class="title"> Danh Sách Cộng Tác Viên</h4>
	</div>
  
      <div class="content">
<table class="table">
    <thead>
      <tr>

        <th>ID</th>    
        <th>Cộng Tác Viên</th>    
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
    <?php
$infongdung = mysql_query("SELECT * FROM `congtacvien`");
while ($gettomdz = mysql_fetch_array($infongdung)){
    ?>

    <tr>
        <td><?php echo $gettomdz[id]; ?></td>
        <td><?php echo $gettomdz[fullname]; ?></td>
        <?php if($gettomdz[khoa] == 0) { ?>
		<td><a href="?khoa=<?php echo $gettomdz[id]; ?>">Khóa Tài Khoản</a></td>
		<?php } else { ?>
		<td><a href="?mokhoa=<?php echo $gettomdz[id]; ?>">Mở Khóa Tài Khoản</a></td>
		<?php } ?>
        
      </tr>

      <?php } ?>
      </tbody>
  </table>
</div></div>





<div class="content">
	<div class="card"><div class="header">
		<h4 class="title"> Quản Lý VIP Mem</h4>
	</div>
  
      <div class="panel-body">
<table class="table">
    <thead>
      <tr>

        <th>ID</th>    
        <th>ID Thành Viên</th>    
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
    <?php
$infongdung = mysql_query("SELECT * FROM `idvip`");
while ($gettomdz = mysql_fetch_array($infongdung)){
    ?>

    <tr>
        <td><?php echo $gettomdz[id]; ?></td>
        <td><?php echo $gettomdz[id_user]; ?></td>
		<td><a href="?xoa=<?php echo $gettomdz[id]; ?>">Xóa Tài Khoản</a></td>

        
      </tr>

      <?php } ?>
      </tbody>
  </table>
</div></div>



<?php
if($_GET[xoa]){
$infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `idvip` WHERE `id` = '".$_GET[xoa]."' LIMIT 1"));
mysql_query("DELETE FROM `idvip` WHERE id='" . mysql_real_escape_string($_GET[xoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/panelvip/index.php">';
die('<script>alert("Khóa Tài Khoản Thành Công!"); </script>');
exit;
}


if($_GET[khoa]){
$infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `congtacvien` WHERE `id` = '".$_GET[khoa]."' LIMIT 1"));
mysql_query("UPDATE congtacvien SET `khoa` = '1' WHERE id = '" . mysql_real_escape_string($_GET[khoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/panelvip/index.php">';
die('<script>alert("Khóa Tài Khoản Thành Công!"); </script>');
exit;
}
if($_GET[mokhoa]){
$infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `congtacvien` WHERE `id` = '".$_GET[mokhoa]."' LIMIT 1"));
mysql_query("UPDATE congtacvien SET `khoa` = '0' WHERE id = '" . mysql_real_escape_string($_GET[mokhoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/panelvip/index.php">';
die('<script>alert("Mở Khóa Tài Khoản Thành Công!"); </script>');
exit;
}
?>

</div></div>
</div></div>
<?php

echo '</div>';include'../system/foot.php';