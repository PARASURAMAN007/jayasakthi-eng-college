<?php {
  // Create connection
  $conn = mysqli_connect("localhost", "id20568145_root", "Admin#$6264", "id20568145_repairspot");
  // Check connection
  if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
  }
  $order_id = $_POST['order_id'];
  if(isset($_POST['mech_approve_action'])){
    $mech_name = $_POST['mech_email'];
    $mech_mobile_num = $_POST['mech_mobile_num'];
    $user_name = $_POST['user_name'];
    $location = $_POST['user_request_place'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_problem = $_POST['vehicle_problem'];
    $sql = "INSERT INTO mech_approved(order_id,user_name,approved_mech_name,mech_mobile_num,vehicle_type,vehicle_problem,location,order_status) 
    VALUES ('$order_id','$user_name','$mech_name','$mech_mobile_num','$vehicle_type','$vehicle_problem','$location','APPROVED')";

    $sql_user_req = "UPDATE `user_booking_request` SET `request_status` = 'APPROVED', `approved_mech_name` = '$mech_name' WHERE `user_booking_request`.`order_id` = $order_id;";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_user_req)) {
      echo "<script>
          alert('order approved');
        </script>";
      include 'mech_login.php';
    } else {
      echo "error";
    }
  }else{
    $sql = "DELETE FROM mech_approved WHERE `mech_approved`.`order_id` = $order_id;";
    $sql_user_req = "UPDATE `user_booking_request` SET `request_status` = 'PENDING' WHERE `user_booking_request`.`order_id` = $order_id;";
    print_r($sql);
    print_r($sql_user_req);
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_user_req)) {
      echo "<script>
          alert('order approved');
        </script>";
      include 'mech_login.php';
    } else {
      echo "error";
    }
  }
  mysqli_close($conn);
}
