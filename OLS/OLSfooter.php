
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body	{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		footer{
			bottom:0;
			background-color:#696969;
			width:100%;
			height: 30%;
			position: relative;
			display: flex;
			justify-content: center;
		}
		footer ul	{
			margin: 2% 10%;
			padding: 0;
			list-style-type: none;
			display: inline-block;
		}
		footer ul h4{
			color: white;
		}
		footer	ul li{
			padding: 0;
			margin-top: 5px;
		}
		footer ul li a:hover {
			border-color:red;
			color:white;
		} 
		footer a {
			border-left: 4px solid #696969;
			text-decoration: none;
			color:#00bfff;
		}
	</style>
</head>
<body>
	<footer>
		<ul id="u1">
			<h4>About Us</h4>
			<li><a href="OLSfootercontent.php?dispCont=Team">Our Team</a></li>
			<li><a href="OLSfootercontent.php?dispCont=Story">Our Story</a></li>
			<li><a href="index.php">HOME</a></li>
		</ul>
		<ul>
			<h4>Community</h4>
			<li><a href="OLSfootercontent.php?dispCont=Teachers">Teachers</a></li>
			<li><a href="OLSfootercontent.php?dispCont=Students">Students</a></li>
			<li><a href="OLSfootercontent.php?dispCont=Forum">Forums</a></li>
		</ul>
		<ul>
			<h4>More</h4>
			<li><a href="OLSfootercontent.php?dispCont=Terms">Terms</a></li>
			<li><a href="OLSfootercontent.php?dispCont=Privacy">Privacy Policy</a></li>
			<li><a href="OLSfootercontent.php?dispCont=Help">Help</a></li>
		</ul>
	</footer>

</body>
</html>