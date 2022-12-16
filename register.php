
<html>

<head>
    <title>Register</title>
  
    <link rel="stylesheet" href="css/login.css" type="text/css">

</head>

<body>
<div class="headder">
        <div class="logo">
        <h2>Sign Up Page</h2>
        
        </div>
        <div class="wrap1">
    <br>
    <form action="register.php" method="post" name="form1">
        <table >
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <td>Password</td>
            <td><input type="password" name="password" required></td>
            </tr>
            <!-- <tr>
                <td></td>
                <td><input type="submit" name="register" value="Register" class="buttons"></td>
            </tr> -->
        </table>
        <input type="submit" name="register" value="Register" class="buttons">
        <br><span>Already have an account? <a href="login1.php">Login</a><br></span>

        <?php
        //including the database connection file
        include_once("db.php");

        // Check if form submitted, insert user data into database.
        if (isset($_POST['register'])) {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            // Validate password strength
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if( !$number || !$specialChars || strlen($password) < 8) {
            echo 'Password should be at least 8 characters in length and should include at least one number, and one special character.';
        }else{
            echo 'Strong password.';   
            
            //Validate email
        // If email already exists, throw error
        $query="SELECT 'email' from 'users' where email='$email' and password='$password'";
        $email_result = mysqli_query($con, $query);
            
        if($email_result){
            echo "This username is already taken.";
        } else{
        $result   = mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");

            // check if user data inserted successfully.
        if ($result) {
                echo "<br/><br/>User Registered successfully.";
    
            } 
        else {
                echo "<br><br>Registration error. Please try again.<br>" . mysqli_error($con);
            }        
        }         
            }

        

           
            
        }

        ?>
    </form>
    </div></div>
</body>

</html>