<?php

if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{


?>  

<form action="" method="post" style="padding: 150px; text-align: center; color: red; background-color: white">    

<b>Insert New Brand:</b> &emsp;
<input type="text" name="new_brand" required /> &emsp;
<input type="submit" name="add_brand" value="Add Brand" style="color: black; background-color: skyblue" />



</form>

<?php
include("includes/db.php");


if(isset($_POST['add_brand']))
{
$new_brand=$_POST['new_brand'];

$insert_brand="insert into brands (brand_title) values('$new_brand')";

$run_brand=mysqli_query($con,$insert_brand);

if($run_brand)
{

 
 echo "<script> alert('New brand inserted Successfully..!')</script>";
 echo "<script> window.open('index.php?view_brands','_self') </script>";
}

}
?>


<?php } ?>