<?php
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="VisitProfile.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="VisiterProfile.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
  $userID = $_SESSION["ID"];
  $guestID = $_SESSION["GuestID"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
  if ($mysqli->connect_errno)
  {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  ?>
<div class="about-section">
  <h1>
  <?php
  $query = "SELECT * FROM User WHERE UserID = '$guestID'";
  if ($result = $mysqli->query($query))
  {
      while ($row = $result->fetch_assoc())
      {
       echo $row["UserName"];
      }
      $result->free();
  }
   ?>
 </h1>
</div>
<form method="post" action="../HomePage/HomePage.php">
  <p><button class="button" type="submit"> go back </button></p>
</form>
<?php
$query = "SELECT * FROM Following WHERE FollowFrom = '$userID'";
if ($result = $mysqli->query($query))
{
    $find = false;
    while ($row = $result->fetch_assoc())
    {
     if ($row["FollowTo"]==$guestID)
     {
       $find = true;
     }
    }
    if(!$find)
    {
      echo '<p><button class="button" data-value="'.$guestID.'" onclick="follow(this)">Follow</button></p>';
    }
    $result->free();
}
 ?>
<h2 style="text-align:center" id="Post">Posts</h2>
<div class="row">
  <?php
  $query = "SELECT * FROM Post WHERE PostUser = '$guestID'";
  if ($result = $mysqli->query($query))
  {
      while ($row = $result->fetch_assoc())
      {
       echo "<script>"."addpost('".
       $row["PostTitle"]."','".
       $row["PostText"]."','".
       $row["PostDate"]."','".
       $row["PostID"]."')".
       "</script>";
      }
      $result->free();
  }
   ?>
</div>

</body>
</html>
