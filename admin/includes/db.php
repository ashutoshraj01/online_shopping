<?php
         /* establishing a database connection  */

      $con=mysqli_connect("localhost","root","","ecom");
      // or die('Error ocurred while connecting');

if(mysqli_connect_errno())
{
	echo "Failed to connect to server :" .mysqli_connect_error();

}


?>

