<!DOCTYPE>
<?php
      include("includes/db.php");
?>
<html>
<head>

       <!-- JAVASCRIPT CODE FOR COMBINING THE TEXTAREA WITH TEXT EDITOR    needs internet connectivity-->

          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>




	<title>Admin Panel</title>
</head>
<body bgcolor="skyblue">

   <form action="insert_product.php" method="post" enctype="multipart/form-data"> <!-- entype= multitype means we will receive data in multiple formats like images or may be videos -->
   
   <table align="center" width="750" border="10" bgcolor="yellow">

 <tr align="center"> 
 	<td colspan="2" style="padding-top:10px;"><h2 >  Insert Products </h2></td>
 </tr>

 <tr>
 	
 	<td align="center"> Product Title: </td>
 	<td align="center"><input type="text" name="product_title" required />

 </tr>

 <tr>
 	
 	<td align="center"> Product Category: </td>
 	<td align="center"> 
        <select name="product_cat">
        	  <option>Select a Category</option>
               <?php
                

                 $get_cats = "select * from categories ";  /* writing a query */

			    $run_cats=mysqli_query($con,$get_cats);   /* running the query */

      			while ($row_cats=mysqli_fetch_array($run_cats))  
					{

  					$cat_id=$row_cats['cat_id'];
  					$cat_title=$row_cats['cat_title'];

					echo "<option value='$cat_id'>$cat_title</option>";
                    }

               ?>
        </select>

 	</td>
 </tr>
 <tr>
 	
 	<td align="center"> Product Brand: </td>
 	<td align="center">
         <select name="product_brand">
         	<option>Select a Brand</option>
          <?php
          
           $get_brands = "select * from brands";  /* writing a query */

		$run_brands=mysqli_query($con,$get_brands);  

		while ($row_brands=mysqli_fetch_array($run_brands))  
		{

		  $brand_id=$row_brands['brand_id'] ;
		  $brand_title=$row_brands['brand_title'];

		echo "<option value='$brand_id'>$brand_title</option>";

		}

      ?>

      </select>
 </tr>
 <tr>
 	
 	<td align="center"> Product Image: </td>
 	<td align="center"><input type="file" name="product_image" required />

 </tr>
 <tr>
 	
 	<td align="center"> Product Price: </td>
 	<td align="center" ><input type="text" name="product_price"  required />

 </tr>
 <tr>
 	
 	<td align="center"> Product Description: </td>
 	<td>
 		<textarea name="product_desc" cols="80" rows="10"></textarea>
 	</td>

 </tr>
 <tr>
 	
 	<td align="center"> Product keywords: </td>
 	<td align="center"><input type="text" name="product_keywords" required />

 </tr>
  <tr align="center">
 	<td colspan="8"><input type="submit" name="insert_post" value="Insert" />

   </tr>








  </table>

</body>
</html>


<?php

 if(isset($_POST['insert_post']))
   {
             
   	// getting text data from feilds
      $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_cat'];
          $product_brand=$_POST['product_brand'];
            $product_price=$_POST['product_price'];
              $product_desc=$_POST['product_desc'];
                 $product_keywords=$_POST['product_keywords'];
   
   	// getting image from feilds
    $product_image=$_FILES['product_image']['name'];
    $product_image_tmp=$_FILES['product_image']['tmp_name'];
     
     move_uploaded_file($product_image_tmp, "product_images/$product_image");   

     $insert_product="insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image',' $product_keywords')";



  $insert_pro=mysqli_query($con,$insert_product); 

  echo "<script>alert('Poduct has been inserted')</script>";
  echo "<script> window.open('insert_product.php','self')</script>";

   }





?>






