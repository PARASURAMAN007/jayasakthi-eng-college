<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(61200);
if( empty(session_id()) && !headers_sent()){
	session_start();
}
if (!$_SESSION['name']) {
	header("Location: /");
}
include('backend/radius_calculator.php');
?>
<html>

<head>
	<title>Mechanic Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon" />
	<!-- Styles and Fonts -->
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="./assets/css/styles.css">
	<!-- Font Icon -->
	<link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/file.css">
	<style>
		.tableInput {
			width: 100%;
			display: block;
			border: none !important;
			padding: 5px;
			height: 100%;
			box-sizing: border-box;
			word-wrap: break-word;
			word-break: break-all;
			text-align: center;
			pointer-events: none;
		}

		.mx-3 {
			padding: 0px 10px;
		}

		@media only screen and (max-width: 600px) {
			table {
				display: flex;
				align-items: center;
				justify-content: center;
			}

			tbody {
				display: flex;
				flex-direction: row;
			}

			tr {
				display: flex;
				flex-direction: column;
			}

			td,
			td input {
				text-align: left;
			}
		}
	</style>
</head>

<body>
	<?php
	include('components/navbar.php');
	?>
	<div class="blur">
		<h5 class="my-3">Welcome <?Php echo $_SESSION['name']; ?>!</h5>
		<div class="cur-req">
			<h2>NEW ORDERS</h2>
			<form action="mech_approved.php" method="POST">
				<input type="hidden" name="mech_email" value="<?php echo $_SESSION['name']; ?>">
				<input type="hidden" name="mech_mobile_num" VALUE="<?Php echo $_SESSION['mob_num']; ?>">
				<?php {
					// Create connection
					$conn = mysqli_connect("localhost", "root", "", "repairspot");
					// Check connection
					if (!$conn) {
						die("Connection failed" . mysqli_connect_error());
					}
					$sql = "SELECT last_updated,order_id,name,user_request_place,vehicle_type,vehicle_problem,request_status,latitude,longitude FROM user_booking_request WHERE request_status='PENDING'";

					$result = $conn->query($sql);

					if ($result && $result->num_rows > 0) {
						echo "<table><tr><th>ORDER ID</th><th>DATE & TIME</th><th>CUSTOMER NAME</th><th>LOCATION</th><th>VEHICLE TYPE</th><th>VEHICLE PROBLEM</th><th class='mx-3'>NAVIGATION</th></tr>";
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							if ($row) {
								$gmapwith = "https://www.google.com/maps/dir/?api=1&origin=" . $_SESSION['latitude'] . "," . $_SESSION['longitude'] . "&destination=" . $row['latitude'] . "," . $row['longitude'] . "";
								$actionButton = $row["request_status"] == 'APPROVED' ? "<button type='submit' class='btn btn-danger rounded-0' name='mech_cancel_action'>Cancel</button>" : "<button type='submit' class='btn btn-success rounded-0' name='mech_approve_action'>Approve</button>";
								echo "<tr> <td><input class='tableInput' type='text' name='order_id' value='" . $row["order_id"] . "' /></td> <td>" . $row["last_updated"] . "</td> <td><input class='tableInput' type='text' name='user_name' value='" . $row["name"] . "' /></td> <td><textarea class='tableInput' type='text' name='user_request_place'>" . $row["user_request_place"] . "</textarea></td> <td><input class='tableInput' type='text' name='vehicle_type' value='" . $row["vehicle_type"] . "' /></td> <td><input class='tableInput' type='text' name='vehicle_problem' value='" . $row["vehicle_problem"] . "' /></td> <td><a href='" . $gmapwith . "' target=_blank> Google Map </a></td> <td>" . $actionButton . "</td> </tr>";
							}
						}
						echo "</table>";
					} else {
						echo "0 results";
					}
					$conn->close();
				}
				?>
			</form>
			<div class="content">

			</div>
		</div>
		<div class="cur-req">
			<h2>UNDERTAKEN ORDERS</h2>
			<form action="mech_approved.php" method="POST">
				<input type="hidden" name="mech_email" value="<?php echo $_SESSION['name']; ?>">
				<input type="hidden" name="mech_mobile_num" VALUE="<?Php echo $_SESSION['mob_num']; ?>">
				<?php {
					// Create connection
					$conn = mysqli_connect("localhost", "root", "", "repairspot");
					// Check connection
					if (!$conn) {
						die("Connection failed" . mysqli_connect_error());
					}
					$sql = "SELECT last_updated,order_id,name,user_request_place,vehicle_type,vehicle_problem,request_status,latitude,longitude FROM user_booking_request WHERE request_status='APPROVED' and approved_mech_name='" . $_SESSION['name'] . "';";

					$result = $conn->query($sql);

					if ($result && $result->num_rows > 0) {
						echo "<table><tr><th>ORDER ID</th><th>DATE & TIME</th><th>CUSTOMER NAME</th><th>LOCATION</th><th>VEHICLE TYPE</th><th>VEHICLE PROBLEM</th><th class='mx-3'>NAVIGATION</th></tr>";
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							if ($row) {
								$gmapwith = "https://www.google.com/maps/dir/?api=1&origin=" . $_SESSION['latitude'] . "," . $_SESSION['longitude'] . "&destination=" . $row['latitude'] . "," . $row['longitude'] . "";
								$actionButton = $row["request_status"] == 'APPROVED' ? "<button type='submit' class='btn btn-danger rounded-0' name='mech_cancel_action'>Cancel</button>" : "<button type='submit' class='btn btn-success rounded-0' name='mech_approve_action'>Approve</button>";
								$distance = haversineGreatCircleDistance($_SESSION['latitude'], $_SESSION['longitude'], $row['latitude'], $row['longitude']);
								echo "<tr> <td><input class='tableInput' type='text' name='order_id' value='" . $row["order_id"] . "' /></td> <td>" . $row["last_updated"] . "</td> <td><input class='tableInput' type='text' name='user_name' value='" . $row["name"] . "' /></td> <td><textarea class='tableInput' type='text' name='user_request_place'>" . $row["user_request_place"] . "</textarea></td> <td><input class='tableInput' type='text' name='vehicle_type' value='" . $row["vehicle_type"] . "' /></td> <td><input class='tableInput' type='text' name='vehicle_problem' value='" . $row["vehicle_problem"] . "' /></td> <td>" . "$distance[0] $distance[1]" . "<br><a href='" . $gmapwith . "' target=_blank> Google Map </a></td> <td>" . $actionButton . "</td> </tr>";
							}
						}
						echo "</table>";
					} else {
						echo "0 results";
					}
					$conn->close();
				}
				?>
			</form>
			<div class="content">

			</div>
		</div>
	</div>
	<?php
	include('components/justFooter.php');
	?>
</body>

</html>