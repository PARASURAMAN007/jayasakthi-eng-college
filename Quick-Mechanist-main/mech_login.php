<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owner Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon"/>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <script type="text/javascript">
        //password match
        function Validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
        //password checkbox
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <?php
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }
    if (isset($_SESSION['name'])) {
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "repairspot");
        // Check connection
        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        }
        $name = $_SESSION['name'];
        $sql = "SELECT name FROM mech_details where name='".$_SESSION['name']."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: /mech_dashboard.php");
        }else{
            if( empty(session_id()) && !headers_sent()){
                session_start();
            }
            Session_destroy();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $conn->close();
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div>
    <?php
    include('components/navbar.php');
    ?>
        <section class="signup mt-3 mb-0">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Mechanic-Login</h2>
                        <form id="mech_login" method="POST" action="./backend/mech_login_back.php">
                            <div class="form-group">
                                <div class="d-flex">
                                    <input type="tel" maxlength="10" name="mob_num" id="mob_num" placeholder="Phone Number" />
                                    <button type="button" class="btn btn-secondary" style="font-size: 8px;" onclick="sendOTP()">
                                        Get OTP
                                    </button>
                                </div>
                                <p class="phError" style="color:red; margin-left: 20px; font-size: 12px; margin-top: 5px;"></p>
                            </div>
                            <div class="form-group">
                                <input type="password" name="otp" id="pass" placeholder="OTP" />
                                <p class="otpError" style="color:red; margin-left: 20px; font-size: 12px; margin-top: 5px;"></p>
                            </div>
                            <div class="form-group form-button">
                                <input class="form-submit" name="button" type="submit" value="Login" onclick="return verifyOTP()"  />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image" style="margin-left: 15px">
                        <figure>
                            <img src="./assets/images/undraw_bike_ride.svg" alt="sing up image">
                        </figure>
                        <a href="/user_login.php" class="signup-image-link">Owner Login</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include('components/justFooter.php');
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script>
    var otp = generateOTP();
    function sendOTP() {
        $(".phError").html("").hide();
        var number = $("#mob_num").val();
        if (number.length == 10 && number != null) {
            var xhr = new XMLHttpRequest(),
            body = JSON.stringify({
                "messages": [{
                        "channel": "whatsapp",
                        // "to": "91"+number,
                        "to": "919944622435",
                        "content": `Hello there! Here's OTP for Quick Mechanist. Please don't share the OTP - ${otp}`
                    },
                    {
                        "channel": "sms",
                        // "to": "91"+number,
                        "to": "919944622435",
                        "content": `Hello there! - Here's OTP for Quick Mechanist. Please don't share the OTP - ${otp}`
                    }
                ]
            });
            xhr.open('POST', 'https://platform.clickatell.com/v1/message', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('Authorization', 'aGvBybhRR0eNevM7QqSU1g==');
            xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && ( xhr.status == 200 || xhr.status == 207 )) {
					alert("OTP Sent Successfully!!")
				}
            };
            xhr.send(body);
        } else {
            $(".phError").html('Please enter a valid number!')
            $(".phError").show();
        }
    }

    function generateOTP() {
        var digits = '0123456789';
        let OTP = '';
        for (let i = 0; i < 4; i++) {
            OTP += digits[Math.floor(Math.random() * 10)];
        }
        return OTP;
    }

    function verifyOTP() {
        $(".otpError").html("").hide();
        var enteredOtp = $("#pass").val();
        if (enteredOtp == otp) {
            document.getElementById("verifiedOTP").value = otp;
            document.getElementById("mech_login").submit();
        } else {
            $(".otpError").html('Invalid OTP!')
            $(".otpError").show();
            return false;
        }
    }
</script>
</html>