<?php
  session_start();
  $postreply = $_POST["postreply"];
  $userID = $_SESSION["ID"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
  $userFound = false;
  $pwFound = true;

  /* check connection */
  if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "INSERT INTO Reply (ReplyText, ReplyUser) VALUES ('" . $postreply ."', '" . $userID . "');";
  echo "
  <script>
  alert('Your reply has been submitted successfully!');
  window.location.reload();
  </script>
    ";
  }

    /* close connection */
    $mysqli->close();
?>
