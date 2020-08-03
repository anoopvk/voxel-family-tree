<?php
include 'config.php';

$uname = $_POST["username"];
$pass = $_POST["password"];
$uname= mysqli_real_escape_string($conn,$uname);
$hashedpass= password_hash($pass, PASSWORD_BCRYPT );
$hashedpass= mysqli_real_escape_string($conn,$hashedpass);

// $query="SELECT * FROM `dept` WHERE 1";
$sql = "INSERT INTO `userdata`( `username`, `password`) VALUES ('$uname','$hashedpass')";

// $result=mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();

?>