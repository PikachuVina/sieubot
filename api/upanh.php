<?php
include '../system/head.php';
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Upload Ảnh Online</h4>
                                <p class="category">Hệ Thống Up Ảnh Imgur</p>
                            </div>
							

<div class="content"><div class="panel-group">

<form id="imageform" method="post" enctype="multipart/form-data" action="imgur.php">
<div class="form-group">
  <input type="file" name="file" />
</div>
<button type="submit" name="photoimg" class="btn btn-danger">Upload Ảnh</button>
</form>

<?
function er($text)
{
  return '<div style="width: 95%; padding: 6px; border-radius: 5px;background: #D7C042;"><b style="color: green">Lỗi: </b>' . $text . '</div>';
}
if($_GET['er']==7) $error = er("Bạn hãy chọn file để upload nhé!!!");
if($_GET['er']==2) $error = er("File Quá Lớn, vui lòng chọn file < 20MB");
if($_GET['er']==3) $error = er("Có Vẻ File Bạn Chọn Không Phải Là Ảnh");
if($_GET['er']==4) $error = er("Chiều dài và rộng của ảnh quá lớn. Hãy upload ảnh nhỏ hơn 20000x20000 px");
if($_GET['er']==5) $error = er("Định Dạng File Không Được Phép Upload");
if($_GET['er']==6) $error = er("Không thể upload ảnh của bạn, hãy thử lại!");
if($_GET['er']==1) $error = er("Hành động của bạn không hợp lệ !!!");
if(isset($error)){ echo $error;} else if(isset($_GET['link'])){ 
	echo '<center><img src="' . $url . '" /><br/></center>';
    echo '<label for="usr">Link Trực Tiếp :</label>';
    echo '<input value="' . base64_decode($_GET['link']) . '" type="text" class="form-control"></br>';
    echo '<label for="usr">BBcode :</label>';
    echo '<input value="[img]' . base64_decode($_GET['link']) . '[/img]" type="text" class="form-control">';
	;}
?>
</div></div>
</div>
</div></div>
</div></div>
<?php include '../system/foot.php'; ?>