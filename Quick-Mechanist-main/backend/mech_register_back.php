<?php
// Create connection
$conn = mysqli_connect("repairspot","root","","repairspot");
// Check connection
if (!$conn) 
{
  die("Connection failed".mysqli_connect_error());
}
else{

$name = $_POST['name'];
$service_type = $_POST['mech_service'];
$service_type_others = $_POST['mech_other_service'];
$mob_num = $_POST['mob_num'];
$otp = rand(1111,9999);
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$validationSql = "SELECT * FROM mech_details WHERE name=$name AND mob_num=$mob_num";
$result = $conn->query($validationSql);
  if ($result) {  
    if ($result->num_rows == 1) {
      header("Location: /index.php");
    }
  }else{
    $validationSql = "SELECT * FROM mech_details WHERE name=$name AND mob_num=$mob_num";
  $result = $conn->query($validationSql);
  if ($result) {  
    if ($result->num_rows == 1) {
      header("Location: /index.php");
    }
  }else{
    $sql = "INSERT INTO mech_details(name, service_type, service_type_others, mob_num, otp, latitude, longitude)
    VALUES ('$name', '$service_type', '$service_type_others', '$mob_num', '$otp', '$latitude', '$longitude')";

    if(mysqli_query($conn,$sql)){
      // echo "success";
      header("Location: /mech_dashboard.php");
      if( empty(session_id()) && !headers_sent()){
        session_start();
      }
      $_SESSION['name']=$name;
      $_SESSION['service_type']=$service_type;
      $_SESSION['service_type_others']=$service_type_others;
      $_SESSION['mob_num']=$mob_num;
      $_SESSION['otp']=$otp;
      $_SESSION['latitude']=$latitude;
      $_SESSION['longitude']=$longitude;
    }else{
      echo "error";
    }
    mysqli_close($conn);
    }  
    }
  }
