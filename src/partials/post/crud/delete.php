<?php
  if(isset($_POST["idToDelete"])) {
    $sql = "DELETE FROM posts WHERE id = :post_id";
    $conn->prepare($sql)->execute([":post_id" => $_POST["idToDelete"]]);
    $_POST = array();
    header("Location: posts.php", true, 303);
    exit();
  }
?>
