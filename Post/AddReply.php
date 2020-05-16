<?php
  session_start();
  $text = $_POST["text"];
  $date = $_POST["date"];
  $replyTo = $_POST["postid"];
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

  $query = "INSERT INTO Reply (ReplyText, ReplyDate, ReplyUser, ReplyTo) VALUES ('" . $text ."', '". $date ."', '". $userID ."', '" . $replyTo . "');";
  if ($result = $mysqli->query($query))
  {
  }
    /* close connection */
    $mysqli->close();
?>
