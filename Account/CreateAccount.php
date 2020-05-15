<?php
  $username = $_POST["username"];
  $password = $_POST["password"];
  $repassword = $_POST["repassword"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
  $userFound = false;
  $pwFound = true;

  /* check connection */
  if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }


  if ($username == ""|| $password == "" || $repassword == "")
  {
    echo "
    <script>
    alert('Error: both username and password fields must be filled out to create account');
    window.history.go(-1);
    </script>
    ";
  }
  else if($password != $repassword )
  {
	   echo "
     <script>
     alert('Error: Passwords do not match!');
     window.history.go(-1);
     </script>
     ";
     $pwFound = false;
  }
  else
  {
    $query = "SELECT UserName FROM User WHERE UserName = '$username'";
    if ($result = $mysqli->query($query))
    {
      /* fetch associative array */
      if($row = $result->fetch_assoc())
      {
        $userFound = true;
        echo "<script> alert('Error: Username already exists'); window.history.go(-1);</script>";
      }
      /* free result set */
      $result->free();
    }
  }

  if($userFound == false && $username != "" && $password != "" && $pwFound == true)
  {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO User (UserName, UserPassword) VALUES ('" . $username ."', '" . $password . "');";
    if ($result = $mysqli->query($query))
    {
    }

    echo "
    <script>
    alert('Your account was created successfully! Now login to enjoy the arcade!');
    window.location.replace('../LogInPage.html');
    </script>
    ";
  }

    /* close connection */
    $mysqli->close();
?>
