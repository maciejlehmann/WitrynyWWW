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
  <a class="active" href="index.php">Home</a>
  <a href="gallery.php">Posters</a>
  <a href="movies.php">Premieres</a>
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

<!-- Slide Show -->
<center><section>
  <img class="mySlides" src="1.jpg"
  style="width:60%">
  <img class="mySlides" src="2.jpg"
  style="width:60%">
  <img class="mySlides" src="3.jpg"
  style="width:60%">
</section></center>

<!-- Band Description -->
<section class="w3-container w3-center w3-content" style="max-width:600px">
  <h2 class="w3-wide">GENEZA FILMU</h2>
  <p class="w3-justify">Powstanie filmu wiązało się z odkryciem niedoskonałości ludzkiego wzroku i jego opóźnień w przetwarzaniu obrazu. W związku z tym powstały urządzenia „oszukujące” wzrok, które ciąg szybko zmieniających się nieruchomych obrazków przeobrażały w ruchomy obraz. Najwcześniejsze z nich to camera obscura; w XVIII i XIX wieku powstały również takie urządzenia, jak zoetrop, praksinoskop i fenakistiskop. Owe praktyki dziś zalicza się do wczesnej historii kina i nazywa jej prehistorią. W 1877 roku Hannibal Goodwin opracował taśmę celuloidową, co znacząco przyspieszyło rozwój techniki filmowej. Pierwsze, prymitywne filmy powstały orientacyjnie w 1887 i 1888, a ich autorem był francuski wynalazca Louis Le Prince; do innych pionierów sztuki filmowej należeli Max Skladanowsky oraz William Friese-Greene. Pod koniec XIX wieku powstało wiele eksperymentalnych urządzeń do wyświetlania filmów (między innymi kinetoskop autorstwa Thomasa Alvy Edisona).</p>
</section>

<!-- Band Members -->
<section class="w3-row-padding w3-center w3-light-grey">
  <article class="w3-third">
    <p>Charles Chaplin</p>
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/00/Charlie_Chaplin.jpg" alt="Random Name" style="width:30%">
    <p>Potocznie znany pod przydomkiem Charlie, sławny ze względu na swoją charakterystyczną rolę włóczęgi. Po nadejściu epoki kina dźwiękowego niechętnie wcielał w swoich filmach nową technologię. Pierwszym jego udźwiękowionym dziełem były Dzisiejsze czasy (1934), satyra na nowoczesność.</p>
  </article>
  <article class="w3-third">
    <p>Auguste i Louis Lumière</p>
    <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Fratelli_Lumiere.jpg" alt="Random Name" style="width:30%">
    <p>Za pierwszych twórców w historii kina uznawani są bracia Auguste i Louis Lumière, którzy 13 lutego 1895 roku opatentowali urządzenie zwane kinematografem, a 28 grudnia 1895 roku zorganizowali pierwszy publiczny pokaz filmowy, który odbył się w Paryżu.</p>
  </article>
  <article class="w3-third">
    <p>James Dean</p>
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/James_Dean_in_East_of_Eden_trailer_2.jpg" alt="Random Name" style="width:50%">
    <p>Symbol buntu w kinie amerykańskim lat 50. XX wieku. Grał głównie role skonfliktowanych ze światem postaci, uosabiając przemiany obyczajowe w Stanach Zjednoczonych.</p>
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
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

</body>
</html>

