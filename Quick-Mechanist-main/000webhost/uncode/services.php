<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>

    <!-- Styles and Fonts -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/car-care.png" type="image/x-icon"/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="../assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <?php
    include('../components/navbar.php');
    ?>
    <div class="container my-5 py-3 px-5">
        <h1 class="mb-3">
            Quick Mechanist
        </h1>
        <p>
            Quick Mechanist is a fast & reliable service to find the best mechanics in a matter of minutes, at any location. Connect your car with Quick Mechanist and we will match you with the nearest mechanic from our database of qualified technicians. Check out our verification process that ensures you're getting the right person for your car.
        </p><br>
        <p>
            With Quick Mechanist, you can rest assured that your car is in good hands. We've done the hard work for you by identifying qualified mechanics in your area. You can even see their reviews and ratings before making an appointment. All of this is available at the palm of your hand with our mobile app
        </p>
    </div>
    <?php
    include('../components/justFooter.php');
    ?>
</body>
<script>
    window.onload = function() {
        document.getElementById("logoImg").src="../assets/images/car-care.png"; 
    };
</script>
</html>