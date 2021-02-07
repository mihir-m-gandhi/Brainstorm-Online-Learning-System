<?php 
session_start();
if(isset($_SESSION['uname'])){
	$uname = $_SESSION['uname'];
	$utype = $_SESSION['utype'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body {
			margin:0;
			padding: 0;
		}
		nav {
			display: flex;
			position: relative;
			align-items: center;
			width:100%;
			min-width: 800px;
			height:75px;
			background-color: #333333;
		}
		.brand-logo {
			margin:0;
			padding: 0;
			height: 75px;
		}
		.courses-dropdown {
			height:75px;
			width:133px;
			color:white; 
		}
		.courses-dropdown p{
			margin: 0;
			height: 100%;
			width: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.courses-dropdown p i {
			height: 15px;
			width: 15px;
		}
		.courses-dropdown:hover {
			background-color: #2F4F4F;
		}
		.dropdown-content {
			display: none;
			color:black;
			width:200px;
			position: relative;
			z-index: 10;
			background: white;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}
		.dropdown-content a{
			display: block;
			padding:10px;
			text-decoration: none;
		}
		.dropdown-content a:hover {
			background-color: lightgrey;
		}
		.search-bar {
			height:100%;
			width: 249px;
			display: block;
			margin: auto;
			padding-top: 20px;
		}
		.search-bar input[type='text'] {
			outline: none;
			padding: 0px 40px;
			border-radius: 12px;
			border: none;
			height:50%;
		}
		.search-result {
			padding-top: 20px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index:10000;
			position: absolute;
		}
		.search-result a {
			display: block;
			z-index:10;
			padding:10px;
			text-decoration: none;
			background: white;
		}
		.search-result a:hover {
			background-color: lightgrey;

		}
		.login {
			height: 100%;
			width: 133px;
		}
		.login a{
			text-decoration: none;
			color: white;
			width:100%;
			height:100%;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.login a:hover{
			background-color: grey;
		}
		.register {
			height: 100%;
			width: 133px;
		}
		.register a{
			text-decoration: none;
			color: white;
			width:100%;
			height:100%;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.register a:hover{
			background-color: grey;
		}
	</style>
</head>
<body>
	<nav>
		<div class="brand-logo">
			<img src="brand-logo.png">			
		</div>
		<div class="courses-dropdown">
			<p>Courses<i class="fa fa-caret-down"></i></p>
			<div class="dropdown-content">
				<?php 
					$conn = new mysqli("localhost", "root", "", "online");
					$result = $conn->query("SELECT * FROM courses");
					while($row =  mysqli_fetch_array($result)) {
						?>
						<a href="course_page.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?></a>
						<?php 
					}
				?>
			</div>
		</div>
		<div class="search-bar">
			<input type="text" name="" placeholder="Search for courses..">
					<div class="search-result">
						<script type="text/javascript">
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
		});]
						</script>
						<?php 
							if( isset($_POST["srch"])) {
							   $name = $_POST['srch'];
							   echo "Welcome ". $name;
							}
						?>
					</div>
		</div>
		<div class="login">
			<a href="OLSlogin.php">Login</a>
		</div>
		<div class="register">
			<a href="OLSregistration.php">Sign-Up</a>
		</div>
	</nav>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".courses-dropdown").hover(function(){
				$('.dropdown-content').css('display','block');
			});
			$(".courses-dropdown").mouseleave(function(){
				$('.dropdown-content').css('display','none');
			});
		});
	</script>
	<script type="text/javascript">
		function checkActiveUser(){
			if('<?php echo $uname ?>'){
				$('.login a').html('<?php echo $uname ?>');
				$('.login a').attr('href','#');
				$('.register a').html('Logout');
				$('.register a').attr('href','OLSlogout.php');
			}
			else{
				$('.login a').html('Login');
				$('.login a').attr('href','OLSlogin.php');
				$('.register a').html('Sign-Up');
				$('.register a').attr('href','OLSregistration.php');
			}
		}	
		checkActiveUser();
	</script>
</body>
</html>