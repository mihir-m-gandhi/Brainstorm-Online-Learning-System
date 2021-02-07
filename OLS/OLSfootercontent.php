<?php 
$x =  $_GET['dispCont'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="materialize.min.css">
	<script type="text/javascript" href="materialize.min.js"></script>
	<style type="text/css">
		#Teachers {
			display: none;
		}
		#Students {
			display: none;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col s12 m6 offset-m3">
				<div class="card blue-grey white-text">
					<div class="card-content">
						<span class="card-title"><?php echo $x ?></span>
						<p>This is a brief introduction of <?php echo $x ?></p>
						<div class="card-image" id="Teachers">
							<img src="1.jpg">
						</div>
						<div class="card-image" id="Students">
							<img src="2.jpg">
						</div>
					</div>
				</div>
		</div>
	</div>
	<script type="text/javascript">
		document.getElementById('<?php echo $x ?>').setAttribute('style','display:block;');
	</script>
</body>
</html>
