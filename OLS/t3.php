<?php
if(isset($_POST['id'])){
	$id = $_POST['id'];	

}?>

<h3>PLAYLIST</h3>

<?php 
	$mysqli = new mysqli("localhost","root","","online");
	$response = $mysqli->query("select * from educontent where tid=$id");
	while($row = mysqli_fetch_array($response))
		{
		?>
			<!--<button id="btn_topic" value="<?php	//echo $row['id'] ;?>" onclick="fct(this.value)" >-->
			<button id="btn_content" value="<?php	echo $row['id'] ;?>" onclick="changeVid(this.value)">
			<?php	echo $row['title'];?>
			</button>
			<br/>
			<br/>

<?php } ?>

<script type="text/javascript">

	function changeVid(d){
		console.log("changeVid called,".d);
			$.post("t4.php",{id:d},function(data,status){
				$("#center").html(data);	
			});
		}

		//document.getElementById("video").setAttribute("src","<?php	//echo $row1['link'];?>");

</script>