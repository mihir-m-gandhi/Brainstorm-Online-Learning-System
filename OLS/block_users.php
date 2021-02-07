<?php 
$mysqli=new mysqli("localhost","root","","online");
$id = $_POST['id'];
$result = $mysqli->query("delete from users where id=$id");
echo "user blocked";
 ?>