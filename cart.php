<!Doctype>
<?php
include("functions/functions.php");

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
                        <b style="font-size: 25px;">   Welcome ! &emsp; &emsp; &emsp; &emsp;  </b>
                  <b style="color: yellow">Shopping Cart: </b> &emsp;<i>Total Items:<?php total_items(); ?> </i> &emsp;<b>Total Price:</b><?php total_price(); ?>&emsp;
                  <a href="cart.php" style="color: yellow "><i>Go to Cart</i></a>
                                        <!--   &emsp;   used for creating space -->
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

                                                	<td><br><br><br><input type="checkbox"  name="Remove[]"></td>
                                                	<td><br><?php echo "$product_title"; ?><br>
                                                       <img src="admin/product_images/<?php echo "$product_image"  ?>" width="80" height="80" /> 
                                                	</td>
                                                	<td><br><br><br><input type="" name="text" size="2" name="qty"></td>
                                                	<td><br><br><br><?php echo "&#8377 $single_price";  ?><br></td>


                                                </tr>

                                              
                                             <?php  } } ?>

                                            <tr align="center"> 
                                            	<td align="right" colspan="3"><br><br><br><b>Sub Total: </b></td>
                                            	<td ><br><br><br><?php echo " &#8377 $total";  ?></td>



                                            </tr>





                                       </table>


                                   	
                                   </form>




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
     




