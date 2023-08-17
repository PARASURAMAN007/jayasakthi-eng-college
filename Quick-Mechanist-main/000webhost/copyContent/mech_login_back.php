<?php
 //db connection

 $conn=mysqli_connect("localhost","id20568145_root","Admin#$6264","id20568145_repairspot");   
  if (!$conn)
  {
   die(" connection failed".mysqli_connect_error());
   echo "database connection failed";
  }

   //if submit triggers..
    
  if (isset($_POST['submit']))
  {
      $username=$_POST['name'];
      $password=$_POST['password'];
      $query="select * from mech_details where email='$username' and password='$password'";
      $result=mysqli_query($conn,$query);

      //checking email,pass is present in db... 
    
      //if present

      if (mysqli_num_rows($result)>0)
      {
      include 'mech_dashboard.php';
      }

      //if not present in db

      else
     {
      echo "invalid username or password";
      mysqli_close($conn);
     }

   }
?>
