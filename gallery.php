<?php
session_start();
$servername = "remotemysql.com";
$username = "JUeYJ2I6xf";
$password = "Th38mEVQMY";
$dbname = "JUeYJ2I6xf";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    echo "Failed to connect to the database.";
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="styleprof.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style2.css" type="text/css"/>
	</head>

	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Gallery</h1>
			</div>
		</nav>

    <div class="topnav" id="myTopnav">
      <a href="index.php">Home</a>
      <a href="gallery.php?opcja=gallery" class=active>Gallery</a>
      <a href="#contact">Contact</a>
      <a href="#about">About</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <?php
      if (isset($_GET['opcja']) && $_GET['opcja'] == "gallery") {
    ?>

		<div class="content">
      <div class="row">
        <?php
        $query2 = "SELECT * FROM gallery";
        $result = $con->query($query2);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<div class="column">
                  <img src="' .$row['url']. '" alt="Nature" style="width:100%" onclick="myFunction(this);" height="150">
                  </div>';
          }
        }
         ?>
      </div>

      <div class="container">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
      </div>
		</div>

    <script>
      function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
      }
    </script>

    <?php
      }
    ?>
	</body>
</html>
