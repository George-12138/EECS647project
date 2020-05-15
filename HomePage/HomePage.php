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
      <form align="right" name="form1" method="post" action="../LogInPage.php">
        <label>
        <input name="submit2" type="submit" id="submit2" value="log out">
        </label>
      </form>
      <?php
      $userID = $_SESSION["ID"];
      $mysqli = new mysqli("mysql.eecs.ku.edu", "c712g285", "caC3miex", "c712g285");
          if ($mysqli->connect_error)
          {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
          }
          ?>

       <input type="hidden" id="userid" <?php echo 'value = "'.$userID.'"'; ?> >
		   <div id="box" class="container box">
			      <div id="header" class="row container">
			           <div class="col m1 container center">
			                <img type="image" src="icon.png" height="98" width="98">
			           </div>
			           <div class="col m5 container center">
			                <h1 id="title" >Main Page</h1>

			           </div>
			           <div class="col m1 container center">
                      <input type="image" id="head" class="round" src="head.png" height="70" width="70" <?php echo 'data-value = "'.$userID.'"'; ?> onclick=toprofile(this)>
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
               $query = "SELECT * FROM Post INNER JOIN User ON User.UserID=Post.PostUser ORDER BY PostDate ASC";
               if ($result = $mysqli->query($query))
               {
                 while ($row = $result->fetch_assoc())
                 {
                       echo "<script>"."addpost('".
                       $row["PostTitle"]."','".
                       $row["PostText"]."','".
                       $row["UserName"]."','".
                       $row["PostDate"]."','".
                       $row["PostID"]."','".
                       $row["PostUser"]."')".
                       "</script>";
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
