<!DOCTYPE html>

<head>
    <title>Quick Mechanist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="landerMain">
        <div class="navbar" style="background-color: #dee2e6;">
            <div class="navBarWidth m-auto d-flex justify-content-between align-self-center">
                <a class="headerIcon" href="/" style="text-decoration: none; color: rgba(33, 37, 41, 0.75);">
                    <div class="icon align-self-center">
                        <img src="./assets/images/car-care.png" alt="" srcset="" class="logoImg">
                        <h5>
                            Mechanist
                        </h5>
                    </div>
                </a>
                <div class="menu">
                    <ul class="mb-0">
                        <li><a href="/"> HOME</a></li>
                        <li><a href="/uncode/services.php"> SERVICES</a></li>
                        <li><a href="/uncode/contact.php"> CONTACT</a></li>
                        <?php
                        if( empty(session_id()) && !headers_sent()){
                            session_start();
                        }
                        if (isset($_SESSION['name'])) {
                            echo '<li><a href="./auth/logout.php">LOGOUT</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>