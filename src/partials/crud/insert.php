<?php
  $newUser = new User();
  if (isset($_POST["email"])) { $newUser->set_email($_POST["email"]); }
  if (isset($_POST["password"])) { $newUser->set_password($_POST["password"]); }
  if (isset($_POST["role"])) { $newUser->set_role($_POST["role"]); }

  if ($newUser != null && $newUser != new User()) {
    $sql = "INSERT INTO users (email, password, role) VALUES (?,?,?)";
    $conn->prepare($sql)->execute([
      $newUser->get_email(),
      $newUser->get_password(),
      $newUser->get_role()
    ]);
    $newUser = null;
    $_POST = array();
    header("Location: users.php", true, 303);
    exit();
  }
?>
