
<?php
session_start();
// check if the user is already logged in
if(!isset($_SESSION['username']))
{
    header("location: sign_in.php");
    exit;
}
include "includes/style.php";
include "includes/navbar.php";
require_once "config.php";

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD']== "POST") {
    // Prepare an insert statement

    //validation missing in image.
    $temp_name=$_FILES['image']['tmp_name'];
    $filename=$_FILES['image']['name'];
    $folder = "upload/".$filename;
    if (move_uploaded_file($temp_name, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
// Prepare an insert statement


    $sql = "INSERT INTO `profile`( `firstname`, `lastname`, `number`, `address`, `email`, `image`) VALUES(?,?,?,?,?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
// Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s s s s s s", $firstname,$lastname, $number, $address, $email, $image);
        // set parameters
        $firstname = $_POST["firstname"];
        $lastname = $_POST["last name"];
        $number=$_POST["number"];
        $address=$_POST["address"];
        $email = $_POST["email"];
        $image=$_FILES['image']['name'];
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

<br>
<br>
<br>
<br>
<br>
<link rel="stylesheet" href="common.css">
</form method="POST" action="profile.php" enctype="multipart/form-data">
<div class="container">
    <h1 align="center"><b><u> <i><span style="color: #fd4c66;">Profile</span></i></u></b></h1>

    <form class="login-email">
        <h3><b><p class="login-text"><u><span style="color: #fd4c66;">Make Your profile</span></u></p></b></h3>
        <div class="input-group">
            <input input type="text" class="form-control" name="firstname" placeholder="first name" required>
        </div><br>
        <div class="input-group">
            <input  type="text" class="form-control" value="" name="lastname" placeholder="surname" required>
        </div><br>
        <div class="input-group">
            <input  type="text" class="form-control" name="number" placeholder="enter phone number" required>
        </div><br>
        <div class="input-group">
            <input type="text" class="form-control"  name="address" placeholder="enter address"  required>
        </div><br>
        <div class="input-group">
            <input  type="email" class="form-control" name="email" placeholder="enter email "required>
        </div><br>
         <div class="input-group">
            <input type="file" class="form-control"  name="image" placeholder="your picture " required>
        </div><br>
        <a class="fancy" ">
            <span class="top-key"></span>
        <button class="text"  type="submit">save profile</button>
<!--            <span class="text"  type="submit" > Save Profile</span>-->
<!--            <span class="bottom-key-1"></span>-->
<!--            <span class="bottom-key-2"></span>-->
        </a>

    </form>
</div>

</body>
</html>
