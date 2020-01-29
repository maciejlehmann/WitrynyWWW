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

<body>

<!-- Navigation -->
<div class="topnav">
<a href="index.php">Home</a>
  <a href="gallery.php">Posters</a>
  <a href="movies.php">Premieres</a>
  <a class="active" href="sort.php">Series</a>
  <a href="image.php">Actors</a>
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

<br>
<center><div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('hbo')"> HBO</button>
  <button class="btn" onclick="filterSelection('netflix')"> NETFLIX</button>
  <button class="btn" onclick="filterSelection('amazon')"> AMAZON</button>
  <button class="btn" onclick="filterSelection('amc')"> AMC</button>
</div></center>

<center><div class="container">
<?php
        $query1 = "SELECT * FROM sort";
        $result = $conn->query($query1);

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if($row['category'] == "hbo") {
              echo '<div class="filterDiv hbo">'.$row['title'].'</div>';
            }
            if($row['category'] == "netflix") {
              echo '<div class="filterDiv netflix">'.$row['title'].'</div>';
            }
            if($row['category'] == "amazon") {
              echo '<div class="filterDiv amazon">'.$row['title'].'</div>';
            }
            if($row['category'] == "amc") {
              echo '<div class="filterDiv amc">'.$row['title'].'</div>';
            }
          }
        }  
?>
</div></center>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
</footer>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
</html>

