<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type"></meta>
  <title>Zwierzęcy CRUD w PHP</title>
  <link type="text/css" href="assets/css/style.css" rel="stylesheet"></link>
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
  <script src="assets/js/script.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="databaseConnectionInfo container">
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
         echo "Created $table Table.\n";
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    ?>
  </p>
</div>

<?php require "partials/Animal.php"; ?>

<div class="animals container">
<table>
  <tr>
    <th>L.P.</th>
    <th>Gatunek</th>
    <th>Imię</th>
    <th>Waga [kg]</th>
    <th>Wzrost [cm]</th>
    <th>Edytuj</th>
    <th>Usuń</th>
  </tr>
  <?php require "partials/crud/select.php"; ?>
</table>
</div>

<div class="form container">
  <form method="POST" action="index.php">
    <input type="text" name="species" placeholder="gatunek" required />
    <input type="text" name="name" placeholder="imię" required />
    <input type="text" name="weight" placeholder="waga" required />
    <input type="text" name="height" placeholder="wzrost" required />
    <input class="addButton" type="submit" value="DODAJ" />
  </form>
</div>

<?php require "partials/crud/insert.php"; ?>
<?php require "partials/crud/update.php"; ?>
<?php require "partials/crud/delete.php"; ?>

<div id="updateDiv" class="update container" hidden>
  <div class="form">
    <form method="POST" action="index.php">
      <input id="form00" type="text" name="idToEdit" placeholder="id" readonly="true" hidden required />
      <input id="form01" type="text" name="speciesEdit" placeholder="gatunek" readonly="true" required />
      <input id="form02" type="text" name="nameEdit" placeholder="imię" readonly="true" required />
      <input id="form03" type="text" name="weightEdit" placeholder="waga" readonly="true" required />
      <input id="form04" type="text" name="heightEdit" placeholder="wzrost" readonly="true" required />
      <input id="update" class="updateButton" type="submit" value="ZAPISZ" disabled />
      <button id="cancel"
              class="cancelButton"
              type="button"
              onClick="disableUpdateForm()"
              disabled>
        ANULUJ
      </button>
    </form>
  </div>
</div>

</body>
</html>
