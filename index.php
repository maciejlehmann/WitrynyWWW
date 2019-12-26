<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <link rel="stylesheet" href="style2.css" type="text/css"/>
  <title>Lehmann Blog</title>

  <?php
  $servername = "remotemysql.com";
  $username = "JUeYJ2I6xf";
  $password = "Th38mEVQMY";
  $dbname = "JUeYJ2I6xf";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      echo "Błąd połączenia z bazą danych...";
  }

  // We need to use sessions, so you should always start sessions using the below code.
  session_start();
  // If the user is not logged in redirect to the login page...
  ?>
</head>

<body>

  <div class="header">
    <h2>Lehmann Blog</h2>
  </div>

  <div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <a href="gallery.php?opcja=gallery">Gallery</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <div class="row">
    <div class="leftcolumn">
      <?php
        $query1 = "SELECT * FROM news";
        $result = $conn->query($query1);

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '
                <div class="card">
                  <h2>' .$row['title']. '</h2>
                  <h5>' . $row['author'].', ' .$row['created'].'</h5>
                  <p align="justify">' .$row['body']. '</p>
                </div>';
          }
        }

        echo '</div>
              <div class="rightcolumn">
              <div class="card">';

        if (!isset($_SESSION['loggedin'])) {
      ?>
        <button onclick='document.getElementById("id01").style.display="block"' style='width:auto;'>Login</button>
      <?php
        }
        else {
          echo '<a href="profile.php" class="logout">Profile</a>
      		      <a href="logout.php" class="logout">Logout</a>';
        }
      ?>

      </div>

      <div class="card">
      </div>
      <div class="card">
      </div>
    </div>
  </div>

  <div class="footer">
    <h2>Footer</h2>
  </div>

  <div id="id01" class="modal">
    <form class="modal-content animate" action="authenticate.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Password" name="password" required>

        <button type="submit">Login</button>
      </div>
    </form>
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
    }
  </script>

</body>
</html>
