<?php include("config.php"); ?>
<?php include("partials/registration_login.php"); ?>
<?php include("partials/head_section.php"); ?>
	<title>Blog w PHP | Logowanie </title>
</head>
<body>
<div class="container">
	<?php include( ROOT_PATH . "/partials/navbar.php"); ?>

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="login.php" >
			<h2>Logowanie</h2>
			<?php include(ROOT_PATH . "/partials/errors.php") ?>
			<input type="email" name="email" value="<?php echo $email; ?>" value="" placeholder="E-mail">
			<input type="password" name="password" placeholder="Hasło">
			<button type="submit" class="btn" name="login_btn">Zaloguj</button>
			<p>
				Nie masz konta? <a href="register.php">Zarejestruj się!</a>
			</p>
		</form>
	</div>
</div>

<?php include( ROOT_PATH . "/partials/footer.php"); ?>
