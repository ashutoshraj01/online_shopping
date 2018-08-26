<?php

if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{




?>




   <table width="1078"  align="center"  bgcolor="skyblue">
   	
<tr align="center">
	<td colspan="6"> <h2>View All Products Here</h2></td>
</tr>


<tr align="center" bgcolor="skyblue">

	    <th><br>S.N</th>
	    <th><br>Name</th>
	     <th><br>Email</th>
	      <th><br>Image</th>
	        <th><br>Delete</th>
	         	         
</tr>

  <?php

include("includes/db.php");

$get_c="select * from customers";

$run_c=mysqli_query($con,$get_c);

$i=0;

while($row_c=mysqli_fetch_array($run_c))
{
  $c_id=$row_c['customer_id']; 	
  $c_name=$row_c['customer_name'];
  $c_email=$row_c['customer_email'];
  $c_image=$row_c['customer_image'];
  $i++;

?>
<tr align="center">
	
    <td><br><?php echo $i;  ?></td>
	<td><br><?php echo $c_name;  ?></td>
	<td><br><?php echo $c_email;  ?></td>
	<td><br> <img src="../customer/customer_images/<?php echo $c_image; ?>" width="60" height="50" /> </td>
	<td><br><a href="delete_c.php?delete_c=<?php echo $c_id; ?> ">Delete</a></td>

</tr>


<?php } ?>




   </table>
  


<?php } ?>