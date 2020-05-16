<?php
  session_start();
  $userID = $_SESSION["ID"];
  $guestid = $_POST["guestid"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");

  /* check connection */
  if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

      $query = "INSERT INTO Following(FollowTo,FollowFrom) VALUES ('" . $guestid ."', '" . $userID . "');";
      if ($result = $mysqli->query($query))
      {
      }
    /* close connection */
    $mysqli->close();
?>
