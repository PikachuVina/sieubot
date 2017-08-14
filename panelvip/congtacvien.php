<?php
include'../system/head.php';
if(!$_SESSION['admin']) {
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Không Phận Sự Miễn Vào"); </script>');
exit;
}
mysql_query(
  "CREATE TABLE IF NOT EXISTS `congtacvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `soid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
?>

      <div class="content">
   <div class="row">  
      <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="fa fa-group" style="margin-right: 5px;"></i> Thêm Cộng Tác Viên </h4>
                                <p class="category">Sử Dụng Token Để Đăng Nhập <?php echo $title; ?></p>
                            </div>
      <div class="panel-body">
      <form action="" method="POST">
      <div class="form-group">
  <label for="usr">Tên Tài Khoản:</label>
  <input type="text" class="form-control" name="username">
</div>
<div class="form-group">
  <label for="pwd">Mật Khẩu:</label>
  <input type="password" class="form-control" name="password">
</div>
<div class="form-group">
  <label for="pwd">Họ Và Tên:</label>
  <input type="text" class="form-control" name="fullname">
</div>
<div class="form-group">
  <label for="pwd">Số ID:</label>
  <input type="text" class="form-control" name="soid">
</div>

<div class="form-group">
<label class="checkbox-inline"><input type="checkbox" value="dongy" name="dieukhoan"> Đồng Ý Điều Khoản <?php echo$title; ?></label>

</div>
<button type="submit" class="btn btn-danger">Thực Hiện Thêm Cộng Tác Viên</button>
</div></div></div></div>

</div>

      <?php
      if($_POST['username'] && $_POST['password'] && $_POST['fullname'] && $_POST['soid'] )
      {
      	if($_POST['dieukhoan'] != 'dongy')
      	{
      		die('<script>alert("Đăng Kí Không Thành Công, Chưa Đồng Ý Điều Khoản."); </script>');
      		exit;
      	}
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $fullname = $_POST['fullname'];
        $soid = $_POST['soid'];
        $row = null;
        $result = mysql_query("
         SELECT
         *
         FROM
         congtacvien
      WHERE
         username = '" . mysql_real_escape_string($username) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(!$row)
      {
        mysql_query(
         "INSERT INTO 
            congtacvien
         SET
            `username` = '" . mysql_real_escape_string($username) . "',
            `pass` = '" . mysql_real_escape_string($password) . "',
            `fullname` = '" . mysql_real_escape_string($fullname) . "',
            `soid` = '" . mysql_real_escape_string($soid) . "'
      ");
        die('<script>alert("Đăng Kí Thành Công"); </script>');
     }
die('<script>alert("Đăng Kí Không Thành Công, Tài Khoản Đã Tồn Tại!"); </script>');
      }
  }
  
  
  include'../system/foot.php';
      ?>