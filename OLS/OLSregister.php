<?php
session_start();
$str_json = file_get_contents('php://input');
$obj =json_decode($str_json);
class response{
	public $reply;
}
$rep = new response;
$conn = new mysqli("localhost", "root", "", "online");
$result = $conn->query('SELECT USERNAME FROM USERS');
$y = false;
while($row = mysqli_fetch_array($result)){
	if($obj->uname == $row[0]) {
		$y = true;
	}
}
if($y == true) {
	$rep->reply = false;
	echo json_encode($rep);
}
else {
	$exploded = explode(" ", $obj->fname) ;
	$conn->query("INSERT INTO USERS VALUES('','$exploded[0]','$exploded[1]','$exploded[2]','$obj->uname','$obj->email','$obj->pass1','$obj->dob','','$obj->utype')");
	$rep->reply = true;
	echo json_encode($rep);
	$_SESSION['uname'] = $obj->uname;
	$_SESSION['type'] = $obj->utype;
}

?>
