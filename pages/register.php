<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshbite Register </title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <div class="container">
        <form class="form-div" action="register.php" method="POST">
            <div class="input-div">
                <h2>Register</h2>
            </div>
            <div class="input-div">
                <input type="text" name="fullname" required="true" placeholder="Enter Full name" class="input">
            </div>
            <div class="input-div">
                <input type="text" name="username" required="true" placeholder="Enter username" class="input">
            </div>
            <div class="input-div">
                <input type="text" name="email" required="true" placeholder="Enter email" class="input">
            </div>
            <div class="input-div">
                <input type="text" name="phone" required="true" placeholder="Enter phone" class="input">
            </div>
            <div class="input-div">
                <input type="password" name="password" id="pwd" required="true"  placeholder="Enter password" class="input">
            </div>
            <div class="input-div">
                <button class="btnLogin" name="btnRegister">Register</button>
            </div>
            <div class="input-div">
                You do not have an account ? <a href="index.php">Login</a>
            </div>

        </form>
    </div>
    <?php
    if (isset($_POST['btnRegister'])) {
        $conn=mysqli_connect("localhost","root","","freshbite");
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
       
        $sql_insert="INSERT INTO `users`(`id`, `fullname`, `username`, `phone`, `email`, `password`) VALUES (null,'$fullname','$username','$phone','$email','$password')";
        $exec=mysqli_query($conn,$sql_insert);
       
        if ($exec) {
           header('location:index.php');
        }else{
           echo "sql error";
        }
       
    }

?>
</body>
</html>





<script src="../js/app.js"></script>