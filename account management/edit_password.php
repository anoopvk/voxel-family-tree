<?php
// Start the session
session_start();

include 'config.php';

$old_pass = $_POST["old_password"];
$new_pass = $_POST["new_password"];
$con_pass = $_POST["con_password"];

$uname_in=$_SESSION["u_name"];
$sql = "SELECT * FROM `userdata` WHERE `username`= '$uname_in'";

$result = $conn->query($sql);
if ($result) {
    $row = mysqli_fetch_array($result);
    $pass_db = $row['password'];
    // echo "<br>correct pass is ".$pass_db;
    if (password_verify($old_pass,  $pass_db)) {
        if ($new_pass==$con_pass){
            $hashedpass= password_hash($new_pass, PASSWORD_BCRYPT );
            $hashedpass= mysqli_real_escape_string($conn,$hashedpass);

            $sql = "UPDATE `userdata` SET `password`='$hashedpass' WHERE `username`='$uname_in'";

            if ($conn->query($sql) === TRUE) {
                header("Location: dashboard.html");
            } 
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;

            }
        }
        else {
            header("Location: client_edit_password.php?er=password does not match");
            
            echo "<br>Passwords does not match";
        }
    }
    else {
        header("Location: client_edit_password.php?er=incorrect password");
        
        echo "<br>incorrect password";
    }
}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>