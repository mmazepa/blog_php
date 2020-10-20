<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type"></meta>
  <title>Zwierzęcy CRUD w PHP</title>
  <link type="text/css" href="assets/css/style.css" rel="stylesheet"></link>
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
</head>
<body>

<div class="databaseConnectionInfo">
  <p class="databaseConnectionLabel">
    Informacja zwrotna z bazy danych:
  </p>
  <p class="databaseConnectionMessage">
    <?php require "partials/credentials.php"; ?>
    <?php
      try {
        if (!defined("PDO::ATTR_DRIVER_NAME")) {
          echo "PDO is unavailable!";
        } else if (defined("PDO::ATTR_DRIVER_NAME")) {
          echo "PDO is available!";
        }
        echo " ";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully!";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      echo " ";

      $table = "animals";
      try {
         $sql = "CREATE table IF NOT EXISTS $table(
           ID INT AUTO_INCREMENT PRIMARY KEY,
           species VARCHAR(50) NOT NULL,
           name VARCHAR(50) NOT NULL,
           weight DECIMAL(5,2) NOT NULL,
           height DECIMAL(5,2) NOT NULL);";
         $conn->exec($sql);
         print("Created $table Table.\n");
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    ?>
  </p>
</div>

<?php require "partials/Animal.php"; ?>

<div class="animals">
<table>
  <tr>
    <th>L.P.</th>
    <th>Gatunek</th>
    <th>Imię</th>
    <th>Waga [kg]</th>
    <th>Wzrost [cm]</th>
    <th>Usuń</th>
  </tr>
  <?php require "partials/crud/select.php"; ?>
</table>
</div>

<div class="form">
  <form method="POST" action="index.php">
    <input type="text" name="species" placeholder="gatunek" required />
    <input type="text" name="name" placeholder="imię" required />
    <input type="text" name="weight" placeholder="waga" required />
    <input type="text" name="height" placeholder="wzrost" required />
    <input class="addButton" type="submit" value="DODAJ" />
  </form>
</div>

<?php require "partials/crud/insert.php"; ?>
<?php require "partials/crud/delete.php"; ?>

</body>
</html>
