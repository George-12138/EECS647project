
<?php
  session_start();
  $userid = $_POST["userid"];
  $_SESSION["ID"] = $_POST["userid"];
  $password = $_POST["password"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
  /* check connection */
  if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  if ($userid == ""||$password == "")
  {
    echo "
    <script>
    alert('Error: Userid or password is empty.');
    window.history.go(-1);
    </script>
    ";
  }
  else
  {
    $query = "SELECT * FROM User WHERE UserID='$userid'";
    if ($result = $mysqli->query($query))
    {
      $row = $result->fetch_assoc();
      if($password == $row["UserPassword"])
      {
        echo "
        <script> window.location.replace('HomePage/HomePage.php');
        </script>
        ";
      }
      else
      {
        echo "
        <script>
        alert('Userid or password is incorrect.(@^@)');
        window.history.go(-1);
        </script>"
        ;
      }
    }
  }
  /* close connection */
  $mysqli->close();
?>
