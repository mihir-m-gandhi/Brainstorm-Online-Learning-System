<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
	body{
		height:100%;
		width:100%;
		position:absolute;
	}		
	.topic_box{
		background:#fff;
		color:#000;
		width:45%;
		height:45%;
		margin:2%;
		float:left;
		position:relative;
	}
	</style>	
</head>
<body>
<?php
if(isset($_POST['id'])){
	$id = $_POST['id'];	
}




	$mysqli = new mysqli("localhost","root","","online");
	$response = $mysqli->query("select * from topics where cid='$id'");
?>


<div class="topic_box" id="topic_box1"></div>

<div class="topic_box" id="topic_box2"></div>

<div class="topic_box" id="topic_box3"></div>

<div class="topic_box" id="topic_box4"></div>

<script type="text/javascript">
var list=[];


		<?php
			while($row = mysqli_fetch_array($response))
			{
		?>
		
		list.push(<?php echo $row['id']; ?>) ;
		console.log(list.length);
		<?php } ?>
	//	console.log(list.length);</script>

<script type="text/javascript">
	$(document).ready(function(){
		var num1 = <?php echo mysqli_num_rows($response);?>;
		var num2=0;
		$('#btn_previous').hide();
		$.post("t2.php",{id:list[num2],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box1").html(data);	
		});
		num2++;
		if(num2==list.length){
			$('#next').hide();
			$('#btn_next').hide();
			$('#topic_box2').hide();
			$('#topic_box3').hide();
			$('#topic_box4').hide();
		}
		$.post("t2.php",{id:list[num2],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box2").html(data);	
		});
		num2++;
		if(num2==list.length){
			$('#btn_next').hide();
			$('#topic_box3').hide();
			$('#topic_box4').hide();
		}
		$.post("t2.php",{id:list[num2],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box3").html(data);	
		});
		num2++;
		if(num2==list.length){
			$('#btn_next').hide();
			$('#topic_box4').hide();
		}
		$.post("t2.php",{id:list[num2],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box4").html(data);	
		});

		num2++;
		if(num2==list.length){
			$('#btn_next').hide();

		}
	
	var i=2;
	$('#btn_next').click(function(){
		$.post("t2.php",{id:list[i],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box1").html(data);		
		});

		
			$('#btn_previous').show();
		
 
		$.post("t2.php",{id:list[i+1],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box2").html(data);		
		});		
		i+=2;
		

		if(i+1==list.length){
			$('#btn_next').hide();
			$('#topic_box4').hide();
			$.post("t2.php",{id:list[i],cid:<?php echo $id; ?>},function(data,status){
				$("#topic_box3").html(data);	
			});
		}
		else{
			$.post("t2.php",{id:list[i],cid:<?php echo $id; ?>},function(data,status){
				$("#topic_box3").html(data);	
			});
			$.post("t2.php",{id:list[i+1],cid:<?php echo $id; ?>},function(data,status){
				$("#topic_box4").html(data);		
			});	
			if(i+2==list.length){
			$('#btn_next').hide();
		}	
		}	

		});
	$('#btn_previous').click(function(){
		i=i-2;
		console.log(i);
		$.post("t2.php",{id:list[i-2],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box1").html(data);		
		});
 
		$.post("t2.php",{id:list[i-1],cid:<?php echo $id; ?>},function(data,status){
			$("#topic_box2").html(data);		
		});		

		if(i==2){
			$('#btn_previous').hide();
		}
		$('#btn_next').show();
			$.post("t2.php",{id:list[i],cid:<?php echo $id; ?>},function(data,status){
				$("#topic_box3").html(data);	
			});


			$.post("t2.php",{id:list[i+1],cid:<?php echo $id; ?>	},function(data,status){
				$("#topic_box4").html(data);		
			});		
			$('#topic_box1').show();
			$('#topic_box2').show();
			$('#topic_box3').show();
			$('#topic_box4').show();

	});
		
	});
</script>
</body>
</html>