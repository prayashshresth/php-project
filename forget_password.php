<?php
session_start();
require_once  "config.php";
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $sql = "SELECT * FROM login WHERE id=?";
    if($stmt= mysqli_prepare($conn,$sql)) {
        mysqli_stmt_bind_param($stmt,"i",$param_id);
        $param_id=$_SESSION['id'];
        if(mysqli_stmt_execute($stmt)) {

            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($result);
            print_r($row);
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

    <title>forget password</title>
</head>
<body>
<div class="container">
    <p class="login-text">Change Password</p>
    <form class="login-email">

        <div class="input-group">
            <input type="text" name="currentPassword" placeholder="current password" required>
        </div>
        <div class="input-group">
            <input type="new password" name="newPassword" placeholder="new password" required>
        </div>
        <div class="input-group">
            <input type="Conform password" name="confirmPassword"placeholder="conform password" required>
        </div>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <div class="input-group">
            <button class="btn">Login</button>
        </div>

    </form>
</div>
</body>
</html>

