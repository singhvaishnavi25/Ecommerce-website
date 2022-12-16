<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){

  foreach($_SESSION["shopping_cart"] as $value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Cart</title>
</head>
<body>
<div class="headder">
        <div class="logo">
        <h2>Cart <img src="images/cart-icon.png" /></h2>
        
        </div>
        <div class="wrap1">
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table">
<body>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='images/<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>

<td><?php echo "Rs ".$product["price"]; ?></td>
<td><?php echo "Rs ".$product["price"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs ".$total_price; ?></strong>

</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3 >Your cart is empty!</h3>";
 }
?>
</div></div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px; ">
<?php echo $status; ?>
</div>
  
</body>
</html>