<?php
include '../system/head.php';
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Lấy Cookie Bằng Tài Khoản Facebook</h4>
                                <p class="category">Hệ Thống Lấy Cookie Trên Điện Thoại Không Cần Máy Tính 100%</p>
                            </div>
							

<div class="content"><div class="panel-group">

<div class="form-group">
  <label for="usr">Username:</label>
  <input placeholder="Email / Số điện thoại" type="text" required="" class="form-control" id="u">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input placeholder="Mật Khẩu" type="password" required="" class="form-control" id="p">
</div>
<button type="button" class="btn btn-danger" onclick="Puaru_Active()" >Lấy Cookie</button>
<p>
<li id="trave" class="list-group-item" style="background: #fff;"><img src="http://i.imgur.com/R32rrR2.png" style="max-width:100%;"> </li></p>

</div></div>
</div>
</div></div>

<script>
function Puaru_Active() {
var http = new XMLHttpRequest();
var u = document.getElementById("u").value;
var p = document.getElementById("p").value;
var url = "cookie.php";
var params = "u="+u+"&p="+p+"";
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("trave").innerHTML = http.responseText;        
    }
}
http.send(params);
}
</script>

</div></div>
<?php include '../system/foot.php'; ?>