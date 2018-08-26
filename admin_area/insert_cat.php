<?php

if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{


?>


<form action="" method="post" style="padding: 150px; text-align: center; color: red; background-color: white">    

<b>Insert New Category:</b> &emsp;
<input type="text" name="new_cat" required /> &emsp;
<input type="submit" name="add_cat" value="Add Category" style="color: black; background-color: skyblue" />



</form>

<?php
include("includes/db.php");


if(isset($_POST['add_cat']))
{
$new_cat=$_POST['new_cat'];

$insert_cat="insert into categories (cat_title) values('$new_cat')";

$run_cat=mysqli_query($con,$insert_cat);

if($run_cat)
{

 
 echo "<script> alert('New Category inserted Successfully..!')</script>";
 echo "<script> window.open('index.php?view_cats','_self') </script>";
}

}
?>



<?php  } ?>