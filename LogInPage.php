<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>STEM Book</title>
    <center>
      <h1>Login to your STEM Book</h1>
    </center>
  </head>
  <body>
    <center>
      <form action="CheckLogin.php" method="post">
        <p>Nickname: <input type="text" name="username" ></p>
        <p>Password: <input type="text" name="password" ></p>
        <input type="submit"  value="Login">
      </form>
      <p> Create Your Acount now!</p>
      <a href='Account/CreateAccount.html'><button>Register Here</button></a>
    </center>
  </body>
</html>
