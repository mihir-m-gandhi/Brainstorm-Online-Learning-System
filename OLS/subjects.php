<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>BRAINSTORM-Videos</title>
	<style type="text/css">

		body {
			min-width: 630px;
			overflow: scroll;
			animation-duration:5s;
			animation-name :back;
			animation-direction:alternate;
			animation-iteration-count:infinite;
		}

		#left{
			width: 15%;
			padding-left: 30px;
			padding-top: 30px;
			padding-bottom: 30px;
			float: left;
			display: inline-block;
		}

		#center{
			width: 60%;
			padding-top: 30px;
			padding-bottom: 30px;
			display: inline-block;
		}

		#right{
			width: 15%;
			float: right;
			padding-top: 30px;
			padding-bottom: 30px;
			display: inline-block;
		}

		@keyframes back{
			from{background:lemonchiffon;}
			to{background:lightseagreen;}
		}

		#btn_topic{
			padding: 5px;
			width: 140px;
			border-radius: 8px;
		}
		
		#btn_content{
			padding: 5px;
			width: 140px;
			border-radius: 8px;
		}

		#videoText{
			text-align: center;
		}

	</style>
	
</head>

<body>
<?php include "OLSnavbar.php"; ?>

		<div id="left" class="column">
			<h3>Topics</h3>


			<?php $mysqli = new mysqli("localhost","root","","online");
			if(isset($_GET['id']))
				$id=$_GET['id'];
			if(isset($_GET['cid']))
				$cid=$_GET['cid'];
			$response = $mysqli->query("select * from topics where cid='$cid'");
			while($row = mysqli_fetch_array($response))
				{

				?><div id="topic_left">
					<button id="btn_topic" value="<?php	echo $row['id'] ;?>" onclick="fct(this.value)">
					<?php	echo $row['Name'];?>
					</button>
					<br/>
					<br/>
				</div>

				<?php } ?>
		</div>

		<div id="center" class="column">	
			<h3 id="videoText">Your video or document will appear here...</h3>					
		</div>

		<div id="right" class="column">
			<h3>PLAYLIST</h3>
		</div>

	</div>

	<?php include "OLSfooter.php"; ?>

	<script type="text/javascript">
		$(document).ready(function(){
			console.log(<?php echo $id; ?>+<?php echo $cid; ?>);
			$.post("t3.php",{id:<?php echo $id; ?>},function(data,status){
						$("#right").html(data);	
					});
	});

		function fct(d){
			console.log(d);
				$.post("t3.php",{id:d},function(data,status){
					$("#right").html(data);	
				});
			}
	</script>

</body>

</html>