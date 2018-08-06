                                     <?php
                                      include("includes/db.php");

                                    $user=$_SESSION['customer_email'];

                                    $get_customer="select * from customers where customer_email='$user'";
                                    $run_customer=mysqli_query($con,$get_customer);
                                     $row_customer=mysqli_fetch_array($run_customer);

                                     $c_id=$row_customer['customer_id']; 
                                     $name=$row_customer['customer_name'];
                                     $email=$row_customer['customer_email'];
                                     $pass=$row_customer['customer_pass'];
                                     $country=$row_customer['customer_country'];
                                     $city=$row_customer['customer_city'];
                                     $contact=$row_customer['customer_contact'];
                                     $address=$row_customer['customer_address'];
                                     $image=$row_customer['customer_image'];
                                                                          

                                     ?>








<!DOCTYPE html>
<html>
<head>

    <style><?php include 'styles/style.css'; ?></style>
    <title></title>
</head>
<body>

</body>
</html>   
           
       <div id="register">
            <form action="" method="post" enctype="multipart/form-data">

            	<table  align="center" width="750">
            		<tr><br>
            			   <td colspan="2" align="center"  style="color: red"><h2>Update Your Account</h2></td>		   
            		</tr>


            		<tr>

            			<td align="right"><br>Name: </td>
            			<td ><br><input type="text"  name="c_name" value="<?php echo $name; ?>" required></td>
            		</tr>

            		<tr>
            			<td align="right">Email:</td>
            			<td><input type="text" name="c_email" value="<?php echo $email; ?>" required></td>
            		</tr>

            		<tr>
            			<td align="right">Password:</td>
            			<td><input type="Password" name="c_pass" value="<?php echo $pass; ?>" required></td>
            		</tr>

            		<tr>
            			<td align="right">Image:</td>
            			<td><input type="file" name="c_image" ><img src="customer_images/<?php echo $image; ?>" width="80px;" height="80px;" /> </td>
            		</tr>

            		<tr>
            			<td align="right">Country:</td>
            			<td>
            				 <select name="c_country" disabled="">
            				 	<option><?php echo $country;   ?></option>
            				 	<option>Afganistan</option>
            				 	<option>Australia</option>
            				 	<option>China</option>
            				 	<option>India</option>
            				 	<option>Japan</option>
            				 	<option>Pakistan</option>
            				 	<option>Russia</option>
            				 	<option>Israel</option>
            				 	<option>United Arab Emirates</option>
            				 	<option>United States</option>
            				 	<option>United Kingdom</option>


            				 </select>



            			</td>
            		</tr>

            		<tr>
            			<td align="right">City:</td>
            			<td><input type="text" name="c_city" value="<?php echo $city  ?>"></td>
            		</tr>

            		<tr>
            			<td align="right">Contact No:</td>
            			<td><input type="text" name="c_contact" value="<?php echo $contact ?>" required></td>
            		</tr>
            		
            		<tr>
            			<td align="right">Address:</td>
                         <td>
                         	   <input type="text" name="c_address" value="<?php echo $address; ?>" /> 
                         </td>
            		</tr>
                   
                   <tr align="center">
                   	<td colspan="2"><br><input type="submit" name="update" value="Update Account"></td>
                   </tr>



            	</table>
                           	


            </form>
  </div>




<?php

 if(isset($_POST['update']))
     {
         $ip=getIp();

         $customer_id=$c_id;
         $c_name=$_POST['c_name'];
         $c_email=$_POST['c_email'];
         $c_pass=$_POST['c_pass'];
         $c_image=$_FILES['c_image']['name'];
         $c_image_tmp=$_FILES['c_image']['tmp_name'];
         //$c_country=$_POST['c_country'];
         $c_city=$_POST['c_city'];
         $c_contact=$_POST['c_contact'];
         $c_address=$_POST['c_address'];

        move_uploaded_file($c_image_tmp, "customer_images/$c_image");

           $update_c="update customers set  customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id'";

          $run_update=mysqli_query($con,$update_c);

          if($run_update)
          {
            echo "<script> alert('Your Account Updated Successfully..!')</script>";
            echo "<script>window.open('my_account.php','_self')</script>";
          }

       
     }


?>



   
