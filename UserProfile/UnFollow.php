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

  $query = "DELETE FROM Following WHERE FollowTo = '".$guestid."' AND FollowFrom = '".$userID."';";
  if ($result = $mysqli->query($query))
  {
  }
    /* close connection */
    $mysqli->close();
?>
