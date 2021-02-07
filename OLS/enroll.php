<?php 
if(!isset($_SESSION)){
session_start();
}
$cid=$_GET['cid'];
$id=$_GET['id'];
$mysqli=new mysqli("localhost","root","","online");
$uid=$_SESSION['id'];
echo $uid;
echo $cid;
$present=mysqli_num_rows($mysqli->query("SELECT * FROM enroll where uid='$uid' AND cid='$cid'"));

if($present == 0){	 
	$mysqli->query("INSERT INTO enroll values('','$uid','$cid')");
	//echo "<script>alert('you have enrolled successfully')</script>";
}
$data = ['cid' => $cid, 'id' => $id];
$query_string = http_build_query($data);
header('Location: subjects.php' . (FALSE === empty($query_string) ? '?'.$query_string:''));
	#header('Location:subjects.php?cid=$cid&id=$id');
?>



