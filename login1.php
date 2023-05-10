<?php
//This script will handle login
//session_start();
//
//// check if the user is already logged in
//if(isset($_SESSION['username']))
//{
//    header("location: login1.php");
//    exit;
//}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username and password";
        echo $err;
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if(empty($err))
    {
        $sql = "SELECT id, username, password FROM login WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt))
                {
                    if(password_verify($password, $hashed_password))
                    {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: index.php");

                    }
                }

            }

        }
    }


}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7
.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login.css">

    <title>Login </title>
</head>
<body>
<div class="container">
    <p class="login-text">lOGIN</p>
    <form class="login-email" action="login1.php" method="post" >
        <p class="login-text">Login with email</p>
        <div class="input-group">
            <label for="floatingInput">Email address</label>
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
        </div>
        <div class="input-group">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        </div>

        <div class="input-group" href="index.php">
            <button class="btn">Login</button>
        </div>
    </form>
</div>
</body>
</html>
