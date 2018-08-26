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
	<td colspan="6"> <h2><br>View All Brands Here<br><br></h2></td>
</tr>



<tr align="center" bgcolor="skyblue">

	    <th><br>S.NO</th>
	    <th><br>Brand ID</th>
	    <th><br>Brand Title</th>
	    
	       <th><br>Edit</th>
	        <th><br>Delete</th>
	         	         
</tr>

  <?php

include("includes/db.php");

$get_brand="select * from brands";

$run_brand=mysqli_query($con,$get_brand);

$i=0;

while($row_brand=mysqli_fetch_array($run_brand))
{
  $brand_id=$row_brand['brand_id']; 	
  $brand_title=$row_brand['brand_title'];
  
  $i++;

?>
<tr align="center">
	
    <td><br><?php echo $i;  ?></td>
    <td><br><?php echo $brand_id;  ?></td>
	<td><br><?php echo $brand_title;  ?></td>

	<td><br><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
	<td><br><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?> ">Delete</a></td>

</tr>


<?php } ?>




   </table>
   
  
<?php  } ?>
  


