<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}
td {
  width: 10%;
}
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
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

  <?php
      $query1 = "SELECT * FROM agents";
      $result = $conn->query($query1);
      echo '<b><p>SELECT</p></b><table>';
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '
          <tr>
          <td>'.$row['AGENT_CODE'].'</td><td>'.$row['AGENT_NAME'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['COMMISSION'].'</td><td>'.$row['PHONE_NO'].'</td><td>'.$row['COUNTRY'].'</td>
          </tr>';
          }
        }
        echo '</table><hr>';

        $query2 = "SELECT DISTINCT COUNTRY FROM agents";
        $result = $conn->query($query2);
        echo '<b><p>SELECT DISTINCT</p></b><table>';
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '
            <tr>
            <td>'.$row['COUNTRY'].'</td>
            </tr>';
            }
          }
          echo '</table><hr>';

          $query3 = "SELECT * FROM agents WHERE COUNTRY = 'USA'";
          $result = $conn->query($query3);
          echo '<b><p>WHERE</p></b><table>';
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo '
              <tr>
              <td>'.$row['AGENT_CODE'].'</td><td>'.$row['AGENT_NAME'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['COMMISSION'].'</td><td>'.$row['PHONE_NO'].'</td><td>'.$row['COUNTRY'].'</td>
              </tr>';
              }
            }
            echo '</table><hr>';

            $query4 = "SELECT * FROM agents WHERE COUNTRY = 'USA' AND AGENT_NAME = 'Alex'";
            $result = $conn->query($query4);
            echo '<b><p>AND</p></b><table>';
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo '
                <tr>
                <td>'.$row['AGENT_CODE'].'</td><td>'.$row['AGENT_NAME'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['COMMISSION'].'</td><td>'.$row['PHONE_NO'].'</td><td>'.$row['COUNTRY'].'</td>
                </tr>';
                }
              }
              echo '</table><hr>';

              $query5 = "SELECT * FROM agents WHERE COUNTRY = 'USA' OR COUNTRY = 'Canada'";
              $result = $conn->query($query5);
              echo '<b><p>OR</p></b><table>';
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo '
                  <tr>
                  <td>'.$row['AGENT_CODE'].'</td><td>'.$row['AGENT_NAME'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['COMMISSION'].'</td><td>'.$row['PHONE_NO'].'</td><td>'.$row['COUNTRY'].'</td>
                  </tr>';
                  }
                }
                echo '</table><hr>';

                $query6 = "SELECT * FROM agents WHERE NOT COUNTRY = 'USA'";
                $result = $conn->query($query6);
                echo '<b><p>NOT</p></b><table>';
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '
                    <tr>
                    <td>'.$row['AGENT_CODE'].'</td><td>'.$row['AGENT_NAME'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['COMMISSION'].'</td><td>'.$row['PHONE_NO'].'</td><td>'.$row['COUNTRY'].'</td>
                    </tr>';
                    }
                  }
                  echo '</table><hr>';

                  $query7 = "SELECT * FROM customer ORDER BY CUST_NAME DESC";
                  $result = $conn->query($query7);
                  echo '<b><p>ORDER BY</p></b><table>';
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo '
                      <tr>
                      <td>'.$row['CUST_CODE'].'</td><td>'.$row['CUST_NAME'].'</td><td>'.$row['CUST_CITY'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['CUST_COUNTRY'].'</td><td>'.$row['GRADE'].'</td>
                      </tr>';
                      }
                    }
                    echo '</table><hr>';

                    $query8 = "SELECT * FROM customer LIMIT 8";
                    $result = $conn->query($query8);
                    echo '<b><p>SELECT TOP</p></b><table>';
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                        <td>'.$row['CUST_CODE'].'</td><td>'.$row['CUST_NAME'].'</td><td>'.$row['CUST_CITY'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['CUST_COUNTRY'].'</td><td>'.$row['GRADE'].'</td>
                        </tr>';
                        }
                      }
                      echo '</table><hr>';

                      $query9 = "SELECT * FROM customer WHERE OPENING_AMT BETWEEN 5000 AND 8000 ORDER BY OPENING_AMT";
                      $result = $conn->query($query9);
                      echo '<b><p>BETWEEN</p></b><table>';
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          echo '
                          <tr>
                          <td>'.$row['CUST_CODE'].'</td><td>'.$row['CUST_NAME'].'</td><td>'.$row['CUST_CITY'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['CUST_COUNTRY'].'</td><td>'.$row['GRADE'].'</td><td>'.$row['OPENING_AMT'].'</td>
                          </tr>';
                          }
                        }
                        echo '</table><hr>';

                        $query10 = "SELECT * FROM customer WHERE OPENING_AMT = (SELECT MAX(OPENING_AMT) FROM customer)";
                        $result = $conn->query($query10);
                        echo '<b><p>MAX</p></b><table>';
                        if($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                            <td>'.$row['CUST_CODE'].'</td><td>'.$row['CUST_NAME'].'</td><td>'.$row['CUST_CITY'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['CUST_COUNTRY'].'</td><td>'.$row['GRADE'].'</td><td>'.$row['OPENING_AMT'].'</td>                            </tr>';
                            }
                          }
                          echo '</table><hr>';

                          $query11 = "SELECT * FROM customer WHERE OPENING_AMT = (SELECT MIN(OPENING_AMT) FROM customer)";
                          $result = $conn->query($query11);
                          echo '<b><p>MIN</p></b><table>';
                          if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              echo '
                              <tr>
                              <td>'.$row['CUST_CODE'].'</td><td>'.$row['CUST_NAME'].'</td><td>'.$row['CUST_CITY'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['CUST_COUNTRY'].'</td><td>'.$row['GRADE'].'</td><td>'.$row['OPENING_AMT'].'</td>
                              </tr>';
                              }
                            }
                            echo '</table><hr>';

                            $query12 = "SELECT * FROM customer WHERE OPENING_AMT = ALL (SELECT OPENING_AMT FROM customer WHERE OPENING_AMT = 5000)";
                            $result = $conn->query($query12);
                            echo '<b><p>ALL</p></b><table>';
                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                echo '
                                <tr>
                                <td>'.$row['CUST_CODE'].'</td><td>'.$row['CUST_NAME'].'</td><td>'.$row['CUST_CITY'].'</td><td>'.$row['WORKING_AREA'].'</td><td>'.$row['CUST_COUNTRY'].'</td><td>'.$row['GRADE'].'</td><td>'.$row['OPENING_AMT'].'</td>
                                </tr>';
                                }
                              }
                              echo '</table><hr>';
?>

</body>
</html>
