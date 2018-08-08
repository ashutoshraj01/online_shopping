  
<!Doctype>
<?php
session_start();
include("functions/functions.php");

?>



<html>
<head>
<title>ONLINE SHOPPING...!</title>

<style><?php include 'styles/style.css'; ?></style>

</head>
<body>
     <!-- MAIN CONTAINER STARTS FROM HERE--> 
    <div class="main">
    
        <!-- HEADER STARTS HERE -->    
         <div class="header">
            
              <a href="../index.php"><img id="logo_image" src="images/logo"/></a>
              <img id="logo_image" src="images/logo1" style="width: 70% " /> 


         </div>  
        <!-- HEADER ENDS HERE -->
        
       <!-- NAVIGATION BAR STARTS HERE --> 
        <div class="menubar">
            <ul id="menu">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../all_products.php">ALL PRODUCTS</a></li>
                <li><a href="my_account.php">MY ACCOUNTS</a></li>
                <li><a href="#">SIGN UP</a></li>
                <li><a href="../cart.php">SHOPPING CART</a></li>
                <li><a href="#">CONTACT US</a></li>
           </ul>

                <div id="form">  
		            <form method="get" action="results.php" enctype="multipart/form-data">
		                <input type="text" name="user_query" placeholder="Feel Free To Search" />
		                <input  type="submit" name="search" value="search" />
		            </form>
                </div>


       </div>
     	 <!-- NAVIGATION BAR ENDS HERE --> 
         
     		
     
     <!-- CONTENTS SECTION START HERE -->
              <div class="content">
                                     
			            <div id="sidebar">
			                <div id="sidebar_title">My Account</div>
			                 
			                    <ul id="cats">
                                   <?php
                                    $user=$_SESSION['customer_email'];

                                    $get_img="select * from customers where customer_email='$user'";
                                    $run_img=mysqli_query($con,$get_img);

                                    $row_img=mysqli_fetch_array($run_img);

                                    $c_image=$row_img['customer_image'];

                                    $c_name=$row_img['customer_name'];


                                    echo "<p style='text-align:center;'>  <img src='customer_images/$c_image' width='150' height='150' />";





                                     ?>

			                       <li><a href="my_account.php?my_orders">My Orders</a></li>
			                       <li><a href="my_account.php?edit_account">Edit Account</a></li>
			                       <li><a href="my_account.php?change_pass">Change Password</a></li>
			                       <li><a href="my_account.php?delete_account">Delete Account</a></li>       

			                     </ul>

			              
			                </div>




          <div id="content_area">
                                     <?php cart(); ?>
             <div id="shopping_cart">
               
                  <span style="float: left; font-size: 18px; padding: 5px; line-height: 40px">

                    <?php
                            if(isset($_SESSION['customer_email']))
                            {
                               echo "<b>Welcome &emsp;</b>".$_SESSION['customer_email'];

                            }

                      
 


                    ?>


                        
                  

                 <?php

                   if(!isset($_SESSION['customer_email']))
                   {
                     
                     echo "<a href='checkout.php' style='color:red; text-decoration:none;'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Login</a>";
                   }

                   else
                   {
                      
                       echo "<a href='logout.php' style='color:red; text-decoration:none'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Logout</a>";
                   }
               ?>

             


                </span>

             </div> 

             
			              <div id="products_box">

			              
                           
                           <?php
                                 if(!isset($_GET['my_orders']))
                                 {

                                 	if(!isset($_GET['edit_account']))
                                 	{
                                 		if(!isset($_GET['change_pass']))
                                          {
             
                                           if(!isset($_GET['delete_account']))
                                            {
                                
                             echo 	"<h2> Welcome  $c_name </h2><br>";

			                 echo  "<b>You Can See Your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
			                
			             }

                    }
			         
			         }

			     }


                        ?>



                        <?php

                          if(isset($_GET['edit_account']))
                          {
                              include("edit_account.php");
                          }

                               if(isset($_GET['change_pass']))
                          {
                              include("change_pass.php");
                          }

                           if(isset($_GET['delete_account']))
                          {
                              include("delete_account.php");
                          }






                        ?>
                      			              </div>	
          </div>


     
    </div>
     <!-- CONTENTS SECTION ENDS HERE -->

        

         <div id="footer">
                          <h2 style="text-align: center;padding-top: 10px ">&copy By ASHUTOSH RAJ</h2>
         </div>




</div>
<!-- MAIN CONTAINER ENDS HERE-->







</body>
</html>
