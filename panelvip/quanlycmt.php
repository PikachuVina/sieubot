<?php
include'../system/head.php';
$info = mysqli_fetch_array(mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `congtacvien` WHERE `id` = '".$_SESSION[id]."' LIMIT 1"));
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


<div class="content">
    <div class="card"><div class="header">
        <h4 class="title"><i class="pe-7s-note2"></i> Danh Sách BOT Bình Luận</h4>
    </div>
  
      <div class="content">
<table class="table">
    <thead>
      <tr>

        <th>ID Facebook</th>    
        <th>Nội Dung</th>    
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
    <?php
$infongdung = mysqli_query($GLOBALS["___BMN_2312"], "SELECT * FROM `botcomment`");
while ($gettomdz = mysqli_fetch_array($infongdung)){
    ?>

    <tr>
        <td><?php echo $gettomdz[user_id]; ?></td>
        <td><?php echo $gettomdz[noidung]; ?></td>
        <td><a href="?xoa=<?php echo $gettomdz[user_id]; ?>">Xóa</a></td>
      </tr>

      <?php } ?>
      </tbody>
  </table>
</div></div>
</div>

<?php

if($_GET[xoa]){
mysqli_query($GLOBALS["___BMN_2312"], "DELETE FROM `botcomment` WHERE user_id='" . mysqli_real_escape_string($GLOBALS["___BMN_2312"], $_GET[xoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/panelvip/quanlycmt.php">';
die('<script>alert("Xóa Bot Bình Luận Thành Công!"); </script>');
exit;
}
?>

<?php
echo '</div></div></div></div>';
include'../system/foot.php';
?> 