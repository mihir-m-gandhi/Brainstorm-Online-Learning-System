<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
		body{
			width:100%;
			height: 100%;
			min-width: 800px;
			min-height:700px;
			position:absolute;
			overflow:scroll;
			margin:0;
			animation-duration:5s;
			animation-name :back;
			animation-direction:alternate;
			animation-iteration-count:infinite;


		}
		
		#course_page{
			width:100%;
			height:85%;
			margin:0;
			margin-top:2%;
			position:relative;
		}
		#btn_courses{
			background:#fff;
			color:#000;
			width:100%;
			height:20%;
		}
		#topic_tab{
			margin-top: 2%;
			height:80%;
			width:100%;
			position:relative;
		}
		#course_topic{
			height:100%;
			width:79%;
			left:22%;
			position:absolute;
		}
		#previous{
			height:5%;
			width:100%;
			position:relative;
		}
		#next{
			margin-top:2%;
			height:5%;
			width:100%;
			position:relative;
		}
		#btn_previous{
			height:100%;
			width:5%;
			left:46%;
			background: inherit;
			border:none;
			color: black;
			position:relative;
		}
		#btn_next{
			height:100%;
			width:5%;
			background: inherit;
			border:none;
			color: black;
			margin-left:46.5%;
			position:relative;
		}
		#course_offered{
			top:2%;
			height:70%;
			width: 20%;
			border:solid 2px black;
			overflow-y:scroll;
			position:absolute;
		}
		@keyframes back{
			from{background:lemonchiffon;}
			to{background:lightseagreen;}
		}

	</style>	
</head>



<body>
<?php include "OLSnavbar.php"; 
if(isset($_GET['id'])){
$cid = $_GET['id'];
}
else{
	$cid=1;
} ?>
<div id="course_page">
	<div  id="course_offered">


		<?php $mysqli = new mysqli("localhost","root","","online");
			$response = $mysqli->query("select * from courses");
			while($row = mysqli_fetch_array($response))
				{
		?>
	


		<button id="btn_courses" value="<?php	echo $row['id'] ;?>" onclick="fct(this.value)" >
			<h3><?php	echo $row['name'];?></h3>
		</button>



		<?php } ?>


	</div>

	<div id="course_topic">
		<div id="previous"><button id="btn_previous"><i class="fa fa-chevron-up" style="font-size: 300%;"></i></button></div>
		<div id="topic_tab"></div>
		<div id="next"><button id="btn_next"><i class="fa fa-chevron-down" style="font-size: 300%;"></i></button></div>
	</div>

</div><br>
<?php include "OLSfooter.php"; ?>;


<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_next").hide();
		$("#btn_previous").hide();
		var cid=<?php echo $cid ;?>;
		$.post("t1.php",{id:cid},function(data,status){
				$("#topic_tab").html(data);
				$("#btn_next").show();	
			});
	});
	function fct(d){
			$.post("t1.php",{id:d},function(data,status){
				$("#topic_tab").html(data);
				$("#btn_next").show();	
				$("#next").show();
			});
		}

</script>
</body>
</html>