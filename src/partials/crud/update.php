<?php
  if(isset($_POST["idToEdit"])) {
    $sql = "UPDATE users
            SET email = :email,
                password = :password,
                role = :role
            WHERE id = :user_id";
    $conn->prepare($sql)->execute([
      ":email" => $_POST["emailEdit"],
      ":password" => $_POST["passwordEdit"],
      ":role" => $_POST["roleEdit"],
      ":user_id" => $_POST["idToEdit"]
    ]);
    $_POST = array();
    header("Location: index.php", true, 303);
    exit();
  }
?>
