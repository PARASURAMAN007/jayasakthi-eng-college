<?php
 $conn=mysqli_connect("localhost","root","","repairspot");   
  if (!$conn)
  {
   die(" connection failed".mysqli_connect_error());
   echo "database connection failed";
  }

   //if submit triggers..
    else
  {
      $mech_email=$_POST['name'];
      $query="SELECT mob_num from mech_details where email='$mech_email'";
      $result=mysqli_query($conn,$query);

      if($result->num_rows > 0)
      {
           while ($row=$result->fetch_assoc()) 
           {
             echo $row['mob_num'];
           }
      }
      //if mob num not present 
      else
     {
      echo " nil";
     }
     $conn->close();
   }
?>
