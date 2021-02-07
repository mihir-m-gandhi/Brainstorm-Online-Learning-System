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
      width:33%;
      height:10%;
      position:relative;
    }   
    #delete_course{
      height:80%;
      width:70%;
      position:relative;
      border:none;
      background-color:#2f4f4f;
      color:#fff8dc;
    } 
</style>    
<table>
  		<tr align="center">
  		<th>course name</th>
    	<th>topic name</th>
   		<th>manage</th>
  		</tr>


	  		<?php $mysqli=new mysqli("localhost","root","","online"); 
	  			$result=$mysqli->query("select * from educontent");
	  			while ($row=mysqli_fetch_array($result)){
	  							
	   		?>



  		<tr>
   		<td align="center">
        <?php
        $result1=$mysqli->query("select * from courses where id='".$row['cid']."'");
        $row1=mysqli_fetch_array($result1);
        echo $row1['name']; ?>
      </td>
   		<td align="center"><?php echo $row['title']; ?></td>
   		<td align="center"><button id="delete_course" value="<?php echo $row['id']; ?>" onclick="delete_course(this.value)">delete</button></td>
  		</tr>


  		<?php } ?>

</table>