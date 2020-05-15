<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
  /* check connection */
  if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$postids = $_POST["postids"];

$query = "SELECT PostText FROM Post WHERE PostUser = '$postids' ";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
	    echo $row["PostText"];
    }
    $result->free();
}
/* close connection */
$mysqli->close();
?>
