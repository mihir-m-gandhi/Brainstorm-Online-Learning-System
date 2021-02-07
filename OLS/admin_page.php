<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<style>
		body{
				background-color:#96CDCD;
				background-image:linear-gradient(white,aquamarine);
		}
			#control{
				height: 70%;
				width:80%;
				left:10%;
				position:relative;
			}
			#control_tab{
				height:10%;
				width:100%;
				position: relative;
			}
			#control_course{
				padding-top: 4%;
				display:none;
				height: 100%;
				width: 100%;
				position: relative;
				
			}
			#control_users{
				padding-top: 4%;
				display:none;
				height: 100%;
				width: 100%;
				position: relative;
			}
			.btn_control{
				height:100%;
				width:49%;
				border:none;
				display:inline;
				background:inherit;
				position: relative;
				border:none;
				border-bottom: 2px solid black;
			}

		</style>
	</head>
	<body>
		<div id="control">
			<div id="control_tab">
				<button class="btn_control" id="btn_course" onclick="get_course()">Manage Courses</button>
				<button class="btn_control" id="btn_users" onclick="get_users()">Manage Users</button>
			</div>
			<div id="control_course">
				
			</div>
			<div id="control_users"></div>
			<div id="test"></div>
		</div>

		<script type="text/javascript">
		$(document).ready(function(){
				course.style.display='block';
			get_course();
		});

		 var course = document.getElementById('control_course');
		 var users = document.getElementById('control_users');
		 	
			function get_course(){
				$.post("get_course.php",{},function(data,status){
					$("#control_course").html(data);
				});

				course.style.display='block';
				users.style.display='none';	
			}

			function get_users(){
				console.log("this is it");
				$.post("get_users.php",{},function(data,status){
					$("#control_users").html(data);
				});
				course.style.display='none';
				users.style.display='block';	
			}
			function delete_course(id){
				$.post("delete_course.php",{id:id},function(data,status){
				$("#test").html(data);
				get_course();	
			});
			}
			function block_users(id){
				$.post("block_users.php",{id:id},function(data,status){
					$("#test").html(data);
					get_users();
				});
				
			}

		</script>
	</body>
</html>