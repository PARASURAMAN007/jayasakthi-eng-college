<?php
if(isset($_POST['user_form_submit']))
{
// Create connection
$conn = mysqli_connect("repairspot","root","","repairspot");
// Check connection
if (!$conn) 
{
  die("Connection failed".mysqli_connect_error());
}
else{
$f_name=$_POST['user_first_name'];
$l_name=$_POST['user_last_name'];
$dob=$_POST['user_dob'];
$house_no=$_POST['user_house_no'];
$street=$_POST['user_street'];
$village_city=$_POST['user_village_city'];
$district=$_POST['user_district'];
$email=$_POST['user_email'];
$mob_num=$_POST['user_mobile'];
$password=$_POST['user_password'];

$sql = "INSERT INTO user_details(f_name,l_name,dob,house_no,street,village_city,district,email,mob_num,password)
VALUES ('$f_name','$l_name','$dob','$house_no','$street','$village_city','$district','$email','$mob_num','$password')";

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
}
?>