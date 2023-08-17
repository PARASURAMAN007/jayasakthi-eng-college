<?php
// Create connection
$conn = mysqli_connect("repairspot","root","","repairspot");
// Check connection
if (!$conn) 
{
  die("Connection failed".mysqli_connect_error());
}
  $order_id=$_POST['order_id'];
  $sql = "UPDATE user_booking_request SET request_status='CANCELLED' WHERE order_id='$order_id' ";
if (mysqli_query($conn,$sql)) 
{
  echo "order id".$order_id."is cancelled successfull";
  header("Location: /user_dashboard.php");
}
?>
