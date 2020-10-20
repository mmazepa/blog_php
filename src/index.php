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
    <?php
      $servername = "localhost";
      $dbname = "mysql";
      $username = "user";
      $password = "user1234";

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

<?php
  class Animal {
    private $species;
    private $name;
    private $weight;
    private $height;

    function set_species($species) {
      $this->species = $species;
    }
    function get_species() {
      return $this->species;
    }
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
    function set_weight($weight) {
      $this->weight = $weight;
    }
    function get_weight() {
      return $this->weight;
    }
    function set_height($height) {
      $this->height = $height;
    }
    function get_height() {
      return $this->height;
    }
  }
?>

<div class="animals">
<table>
  <tr>
    <th>L.P.</th>
    <th>Gatunek</th>
    <th>Imię</th>
    <th>Waga [kg]</th>
    <th>Wzrost [cm]</th>
  </tr>
<?php
  $data = $conn->query("SELECT * FROM animals")->fetchAll();
  $i=1;
  foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $i++ . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "</tr>";
  }
?>
</table>
</div>

<div class="form">
  <form method="POST" onsubmit="" action="index.php">
    <input type="text" name="species" placeholder="gatunek" />
    <input type="text" name="name" placeholder="imię" />
    <input type="text" name="weight" placeholder="waga" />
    <input type="text" name="height" placeholder="wzrost" />
    <input type="submit" value="DODAJ" />
  </form>
</div>

<?php
  $newAnimal = new Animal();
  if (isset($_POST["species"])) { $newAnimal->set_species($_POST["species"]); }
  if (isset($_POST["name"])) { $newAnimal->set_name($_POST["name"]); }
  if (isset($_POST["weight"])) { $newAnimal->set_weight($_POST["weight"]); }
  if (isset($_POST["height"])) { $newAnimal->set_height($_POST["height"]); }

  if ($newAnimal != null && $newAnimal != new Animal()) {
    $sql = "INSERT INTO animals (species, name, weight, height) VALUES (?,?,?,?)";
    $conn->prepare($sql)->execute([
      $newAnimal->get_species(),
      $newAnimal->get_name(),
      $newAnimal->get_weight(),
      $newAnimal->get_height()
    ]);
  }
?>

</body>
</html>
