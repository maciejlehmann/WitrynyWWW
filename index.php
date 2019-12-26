<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css"/>
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

?>
</head>
<body>

<div class="header">
  <h2>Lehmann Blog</h2>
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

        if(isset($_POST['add']))
        {
          $query3 = "INSERT INTO news (title, author, body, created, updated) VALUES ('".$_POST["title"]."','".$_POST["author"]."','".$_POST["content"]."', now(), now())";
          $result = mysqli_query($conn,$query3);
        }

        if(isset($_POST['delete']))
        {
          $query4 = "DELETE FROM news WHERE id='".$_POST["id"]."'";
          $result = mysqli_query($conn,$query4);
        }

        if(isset($_POST['update']))
        {
          $query5 = "UPDATE news SET title = '".$_POST["title"]."', author = '".$_POST["author"]."', body = '".$_POST["content"]."', updated = now() WHERE id = '".$_POST["id"]."'";
          $result = mysqli_query($conn,$query5);
        }
  ?>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>Dodaj newsa</h2>
      <form action="index.php" method="post">
        <p>
          <label for="title">Title: </label>
          <input type="text" name="title" id="title">
        </p>
        <p>
          <label for="author">Author: </label>
          <input type="text" name="author" id="author">
        </p>
        <p>
          <label for="content">Content: </label>
          <textarea name="content" id="content"></textarea>
        </p>
        <input type="submit" value="Dodaj newsa" name="add">
      </form>
    </div>
    <div class="card">
      <h3>Usuń newsa</h3>
      <form action="index.php" method="post">
        <p>
          <label for="id">Id: </label>
          <input type="text" name="id" id="id">
        </p>
        <input type="submit" value="Usuń newsa" name="delete">
      </form>
    </div>
    <div class="card">
      <h3>Aktualizuj newsa</h3>
      <form action="index.php" method="post">
        <p>
          <label for="id">Id: </label>
          <input type="text" name="id" id="id">
        </p>
        <p>
          <label for="title">Title: </label>
          <input type="text" name="title" id="title">
        </p>
        <p>
          <label for="author">Author: </label>
          <input type="text" name="author" id="author">
        </p>
        <p>
          <label for="content">Content: </label>
          <textarea name="content" id="content"></textarea>
        </p>
        <input type="submit" value="Aktualizuj newsa" name="update">
      </form>
    </div>
  </div>
</div>


<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>
