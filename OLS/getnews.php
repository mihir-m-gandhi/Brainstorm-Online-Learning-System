<html>
<head>
	<title></title>
	<style type="text/css" media="screen">
		#heading{
			width:100%;
			top:0;
			height:20%;
			position:relative;
			background:#96cdcd;
		}
		#news_content{
			width:100%;
			height:60%;
			position:relative;
		}
		#writer{
			width:100%;
			height:20%;
			color:#00f	;
			position:relative;
		}
	</style>
</head>
<body>

<?php
$cdmy=$_POST['cdmy'];

		$mysqli=new mysqli("localhost","root","","online");
		$response=$mysqli->query("select * from dailynews where uploadDate='$cdmy'");
		$row=mysqli_fetch_array($response);
?>
<div id="heading">
<?php echo $row['topic']; ?>
</div>
<div id="news_content">
<?php echo $row['content']; ?>
</div>
<div id="writer">
<?php echo $row['author']; ?>
</div>
</body>
</html>
