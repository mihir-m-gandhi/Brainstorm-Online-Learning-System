<?php 
$topic=$_POST['topic'];
$content=$_POST['content'];
$author=$_POST['author'];
$dmy =$_POST['dmy'];



$mysqli=new mysqli("localhost","root","","online");

$result=$mysqli->query("select * from dailynews where uploadDate='$dmy'");
$num=mysqli_num_rows($result);

if($num==0){
	$response=$mysqli->query("insert into dailynews values('','$dmy','$topic','$content','$author')");
	echo "news inserted";
}
else{
	echo "news are already updated for today";
}
?>
