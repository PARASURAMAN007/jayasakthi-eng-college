<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Styles and Fonts -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/car-care.png" type="image/x-icon" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="../assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <style>
        .bx{
            font-size: 1.5rem;
            align-self: center;
        }
        .info-box p, .info-box a{
            padding-left: 2rem;
        }
        .info-box h3{
            margin-left: 0.5rem;
        }
        a .bx{
            font-size: 2rem;
            margin-top: 1rem;
            color: #777;
        }
    </style>
</head>

<body>
    <?php
    include('../components/navbar.php');
    ?>
    <section id="contacts" class="contact">
        <div class="container my-5 py-3 px-5">
            <div class="section-title mb-3">
                <h1>Contact</h1>
            </div>

            <div class="row mt-2">

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <div class="d-flex align-self-center">
                            <i class="bx bx-map"></i>
                            <h3 class="mb-0">My Address</h3>
                        </div>
                        <p>Plot: No; 216,</p>
                        <p>TNHB, Kakkalur</p>
                        <p>Thiruvallur 602026</p>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                    <div class="info-box">
                        <div class="d-flex align-self-center">
                            <i class="bx bx-share-alt"></i>
                            <h3 class="mb-0">Social Profiles</h3>
                        </div>
                        <div class="social-links">
                            <a href="https://www.linkedin.com/in/afranzio/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            <a href="https://github.com/Afranzio?tab=repositories" target="_blank" class="github"><i class="bx bxl-github"></i></a>
                            <a href="mailto:afranzio@zohomail.in" target="_blank" class="google"><i class="bx bxl-google"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5 pb-3 d-flex align-items-stretch">
                    <div class="info-box">
                        <div class="d-flex align-self-center">
                            <i class="bx bx-envelope"></i>
                            <h3 class="mb-0">Email</h3>
                        </div>
                        <p>afranzio@zohomail.in</p>
                    </div>
                </div>
                <div class="col-md-6 mt-5 pb-3 d-flex align-items-stretch">
                    <div class="info-box">
                        <div class="d-flex align-self-center">
                            <i class="bx bx-phone-call"></i>
                            <h3 class="mb-0">Contact</h3>
                        </div>
                        <p>+91 99446 22435</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../components/justFooter.php');
    ?>
</body>
<script>
    window.onload = function() {
        document.getElementById("logoImg").src = "../assets/images/car-care.png";
    };
</script>

</html>