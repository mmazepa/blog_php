<?php
	$email = "";
	$errors = array();

	if (isset($_POST["reg_user"])) {
		$email = $_POST["email"];
		$password_1 = $_POST["password_1"];
		$password_2 = $_POST["password_2"];

		if (empty($email)) { array_push($errors, "Please type your e-mail address."); }
		if (empty($password_1)) { array_push($errors, "Please type your password."); }
		if ($password_1 != $password_2) { array_push($errors, "Passwords are not equal.");}

		$user_check_query = "SELECT * FROM users WHERE email=\"" . $email . "\" LIMIT 1";
    $user = $conn->query($user_check_query)->fetch();

		if ($user) {
			if ($user["email"] === $email) {
			  array_push($errors, "This e-mail address is already in the databse.");
			}
		}

		if (count($errors) == 0) {
			// $password = md5($password_1);
      $password = $password_1;
			$query = "INSERT INTO users (email, password, role, created_at, updated_at)
					  VALUES(\"$email\", \"$password\", \"user\", now(), null)";
      $conn->prepare($query)->execute();

      $query = "SELECT * FROM users WHERE email = \". $email . \"";
      $reg_user_id = $conn->prepare($query)->execute();

			$_SESSION["user"] = getUserById($reg_user_id);

			if (in_array($_SESSION["user"]["role"], ["admin", "author"])) {
				$_SESSION["message"] = "You are logged in.";
				header("location: " . BASE_URL . "admin/dashboard.php");
				exit(0);
			} else {
				$_SESSION["message"] = "You are logged in.";
				header("location: index.php");
				exit(0);
			}
		}
	}

	if (isset($_POST["login_btn"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		if (empty($email)) { array_push($errors, "E-mail wymagany."); }
		if (empty($password)) { array_push($errors, "Hasło wymagane."); }
		if (empty($errors)) {
			// $password = md5($password); // encrypt password
			$user_check_query = "SELECT * FROM users WHERE email=\"" . $email . "\" and password=\"" . $password . "\" LIMIT 1";
      $result = $conn->query($user_check_query)->fetchAll();
			if (!empty($result)) {
        $query = "SELECT * FROM users WHERE email = \". $email . \"";
        $reg_user_id = $conn->prepare($query)->execute();

				$_SESSION["user"] = getUserById($reg_user_id);

				if (in_array($_SESSION["user"]["role"], ["admin", "author"])) {
					$_SESSION["message"] = "Jesteś zalogowany.";
					header("location: " . BASE_URL . "/admin/dashboard.php");
					exit(0);
				} else {
					$_SESSION["message"] = "Jesteś zalogowany.";
					header("location: index.php");
					exit(0);
				}
			} else {
				array_push($errors, "Niepoprawny adres e-mail i/lub hasło.");
			}
		}
	}

	function getUserById($id) {
		global $conn;
		$query = "SELECT * FROM users WHERE id=" . $id . " LIMIT 1";
    $user = $conn->prepare($query)->execute();
		return $user;
	}
?>
