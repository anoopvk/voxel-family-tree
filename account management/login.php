<?php
include 'config.php';

$uname_in = $_POST["username"];
$pass_in = $_POST["password"];
$uname_in = mysqli_real_escape_string($conn, $uname_in);

$sql = "SELECT * FROM `userdata` WHERE `username`= '$uname_in'";

echo $sql . "<br>";
$result = $conn->query($sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "username exists";
        $row = mysqli_fetch_array($result);
        $pass_db = $row['password'];
        // echo "<br>correct pass is ".$pass_db;
        if (password_verify($pass_in,  $pass_db)) {
            // **************************************
            // echo (password_verify($pass,  $hashedpass));
            // ********************************
            header("Location: dashboard.html");
            echo "<br>correct password";
        } else {
            header("Location: client_login.php?er=incorrect password");

            echo "<br>incorrect password";
        }
    } else {
        header("Location: client_login.php?er=invalid username");

        echo "username does not exist";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
