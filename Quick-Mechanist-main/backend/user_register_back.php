<?php
// name,otp,mob_num,latitude,longitude

// Create connection
$conn = mysqli_connect("localhost", "root", "", "repairspot");

$name = $_POST['name'];
$mob_num = $_POST['mob_num'];
$otp = $_POST['verifiedOTP'];

// Check connection
if (!$conn) {
  die("Connection failed" . mysqli_connect_error());
} else {
  $validationSql = "SELECT * FROM user_details WHERE name=$name AND mob_num=$mob_num";
  $result = $conn->query($validationSql);
  if ($result) {  
    if ($result->num_rows == 1) {
      header("Location: /index.php");
    }
  }else{
    $sql = "INSERT INTO user_details(name,otp,mob_num) VALUES ('$name', '$otp', '$mob_num')";
    
    if (mysqli_query($conn, $sql)) {
      header("Location: /user_dashboard.php");
      if( empty(session_id()) && !headers_sent()){
        session_start();
      }
      $_SESSION["name"] = $name;
      $_SESSION["mob_num"] = $mob_num;
      $_SESSION["otp"] = $otp;
    } else {
      echo "error";
    }
    mysqli_close($conn);
  }

}
