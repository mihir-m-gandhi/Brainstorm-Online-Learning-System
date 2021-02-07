<?php
if(isset($_POST['id'])){
	$id = $_POST['id'];	

}?>
<script type="text/javascript">
	console.log(<?php echo $id; ?>);
</script>
<?php 
	$mysqli = new mysqli("localhost","root","","online");
	$response = $mysqli->query("select * from educontent where id=$id");
	while($row = mysqli_fetch_array($response))
		{
		?>
			<!--<button id="btn_topic" value="<?php	//echo $row['id'] ;?>" onclick="fct(this.value)" >-->
			<iframe id="video" width="100%" height="570" src="<?php	echo $row['link'] ;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>	
	<?php } ?>

