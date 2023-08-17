<?php
//db connection
 $conn=mysqli_connect("localhost","root","","repairspot");   
  if (!$conn)
  {
   die(" connection failed".mysqli_connect_error());
   echo "database connection failed";
  }

  else{    
  if (isset($_POST['submit']))
  {    
      $name=$_POST['name'];
      $location=$_POST['location'];
      $vehicle=$_POST['vehicle_type'];
      $vehicle_problem=$_POST['vehicle_problem'];
      $latitude=$_POST['latitude'];
      $longitude=$_POST['longitude'];
      $query="INSERT INTO user_booking_request(name,user_request_place,vehicle_type,vehicle_problem,request_status,latitude,longitude) VALUES ('$name','$location','$vehicle','$vehicle_problem','PENDING','$latitude','$longitude')";

      if (mysqli_query($conn,$query))
      {
          echo "request success";
          header("Location: /user_dashboard.php");

      }

      //if not present in db

      else
     {
      echo " some error";
      mysqli_close($conn);
     }
   }
  }
?>