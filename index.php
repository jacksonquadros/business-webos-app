<?php
session_start();

if (!isset($_SESSION['user_id_web'])) {
header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<script src="js/jquery.js"/></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/iscroll.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/jquery.form.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	
	
  </head>
  <body>
<ul class='custom-menu'>
	<li data-action="first">Settings</li>
	<li data-action="second">Toggle fullscreen</li>
</ul>
  
<div id="music_p" title="Music Player" style="display:none;">
  
</div>

<div id="edt_dialog" title="Now Edit" style="display:none;">
  
</div>

<div id="calcu" title="Calculator" style="display:none;">
  
</div>
	
<div id="recycle_dialog" title="Recycle Bin" style="display:none;">

</div>

<div id="dialog" title="File manager" style="display:none;">
  
</div>

<div id="settings_box" title="Settings" style="display:none;">
	<div>
	<h4>Change Background</h4>
	<div class="bg_imgs">
		<img src="images/backgrounds/bg1.png" onclick="get_bg('bg1')"/>
		<img src="images/backgrounds/bg2.jpg" onclick="get_bg('bg2')"/>
		<img src="images/backgrounds/bg3.png" onclick="get_bg('bg3')"/>
		<img src="images/backgrounds/bg4.jpg" onclick="get_bg('bg4')"/>
		<img src="images/backgrounds/bg5.png" onclick="get_bg('bg5')"/>
		<img src="images/backgrounds/bg6.png" onclick="get_bg('bg6')"/>
		<img src="images/backgrounds/bg7.png" onclick="get_bg('bg7')"/>
		<img src="images/backgrounds/bg8.png" onclick="get_bg('bg8')"/>
		<img src="images/backgrounds/bg9.png" onclick="get_bg('bg9')"/>
		<img src="images/backgrounds/bg10.png" onclick="get_bg('bg10')"/>
	</div>
	</div>
</div>

<div id="dialog1" title="File manager">
  
</div>
	
	<div class="desktop_div">
		<div class="icon_block" id="icon_block">
			<div class="icon_app" id="fm">
				<i class="fa fa-desktop"></i>
				<p>File manager</p>
			</div>
			
			<div class="icon_app" id="rb">
				<i class="fa fa-trash" aria-hidden="true"></i>
				<p>Recycle bin</p>
			</div>
			
			<div class="icon_app" id="edt">
				<i class="fa fa-file-text-o"></i>
				<p>Now Editor</p>
			</div>
			
			<div class="icon_app" id="calc">
				<i class="fa fa-calculator" aria-hidden="true"></i>
				<p>Calculator</p>
			</div>
			
			<div class="icon_app" id="mp">
				<i class="fa fa-music" aria-hidden="true"></i>
				<p>Music Player</p>
			</div>
			
			<div class="icon_app" id="pg">
				<i class="fa fa-gamepad" aria-hidden="true"></i>
				<p>Pong Game</p>
			</div>
		</div>
		
		<div class="file_manager_div" id="file_manager_div">
			
		</div>
		
	</div>
	
	<div class="right_notification_div">
		<!--<p class="notification_header">Notifications</p>-->
		<div class="natification_main">
			<br/>
			<div class="weather_time">
				<div id="clock" style="font-size:35px;padding-top:5px;text-align:center;"></div>
				<div id="temper" style="font-size:35px;padding-top:0px;text-align:center;"></div>
				<div id="location" style="font-size:15px;padding:0px;text-align:center;"></div>
			</div>
			
			<div class="all_notify">
			
				
			</div>
			
		</div>
		
		<div class="notification_bottom">
			<div class="noti_bottom_icon" id="multitask">
				<i class="fa fa-object-ungroup" onclick="toggleFullScreen()"></i>
			</div>
			<div class="noti_bottom_icon" id="settings">
				<i class="fa fa-cog"></i>
			</div>
			<div class="noti_bottom_icon" id="logout">
				<i class="fa fa-power-off" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	
	<!--<div class="task_bar_div">
		<div><i class="fa fa-modx" style="font-size:40px;padding:5px;"></i></div>
	</div>-->
<!--<script src="js/custom_right_menu.js"></script>-->	
	<script>
$('body').on( 'dblclick','.temp_notify_music',function(){
$("#temp_music").remove();
$( "#music_p" ).dialog( "close" );
$(this).hide();
});
	//change background
	//$('.desktop_div').css('background-image', 'url("images/backgrounds/bg8.png")');
	get_bg("no");
	function get_bg(gt_val)
	{
		console.log(gt_val);
		$.ajax({
		type: "POST",
		url: "change_bg.php",
		data: {'bg_sel':  gt_val },
		success: function(dcode_cat){
		//alert(dcode_cat);
			$('.desktop_div').css('background-image', 'url("'+dcode_cat+'")');
		}
		});
	}
	
	
	/*$.ajax({
	type: "GET",
	url: "get_page.php",
	data: {'d_cat': "'" + dress_code_cat + "'"},
	success: function(dcode_cat){
	$.each(dcode_cat, function (m, cat) {
    dress_code_cats += '<li class="dress_code_boxes"><input type="radio" name="dress_code" id="'+ cat.d_id +'" style=" float: right;margin-left:81px;margin-top:7px;z-index:0;position:absolute;"/><label for="'+ cat.d_id +'"><img src="images/dress_code/'+ cat.d_img_path +'"/></label></li>';
	});
	//console.log(dress_code_cats);
	$("#dress_code").html(dress_code_cats)
	},
	dataType: 'json'
	});*/
	
getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
var url="http://api.openweathermap.org/data/2.5/weather?lat="+position.coords.latitude+"&lon="+position.coords.longitude+"&appid=8ced6f93e38877d191bee69e70b8a725&units=metric";

$.get(url, function( data ) {
  //console.log( data );
	//console.log(data);
	//console.log(data.name);

//get date
var fullDate = new Date()
//console.log(fullDate);
//Thu May 19 2011 17:25:38 GMT+1000 {}
 
//convert month to 2 digits
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
 
var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
//end date
	
	
	//console.log(data.main.temp);
	var weather_stt="";
	$.each(data.weather, function (m, r_data) {
		weather_stt=r_data.main;
	});
	$("#temper").html(data.main.temp +" &#8451;");
	$("#location").html('<i class="fa fa-map-marker" aria-hidden="true"></i> '+data.name+' <br/><i class="fa fa-calendar" aria-hidden="true"></i> '+currentDate+'&nbsp;&nbsp;<i class="fa fa-cloud" aria-hidden="true"></i> '+weather_stt);
});

}
	$( "#file_manager_div" ).load( "plugins/file_manager/index.html" );
	$('#fm').dblclick(function(){
		$( "#file_manager_div" ).show();
		$( "#icon_block" ).hide();
		
		//$( "#dialog" ).dialog({width: 1000, height: 400});
		
	});
	
	$('#rb').dblclick(function(){
		$( "#recycle_dialog" ).dialog({width: 1000});
		$( "#recycle_dialog" ).load( "plugins/file_manager/recycle_bin.html" );
		
	});
	
	$('#edt').dblclick(function(){
		$( "#edt_dialog" ).dialog({width: 1000});
		$( "#edt_dialog" ).load( "plugins/now_editor/index.html" );
		
	});
	
	$('#calc').dblclick(function(){
		$( "#calcu" ).dialog({width: 410});
		$( "#calcu" ).load( "plugins/calculator/index.html" );
		
	});
	
	$('#mp').dblclick(function(){
		
		if($('#temp_music').length!==0)
		{
			$( "#music_p" ).dialog({width: 500});
		}else{
			$( "#music_p" ).dialog({width: 500});
			$( "#music_p" ).load( "plugins/music_player/index.html" );
			$(".all_notify").append('<div style="overflow:hidden;margin:0px;background:#D4E157;margin:2px;padding:5px;text-align:center;border-radius:2px;" class="temp_notify_music"><p>Double click here to quit Music Player</p></div>');
		}
		
		
	});
	
	$('#settings').click(function(){
		$( "#settings_box" ).dialog();
		$( "#settings_box" ).dialog({width: 1000,height:600});
		//$( "#settings_box" ).load( "plugins/calculator/index.html" );
		
	});
	
	$('#pg').dblclick(function(){
		window.open('plugins/pong/pong.html','','fullscreen=yes')
		
	});
	
	$('#logout').click(function(){
		window.location.href="logout.php";
	});


setInterval(function(){

        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Add leading zeros
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;
        hours = (hours < 10 ? "0" : "") + hours;

        // Compose the string for display
        var currentTimeString = hours + ":" + minutes + ":" + seconds;
        $("#clock").html('<i class="fa fa-clock-o" aria-hidden="true"></i> '+currentTimeString);

},1000);


function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}

var myScroll;

function loaded () {
	myScroll = new IScroll('.natification_main', {
		scrollbars: true,
		mouseWheel: true,
		interactiveScrollbars: true,
		shrinkScrollbars: 'scale',
		fadeScrollbars: true
	});
}

window.onbeforeunload = function(evt) {
            var message = 'Are you sure you want to leave...';
            if (typeof evt == 'undefined') {
                evt = window.event;
            }       
            if (evt) {
                evt.returnValue = message;
            }
            return message;
        } 
	</script>
	<script type="text/javascript" src="cke/ckeditor.js"></script>
  </body>
</html> 