<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="/">
                                Trang Chủ
                            </a>
                        </li>
                        <li>
                            <a href="https://fb.com/bmn.2312" target="_blank">
                                Liên Hệ ADMIN
                            </a>
                        </li>
                        <li>
                            <a href="http://configcsvn.blogspot.com" target="_blank">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                   Copyright © <script>document.write(new Date().getFullYear())</script>
				   <a href="/"><?php echo $title; ?></a>, Bản Quyền Phiên Bản BMN2312!
                </p>
            </div>
        </footer>

    </div>
</body>
    <!--   Core JS Files   -->
    <script src="<?php echo $home; ?>/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo $home; ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo $home; ?>/assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo $home; ?>/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo $home; ?>/assets/js/bootstrap-notify.js"></script>

    <!-- Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo $home; ?>/assets/js/tomdz-thathinh-dashboard.js"></script>

	<!-- Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo $home; ?>/assets/js/demo.js"></script>
	



	<!--script type="text/javascript">
    	#(document).ready(function(){

        	demo.initChartist();

        	#.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>CuongPhieu.Me</b><br/> Giới thiệu Cho Bạn bè Để ủng Hộ mình nhé!"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script-->
	
	<script type="text/javascript">
	//<![CDATA[
		//Aloha
			shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"#",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="https://i.imgur.com/0gI7TBX.jpg"}),shortcut.add("F12",function(){top.location.href="https://i.imgur.com/0gI7TBX.jpg"}),shortcut.add("Ctrl+Shift+I",function(){top.location.href="https://i.imgur.com/0gI7TBX.jpg"}),shortcut.add("Ctrl+S",function(){top.location.href="https://i.imgur.com/0gI7TBX.jpg"}),shortcut.add("Ctrl+Shift+C",function(){top.location.href="https://i.imgur.com/0gI7TBX.jpg"});
	//]]>
	</script>	

</html>	