<style type="text/css" media="screen">
	#title{
		height:40%;
		width:100%;
		background:inherit;
		position:relative;
		word-wrap: break-word;
		overflow:hidden;
	}
	#description{
		height:45%;
		width:100%;
		background:lightslategrey;
		position:relative;
		word-wrap: break-word;
		overflow:hidden;
	}
	#view{
		height:15%;
		width:100%;
		position:relative;
	}
	#btn_view{
		text-align: center;
		height:100%;
		width:30%;
		float:right;
		background:aquamarine;
	}
	#enroll{
		text-align: center;
		height:100%;
		width:30%;
		float:left;
		background:aquamarine;
	}
</style>
<body>
<?php
if(!isset($_SESSION))
	session_start();

if(isset($_POST['id']))
	$id = $_POST['id'];	

if(isset($_POST['cid']))
	$cid = $_POST['cid'];	

	$mysqli = new mysqli("localhost","root","","online");
	$response = $mysqli->query("select * from topics where id='$id'");
	$row = mysqli_fetch_array($response);

?>

<div id="title">
<?php echo $row['Name']; ?>
</div>
<div id="description">
<?php echo $row['Description']; ?>
</div>

<div id="view">
	<a id ="enroll"  onclick=" enrollLink(<?php echo $id; ?>)" href="enroll.php?cid=<?php echo $cid; ?>&id=<?php echo $id; ?>" >ENROLL</a>
<a id="btn_view"  onclick =" enrollCheck(<?php echo $cid; ?>)" href="subjects.php?cid=<?php echo $cid; ?>&id=<?php echo $id; ?>">VIEW</a></div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

});						
		function enrollLink(d){
			<?php if(empty($_SESSION) ){?>
				alert("please login ");
				$("#enroll").attr("href", "#");
			<?php }		?>

		}
		function enrollCheck(cid){
			var flag=0,list1=[];
			<?php if(empty($_SESSION) ){?>
				//	alert("please login ");
				$("#btn_view").attr("href", "#");
			<?php }
			else{
				$result=$mysqli->query("select * from enroll  where uid='".$_SESSION["id"]."'");
				while($row1=mysqli_fetch_array($result)){?>
					list1.push(<?php echo $row1['cid']; ?>);	

			<?php } }		?>
			var i=0;
			while(i<list1.length){
				if(cid==list1[i]){
					flag=1;	
				}
				i++;
			}
			if(flag==0){
				$("#btn_view").attr("href", "#");
				alert("please enroll course");
			}
			else{
					//window.localStorage.setItem("cid".$cid);

					$("#btn_view").attr("href", "subjects.php?cid=<?php echo $cid; ?>&id=<?php echo $id; ?>");
			}


		}



</script>
</body>