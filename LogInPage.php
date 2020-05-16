<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="LogInPage.css" rel="stylesheet" type="text/css">
    <title>STEM Book</title>
  </head>
  <body>
    <center>
      <form action="CheckLogin.php" method="post">
        <div class="container">
          <h1>Login to your STEM Book</h1>
          <hr>
          <label for="username"><b>User name</b></label>
          <input type="text" placeholder="Enter username" name="username" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <hr>
          <button type="submit" class="LogInBtn">Log In</button>
        </div>
      </form>
      <p> Create Your Acount now!</p>
      <a href='Account/CreateAccount.html'><button class="button">Register Here</button></a>
    </center>
  </body>
</html>
