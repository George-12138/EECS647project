<?php
session_start();
?>
<html>
    <head>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script type="text/javascript"
               src="Post.js">
      </script>
	  <link href="Post.css"
		rel="stylesheet"
		type="text/css">
    </head>

    <body>
      <?php
      $userID = $_SESSION["ID"];
      $PostID = $_SESSION["PostID"];
      $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
      if ($mysqli->connect_errno)
      {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
      }
      ?>
	  <input type="hidden" id="postid" <?php echo 'value = "'.$PostID.'"'; ?> >
    <input type="hidden" id="userid" <?php echo 'value = "'.$userID.'"'; ?> >
		<div id="box" class="container box">
			<div class="row container">
			<div class="col m1 container center">
			<img src="icon.png" height="98" width="98">
			</div>
			<div class="col m5 container center">
			<h2 id="title" class="distext">
        <?php
        $query = "SELECT * FROM Post WHERE PostID = '$PostID' ";
        if ($result = $mysqli->query($query))
        {
          if($row = $result->fetch_assoc())
          {
            echo $row["PostTitle"];
          }
          $result->free();
        }
        ?>
      </h2>
			</div>
			</div>
			<div class="row container">
			<div class="col m1 container center">
        <p class="id">
          <?php
          $query = "SELECT * FROM User WHERE UserID = '$userID' ";
          if ($result = $mysqli->query($query))
          {
            if($row = $result->fetch_assoc())
            {
              echo $row["UserName"];
            }
            $result->free();
          }
          ?>
          </p>
			<input type="image" id="head" class="round" src="head.png" height="30" width="30" <?php
      $query = "SELECT * FROM Post WHERE PostID = '$PostID' ";
      if ($result = $mysqli->query($query))
      {
          if ($row = $result->fetch_assoc())
          {
           echo 'data-value = "'.$row["PostUser"].'"';
          }
          $result->free();
      }
      ?> onclick="toprofile(this)">
			<p class="id">
        <?php
        $query = "SELECT * FROM Post WHERE PostID = '$PostID' ";
        if ($result = $mysqli->query($query))
        {
            if ($row = $result->fetch_assoc())
            {
             echo $row["PostDate"];
            }
            $result->free();
        }
         ?>
       </p>
			<div class="row container">
			<div class="col m05 container center button">
			<input type="image" src="tu.png" width="40" height="40" <?php echo 'data-value = "'.$userID.'"'; ?> onclick="addlike(this)">
			</div>
			<div class="col m05 container center button">
			<p style="margin: 0;font-size:8px;">
      <?php
      $query = "SELECT * FROM Post WHERE PostID = '$PostID' ";
      if ($result = $mysqli->query($query))
      {
          if ($row = $result->fetch_assoc())
          {
           echo $row["PostLike"];
          }
          $result->free();
      }
       ?>
      </p>
			</div>
			</div>
			</div>
			<div class="col m6 container">
			<p id="posttext" class="wrap">
        <?php
        $query = "SELECT * FROM Post WHERE PostID = '$PostID' ";
        if ($result = $mysqli->query($query))
        {
            if ($row = $result->fetch_assoc())
            {
             echo $row["PostText"];
            }
            $result->free();
        }
         ?>
       </p>
			</div>
			</div>
      <?php
      $query = "SELECT * FROM Reply INNER JOIN User ON User.UserID=Reply.ReplyUser WHERE ReplyTo = '$PostID' ORDER BY ReplyDate ASC";
      if ($result = $mysqli->query($query))
      {
          while ($row = $result->fetch_assoc())
          {
           echo "<script>"."addreply('".$row["ReplyText"]."','".$row["UserName"]."','".$row["ReplyDate"]."','".$row["ReplyLike"]."','".$row["ReplyID"]."')"."</script>";
          }
          $result->free();
      }
       ?>
			<div id="replyarea" class="row container">
			<div class="col m6 container">
			<textarea name="text" rows="8" cols="80" wrap="soft"> </textarea>
			</div>
			<div class="col m1 container center button">
			<button id="reply">Post Reply</button>
			</div>
			</div>
		</div>
    <div class="col m6 container">
    <center>
      <button type="button" name="backToHome" onclick="backHome()">Back To Home Page</button>
    </center>
    </div>
    </body>
</html>
