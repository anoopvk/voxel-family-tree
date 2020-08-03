<?php
if(isset( $_GET["er"])){
    $er=$_GET["er"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <h1>login</h1>
    <form action="login.php" method="post">
        
        <p style="color:red; font-style: italic;">
        <?php
        if(isset($er) && ($er=="incorrect password" || $er=="invalid username")){
            echo($er);
        }
        ?>
        </p>
        <label for="username">username: </label>
        <input type="text" name="username" id="username" required/>
        <br>
        <br>
        <label for="password">password: </label>
        <input type="password" name="password" id="password" required/>
        <br>
        <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>