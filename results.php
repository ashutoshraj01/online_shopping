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
             <div id=shopping_cart>
               
                  <span style="float: center; font-size: 18px; padding: 5px; line-height: 40px">
                  Welcome !&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  Total Items: &emsp;Total Price: &emsp;</b>
                  <a href="cart.php" style="color: yellow; text-decoration:none">Go to Cart &emsp;&emsp;</a>
                
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
			                <?php
			                     if(isset($_GET['search']))
			                     {
			                     	$search_query=$_GET['user_query'];
			                        
			                        echo '<link rel="stylesheet" href ="styles/style.css" media="all" />';
                                             
                                    	global $con;

                                      $get_pro="select * from products where product_keywords like '%$search_query%'  ";

                                      $run_pro=mysqli_query($con,$get_pro);

                                                 $count_keywords=mysqli_num_rows($run_pro);
                                                    if($count_keywords==0)
                                                     {


                                                          echo "<script>alert('SORRY ! No Product available for your Search')</script>";
                                                          echo "<script>   window.location.href ='index.php'</script>";
                                                        
                                                     }

                                                     else
                                                    { 	


                                                 while($row_pro=mysqli_fetch_array($run_pro))
                                                      {

                                                       $pro_id=$row_pro['product_id'];	
                                                       $pro_cat=$row_pro['product_cat'];
                                                       $pro_brand=$row_pro['product_brand'];
                                                       $pro_title=$row_pro['product_title'];
                                                       $pro_price=$row_pro['product_price'];
                                                       $pro_image=$row_pro[5];
                                                       
                                                       echo "
                                                       
                                                          <div id='single_product'>
                                                                     <h3>$pro_title</h3>
                                                   
                                                                    <img src='admin/product_images/$pro_image' width='180' height='180' />

                                                                    <p> &#8377 <b>$pro_price</b></p> 

                                                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                                                                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>

                                                            </div>
                                                         ";

                                                    }            
                                      }
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






