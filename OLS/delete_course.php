<?php
$id = $_POST['id'];
$mysqli=new mysqli("localhost","root","","online");


$result=$mysqli->query("delete from educontent where id=$id");
echo"topic removed";

?>