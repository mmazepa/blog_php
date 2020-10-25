<?php require("partials/credentials.php"); ?>
<?php
	session_start();

  try {
    if (!defined("PDO::ATTR_DRIVER_NAME")) {
      // echo "PDO is unavailable!";
    } else if (defined("PDO::ATTR_DRIVER_NAME")) {
      // echo "PDO is available!";
    }
    // echo " ";

    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully!";
  } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  // echo " ";

  $tableUsers = "users";
  try {
    $sql = "CREATE table IF NOT EXISTS $tableUsers(
      id INT(11) AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(50) UNIQUE NOT NULL,
      password VARCHAR(50) NOT NULL,
      role VARCHAR(10) DEFAULT NULL,
      created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP);";
    $conn->exec($sql);
    // echo "Created $tableUsers Table.\n";
  } catch(PDOException $e) {
    // echo $e->getMessage();
  }

  $tablePosts = "posts";
  try {
    $sql = "CREATE table IF NOT EXISTS $tablePosts(
      id INT(11) AUTO_INCREMENT PRIMARY KEY,
      user_id INT(11) DEFAULT NULL,
      title VARCHAR(255) NOT NULL,
      views INT(11) NOT NULL DEFAULT '0',
      body TEXT NOT NULL,
      published TINYINT(1) NOT NULL DEFAULT '0',
      created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
      FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE NO ACTION ON UPDATE NO ACTION);";
    $conn->exec($sql);
    // echo "Created $tablePosts Table.\n";
  } catch(PDOException $e) {
    // echo $e->getMessage();
  }

	define("ROOT_PATH", realpath(dirname(__FILE__)));
	define("BASE_URL", "http://localhost/blog_php/");
?>
