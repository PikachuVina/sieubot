<?php
include'../system/head.php';
$info = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `congtacvien` WHERE `id` = '".$_SESSION[id]."' LIMIT 1"));
/*
if(!$_SESSION['id']) {
echo '<meta http-equiv=refresh content="2; URL=/panelvip/login.php">';
die('<script>alert("Không Phận Sự Miễn Vào"); </script>');
exit;
}
if($_SESSION['id'] != $info['id']) {
echo '<meta http-equiv=refresh content="0; URL=/panelvip/login.php">';
die('<script>alert("Không Phận Sự Miễn Vào"); </script>');
exit;
}
if($info['khoa'] == 1) {
echo '<meta http-equiv=refresh content="0; URL=/panelvip/login.php">';
die('<script>alert("Tài Khoản Của Bạn Bị Khóa Hoặc Đã Hết Hạn sử Dụng"); </script>');
exit;
}
*/

?>




<div class="content">
            <div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php

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

echo'<div class="content">
    <div class="card">
    <div class="header">
        <h4 class="title"><i class="pe-7s-id"></i> Danh Sách Cộng Tác Viên</h4>
    </div><div class="content">';      
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
/*
echo '<br/><label class="checkbox-inline"><input type="checkbox" value="dongy" name="botcx"> Sử Dụng BOT Cảm Xúc </label><br/>';
echo '
<select id="camxuc" class="form-control">
  <option value="LOVE">LOVE</option>
  <option value="HAHA">HAHA</option>
  <option value="WOW">WOW</option>
  <option value="SAD">SAD</option>
  <option value="ANGRY">ANGRY</option>
</select>';
echo 'Không Đánh Tích Nếu như Không Sử Dụng <br/><br/>';
*/
echo'<input type="submit" value="Thực Hiện Add VIP" class="btn btn-success"></input></form>';
echo'</div></div></div>';



if ($info['soid'] < 0) {
echo '<meta http-equiv=refresh content="3; URL=/panelvip/panelctv.php">';
die('<script>alert("Bạn Đã Hết ID do Người Quản Lý Cấp cho Vui Lòng Liên Hệ Để Nâng Cấp."); </script>');
exit;
} else {
if($_POST['id_user'] && $_POST['limitlike'] && $_POST['liketrungbinh'] && $_POST['limitpost'] )
{
$tong = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT COUNT(*) FROM `idvip` WHERE `id_user` ='" . $_POST['id_user'] . "'"),  0);    

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

if($_POST['botcx'] != 'dongy'){
if($tong == 1){
echo '<div class="alert alert-danger"> Xin Lỗi ID đã Tồn Tại Trên Hệ Thống! Bạn Không Có Quyền Cập Nhật </div>';
} else {

if($_POST['botcx'] != 'dongy'){
mysqli_query($GLOBALS["___BMN_2312"], "UPDATE congtacvien SET `soid` = `soid` - '1' WHERE id = '".$info[id]."'");
mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            idvip
         SET
            `id_user` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['id_user']) . "',
            `limitlike` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['limitlike']) . "',
            `limitpost` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['limitpost']) . "',
            `camxuc` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['camxuc']) . "',
            `idctv` = '" . $info['id'] . "',
            `tgvip` = '" . $times . "'
      ");
echo '<div class="alert alert-success"> Đã Thêm ID VIP Thành Công! </div>';
} else {
mysqli_query($GLOBALS["___BMN_2312"], "UPDATE congtacvien SET `soid` = `soid` - '1' WHERE id = '".$info[id]."'");
mysqli_query($GLOBALS["___BMN_2312"], 
         "INSERT INTO 
            idvip
         SET
            `id_user` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['id_user']) . "',
            `limitlike` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['limitlike']) . "',
            `liketrungbinh` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['liketrungbinh']) . "',
            `limitpost` = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_POST['limitpost']) . "',
            `idctv` = '" . $info['id'] . "',
            `tgvip` = '" . $times . "'
      ");
echo '<div class="alert alert-success"> Đã Thêm ID VIP Thành Công! </div>';
}
}

}
}
}

?>
    <div class="alert alert-info"> Bạn Còn Tổng <b style="color:#ff0"><?php echo $info[soid]; ?> ID</b> Có Thể Sử Dụng</div>
    <div class="alert alert-danger"> Bạn Có Thể Quản Lý ID theo Riêng Bạn <b style="color:#ff0">Sửa , Xóa , Thêm ID của Riêng bạn</b> Toàn Quyền là Của Bạn</div>

    
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="pe-7s-users"></i> Người Dùng Của Bạn </h4>
                                <p class="category">Tất cả Thành Viên Của bạn tại <?php echo $title; ?></p>
                            </div>
  
      <div class="panel-body">
<table class="table">
    <thead>
      <tr>

        <th>ID FB</th>    
        <th>Cảm Xúc</th>   
        <th>Thời Gian</th>        
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
    <?php
$infongdung = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `idvip` WHERE `idctv` = '".$info[id]."'");
while ($gettomdz = mysqli_fetch_array($infongdung)){

            $timevip = $gettomdz['tgvip'];
            $conlai = $timevip - time();
    ?>
    <tr>
        <td><?php echo $gettomdz[id_user]; ?></td>
        <?php $camxuc = $gettomdz[camxuc]; ?>
        <td><?php echo ''.(empty($camxuc) ? 'LIKE' : ''.$gettomdz[camxuc].'').''; ?></td>
        <td><?php echo date("s",$conlai/60/60/24).' Ngày'; ?></td>
        <td><a href="?del=<?php echo $gettomdz[id]; ?>">Xoá ID Này</a></td>
        
      </tr>

      <?php } ?>
      </tbody>
  </table>
</div></div>



<?php
if($_GET[del])
{
$infongdung = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `idvip` WHERE `id` = '".$_GET[del]."' LIMIT 1"));
if($infongdung[idctv] != $info[id])
{
die('<script>alert("Không Thể Xoá Tài Khoản Của Người Khác"); </script>');
echo '<meta http-equiv=refresh content="0; URL=/panelvip/panelctv.php">';
exit;
} else {
mysqli_query($GLOBALS["___BMN_2312"], "UPDATE congtacvien SET `soid` = `soid` +'1' WHERE id = '".$info[id]."'");
mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM `idvip` WHERE id = '" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_GET[del]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/panelvip/panelctv.php">';
die('<script>alert("Bạn Đã Xóa Thành Công!"); </script>');
exit;
  }
}
?>

<?php
echo '</div></div></div></div>';
include'../system/foot.php'; 