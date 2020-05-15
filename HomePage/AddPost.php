<?php
  session_start();
  print_r($_SESSION);
  /*$date = "1";
  $title = "2";
  $text = "3";
  $userID = "4";

  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");*/

  /* check connection */
  /*if ($mysqli->connect_error)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "INSERT INTO Post (PostDate,PostTitle,PostText,PostUser) VALUES ('" . $date ."', '". $title ."', '". $text ."', '" . $userID . "');";
  if ($result = $mysqli->query($query))
  {
  }
  echo "
  <script>
  alert('Your Post has been submitted successfully!');
  window.location.reload();
  </script>
    ";
  }
*/
    /* close connection */
    //$mysqli->close();
?>
