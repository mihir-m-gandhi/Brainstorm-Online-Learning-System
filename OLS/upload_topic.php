<?php 
$cName=$_POST['cName'];
$topicName=$_POST['topicName'];
$Descript=$_POST['Descript'];


$mysqli=new mysqli("localhost","root","","online");

$result = $mysqli->query("select id from courses where name='$cName'");
$row=mysqli_fetch_array($result);
$cid=$row['id'];

$result1 = $mysqli->query("select * from topics where Name='$topicName'");
$row1 =mysqli_fetch_array($result1);


if(sizeof($row1)==0){
if($cid!=0){
$response = $mysqli->query("insert into topics value('','$cid','$topicName','$Descript')");
echo "topic added successfully";	
}
else
echo "course not found";
}
else
echo "topic already exists"

 ?>