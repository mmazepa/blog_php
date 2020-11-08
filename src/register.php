<?php include("config.php"); ?>
<?php include("partials/registration_login.php"); ?>
<?php include("partials/head_section.php"); ?>
  <title>Blog in PHP | Register </title>
</head>

<body>
<div class="container">
		<?php include( ROOT_PATH . "/partials/navbar.php"); ?>

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="register.php" >
			<h2>Register</h2>
			<?php include(ROOT_PATH . "/partials/errors.php") ?>
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="E-mail" required />
			<input type="password" name="password_1" placeholder="Password" required />
			<input type="password" name="password_2" placeholder="Confirm Password" required />
			<button type="submit" class="btn" name="reg_user">Register</button>
			<p>
				Already have an account? <a href="login.php">Login!</a>
			</p>
		</form>
	</div>
</div>

<?php include( ROOT_PATH . "/partials/footer.php"); ?>
