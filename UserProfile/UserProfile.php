<?php
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="UserProfile.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="UserProfile.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
  $userID = $_SESSION["ID"];
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
  $query = "SELECT * FROM User WHERE UserID = '$userID'";
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
  <p><button class="button" type="submit"> back to HomePage </button></p>
</form>

<h2 style="text-align:center" id="Follower">Your Follower</h2>
<div class="row">
<?php
$query = "SELECT * FROM User INNER JOIN Following ON User.UserID=Following.FollowFrom WHERE FollowTo = '$userID'";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
     echo "<script>"."addfollower('".
     $row["UserName"]."')".
     "</script>";
    }
    $result->free();
}
 ?>
</div>

<h2 style="text-align:center" id="Following">Your Following</h2>
<div class="row">
<?php
$query = "SELECT * FROM User INNER JOIN Following ON User.UserID=Following.FollowTo WHERE FollowFrom = '$userID'";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
     echo "<script>"."addfollowing('".
     $row["UserName"]."','".
     $row["UserID"]."')".
     "</script>";
    }
    $result->free();
}
 ?>
</div>

<h2 style="text-align:center" id="Post">Your Posts</h2>
<div class="row">
<?php
$query = "SELECT * FROM Post WHERE PostUser = '$userID'";
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

<h2 style="text-align:center" id="Reply">Your Replys</h2>
<div class="row">
<?php
$query = "SELECT * FROM Reply WHERE ReplyUser = '$userID'";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
     echo "<script>"."addreply('".
     $row["ReplyText"]."','".
     $row["ReplyDate"]."','".
     $row["ReplyTo"]."')".
     "</script>";
    }
    $result->free();
}
 ?>
</div>

</body>
</html>
