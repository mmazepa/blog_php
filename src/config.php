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

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully!";
  } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  // echo " ";

  $table = "users";
  try {
     $sql = "CREATE table IF NOT EXISTS $table(
       ID INT AUTO_INCREMENT PRIMARY KEY,
       email VARCHAR(50) NOT NULL,
       password VARCHAR(50) NOT NULL,
       role VARCHAR(10) NOT NULL);";
     $conn->exec($sql);
     // echo "Created $table Table.\n";
  } catch(PDOException $e) {
    // echo $e->getMessage();
  }

	define("ROOT_PATH", realpath(dirname(__FILE__)));
	define("BASE_URL", "http://localhost/blog_php/");
?>
