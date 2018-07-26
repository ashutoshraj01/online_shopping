




<!-- functions used for database connection -->


<?php



    $con=mysqli_connect("localhost","root","","ecom");

    function getCats()   /* function for getting categories from database   */ 
                    {

                    global $con;

                    $get_cats = "select * from categories ";  /* writing a query */

                    $run_cats=mysqli_query($con,$get_cats);   /* running the query */

                       while ($row_cats=mysqli_fetch_array($run_cats))  
                            {

                              $cat_id=$row_cats['cat_id'];
                              $cat_title=$row_cats['cat_title'];

                              echo "<li> <a href='#'>$cat_title</a>ok</li>";

                           }



                       }







function getBrands()
              {

                 global $con;

                 $get_brands = "select * from brands";  /* writing a query */

                 $run_brands=mysqli_query($con,$get_brands);   /* running the query */
 
                     while ($row_brands=mysqli_fetch_array($run_brands))  
                           {
 
                              $brand_id=$row_brands['brand_id'] ;
                              $brand_title=$row_brands['brand_title'];

                              echo "<li> <a href='#'>$brand_title</a></li>";  /* for displaying   */

                           }
                }




                       function getpro()
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
                                                   
                                                                    <img src='admin/product_images/$pro_image' width='180' height='180' />

                                                                    <p> &#8377 <b>$pro_price</b></p> 

                                                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                                                                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>

                                                            </div>
                                                         ";

                                                    }



                                      }


?>
