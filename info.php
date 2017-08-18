<?php include 'system/head.php'; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
				
<?php if($_SESSION['id']) { ?>

<div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="http://graph.facebook.com/<?php echo $_SESSION['id']; ?>/picture?width=200&height=200" alt="...">

                                      <h4 class="title"><?php echo $_SESSION['name']; ?><br>
                                         <small><?php echo $_SESSION['id']; ?></small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> Người dùng Hệ thống <b><?php echo $title; ?></b> <br>
								Cảm ơn bạn đã Sử dụng dịch vụ của <b><?php echo $title; ?></b> Chúc bạn dùng Bot Vui vẻ
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="https://fb.me/<?php echo $_SESSION['id']; ?>" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                            </div>
</div>

<?php } else {
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Không Lấy Được Thông Tin Vui Lòng Đăng Nhập lại!"); </script>');
?> 

<?php } ?>

</div>
	</div>
		</div>
<?php include 'system/foot.php'; ?>