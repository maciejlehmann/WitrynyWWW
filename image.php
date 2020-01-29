<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<title>Lab7-8</title>

<?php
  $servername = "remotemysql.com";
  $username = "JUeYJ2I6xf";
  $password = "Th38mEVQMY";
  $dbname = "JUeYJ2I6xf";

 
  $conn = new mysqli($servername, $username, $password, $dbname);

 
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      echo "Błąd połączenia z bazą danych...";
  }

  session_start();
  ?>
<style>

.container {
  padding: 10px;
  position: relative;
  width: auto;
}

.image {
  display: block;
  width: auto;
  height: 600px;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: auto;
  width: auto;
  opacity: 0;
  transition: .5s ease;
  background-color: #474e5d;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.row {
  display: -ms-flexbox; /* IE 10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE 10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
<body>


<!-- Navigation -->
<div class="topnav">
<a href="index.php">Home</a>
  <a href="gallery.php">Posters</a>
  <a href="movies.php">Premieres</a>
  <a href="sort.php">Series</a>
  <a class="active" href="image.php">Actors</a>
  <a href="towatch.php">To Watch List</a>
  <a href="timeline.php">Oscars</a>
  <div class="login-container">
    <?php
    if (!isset($_SESSION['loggedin'])) {
      echo '
    <form action="authenticate.php" method="post">
      <input type="text" placeholder="Username" name="username">
      <input type="text" placeholder="Password" name="password">
      <button type="submit">Login</button>
    </form>';
    }
    else{
      echo '<form action="logout.php" method="post"><button type="submit">Logout</button></form>';
    }
    ?>
  </div>
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Go to top</button>

<div class="row">
<?php
        $query1 = "SELECT * FROM actors";
        $result = $conn->query($query1);

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<div class="container">
                  <img src="'.$row['photo'].'" alt="'.$row['name'].'" class="image">
                  <div class="overlay">
                    <div class="text"><h1>'.$row['name'].'</h1><br>
                      <h3>'.$row['movies'].'</h3>
                    </div>
                  </div>
                  </div>';
          }
        }  
?>
</div>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
</footer>

<script>

var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</body>
</html>