<?php

if(!isset($_SESSION['user_email']))
{

echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


}

else
{


?>






<!DOCTYPE>
<?php
      include("includes/db.php");

      if(isset($_GET['edit_pro']))
      {
      	$get_id=$_GET['edit_pro'];
         
         $get_pro="select * from products where product_id='$get_id'";

$run_pro=mysqli_query($con,$get_pro);


$row_pro=mysqli_fetch_array($run_pro);

  $pro_id=$row_pro['product_id']; 	
  $pro_title=$row_pro['product_title'];
  $pro_image=$row_pro['product_image'];
  $pro_price=$row_pro['product_price'];
  $pro_desc=$row_pro['product_desc'];
  $pro_keywords=$row_pro['product_keywords'];
  $pro_cat=$row_pro['product_cat'];
  $pro_brand=$row_pro['product_brand'];


         $get_cat="select * from categories where cat_id='$pro_cat'";

         $run_cat=mysqli_query($con,$get_cat);
         $row_cat=mysqli_fetch_array($run_cat);
         $category_title=$row_cat['cat_title'];

         $get_brand="select * from brands where brand_id='$pro_brand'";

         $run_brand=mysqli_query($con,$get_brand);
         $row_brand=mysqli_fetch_array($run_brand);
         $brand_title=$row_brand['brand_title'];

      }
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
 	<td colspan="2" style="padding-top:10px;"><h2 >  Edit Products </h2></td>
 </tr>

 <tr>
 	
 	<td align="right"> Product Title: </td>
 	<td align="left"><input type="text" name="product_title" value="<?php echo $pro_title;?>" />

 </tr>

 <tr>
 	
 	<td align="right"> Product Category: </td>
 	<td align="left"> 
        <select name="product_cat">
        	  <option><?php echo $category_title;?></option>
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
         	<option><?php echo $brand_title;?></option>
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
 <td align="left"><input type="file" name="product_image"  /> <img src="product_images/<?php echo $pro_image;  ?>" width="60" height="60" />  </td>

 </tr>
 <tr>
 	
 	<td align="right"> Product Price: </td>
 	<td align="left" ><input type="text" name="product_price"  value="<?php echo $pro_price;?>" />

 </tr>
 <tr>
 	
 	<td align="right"> Product Description: </td>
 	<td>
 		<textarea name="product_desc" cols="80" rows="10" ><?php echo $pro_desc;?></textarea>
 	</td>

 </tr>
 <tr>
 	
 	<td align="right"> Product keywords: </td>
 	<td align="left"><input type="text" name="product_keywords" value="<?php echo $pro_keywords;?>"/>

 </tr>
  <tr align="center">
 	<td colspan="8"><input type="submit" name="update_product" value="Update" />

   </tr>








  </table>

</body>
</html>


<?php
  global $con;

 if(isset($_POST['update_product']))
   {
             
   	// getting text data from feilds

      $update_id=$pro_id;
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
   $query = "update products set product_cat='$product_cat',product_brand='$product_brand', product_title='$product_title', product_price='$product_price', product_desc='$product_desc', product_image='$product_image', product_keywords='$product_keywords' where product_id='$update_id' ";


  /* echo "products title = ".$product_title;
   echo "act = ".$product_cat;
   echo "brand = ".$product_brand;
   echo "price = ".$product_price;
   echo "desc = ".$product_desc;
   echo "keywords = ".$product_keywords;
   echo "image name ".$product_image;  */
   


  $a=mysqli_query($con,$query) or die ("can not work!"); 

  if($a)
  {
  echo "<script>alert('Product has been updated..!')</script>";
  echo "<script> window.open('index.php?view_product','self')</script>"; 
  }

   }





?>



<?php  }  ?>



