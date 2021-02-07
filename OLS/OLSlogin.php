<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		.header{
			align-self:center;
			width: 400px;
			height: 100px;
			text-align:center;
			font-family: sans-serif;
			font-size: 45px;
			color: white;
			background-color: #87ceeb;
			margin: 12% auto 0 auto;
			border-radius: 12px 12px 0 0 ;
			vertical-align: middle;
		}
		.header p{
			padding-top:20px;
		}
		.login-form {
			align-self: center;
			width: 400px;
			margin:0 auto 0 auto;
			background-color: white;
			border-radius: 0 0 12px 12px;
			position: relative;
			display: block;
		}
		.login-form input {
			
			outline: none;
			color:black;
			margin-left: 30px;
			width:300px;
			border:none;
			border-bottom: 1px solid grey;
			padding:20px; 
			text-align: center;
			position: relative;
		}
		.login-form div {
			margin-left: 70px;
		}
		#login-btn{
			width:150px;
			height: 50px;
			border-bottom:none;
			margin-left: 125px;
			margin-top: 25px;
			margin-bottom: 25px;
			background-color: #87ceeb;
		}
		#create-accnt{
			background-color: #87ceeb;
			margin: 0;
			padding-top: 10px;
			text-align: center;
			color: blue;
			border-radius: 0 0 12px 12px;
			padding-bottom: 10px;
		}
		#create-accnt a{
			text-decoration: none;
			color: blue;
		}
	</style>
</head>
<body style="margin:0;padding: 0;background-color: #D3D3D3">
	<div class="header">
		<p>Login</p>
	</div>
	<div class="login-form">
		<form method="post">
			<input id="username" type="text" name="username" placeholder="Username">
			<input id="password1" type="password" name="password1" placeholder="Password">
			<input id="login-btn" type="submit" name="login" value="Login">
			<div id="auth-error" style="display: none;">Username and Password does not match.</div>
		</form>
		<p id="create-accnt">Dont have an account ?<a href="#">Register-Here</a></p>
	</div>
	<script type="text/javascript">
		document.getElementById("login-btn").addEventListener('mouseenter',change3);
		document.getElementById("login-btn").addEventListener('mouseleave',change4);
		document.getElementById("username").addEventListener('click',change);
		document.getElementById("username").addEventListener('blur',change2);
		document.getElementById("password1").addEventListener('click',change);
		document.getElementById("password1").addEventListener('blur',change2);
		function change(){
			var id = this.attributes.id.value;
			document.getElementById(id).setAttribute("style","border-bottom:2px solid teal"); 
		}
		function change2(){
			var id = this.attributes.id.value;
			document.getElementById(id).setAttribute("style","border-bottom:1px solid grey"); 
		}
		function change3(){
			var id = this.attributes.id.value;
			document.getElementById(id).setAttribute("style","background-color:teal;color:white;"); 
		}
		function change4(){
			var id = this.attributes.id.value;
			document.getElementById(id).setAttribute("style","background-color:#87ceeb"); 
		}
	</script>

	<?php
		if(isset($_POST['login'])) {
			$notLogin;
			$uname = $_POST["username"];
			$pwd = $_POST["password1"];
			$result = $conn->query("SELECT * FROM USERS WHERE username='$uname' and password='$pwd'  ");
			$total = mysqli_num_rows($result);
			if($total == 0) {
				$notLogin = true;
			}
			else {
				$row = mysqli_fetch_array($result);
				$notLogin = false;
				$_SESSION['uname'] = $uname;
				$_SESSION['type'] = $row['type'];
				header('Location:index.php');
				exit;
			}
		}
	?>
	<script type="text/javascript">
		if("<?php echo $notLogin; ?>" == true) {
			document.getElementById('username').setAttribute('style','border-bottom:2px solid red');
			document.getElementById('password1').setAttribute('style','border-bottom:2px solid red');
			document.getElementById('auth-error').setAttribute('style','display:block');
		}
	</script>
</body>
</html>