<?php
 //db connection

 $conn=mysqli_connect("localhost","id20568145_root","Admin#$6264","id20568145_repairspot");
 
  if (!$conn)
  {
   die(" connection failed".mysqli_connect_error());
   echo "database connection failed";
  }

   //if submit triggers..
    
    $mob_num=$_POST['mob_num'];
    $query="select * from user_details where mob_num='$mob_num'";
    $result=mysqli_query($conn,$query);
    $row= mysqli_fetch_array($result);

   //checking email,pass is present in db... 
    
    //if present

    if (mysqli_num_rows($result)>0)
    {
      header("Location: /user_dashboard.php");
      if( empty(session_id()) && !headers_sent()){
        session_start();
      }
      $_SESSION["name"] = $row['name'];
      $_SESSION["mob_num"] = $row['mob_num'];
      $_SESSION["otp"] = $row['otp'];
      $_SESSION["user_type"] = $row['user_type'];
      $_SESSION["latitude"] = $row['latitude'];
      $_SESSION["longitude"] = $row['longitude'];
    }

   //if not present in db

   else
   {
    echo "Invalid User";
    mysqli_close($conn);
   }
?>
