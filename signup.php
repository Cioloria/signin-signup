<?php

##Include
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';

##Session management
session_start();

?>

<!-- User interface used inspired by this template https://colorlib.com/etc/lf/Login_v3/index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up | Cioloria/signin-signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="includes/signup.inc.php" method="POST">

					<span class="login100-form-title p-b-34 p-t-27">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="Full name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="uid" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pwd" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pwdrepeat" placeholder="Repeat password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<!-- Error messages -->
					<?php
						if (isset($_GET["error"])) {
							##Empty input
							if ($_GET["error"] == "") {
								echo "<p class='signin-error'>Fill in all fields!</p>";
							}
							##Invalid username
							else if ($_GET["error"] == "invalidUid") {
								echo "<p class='signin-error'>Choose a proper username!</p>";
							}
							##Invalid email
							else if ($_GET["error"] == "invalidEmail") {
								echo "<p class='signin-error'>Choose a proper email!</p>";
							}
							##Passwords doesn't match
							else if ($_GET["error"] == "passworddontmatch") {
								echo "<p class='signin-error'>Passwords doesn't match!</p>";
							}
							##Error
							else if ($_GET["error"] == "stmtfailed") {
								echo "<p class='signin-error'>Something went wrong!</p>";
							}
							##Email already taken
							else if ($_GET["error"] == "emailtaken") {
								echo "<p class='signin-error'>Email already taken!</p>";
							}
							##Username already taken
							else if ($_GET["error"] == "usernametaken") {
								echo "<p class='signin-error'>Username already taken!</p>";
							}
							##Error none
							else if ($_GET["error"] == "none") {
								echo "<p class='signin-error'>You have signed up!</p>";
							}
						}
					?>

					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Sign Up
						</button>
					</div>

                    <div class="text-center p-t-90">
						<a class="txt1" href="signin.php">
							Already got an account?
						</a>
					</div>

					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>