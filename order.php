<?php
session_start();
// check if the user is already logged in
if(!isset($_SESSION['username']))
{
    header("location: sign_in.php");
    exit;
}
$conn = mysqli_connect("localhost", "root", "", "final");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD']== "POST") {
    // Prepare an insert statement

    $temp_name=$_FILES['image']['tmp_name'];
    $image=$_FILES['image']['name'];
    $folder = "med/".$image;
    if (move_uploaded_file($temp_name, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
// Prepare an insert statement
    $sql = "INSERT INTO `order`(`name`, `mg`, `Picecs`, `image`) VALUES (?,?,?,?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
// Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssis", $name,$mg, $Picecs,
            $image);

        // set parameters
        $name= $_POST["name"];
        $mg= $_POST["Mg"];
        $Pieces= $_POST["Pieces"];
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
<!DOCTYPE html>
<html>

<head>
    <title>
        Html CRUD with Pure JavaScript
    </title>
    <link rel="stylesheet" href="link.css">
</head>

<body>
<h1>Record Management System</h1>
<table>
    <tr>
        <td>
            <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">

                <div>
                    <label>Student ID*</label><label class="validation-error hide" id="fullNameValidationError">This
                        field is required.</label>
                    <input type="text" name="stdid" id="stdid">
                </div>
                <div>
                    <label>Medicine</label>
                    <input type="text" name="fullname" id="fullname">
                </div>
                <div>
                    <label>piece</label>
                    <input type="text" name="class" id="class">
                </div>
                <div>
                    <label>Photo</label>
                    <input type="file" name="address" id="address">
                </div>

                <div class="form-action-buttons">
                    <input type="submit" value="Submit">
                </div>

            </form>
        </td>
        <td>
            <table class="list" id="stdList">
                <thead>
                <tr>

                    <th>Medicine</th>
                    <th>Mg</th>
                    <th>Piece</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody id="tbd">

                </tbody>
            </table>
            <a href="index.php">
                <h1><button > Done </button></h1></a>
        </td>
    </tr>
</table>
<script defer src="script.js"></script>
</body>
</html>
