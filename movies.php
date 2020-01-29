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
  <a class="active" href="movies.php">Premieres</a>
  <a href="sort.php">Series</a>
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


<section class="w3-row-padding w3-center w3-light-grey">
  <article class="w3-third">
    <p><h2>Black Widow</h2></p>
    <img src="http://www.impawards.com/2020/posters/black_widow.jpg" alt="Black Widow" style="width:60%">
    <h2><p id="demo1"></p></h2>
  </article>
  <article class="w3-third">
    <p><h2>Mulan</h2></p>
    <img src="http://www.impawards.com/2020/posters/mulan.jpg" alt="Mulan" style="width:60%">
    <h2><p id="demo2"></p></h2>
  </article>
  <article class="w3-third">
    <p><h2>Wonder Woman 1984</h2></p>
    <img src="http://www.impawards.com/2020/posters/wonder_woman_nineteen_eighty_four.jpg" alt="Wonder Woman 1984" style="width:60%">
    <h2><p id="demo3"></p></h2>
  </article>
</section>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
</footer>

<script>
// Set the date we're counting down to
var countDownDate1 = new Date("Apr 29, 2020 00:00:01").getTime();
var countDownDate2 = new Date("Mar 27, 2020 00:00:01").getTime();
var countDownDate3 = new Date("Jun 3, 2020 00:00:01").getTime();


// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance1 = countDownDate1 - now;
  var distance2 = countDownDate2 - now;
  var distance3 = countDownDate3 - now;

    
  // Time calculations for days, hours, minutes and seconds
  var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

  var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
  var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

  var days3 = Math.floor(distance3 / (1000 * 60 * 60 * 24));
  var hours3 = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes3 = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds3 = Math.floor((distance3 % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo1").innerHTML = days1 + "d " + hours1 + "h "
  + minutes1 + "m " + seconds1 + "s ";
  document.getElementById("demo2").innerHTML = days2 + "d " + hours2 + "h "
  + minutes2 + "m " + seconds2 + "s ";
  document.getElementById("demo3").innerHTML = days3 + "d " + hours3 + "h "
  + minutes3 + "m " + seconds3 + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo1").innerHTML = "EXPIRED";
    document.getElementById("demo2").innerHTML = "EXPIRED";
    document.getElementById("demo3").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</body>
</html>

