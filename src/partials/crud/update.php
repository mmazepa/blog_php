<?php
  if(isset($_POST["idToEdit"])) {
    $sql = "UPDATE animals
            SET species = :species,
                name = :name,
                weight = :weight,
                height = :height
            WHERE id = :animal_id";
    $conn->prepare($sql)->execute([
      ":species" => $_POST["speciesEdit"],
      ":name" => $_POST["nameEdit"],
      ":weight" => $_POST["weightEdit"],
      ":height" => $_POST["heightEdit"],
      ":animal_id" => $_POST["idToEdit"]
    ]);
    $_POST = array();
    header("Location: index.php", true, 303);
    exit();
  }
?>
