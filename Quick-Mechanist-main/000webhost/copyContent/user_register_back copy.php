<?php
if(isset($_POST['user_form_submit'])){
  // Create connection
  $conn = mysqli_connect("id20568145_repairspot","id20568145_root","","repairspot");
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
              
              $curl = curl_init();
              
              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                  "authorization: GO0zqY2Vj7QHcF0DCnGUzNb3OmPKBJ8f1hkIr1gFtSYfSlhaZjSaSThWZHU0",
                  "accept: */*",
                  "cache-control: no-cache",
                  "content-type: application/json"
                ),
              ));
              
              $response = curl_exec($curl);
              $err = curl_error($curl);
              
              curl_close($curl);
              
              if ($err) {
                  print_r($err);
                  echo "cURL Error #:" . $err;
              } else {
                  print_r($response);
                  $data = json_decode($response);
                  print_r($data);
                  $sts = $data->return;
                  if ($sts == false) {
                      echo "
                      <script>
                          alert('Your OTP is not send.');
                      </script>";
                  }else{
                      echo "
                      <script>
                          alert('Register Successful. Please Check your text message and verify your account.');
                      </script>";
                  }
              }
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
