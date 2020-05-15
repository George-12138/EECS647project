<?php
session_start();
?>
<html>
    <head>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script type="text/javascript"
               src="HomePage.js">
      </script>
	  <link href="HomePage.css"
		rel="stylesheet"
		type="text/css">
    </head>
    <body>
      <?php
      $userID = $_SESSION["ID"];
      $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
          if ($mysqli->connect_error)
          {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
          }
          ?>
		   <div id="box" class="container box">
			      <div class="row container">
			           <div class="col m1 container center">
			                <img type="image" src="icon.png" height="98" width="98">
			           </div>
			           <div class="col m5 container center">
			                <h1 id="title" >Main Page</h1>

			           </div>
			           <div class="col m1 container center">
                   <a href="../UserProfile/UserProfile.php">
                      <input type="image" id="head" class="round" src="head.png" height="70" width="70" <?php echo 'value = "'.$userID.'"'; ?>>
                      </a>
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
			           </div>
			     </div>
           <?php
               $query = "SELECT * FROM Post";
               if ($result = $mysqli->query($query))
               {
                 while ($row = $result->fetch_assoc())
                 {
                       echo "<script>"."addpost('".$row["PostTitle"]."','".$row["PostText"]."','".$row["PostDate"]."','".$row["PostUser"]."')"."</script>";
                 }
                 $result->free();
               }
               $mysqli->close();
            ?>
            <div id="postarea" class="row container">
      			<div class="col m6 container">
            <input id="titleinput" size="75">
      			<textarea name="text" rows="8" cols="80" wrap="soft"> </textarea>
      			</div>
      			<div class="col m1 container center button">
      			<button id="post">Post</button>
      			</div>
      			</div>
		   </div>
    </body>
</html>
