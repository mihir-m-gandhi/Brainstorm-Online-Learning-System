<?php 
$cName = $_POST['cName'];
$topicName = $_POST['topicName'];
$creator = $_POST['creator'];
$link = $_POST['link'];
$Name = $_POST['Name'];



$mysqli=new mysqli("localhost","root","","online");

$result = $mysqli->query("select id from courses where name='$cName'");
$row=mysqli_fetch_array($result);
$cid=$row['id'];


if($cid!=0){
	$result1 = $mysqli->query("select * from topics where Name='$topicName'");
	$row1 =mysqli_fetch_array($result1);
	if(sizeof($row1)==0){
		echo "topic doesn't exists ";
	}
	else{
		$tid = $row1['id'];
		$response = $mysqli->query("insert into educontent values('','$cid','$tid','$Name','$creator','$link')");
		if($response)
			echo "content uploaded successfully";
		else
			echo "content not uploaded";
	}
}
else{
	echo "course not found";
}


 ?>