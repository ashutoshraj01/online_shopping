<?php 
session_start();
if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{


?>

<!DOCTYPE html>
<html>
<head>

  <!--<style><?php include 'styles/style.css'; ?></style>  -->

  <link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
	<title>Admin Panel </title>
</head>
<body>


	<div class="main_wrapper">
   
  <img src="images/head" height="99px" width="1352">
  
     <div id="header"></div>

     <div id="right">
     	    <h2 style="text-align: center; color: yellow;">Manage Content</h2>

     	    <a href="index.php?insert_product">Insert Product</a>
     	     <a href="index.php?view_products">View Product</a>
     	      <a href="index.php?insert_cat">Insert New Category</a>
     	       <a href="index.php?view_cats">View All Categories</a>
     	        <a href="index.php?insert_brand">Insert New Brand</a>
     	         <a href="index.php?view_brands">View All Brands</a>
     	          <a href="index.php?view_customers">View Customers</a>
     	           <a href="index.php?view_orders">View Orders</a>
     	            <a href="index.php?view_payments">View Payments</a>
     	             <a href="logout.php">Admin Logout</a>



     </div>

     <div id="left">
      <h2 style="color: red; text-align: center;"> <?php echo @$_GET['logged_in'];   ?> </h2>
     	<?php
               if(isset($_GET['insert_product']))
               {
               	include("insert_product.php");
               }

               if(isset($_GET['view_products']))
               {
               	include("view_products.php");
                }

                if(isset($_GET['edit_pro']))
               {
               	include("edit_pro.php");
               }

                if(isset($_GET['insert_cat']))
               {
                include("insert_cat.php");
               }

                if(isset($_GET['view_cats']))
               {
                include("view_cats.php");
               }

                if(isset($_GET['edit_cat']))
               {
                include("edit_cat.php");
               }

                if(isset($_GET['insert_brand']))
               {
                include("insert_brand.php");
               }

               if(isset($_GET['view_brands']))
               {
                include("view_brands.php");
               }
                
                if(isset($_GET['edit_brand']))
               {
                include("edit_brand.php");
               }

               if(isset($_GET['view_customers']))
               {
                include("view_customers.php");
               }

     	?>
     </div>


	</div>

</body>
</html>   


<?php } ?>