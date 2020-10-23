<?php
  if(isset($_POST["idToDelete"])) {
    $sql = "DELETE FROM users WHERE id = :user_id";
    $conn->prepare($sql)->execute([":user_id" => $_POST["idToDelete"]]);
    $_POST = array();
    header("Location: users.php", true, 303);
    exit();
  }
?>
