<?php
$servername = "repairspot";
$username = "root";
$password = "";
$dbname ="Quick Mechanist";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['user_form_submit'])){
echo "Connected successfully";

$dob=$_POST['user_dob'];
$sql = "INSERT INTO user_details(dob) VALUES ('15/01/2001')";

if(mysqli_query($conn,$sql))
{
echo "success";
}
else
{
echo "error";
}
mysqli_close($conn);
}
?>