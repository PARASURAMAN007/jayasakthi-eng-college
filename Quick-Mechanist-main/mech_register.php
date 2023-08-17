<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<title> MECHANIC REGISTER</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">

	<link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon" />
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}

		.form-select {
			border: none;
			border-radius: 0;
			border-bottom: 1px solid #999;
			font-size: inherit;
			padding-left: 25px;
		}

		.form-select:focus {
			border-bottom: 1px solid #999;
		}

		.mech_other_service {
			display: none;
		}
	</style>
	<script type="text/javascript">
		//mechanic service=others...to open textbox
		function checkvalue() {
			var service = document.getElementById('mech_service_type').value;
			if (service == 'stype') {
				document.getElementById("other_service").style.display = 'none';
			}

			if (service == 'others') {
				document.getElementById("other_service").style.display = 'block';
			} else {
				document.getElementById("other_service").style.display = 'none';
			}
		}
		//password match
		function Validate() {
			var password = document.getElementById("password").value;
			var confirmPassword = document.getElementById("confirm_password").value;
			if (password != confirmPassword) {
				alert("Passwords do not match.");
				return false;
			}
			return true;
		}
		//password checkbox
		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<style>
		.phError,
		.otpError {
			display: none;
		}
	</style>
</head>

<body>
	<div>
		<?php
		include('components/navbar.php');
		?>
		<section class="signup mt-3 mb-0">
			<div class="container">
				<div class="signup-content">
					<div class="signup-form">
						<h2 class="form-title">Mechanic</h2>
						<form id="mech_registration_form" name="my" method="POST" action="./backend/mech_register_back.php">
							<div class="form-group">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="form-group">
								<select class="form-select" onchange="checkvalue(this.value)" id="mech_service_type" required name="mech_service" required>
									<option value="stype" hidden>Select Service Type</option>
									<option value="bike_mechanic">
										Bike Mechanic
									</option>
									<option value="car_mechanic">
										Car Mechanic
									</option>
									<option value="others">
										Others
									</option>
								</select>
							</div>
							<div class="form-group mech_other_service" id="other_service">
								<input type="text" name="mech_other_service" id="mech_other_service" placeholder="If Others:" />
							</div>
							<div class="form-group">
								<div class="d-flex">
									<input maxlength="10" type="tel" name="mob_num" id="mob_num" placeholder="Phone Number" />
									<button type="button" class="btn btn-secondary" style="font-size: 8px;" onclick="sendOTP()">
										Get OTP
									</button>
								</div>
								<p class="phError" style="color:red; margin-left: 20px; font-size: 12px; margin-top: 5px;"></p>
							</div>
							<div class="form-group">
								<input type="password" name="otp" id="pass" placeholder="OTP" />
								<p class="otpError" style="color:red; margin-left: 20px; font-size: 12px; margin-top: 5px;"></p>
							</div>
							<input type="text" hidden name="latitude" id="latitude">
							<input type="text" hidden name="longitude" id="longitude">
							<div class="form-group form-button">
								<!-- <input class="form-submit" type="submit" id="btnsubmit" name="mech_form_submit" value="Register" onclick="return Validate()" /> -->
								<input class="form-submit" type="button" value="Register" onclick="return verifyOTP()" />
							</div>
							<input class="form-submit" id="verifiedOTP" name="verifiedOTP" hidden="true" />
						</form>
					</div>
					<div class="signup-image">
						<figure>
							<img src="./assets/images/undraw_automobile_repair.svg" alt="sing up image">
							<!-- <img src="./assets/images/signup-image.jpg" alt="sing up image"> -->
						</figure>
						<a href="/user_register.php" class="signup-image-link">Owner Register</a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div>
		<?php
		include('components/justFooter.php');
		?>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showLocation);
		} else {
			alert("Please allow access to geolocation");
			$('#location').html('Geolocation is not supported by this browser.');
		}
	});

	function showLocation(position) {
		var latitude = position.coords.latitude;
		var longitude = position.coords.longitude;
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
	}
</script>

<script>
	var otp = generateOTP();

	function sendOTP() {
		$(".phError").html("").hide();
		var name = $("#name").val();
		var number = $("#mob_num").val();
		var service_type = $('#mech_service_type').val
		if (number.length == 10 && number != null) {
			var xhr = new XMLHttpRequest(),
				body = JSON.stringify({
					"messages": [{
							"channel": "whatsapp",
							// "to": "91"+number,
							"to": "919944622435",
							"content": `Hello ${name}! - Here's OTP for Quick Mechanist to register as mechanic. Please don't share the OTP - ${otp}`
						},
						{
							"channel": "sms",
							// "to": "91"+number,
							"to": "919944622435",
							"content": `Hello ${name}! - Here's OTP for Quick Mechanist to register as mechanic. Please don't share the OTP - ${otp}`
						}
					]
				});
			xhr.open('POST', 'https://platform.clickatell.com/v1/message', true);
			xhr.setRequestHeader('Content-Type', 'application/json');
			xhr.setRequestHeader('Authorization', 'aGvBybhRR0eNevM7QqSU1g==');
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && ( xhr.status == 200 || xhr.status == 207 )) {
					alert("OTP Sent Successfully!!")
				}
			};
			xhr.send(body);
		} else {
			$(".phError").html('Please enter a valid number!')
			$(".phError").show();
		}
	}

	function generateOTP() {
		var digits = '0123456789';
		let OTP = '';
		for (let i = 0; i < 4; i++) {
			OTP += digits[Math.floor(Math.random() * 10)];
		}
		return OTP;
	}

	function verifyOTP() {
		$(".otpError").html("").hide();
		var enteredOtp = $("#pass").val();
		if (enteredOtp == otp) {
			document.getElementById("verifiedOTP").value = otp;
			document.getElementById("mech_registration_form").submit();
		} else {
			$(".otpError").html('Invalid OTP!')
			$(".otpError").show();
			return false;
		}
	}
</script>

</html>