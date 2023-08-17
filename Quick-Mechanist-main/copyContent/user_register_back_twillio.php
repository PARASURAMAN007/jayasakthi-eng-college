<?php
require_once '/path/to/vendor/autoload.php';
use Twilio\Rest\Client;

$sid    = "AC7634ebc30df22f287905e455a946684e";
$token  = "fae800abad2866b364efa3243f054cc8";
$twilio = new Client($sid, $token);

if(isset($_POST['user_form_submit'])){
  // Create connection
  $conn = mysqli_connect("repairspot","root","","repairspot");
  // Check connection
  if (!$conn) {
    die("Connection failed".mysqli_connect_error());
  }
  else{
    $name = $_POST['name'];
    $mob_num = $_POST['mob_num'];
    // $otp = rand(1000000,100);
    $otp = rand(1111,9999);

    if(preg_match("/^\d+\.?\d*$/",$mob_num) && strlen($mob_num)==10){
      print_r("Validation01");
      $user_exist_query="SELECT * FROM user_details WHERE mob_num= '$mob_num'";
      $result = $conn->query($user_exist_query);
      if ($result) { 
        if ($result->num_rows > 0) {
            print_r("Yes");
            $row = $result->fetch_assoc();
            if ($row['mob_num'] === $mob_num) {
                echo "
                    <script>
                        alert('Mobile no alredy register!');
                    </script>";
            }
        }else{
          print_r("Else01");
          $query = "INSERT INTO user_details(name,otp,mob_num) VALUES ('$name', '$otp', '$mob_num')";
              
          if ($conn->query($query)===TRUE) {
              $fields = array(
                  "variables_values" => "$otp",
                  "route" => "otp",
                  "numbers" => "$mob_num",
              );

              $message = $client->messages->create(
                '8881231234', // Text this number
                [
                  'from' => '9991231234', // From a valid Twilio number
                  'body' => 'Hello from Twilio!'
                ]
              );
          }else{
              echo "
                  <script>
                      alert('Something went wrong!!!');
                  </script>";
          }
        }
      }
    }
  }
}

// name,otp,mob_num,latitude,longitude

// $sql = "INSERT INTO user_details(name,otp,mob_num,latitude,longitude,user_type) VALUES ('$name', '$otp', '$mob_num', '$latitude', '$longitude', '$user_type')";

// if(mysqli_query($conn,$sql))
// {
// // echo "success";
// header("Location: /user_dashboard.php");
// session_start();
// $_SESSION["name"] = $name;
// $_SESSION["mob_num"] = $mob_num;
// $_SESSION["otp"] = $otp;
// }
// else
// {
// echo "error";
// }
// mysqli_close($conn);
// }
// }
