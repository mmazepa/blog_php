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
    $newAnimal = null;
    $_POST = array();
    header("Location: index.php", true, 303);
    exit();
  }
?>
