<?php
  session_start();

  $postid = $_POST["postid"];
  // 0 is reply
  $isReply = $_POST["isreply"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");

  /* check connection */
  if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  if ($isReply == 0)
  {
    $query = "UPDATE Reply SET ReplyLike = ReplyLike + 1 WHERE ReplyID = '$postid' ";
    if ($result = $mysqli->query($query))
    {
    }
  }
  else
  {
    $query = "UPDATE Post SET PostLike = PostLike + 1 WHERE PostID = '$postid' ";
    if ($result = $mysqli->query($query))
    {
    }
  }
    /* close connection */
    $mysqli->close();
?>
