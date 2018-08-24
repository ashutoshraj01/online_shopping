<!-- functions used for database connection -->

<?php
        $con=mysqli_connect("localhost","root","","ecom");

 
   function getIp() {                    // this function returns the ip address of a user
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}


     function cart()                     // function for adding products to cart
     {
          global $con; 

        if(isset($_GET['add_cart']))
        {  
           $ip=getIp();
           $pro_id=$_GET['add_cart'];


          

          $check_pro="select * from cart where ip_add='$ip' and p_id='$pro_id'";
          $run_check=mysqli_query($con,$check_pro) or die('error');
          $test = mysqli_num_rows($run_check);

          if($test>0)
             {



              //echo "Product already added..! U cant't add more than 1 product of same type.";
               echo "<script>window.alert('Product has been already added Once ..!') </script>";
               echo "<script>window.open('index.php','self')</script>";
              //mysqli_free_result($run_check);


             }
          else
          {

           $insert_pro="insert into cart(p_id,qty,ip_add) values('$pro_id','1','$ip')";

           $run_pro=mysqli_query($con,$insert_pro);

           echo "<script>window.open('index.php','self')</script>";
       
          }
         
      
      }

    }
                     function total_items()    //function will count the total items
                     {     global $con;

                           $ip=getIp();
                          if(isset($_GET['add_cart']))
                             {
                                 

                                  $get_items="select * from cart where ip_add='$ip'";
                                  $run_items=mysqli_query($con,$get_items);
                                  $count_items=mysqli_num_rows($run_items);
                             }
                          else 
                             {
                               
                               $get_items="select * from cart where ip_add='$ip'";
                               $run_items=mysqli_query($con,$get_items);
                               $count_items=mysqli_num_rows($run_items);

                            }        
                        
                        echo $count_items;


                     }
// Calculating total price of all the items present in the cart

function total_price()
{ 

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
            $values=array_sum($product_price); 
            $total +=$values;


        }

   }
         echo " &#8377 $total";
         
}

                       

                    function getCats()   /* function for getting categories from database   & displaying in sidebar*/ 
                     {

                    global $con;

                    $get_cats = "select * from categories ";  /* writing a query */

                    $run_cats=mysqli_query($con,$get_cats);   /* running the query */

                       while ($row_cats=mysqli_fetch_array($run_cats))  
                            {

                              $cat_id=$row_cats['cat_id'];
                              $cat_title=$row_cats['cat_title'];

                              echo "<li> <a href='index.php?cat=$cat_id'>$cat_title</a></li>";

                           }



                       }







function getBrands()   // function for displaying all the brands in the sidebar
              {

                 global $con;

                 $get_brands = "select * from brands";  /* writing a query */

                 $run_brands=mysqli_query($con,$get_brands);   /* running the query */
 
                     while ($row_brands=mysqli_fetch_array($run_brands))  
                           {
 
                              $brand_id=$row_brands['brand_id'] ;
                              $brand_title=$row_brands['brand_title'];

                              echo "<li> <a href='index.php?brand=$brand_id'>$brand_title</a></li>";  /* for displaying all brands  */

                           }
                }




                       function getpro()         // this will display products on the HOME
                                    {     
                                         if(!isset($_GET['cat']))
                                         {
                                             if(!isset($_GET['brand']))
                                             {

                                       echo '<link rel="stylesheet" href ="styles/style.css" media="all" />';

                                    	global $con;

                                      $get_pro="select * from products";

                                      $run_pro=mysqli_query($con,$get_pro);

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
                                                   
                                                                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />

                                                                    <p> &#8377 <b>$pro_price</b></p> 

                                                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                                                                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>

                                                            </div>
                                                         ";

                                                    }
                                  }
                                      
                                    }
                                      }



                                function getcatpro()     // Displays products on the basis of category selected
                                    {     
                                         if(isset($_GET['cat']))
                                         {
                                          
                                            $cat_id=$_GET['cat'];    

                                       echo '<link rel="stylesheet" href ="styles/style.css" media="all" />';

                                      global $con;

                                      $get_cat_pro="select * from products where product_cat='$cat_id'";

                                      $run_cat_pro=mysqli_query($con,$get_cat_pro);

                                      $count_cats=mysqli_num_rows($run_cat_pro);
                                                     if($count_cats==0)
                                                     {

                                                         echo "<h2>Sorry !</h2><h3> No Products available for this category</h3>";
                                                         exit();
                                                     }
                                                  else
                                                  {
                                                       
                                                    while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
                                                      {

                                                       $pro_id=$row_cat_pro['product_id'];  
                                                       $pro_cat=$row_cat_pro['product_cat'];
                                                       $pro_brand=$row_cat_pro['product_brand'];
                                                       $pro_title=$row_cat_pro['product_title'];
                                                       $pro_price=$row_cat_pro['product_price'];
                                                       $pro_image=$row_cat_pro[5];
                                                       
                                                       echo "
                                                       
                                                          <div id='single_product'>
                                                                     <h3>$pro_title</h3>
                                                   
                                                                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />

                                                                    <p> &#8377 <b>$pro_price</b></p> 

                                                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                                                                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>

                                                            </div>
                                                         ";

                                                    }
                                  
                                      
                                    }
                                     }
                                      }







function getbrandpro()            // Displays products on the basis of brand selected            

                                    {     
                                         if(isset($_GET['brand']))
                                         {
                                          
                                            $brand_id=$_GET['brand'];    

                                       echo '<link rel="stylesheet" href ="styles/style.css" media="all" />';

                                      global $con;

                                      $get_brand_pro="select * from products where product_brand='$brand_id'";

                                      $run_brand_pro=mysqli_query($con,$get_brand_pro);

                                      $count_brand=mysqli_num_rows($run_brand_pro);
                                                     if($count_brand==0)
                                                     {

                                                         echo "<h2>Sorry !</h2><h3> No Products available for this Brand.</h3>";
                                                         exit();
                                                     }
                                                  else
                                                  {
                                                       
                                                    while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
                                                      {

                                                       $pro_id=$row_brand_pro['product_id'];  
                                                       $pro_cat=$row_brand_pro['product_cat'];
                                                       $pro_brand=$row_brand_pro['product_brand'];
                                                       $pro_title=$row_brand_pro['product_title'];
                                                       $pro_price=$row_brand_pro['product_price'];
                                                       $pro_image=$row_brand_pro[5];
                                                       
                                                       echo "
                                                       
                                                          <div id='single_product'>
                                                                     <h3>$pro_title</h3>
                                                   
                                                                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />

                                                                    <p> &#8377 <b>$pro_price</b></p> 

                                                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                                                                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>

                                                            </div>
                                                         ";

                                                    }
                                  
                                      
                                    }
                                     }
                                      }




















?>
