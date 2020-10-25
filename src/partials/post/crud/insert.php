<?php
  $newPost = new Post();
  if (isset($_POST["title"])) { $newPost->set_title($_POST["title"]); }
  if (isset($_POST["body"])) { $newPost->set_body($_POST["body"]); }

  if ($newPost != null && $newPost != new Post()) {
    $sql = "INSERT INTO posts (title, body) VALUES (?,?)";
    $conn->prepare($sql)->execute([
      $newPost->get_title(),
      $newPost->get_body()
    ]);
    $newPost = null;
    $_POST = array();
    header("Location: posts.php", true, 303);
    exit();
  }
?>
