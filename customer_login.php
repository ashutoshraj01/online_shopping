<?php
include("includes/db.php");
?>



<div id="customer_login">
 <link rel="stylesheet" href ="styles/style.css" media="all" />	   
	
        <form  method="post" action="">

            <table width="700" align="center" >
            	<tr align="center">
            		 
             <td colspan="4"><br><br> <h2><i> Log In &emsp; </i> <b>OR</b> &emsp;<i>Register</i>  </h2></td>

            	</tr> 
                 <tr >
                 	<td align="right"><br><br><br><b>Email:</b></td>
                 	<td><br><br><br><input type="text" name="email" placeholder="Enter Your Email" required></td>
                 </tr>

                 <tr>
                 	<td align="right"><b>Password:</b></td>
                 	<td><input type="Password" name="pass"  placeholder="Enter Your Password" required></td>
                 </tr>    

                  <tr align="right">
                 	  <td ><a href="checkout.php?forgot_pass">Forgot Password</a></td>

                 

                 
                 	<td align="center"><input type="submit" name="login" value="Login"/></td>
                      </tr>



            </table>

            <h3 style="float:center; padding:25px; al"><a href="customer_register.php">New? Register Here</a></h3>
             
 </form>


<?php

     if(isset($_POST['login']))
       {
          $c_email=$_POST['email'];
          $c_pass=$_POST['pass'];

          $sel_c="select * from customers where customer_pass='$c_pass' and customer_email='$c_email'";

           $run_c=mysqli_query($con,$sel_c);

           $check_customer=mysqli_num_rows($run_c);

           if($check_customer==0)
           {

            echo "<script>alert('Password or Email Incorrect, Try again..!') </script>";
            exit();
            }
            
              $ip=getIp();
             $sel_cart="select * from cart where ip_add='$ip'";

          $run_cart=mysqli_query($con,$sel_cart);
           
            $check_cart=mysqli_num_rows($run_cart); 

            if($check_customer>0 and $check_cart==0)
            {

                     $_SESSION['customer_email']=$c_email;
               echo "<script> alert('You Logged in Successfully..!') </script>";
                echo "<script>window.open('customer/my_account.php','_self')</script>";
            }
            else
            {
                 $_SESSION['customer_email']=$c_email;
               echo "<script> alert('You logged in Successfully..!') </script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }



       }

 



?>



</div>  



  

