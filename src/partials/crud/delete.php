<?php
  if(isset($_POST["idToDelete"])) {
    $sql = "DELETE FROM animals WHERE ID = :animal_id";
    $conn->prepare($sql)->execute([":animal_id" => $_POST["idToDelete"]]);
    $_POST = array();
    header("Location: index.php", true, 303);
    exit();
  }
?>
