<?php
session_start();
$uname = "";
if(isset($_SESSION['uname'])) {
	$uname = $_SESSION['uname'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Index Page</title>
</head>
<body>
	<div class="navbar" id="navbar">
		<ul>
			<li id="logo"><a href="#" >BrainStorm</a></li>	
			<li id="courses" ><a href="#">Courses <i class="fa fa-caret-down"></i></a>
				<div class="dropdown-content" style="position: absolute;margin :20px 0 0 0;">
					<?php $mysqli=new mysqli("localhost","root","","online");
					$result = $mysqli->query("select * from courses");
					while ($row=mysqli_fetch_array($result)){
						$id = $row['name'];
					 ?>
					<a href="course_page.php?id=<?php echo $row['id']; ?>" style="color: blue"><?php echo $row['name']; ?></a>
					<?php } ?>
				</div>
			</li>
			<li id="search-bar">
				<form method="POST" action="#" style="margin:0;">
					<input id="nav_search_bar" type="text" name="nav_search_bar" placeholder="Search Here..">
				</form>
				<div id="find_dropdown" style="position: absolute;height:200%;width:25%;z-index:999;display:block;overflow:hidden;">
				</div>
			</li>
			<li id="login" ><a id="log-a" href="">Login</a></li>
			<li id="sign-up"><a id="sign-a" href="">Sign-Up</a></li>
		</ul>
	</div>
	<script type="text/javascript">
			function checkActiveUser() {
				if("<?php echo $uname; ?>" != "") {
					document.getElementById('log-a').innerHTML = "Logout";
					document.getElementById('log-a').href = "OLSlogout.php";
					document.getElementById('sign-a').innerHTML = "<?php echo $uname ?>";
					document.getElementById('sign-a').href = "";
				}
				else {
					document.getElementById('log-a').innerHTML = "Login";
					document.getElementById('log-a').href = "OLSlogin.php";
					document.getElementById('sign-a').innerHTML = "Sign-Up";
					document.getElementById('sign-a').href = "OLSregistration.php";
				}
			}
			checkActiveUser();
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		
		$("#nav_search_bar").on("keyup",function(){
			var search=document.getElementById("nav_search_bar").value;
			console.log(search);
			if(search=="")
				document.getElementById("find_dropdown").style.display="none";
			else
				document.getElementById("find_dropdown").style.display="block";
			$.post("find.php",{search:search},function(data,status){
				$("#find_dropdown").html(data);
					
			});
		});


	});</script>
</body>
</html>