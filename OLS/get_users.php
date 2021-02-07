<style type="text/css" media="screen">
    table{
      width:100%;
      position:relative;
    }
    tr{
      height:10%;
      width:100%;
      position:relative;
    }
    th{
      width:20%;
      height:10%;
      position:relative;
    }   
    td{
    	text-align:center;
    }
    #delete_users{
      height:80%;
      width:70%;
      position:relative;
      border:none;
      background-color:#2f4f4f;
    }
</style>
<?php 
$mysqli = new mysqli("localhost","root","","online");
$result = $mysqli->query("select id, Fname, Mname, Lname , Username, type, EmailId from users");
 ?>
<table>
	<tr>
		<th>name</th>
		<th>username</th>
		<th>type</th>
		<th>Email id</th>
		<th>manange</th>
	</tr>
	<?php while($row=mysqli_fetch_array($result)){ ?>
	<tr>
		<td><?php echo $row['Fname'].' '.$row['Mname'].' '.$row['Lname'] ; ?></td>
		<td><?php echo $row['Username'] ; ?></td>
		<td><?php echo $row['type'] ; ?></td>
		<td><?php echo $row['EmailId'] ; ?></td>
		<td><button id="delete_users" value = <?php echo $row['id']; ?> onclick="block_users(this.value)">block</button></td>
	</tr>
	<?php } ?>

</table>