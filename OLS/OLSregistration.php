<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
			margin: 4% auto 0 auto;
			border-radius: 12px 12px 0 0 ;
			vertical-align: middle;
			position: relative;
		}
		.header p{
			padding-top:20px;
		}
		.register-form {
			align-self: center;
			width: 400px;
			margin:0 auto 0 auto;
			background-color: white;
			border-radius: 0 0 12px 12px;
			position: relative;
			display: block;
		}
		.register-form input {
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
		.register-form div{
			margin-left: 30px;
			width:300px;
		}
		#register-btn{
			width:150px;
			height: 50px;
			border-bottom:none;
			margin-left: 125px;
			margin-top: 25px;
			margin-bottom: 25px;
			background-color: #87ceeb;
		}
		#already-accnt{
			background-color: #87ceeb;
			margin: 0;
			padding-top: 10px;
			text-align: center;
			color: blue;
			border-radius: 0 0 12px 12px;
			padding-bottom: 10px;
		}
		#already-accnt a{
			text-decoration: none;
			color: blue;
		}
		input[type="date"]::-webkit-clear-button {
    		display: none;
		}
		input[type="date"]::-webkit-inner-spin-button { 
    		display: none;
		}
		input[type="date"]::-webkit-calendar-picker-indicator {
    		color: #2c3e50;
		}
	</style>
