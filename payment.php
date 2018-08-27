    
<div>

<?php

 include("includes/db.php");

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
            
            $product_name=$pp_price['product_price'];

            $values=array_sum($product_price); 
            $total +=$values;
        }
    }





?>

	<br>
	<h2 align="center"> Pay Now With Paypal</h2>
<p style="text-align: center;"><img src="paypal.jpg" width="200" height="100" /></p>

<br>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >

<!-- Identify your business so that you can collect the payments.  -->
<input type="hidden" name="business" value="ashutoshraj908-facilitator@gmail.com"  >

<!--  specify a buy now button   -->
<input type="hidden" name="cmd" value="_xclick">

<!-- specify details about the item that buyers will purchase -->
<input type="hidden" name="item_name" value="<?php echo "$product_name";  ?>">
<input type="hidden" name="amount" value="<?php echo "$total"; ?>">
<input type="hidden" name="currency_code" value="usd">


<input type="hidden" name="return" value="paypal_success.php">
<input type="hidden" name="cancel_return" value="paypal_cancel.php">


<!-- Display the payment button -->
<input type="image" name="submit" border="0" src="paypal" alt="Paypal - The safer ,easier way to pay online" width="195" height="110">

<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_us/i/scr/pixel.gif" >


</form>
</div>


