<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title></title>
	<style type="text/css" media="screen">
		body{
			min-width:800px;
			height: 100%;
			width: 100%;
			min-height:660px;
			position:absolute;
			overflow:scroll;
			margin:0;
		}
		#btn_control{
			height:55px;
			width:55px;
			top:85%;
			left:90%;
			border-radius: 100%;
			display: none;
			position:fixed;
			border:none;
			z-index:9999;
			background:#f00;
		}
		#btn_news{
			height:55px;
			width:55px;
			top:74%;
			left:90%;
			border:none;
			border-radius: 50%;
			position:fixed;
			z-index:9999;
			background:#f00;
			display:none;			
		}
		#btn_upload{
			height:55px;
			width:55px;
			top:63%;
			border:none;
			left:90%;
			position:fixed;
			z-index:9999;
			background:#f00;
			border-radius: 50%;
			display:none;			
		}
		#btn_manage{
			height:55px;
			width:55px;
			border-radius: 50%;
			top:52%;
			left:90%;
			border:none;
			position:fixed;
			z-index:9999;
			background:#f00;
			display:none;			
		}
		#body_center{
			width:100%;
			height:50%;
			margin:0;
			position:relative;
		}
		#body_image{
			height:100%;
			width:65%;
			float:left;
			overflow:hidden;
position: absolute;
		}
		#body_news{
			height:100%;
			width:35%;
			float:right;
			overflow:hidden;
		}
		#image{z-index: -1;
			width:100%;
			height:100%;
		}
		#btn_tocourses{
			height:10%;
			width:15%;
			left:10%;
			top:70%;
			position:absolute;
			background:#ffefd5;
			padding:0;
			margin:0;
			border:0;
		}
		#btn_tocourses : hover {
			background : aquamarine;
			color : black;
		}

	</style>
</head>
<body>
<?php include "OLSnavbar.php"; 
if(!isset($_SESSION)){
    session_start();
}
?>
	<div id="body_center">
		<div id="body_image">

			<img id="image" src="home.jpg">
			<button class="btn_tocourses" id="btn_tocourses" onclick="window.location.href='course_page.php'"><strong>Lets Get Started</strong></button>
		</div>
		<div id="body_news">this is for news</div>
	</div>
	<?php include "OLSfooter.php" ;?>

	<script type="text/javascript">
		$(document).ready(function(){
			var d=new Date();
			var cdmy=d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
			$.post("getnews.php",{cdmy:cdmy},function(data,status){
				$("#body_news").html(data)
			});

		});
	</script>
<button id="btn_control" >+</button>
<button id="btn_news" onclick="window.location.href='news_page.php'"><i class="fa fa-newspaper-o" style="font-size:24px"></i></button>
<button id="btn_manage" onclick="window.location.href='admin_page.php'"><i class="fa fa-gear" style="font-size:24px"></i></button>
<button id="btn_upload" onclick="window.location.href='upload_page.php'"><i class="fa fa-upload" style="font-size:24px"></i></button>

<script type="text/javascript">
$(document).ready(function(){
	var btn_news = document.getElementById("btn_news");
	var btn_manage = document.getElementById("btn_manage");
	var btn_upload = document.getElementById("btn_upload");
	var type=<?php echo $_SESSION['type']; ?>;
	if(type!=3){
		document.getElementById("btn_control").style.display="block";
	}
});

$("#btn_control").click(function(){
	$("#btn_upload").toggle();
 	var type=<?php echo $_SESSION['type']; ?>;
	if(type==1){//admin
		
		btn_news.style.display="block";
		btn_manage.style.display="block";
		btn_upload.style.display="block";
	}
	else if(type==2){
		btn_news.style.display="none";
		btn_manage.style.display="none";
		btn_upload.style.display="block";

	}
	else if(type==3){
		btn_news.style.display="none";
		btn_manage.style.display="none";
		btn_upload.style.display="none";
	}
});


</script>
</body>
</html>