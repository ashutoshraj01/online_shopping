<!Doctype>
<?php
session_start();
include("functions/functions.php");
// $_SESSION["qty"]="1";

?>



<html>
<head>
<title>ONLINE SHOPPING...!</title>

	<link rel="stylesheet" href ="styles/style.css" media="all" />

</head>
<body>
     <!-- MAIN CONTAINER STARTS FROM HERE--> 
    <div class="main">
    
        <!-- HEADER STARTS HERE -->    
         <div class="header">
            
              <a href="index.php"><img id="logo_image" src="images/logo"/></a>
              <img id="logo_image" src="images/logo1" style="width: 60%" /> 


         </div>  
        <!-- HEADER ENDS HERE -->
        
       <!-- NAVIGATION BAR STARTS HERE --> 
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="all_products.php">ALL PRODUCTS</a></li>
                <li><a href="customer/my_account.php">MY ACCOUNTS</a></li>
                <li><a href="">SIGN UP</a></li>
                <li><a href="cart.php">SHOPPING CART</a></li>
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
			                <div id="sidebar_title">Categories</div>
			                 
			                    <ul id="cats">
			                             <?php  getCats();  ?> 

			                     </ul>

			                <div id="sidebar_title">Brands</div>
			                      <ul id="cats">
			                             <?php  getBrands();  ?>

			                      </ul> 
			                </div>




          <div id="content_area">
                                     <?php cart(); ?>
             <div id=shopping_cart>
               
                  <span style="float: center; font-size: 18px; padding: 5px; line-height: 40px">
                        <b style="font-size: 25px;">   Welcome ! &emsp; &emsp; &emsp; &emsp;</b>
                  &emsp;<i>Total Items:<?php total_items(); ?> </i> &emsp;<b>Total Price:</b><?php total_price(); ?>&emsp;
                  <a href="index.php" style="color: yellow; text-decoration: none "><i>Back to </i><b>Home &emsp;</b></a>
                                        <!--   &emsp;   used for creating space -->


                       <?php

                   if(!isset($_SESSION['customer_email']))
                   {
                     
                     echo "<a href='checkout.php' style='color:red; text-decoration:none;'>Login</a>";
                   }

                   else
                   {
                      
                       echo "<a href='logout.php' style='color:red; text-decoration:none'>Logout</a>";
                   }
               ?>



                </span>

             </div> 

             
			              <div id="products_box">
			                       <br>

                                   <form action="" method="post" enctype="multipart/form-data">
                                       <table align="center" width="700"  >
                                       	  <tr style="color: blue">
                                       	  	<th>Remove</th>
                                       	  	<th>Product(s)</th>
                                       	  	<th>Quantity</th>
                                       	  	<th>Total Price</th>
                                       	  </tr>
                                              
                                              <?php
                                                              
                                                        $total=0;
														  global $con;
														  $ip=getIp();
														  $sel_price="select * from cart where ip_add='$ip'";
														  $run_price=mysqli_query($con,$sel_price);

														    while($p_price=mysqli_fetch_array($run_price))
														   {
														     $pro_id=$p_price['p_id'];
                                 global $qty;           // for test purpose
                                 $qty=$p_price['qty'];  //for test purpose
                                 
														      
														     $pro_price="select * from products where product_id='$pro_id'";
														     $run_pro_price=mysqli_query($con,$pro_price);
														       
														        while($pp_price=mysqli_fetch_array($run_pro_price))
														        {

														            $product_price=array($pp_price['product_price']);
														            $product_title=$pp_price['product_title']; 
														            $product_image=$pp_price['product_image'];
														            $single_price=$pp_price['product_price'];

														            $values=array_sum($product_price);
														            $total +=$values;

														         //echo " &#8377 $total";  

                                                  
                                                  

                                                ?>

                                                    
                                                <tr align="center">

                                                	<td><br><br><br><input type="checkbox"  name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                                	<td><br><?php echo "$product_title"; ?><br>
                                                       <img src="admin_area/product_images/<?php echo "$product_image"  ?>" width="80" height="80" /> 
                                                	</td>
                                                	<td >
                                                      <br><br><br>

 
                                                        <input type="number"  name="qty" min="1" size="" value="<?php echo 'SESSION["qty"]'; ?>" />       
                                                          
                                                    </td>
                                                       
                                                     <?php
                                                            if(isset($_POST['update_cart']))    // used for updating quantity in the cart table.
                                                               {
                                                                 $qty=$_POST['qty'];
                                                                 	$update_qty="update cart set qty='$qty'"; 
                                                                 	$run_qty=mysqli_query($con,$update_qty);
                                                                    
                                                                    $_SESSION['qty']=$qty;
                                                                    (int)$total=(int)$total* (int)$qty;
                                                                    (int)$single_price=(int)$single_price* (int)$qty;


                                                               } 






                                                       ?>

                                                	<td><br><br><br><?php echo "&#8377 $single_price";  ?><br></td>


                                                </tr>

                                              
                                             <?php  } }  ?>  

                                           

                                            <tr align="center"> 
                                            	<td align="right" colspan="3"><br><br><br><b>Sub Total: </b></td>
                                            	<td ><br><br><br><?php echo " &#8377 $total";  ?></td>



                                            </tr>

                                            <tr align="center">
                                            	<td><br><input type="submit" name="update_cart" value="Update Cart"></td>
                                            	<td><br><input type="submit" name="continue" value="Continue Shopping"></td>
                                                <td><br><button ><a  href="checkout.php" style="text-decoration: none; color:black;">Checkout</a></button></td>


                                            </tr>





                                       </table>


                                   	
                                   </form>



                                  <?php


                                 //function updatecart()
                                 {

                                           global $con;          // used for removing the item from cart
                                           $ip=getIp();

                                          if(isset($_POST['update_cart']))
                                             {  
                                              if(isset($_POST['remove']))
                                              {
                                             	foreach ($_POST['remove'] as $remove_id) 
                                             	{
                                                   $delete_product= "delete from cart where p_id='$remove_id' and ip_add='$ip'";
                                                   $run_delete=mysqli_query($con,$delete_product) or die("query didn't worked");
                                                      if($run_delete)
                                                      {
                                                         echo "<script> window.open('cart.php','_self')</script>";

                                                      }


                                                 }
                                             }

                                          }
                                            

                                             if(isset($_POST['continue']))    // used for redirecting to main page(index.php) from the cart page(cart.php).
                                             {
                                             	echo "<script>window.open('index.php','_self')</script>";
                                             }

                                          //echo @$up_cart=updatecart();   
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
     




