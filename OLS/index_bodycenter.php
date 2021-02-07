<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title></title>
	<style type="text/css" media="screen">

		#body_center{
			width:100%;
			height:50%;
			margin:0;
			margin-top:2%;
			position:fixed;
		}
		#body_image{
			height:100%;
			width:65%;
			float:left;
			overflow:hidden;

		}
		#body_news{
			height:100%;
			width:35%;
			float:right;
			overflow:hidden;
		}
		#image{
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


	</style>
</head>
<body>
	<div id="body_center">
		<div id="body_image">
			<img id="image" src="home.jpg">
			<button id="btn_tocourses" onclick="window.location.href='course_page.php'"><strong>Lets Get Started</strong></button>
		</div>
		<div id="body_news">this is for news</div>

	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			var d=new Date();
			var cdmy=d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear();
			$.post("getnews.php",{cdmy:cdmy},function(data,status){
				$("#body_news").html(data)
			});

		});
	</script>
			

</body>
</html>