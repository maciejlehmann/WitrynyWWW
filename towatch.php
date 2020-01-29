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
  <a href="sort.php">Series</a>
  <a href="image.php">Actors</a>
  <a class="active" href="towatch.php">To Watch List</a>
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


<div id="myDIV" class="header">
  <h2 style="margin:5px">To Watch List</h2>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL">
<?php
        $query1 = "SELECT * FROM towatch";
        $result = $conn->query($query1);

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
           echo '<li>'.$row['title'].'</li>'; 
          }
        }  
?>
</ul>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
</footer>

<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

</body>
</html>

