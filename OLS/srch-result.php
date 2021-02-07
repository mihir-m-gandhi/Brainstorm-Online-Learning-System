<?php 
if(isset($_POST['srch'])){
	$x = $_POST['srch'];
	$res = array();
	$conn = new mysqli("localhost", "root", "", "online");
	$result = $conn->query("SELECT name,id FROM courses WHERE name LIKE '$x%'");
	class sendData {
		var $name;
		var $id;
	}
	while($row =  mysqli_fetch_array($result)) {
		$obj = new sendData;
		$obj->name = $row[0];
		$obj->id = $row[1];
		array_push($res,$obj);
	}
	echo json_encode($res);
}
?>