</head>
<body style="margin:0;padding: 0;background-color: #D3D3D3">
	<div style="position: relative;">
		<div class="header">
			<p>Register</p>
		</div>
		<div class="register-form">
			<form>
				<input id="full-name" type="text" name="full-name" placeholder="Full Name">
				<div id="name-error" style="display: none"></div>
				<input id="username" type="text" name="username" placeholder="Username">
				<div id="uname-error" style="display: none"></div>
				<input id="dob" type="date" name="dob" data-date-format="Date Of Birth" value="">
				<div id="dob-error" style="display: none"></div>
				<p style="display:flex;justify-content: center;width: 300px;margin-top: 0;margin-bottom:0;margin-left: 30px;padding: 20px ;border-bottom: 1px solid grey">
					<span style="padding:0 10px;"><input type="checkbox" id="box1" style="margin: 0;width:20px" value="3" checked="true"><label>Student</label></span>
					<span style="padding:0 10px;"><input type="checkbox" id="box2" style="margin: 0;width:20px" value="2"><label>Teacher</label></span>
				</p>
				<input id="e-mail" type="email" name="email" placeholder="E-mail">
				<div id="email-error" style="display: none"></div>
				<input id="password1" type="password" name="password1" placeholder="Password">
				<div id="pass1-error" style="display: none"></div>
				<input id="password2" type="password" name="password2" placeholder="Confirm Password">
				<div id="pass2-error" style="display: none"></div>
				<input id="register-btn" type="button" name="register" value="Register" onclick="formValidate()">
				<div id="registered" style="display:none;">Registeration Successfull</div>
			</form>
			<p id="already-accnt">Already have an account ?<a href="OLSlogin.php">Sign-In</a></p>
		</div>
	</div>
	<script>
		document.getElementById("register-btn").addEventListener('mouseenter',change3);
		document.getElementById("register-btn").addEventListener('mouseleave',change4);
		document.getElementById("full-name").addEventListener('click',change);
		document.getElementById("username").addEventListener('click',change);
		document.getElementById("dob").addEventListener('click',change);
		document.getElementById("e-mail").addEventListener('click',change);
		document.getElementById("password1").addEventListener('click',change);
		document.getElementById("password2").addEventListener('click',change);
		document.getElementById("full-name").addEventListener('blur',change2);
		document.getElementById("username").addEventListener('blur',change2);
		document.getElementById("dob").addEventListener('blur',change2);
		document.getElementById("e-mail").addEventListener('blur',change2);
		document.getElementById("password1").addEventListener('blur',change2);
		document.getElementById("password2").addEventListener('blur',change2);
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
		function email1(mail) 
		{
		 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
		  {
		    return (true)
		  }
		    return (false)
		}
		$(document).ready(function(){
			$('#box1').click(function(){
				if ($(this).prop('checked')==true) {
					$('#box2').prop('checked',false);
				}
			})
			$('#box2').click(function(){
				if ($(this).prop('checked')==true) {
					$('#box1').prop('checked',false);
				}
			})
		});

			function boxvalue(){
				if($('#box1').prop('checked')==true){
					return $('#box1').val()
				}
				else{
					return $('#box2').val()
				}
			}

			function formValidate(){
			boxvalue();
			var a =0;
			var b={
				fname:document.getElementById("full-name").value,
				uname:document.getElementById("username").value,
				dob:document.getElementById("dob").value,
				email:document.getElementById("e-mail").value,
				pass1:document.getElementById("password1").value,
				utype:boxvalue(),
			};
			if(b.fname==""){
				a = 1;
				document.getElementById("name-error").innerHTML ="Name  must  be  filled.";
				document.getElementById("name-error").setAttribute("style","display:block;");
				document.getElementById("full-name").setAttribute("style","border-bottom:2px solid #CD5C5C	");
			}
			else {
				a = 0;
				document.getElementById("full-name").setAttribute("style","border-bottom:2px solid green");
				document.getElementById("name-error").setAttribute("style","display:none;");
			}
			if(b.uname == ""){
				a = 1;
				document.getElementById("uname-error").innerHTML ="Username  must  be  filled.";
				document.getElementById("uname-error").setAttribute("style","display:block;");
				document.getElementById("username").setAttribute("style","border-bottom:2px solid #CD5C5C	");
			}
			else if(b.uname.length < 5){
				a = 1;
				document.getElementById("username").setAttribute("style","border-bottom:2px solid #CD5C5C	");
				document.getElementById("uname-error").innerHTML ="Username  must  be  five  charachters  or  more.";
			}
			else{
				a = 0;
				document.getElementById("username").setAttribute("style","border-bottom:2px solid green");
				document.getElementById("uname-error").setAttribute("style","display:none;");
			}
			if(b.dob == "") {
				a = 1;
				document.getElementById("dob-error").innerHTML ="Enter  correct  date  of  birth.";
				document.getElementById("dob-error").setAttribute("style","display:block;");
				document.getElementById("dob").setAttribute("style","border-bottom:2px solid #CD5C5C	");
			}
			else {
				a = 0;
				document.getElementById("dob").setAttribute("style","border-bottom:2px solid green");
				document.getElementById("dob-error").setAttribute("style","display:none;");
			}
			if(b.email == "") {
				a = 1;
				document.getElementById("email-error").innerHTML ="Enter  E-mail  ID.";
				document.getElementById("email-error").setAttribute("style","display:block;");
				document.getElementById("e-mail").setAttribute("style","border-bottom:2px solid #CD5C5C");
			}
			else if(email1(b.email) == false){
				a=1;
				document.getElementById("email-error").innerHTML ="Incorrect Email";
				document.getElementById("email-error").setAttribute("style","display:block;");
				document.getElementById("e-mail").setAttribute("style","border-bottom:2px solid #CD5C5C");
			}
			else {
				a = 0;
				document.getElementById("e-mail").setAttribute("style","border-bottom:2px solid green");
				document.getElementById("email-error").setAttribute("style","display:none;");
			}
			if(b.pass1 == "") {
				a = 1;
				document.getElementById("pass1-error").innerHTML ="Enter  Password";
				document.getElementById("pass1-error").setAttribute("style","display:block;");
				document.getElementById("password1").setAttribute("style","border-bottom:2px solid #CD5C5C");
			}
			else {
				a = 0;
				document.getElementById("password1").setAttribute("style","border-bottom:2px solid green");
				document.getElementById("pass1-error").setAttribute("style","display:none;");
			}
			if(document.getElementById("password2").value == "") {
				a = 1;
				document.getElementById("pass2-error").innerHTML ="Confirm  Password";
				document.getElementById("pass2-error").setAttribute("style","display:block;");
				document.getElementById("password2").setAttribute("style","border-bottom:2px solid #CD5C5C");
			}
			else if(b.pass1 != document.getElementById("password2").value){
				a = 1;
				document.getElementById("pass2-error").innerHTML ="Password  does  not  match.";
				document.getElementById("pass2-error").setAttribute("style","display:block;");
				document.getElementById("password2").setAttribute("style","border-bottom:2px solid #CD5C5C");
			}
			else {
				a = 0;
				document.getElementById("password2").setAttribute("style","border-bottom:2px solid green");
				document.getElementById("pass2-error").setAttribute("style","display:none;");
			}
			if(a == 0){
				var r = confirm("Confirm Form Submission");
				if( r == true) {
					var myjson = JSON.stringify(b);
					request = new XMLHttpRequest();
					request.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
        					var myObj = JSON.parse(this.responseText);
        					console.log(myObj.reply);
        					if(myObj.reply == false){
        						a = 1;
								document.getElementById("uname-error").innerHTML ="Username  exists.";
								document.getElementById("uname-error").setAttribute("style","display:block;");
								document.getElementById("username").setAttribute("style","border-bottom:2px solid #CD5C5C	");
        					}
        					else if(myObj.reply == true){
        						window.location.href = "index.php"
        					}
    					}
    				}
					request.open("POST", "OLSregister.php", true)
					request.setRequestHeader("Content-type", "application/json")
					request.send(myjson)
				}
			}
		};


	</script>
</body>
</html>