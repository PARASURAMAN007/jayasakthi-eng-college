<?php 
    require ('connection.php');
    if (isset($_POST['verify'])){
        
        $mobile_number = $_POST['moblie_no'];   
        $otp = $_POST['otp'];   
        $sql="SELECT * FROM users WHERE mobile = '$mobile_number' AND otp = '$otp'";
        $result = $conn->query($sql);
        if ($result) {
            
            if ($result->num_rows == 1) {
                
                $row = $result->fetch_assoc();
                $fetch_mobile = $row['mobile'];
                    
                if ($row['verification_status'] == 0) {
                    $update = "UPDATE users SET verification_status='1' WHERE mobile = '$fetch_mobile'";
                    
                    if ($conn->query($update)===TRUE) {
                    echo "
                        <script>
                            alert('Mobile number verification successful');
                            window.location.href='index.php'
                        </script>"; 
                    }else{
                    echo "
                        <script>
                            alert('Query can not run');
                            window.location.href='verification.php'
                        </script>";
                    }
                }else{
                    echo "
                        <script>
                            alert('Mobile already been register');
                            window.location.href='verification.php'
                        </script>";
                }
            }
        }   
    }else{
        echo "
            <script>
                alert('Server Down!!');
            </script>";
    }
?>