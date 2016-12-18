<?php
// login.php
session_start();
include ("functions.php");
if ($_POST) {
  $error = login_check($_POST);
  if (trim($error)=="") {
    $_SESSION["member_id"] = login($_POST);
    Header("Location: ./index.php"); // Redirect correct member
    exit();
  } else {
    print "Error:$error";
  }
}
?>
<form method="post">
Username : <input type="text" name="username"><br />
Password : <input type="password" name="password"><br />
<input type="submit" value="Login">
</form> 