<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
  </head>
  <body>
    <?php

    $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
    if ($mysqli->connect_errno)
    {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $query = "SELECT UserID FROM User ORDER BY UserID ASC";
    if ($result = $mysqli->query($query))
    {
      echo "<form action ='UserProfile.php' method = 'POST'>";
      echo "<select name = 'postids'>";
      while ($row = $result->fetch_assoc())
      {
        $postid = $row["UserID"];
        echo "<option value = '";
        echo $postid;
        echo "'>";
        echo $postid;
        echo "</option>";
      }
      echo "</select>";

      echo "<input type='submit' value='submit'>";
      echo "</form>";
      $result->free();
    }
    $mysqli->close();
    ?>
  </body>
</html>
