
<?php 
$val=$_POST['search'];

$mysqli =new mysqli("localhost","root","","online");
$result=$mysqli->query("SELECT * FROM courses where name LIKE '%$val%'");
while($row=mysqli_fetch_array($result)){
	?>
	<li  id="list_course" style="height:20%;margin:0%;
	padding:0;width:80%;position:relative;background:#fff;"><a href="course_page.php?id=<?php echo $row['id']; ?>">
		<?php	echo $row['name']."<br>"	; ?>
	</a></li>

	<?php 
}
 ?>
