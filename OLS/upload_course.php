<?php 
$courseName= $_POST['courseName'];
$category= $_POST['category'];
$requirement= $_POST['requirement'];
$outcome= $_POST['outcome'];
$duration= $_POST['duration'];
$exist=0;


$mysqli=new mysqli("localhost","root","","online");


$result=$mysqli->query("select name from courses");
while($row=mysqli_fetch_array($result))
	if(strtolower($row['name'])==strtolower($courseName))
		$exist=1;
	
if($exist==0)
$response=$mysqli->query("insert into courses  values ('','$courseName','$category','$duration','$requirement','$outcome')");
else
echo "course already exists";

?>
<script type="text/javascript">
	alert("course has been created successfully");
</script>