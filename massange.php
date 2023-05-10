<?php

$conn = mysqli_connect("localhost", "root", "", "final");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD']== "POST") {
// Prepare an insert statement
    $sql = "INSERT INTO `message`( `email`, `massage`) VALUES(?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
// Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $massage);
        // set parameters
        $email = $_POST["email"];
        $massage = $_POST["massage"];

        mysqli_stmt_execute($stmt);


        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);

    }


// Close statement
    mysqli_stmt_close($stmt);

// Close connection
    mysqli_close($conn);
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

    <title>Login - Hiweeb</title>
</head>
<body>
<div class="container">
    <p class="login-text">Comment</p>
    <form class="login-email" action="massange.php" method="post">

        <div class="input-group">
            <input type="email" placeholder="Email"  name="email" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Comment"  name="massage" required>
        </div>
        <div class="input-group">
            <button class="btn">Submit</button>
        </div>
    </form>
</div>
</body>
</html>