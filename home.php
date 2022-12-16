<?php
session_start();
include('db.php');
$status="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
*{
    margin: 0;
    padding: 0;
    text-decoration: none;
    font-family: poppins;
}
.headder{
    background-color: rgb(168, 162, 168);
    width: 100%;
    height: 50px;
    top: 0;
    position:fixed;
}
.logo h2{
    color: white;
    padding-left: 20px;
    padding-top: 8px;
}
.navbar ul{
    list-style: none;
    display:inline-flex;
    float: right;
    margin-top: -39px;
    margin-right: 20%;
}
.navbar li{
    padding: 10px 25px;
    font-weight: 500;
}
.navbar li a{
    color:white;
}
.cart img{
    height: 40px;
    width: 40px;
    fill: white;
}
.gif{
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    overflow: auto;
}
    </style>
</head>
<body>
    <div class="gif">
        <img src='images/giphy.gif' width='100%' height='99%'>
    </div>
    <div class="headder">
        <div class="logo">
        <h2>V's Gadgets</h2>
        </div>
        <div class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="welcome.php">Products</a></li>
            <li><a href="cart.php"><img src="images/cart-icon.png" /> Cart
                <?php
                    if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                </a>
                <span><?php echo $cart_count; ?></span>
                <?php } ?>
            </li>
        </ul>
        </div>
    </div>
</body>
</html>