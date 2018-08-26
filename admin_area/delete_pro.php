<?php

if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{


?>



<?php 

  include("includes/db.php");
   
    if(isset($_GET['delete_pro']))
     {

      $delete_id=$_GET['delete_pro'];

     $delete_pro="delete from products where product_id='$delete_id'";

     $run_delete=mysqli_query($con,$delete_pro);
     
     if($run_delete)
     {
     	echo "<script>alert('Product has been deleted..!')</script>";
     	echo "<script>window.open('index.php?view_products','_self')</script>";
     }


     }



?>


<?php  } ?>