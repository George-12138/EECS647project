
<?php
  session_start();
  $username = $_POST["username"];
  $password = $_POST["password"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
  /* check connection */
  if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  if ($username == ""||$password == "")
  {
    echo "
    <script>
    alert('Error: nickname or password is empty.');
    window.history.go(-1);
    </script>
    ";
  }
  else
  {

    $query = "SELECT * FROM User WHERE UserName = '$username'";
    if ($result = $mysqli->query($query))
    {
      $row = $result->fetch_assoc();
      if($password == $row["UserPassword"])
      {
        $_SESSION["ID"] = $row["UserID"];
        echo "
        <script> window.location.replace('HomePage/HomePage.php');
        </script>
        ";
      }
      else
      {
        echo "
        <script>
        alert('nickname or password is incorrect. XD');
        window.history.go(-1);
        </script>"
        ;
      }
    }
  }
  /* close connection */
  $mysqli->close();
?>
