<?php
  if(isset($_POST["idToEdit"])) {
    $sql = "UPDATE posts
            SET title = :title,
                body = :body
            WHERE id = :post_id";
    $conn->prepare($sql)->execute([
      ":title" => $_POST["titleEdit"],
      ":body" => $_POST["bodyEdit"],
      ":post_id" => $_POST["idToEdit"]
    ]);
    $_POST = array();
    header("Location: posts.php", true, 303);
    exit();
  }
?>
