<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type"></meta>
  <title>Zwierzęcy CRUD w PHP</title>
  <link type="text/css" href="assets/css/style.css" rel="stylesheet"></link>
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
  <script src="assets/js/script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="databaseConnectionInfo container">
  <p class="databaseConnectionLabel">
    <span class="glyphicon glyphicon-alert"></span>
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
  <thead>
    <tr>
      <th>L.P.</th>
      <th>Gatunek</th>
      <th>Imię</th>
      <th>Waga [kg]</th>
      <th>Wzrost [cm]</th>
      <th>Edytuj</th>
      <th>Usuń</th>
    </tr>
  </thead>
  <tbody>
    <?php require "partials/crud/select.php"; ?>
  </tbody>
</table>
</div>

<div class="form container">
  <form method="POST" action="index.php">
    <input type="text" name="species" placeholder="gatunek" required />
    <input type="text" name="name" placeholder="imię" required />
    <input type="text" name="weight" placeholder="waga" required />
    <input type="text" name="height" placeholder="wzrost" required />
    <button class="addButton" type="submit">
      <span class="glyphicon glyphicon-plus"></span>
      DODAJ
    </button>
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
      <button id="update"
              class="updateButton"
              type="submit"
              disabled>
        <span class="glyphicon glyphicon-floppy-disk"></span>
        ZAPISZ
      </button>
      <button id="cancel"
              class="cancelButton"
              type="button"
              onClick="disableUpdateForm()"
              disabled>
        <span class="glyphicon glyphicon-remove"></span>
        ANULUJ
      </button>
    </form>
  </div>
</div>

</body>
</html>
