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

        // my code goes here...

        $conn = null;
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
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

  $elephant = new Animal();
  $elephant->set_species("Słoń");
  $elephant->set_name("Kalafanty");
  $elephant->set_weight("5000");
  $elephant->set_height("200");

  $cat = new Animal();
  $cat->set_species("Kot");
  $cat->set_name("Manfred");
  $cat->set_weight("10");
  $cat->set_height("50");

  $hedgehog = new Animal();
  $hedgehog->set_species("Jeż");
  $hedgehog->set_name("Franciszek");
  $hedgehog->set_weight("1.5");
  $hedgehog->set_height("20");

  $animals = [$elephant, $cat, $hedgehog];
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
  $i=1;
  foreach ($animals as $animal) {
    echo "<tr>";
    echo "<td>" . $i++ . "</td>";
    echo "<td>" . $animal->get_species() . "</td>";
    echo "<td>" . $animal->get_name() . "</td>";
    echo "<td>" . $animal->get_weight() . "</td>";
    echo "<td>" . $animal->get_height() . "</td>";
    echo "</tr>";
  }
?>
</table>
</div>

<div class="form">
  <form method="POST" action="index.php">
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
?>

</body>
</html>
