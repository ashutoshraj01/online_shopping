<!DOCTYPE>
<?php
      include("includes/db.php");

  if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{





?>
<html>
<head>

       <!-- JAVASCRIPT CODE FOR COMBINING THE TEXTAREA WITH TEXT EDITOR    needs internet connectivity-->

         <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

   


	<title>Admin Panel</title>
</head>
<body bgcolor="skyblue">

   <form action=" " method="post" enctype="multipart/form-data"> <!-- entype= multitype means we will receive data in multiple formats like images or may be videos -->
   
   <table align="center" width="1077" height="622" border="10" bgcolor="#187eae">

 <tr align="center"> 
 	<td colspan="2" style="padding-top:10px;"><h2 >  Insert Products </h2></td>
 </tr>

 <tr>
 	
 	<td align="right"> Product Title: </td>
 	<td align="left"><input type="text" name="product_title" required />

 </tr>

 <tr>
 	
 	<td align="right"> Product Category: </td>
 	<td align="left"> 
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
 	
 	<td align="right"> Product Brand: </td>
 	<td align="left">
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
 	
 	<td align="right"> Product Image: </td>
 	<td align="left"><input type="file" name="product_image"  />

 </tr>
 <tr>
 	
 	<td align="right"> Product Price: </td>
 	<td align="left" ><input type="text" name="product_price"  required />

 </tr>
 <tr>
 	
 	<td align="right"> Product Description: </td>
 	<td>
 		<textarea name="product_desc" cols="80" rows="10"></textarea>
 	</td>

 </tr>
 <tr>
 	
 	<td align="right"> Product keywords: </td>
 	<td align="left"><input type="text" name="product_keywords" required />

 </tr>
  <tr align="center">
 	<td colspan="8"><input type="submit" name="insert_post" value="Insert" />

   </tr>








  </table>

</body>
</html>


<?php
  global $con;

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
       
   //$product_id = 1;
   $query = "insert into products  values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords','')";


  /* echo "products title = ".$product_title;
   echo "act = ".$product_cat;
   echo "brand = ".$product_brand;
   echo "price = ".$product_price;
   echo "desc = ".$product_desc;
   echo "keywords = ".$product_keywords;
   echo "image name ".$product_image;  */
   


  mysqli_query($con,$query) or die ("can not work!"); 


  echo "<script>alert('Product has been inserted')</script>";
  echo "<script> window.open('index.php?insert_product','self')</script>";

   }





?>



<?php } ?>



