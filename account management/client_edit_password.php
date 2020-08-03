<?php
if(isset( $_GET["er"])){
    $er=$_GET["er"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>editpassword</title>
  </head>

  <body>
    <?php
    if(isset($er)){
        echo($er);
    }
    ?>
    <h1>Edit Password</h1>
    <form action="edit_password.php" method="post">
      <br />
      <label for="old_password">Old Password</label>
      <input type="text" name="old_password" id="password" required/>
      <br />
      <label for="new_password">New Password</label>
      <input type="password" name="new_password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
      <br />
      <label for="con_password">Confirm Password</label>
      <input type="password" name="con_password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
      <br />
      <br />
      <input type="submit" value="submit" />
    </form>
  </body>
</html>
