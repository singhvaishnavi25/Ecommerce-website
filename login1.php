<?php

// Start PHP session at the beginning 
session_start();

// Create database connection using config file
include_once("db.php");

// If form submitted, collect email and password from form
if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check if a user exists with given username & password
    $query="SELECT * from users ";//where 'email'='$email' and 'password'='$password'
    $result = mysqli_query($con,$query );
 
    
   

    if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['name'];
		header("Location: welcome.php");
        exit;
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
   
  
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" type="text/css">

</head>

<body>
    
    <div class="headder">
        <div class="logo">
        <h2>Login Page</h2>
        
        </div>
        <div class="wrap1">
        <form action="login1.php" method="post" name="form1">
      
        <table >
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <!-- <tr>
                <td></td>
                <td><input type="submit" name="login" value="Login" class="buttons"></td>
            </tr> -->
        </table>
        <input type="submit" name="login" value="Login" class="buttons">

        </form>
        </div>

</body>

</html>