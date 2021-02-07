<?php 
session_start();
if(isset($_SESSION['uname'])){
	$uname = $_SESSION['uname'];
	$utype = $_SESSION['type'];
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
			z-index: 99 !important;
			background-color: white;
			display: none;
			color:black;
			width:200px;
			position: relative;
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
			height:40px;
			width: 249px;
			display: block;
			margin: auto;
		}
		.search-bar input[type='text'] {
			outline: none;
			padding: 0px 40px;
			border-radius: 12px;
			border: none;
			height:100%;
		}
		.search-result {
			background-color: white;
			z-index: 999999 !important;
			position: absolute;
			margin-top: 17.5px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}
		.search-result a {
			display: block;
			padding:10px;
			text-decoration: none;
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
			<a href="index.php">
			<img src="brand-logo.png" onclick="">	
			</a>		
		</div>
		<div class="courses-dropdown">
			<p>Courses<i class="fa fa-caret-down"></i></p>
			<div class="dropdown-content">
				<?php 
					$conn = new mysqli("localhost", "root", "", "online");
					$result = $conn->query("SELECT name,id FROM courses");
					while($row =  mysqli_fetch_array($result)) {
						?>
						<a href="course_page.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
						<?php 
					}
				?>
			</div>
		</div>
		<div class="search-bar">
			<input type="text" name="" placeholder="Search for courses..">
					<div class="search-result clearfix">
						<script type="text/javascript">
							$(".search-bar input[type='text']").keyup(function(){
								if($(".search-bar input[type='text']").val() != ""){
									$('.search-result a').remove();
									var x = $(".search-bar input[type='text']").val();
									$.post('srch-result.php',{srch:x},function(data){
										var y = $.parseJSON(data);
										for(var i=0;i<y.length;i++){
											var temp = 'course_page.php?id=';
											var temp2 = y[i].id;
											var temp3 = temp.concat(temp2);
											var x = $('<a></a>').html(y[i].name).attr('href',temp3).appendTo('.search-result');
										}
									});
								}
								else{
									$('.search-result a').remove();
								}
							});
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
			if('<?php echo $uname; ?>'){
				$('.login a').html('<?php echo $uname; ?>');
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