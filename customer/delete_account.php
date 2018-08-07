
<br>
<h2 style="text-align: center; color:blue;">Do you really want to <b>DELETE</b> your account?<br><br></h2>

<form action="" method="post">

<input style="color:green " type="submit" name="yes" value="Yes I am quite Sure" />
  &emsp;
<input style="color:red " type="submit" name="no" value="No I was out of my Mind"/>


	

</form>

<?php
include("includes/db.php");
global $con;
$user=$_SESSION['customer_email'];

if(isset($_POST['yes']))
{

	$delete_customer="delete from customers where customer_email='$user'";
	$run_customer=mysqli_query($con,$delete_customer) or die("Unable to delete");

	echo "<script>alert('We are really sorry,Your account has been deleted.! ');</script>";

	echo "<script>window.open('../index.php','_self')</script>";

	include("logout.php");
}

if(isset($_POST['no']))
{
  echo "<script>alert('oh!  you scared me..!')</script>";
  echo "<script>window.open('','_self')</script>";

}

?>