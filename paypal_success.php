<?php 

session_start();
?>






<!DOCTYPE html>
<html>
<head>
	<title>Payment Successful!</title>
</head>
<body>

	<h2>Welcome  <?php  echo $_SESSION['customer_email'];      ?>    </h2>
     <h3>Your Payment was successful!</h3>
     <h4><a href="customer/my_account.php">Go to Your Account</a></h4>


</body>
</html>  



  


