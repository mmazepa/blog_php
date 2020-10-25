<?php include("config.php"); ?>
<?php include("partials/registration_login.php"); ?>
<?php include("partials/head_section.php"); ?>
  <title>Blog w PHP | Rejestracja </title>
</head>

<body>
<div class="container">
		<?php include( ROOT_PATH . "/partials/navbar.php"); ?>

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="register.php" >
			<h2>Rejestracja</h2>
			<?php include(ROOT_PATH . "/partials/errors.php") ?>
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="E-mail" required />
			<input type="password" name="password_1" placeholder="Hasło" required />
			<input type="password" name="password_2" placeholder="Powtórz hasło" required />
			<button type="submit" class="btn" name="reg_user">Zarejestruj</button>
			<p>
				Masz już konto? <a href="login.php">Zaloguj się!</a>
			</p>
		</form>
	</div>
</div>

<?php include( ROOT_PATH . "/partials/footer.php"); ?>
