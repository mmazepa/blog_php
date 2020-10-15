<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type"></meta>
  <title>Zwierzęcy CRUD w PHP</title>
  <link type="text/css" href="assets/css/style.css" rel="stylesheet"></link>
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
</head>
<body>

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
  $elephant->set_height("2");

  $cat = new Animal();
  $cat->set_species("Kot");
  $cat->set_name("Manfred");
  $cat->set_weight("10");
  $cat->set_height("0.5");

  $hedgehog = new Animal();
  $hedgehog->set_species("Jeż");
  $hedgehog->set_name("Franciszek");
  $hedgehog->set_weight("1.5");
  $hedgehog->set_height("0.2");

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

</body>
</html>
