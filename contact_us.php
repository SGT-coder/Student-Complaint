<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Complaint Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Favicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            /* background-image: url('images/img.jpeg'); */
            background-color: #2CBEBE;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black; /* Text color */
            font-size: 20px; /* Maximized font size */
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer_section {
            background-color: #363636;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: auto;
        }

        .header_section {
            background-color: rgba(255, 255, 255, 0.8);
            padding:  0;
        }

        .navbar-light .navbar-nav .nav-link {
            color: black;
        }

        .navbar-light .navbar-nav .nav-link.active {
            font-weight: bold;
        }

        .navbar-light .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }

        .about_section {
            margin-bottom: 20px;
        }

        .about_section h2,
        .about_section p {
            color: black; /* Text color */
            text-align: center;
            font-weight: bolder;
            font-size: 50px;
        }

        .values_list li {
            color: white; /* Text color */
            align-items: center;
            text-align: center;
            font-size: 35px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Header Section Start -->
        <div class="header_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-12 m-0 p-0">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="index.php"><h1 style="font-size: 40px;color: black;">SCMS</h1></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Login
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="admin/index.php">Admin</a>
                                            <a class="dropdown-item" href="user/index.php">Student</a>
                                            <a class="dropdown-item" href="Faculty/index.php">Faculty Dean</a>
                                            <a class="dropdown-item" href="Director/index.php">Director</a>
                                            <a class="dropdown-item" href="department/index.php">Dep't Head</a>
                                            <a class="dropdown-item" href="Student_Affair/index.php">Student Affairs</a>
                                            <a class="dropdown-item" href="Student_Dean/index.php">Student Dean</a>
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about_us.php">About Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <!-- Contact Us Section Start -->
        <div class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section_title">Contact Information</h2>
                        <ul class="values_list">
                            <li>P.O. Box 000012</li>
                            <li>Tel: +251-116-464455</li>
                            <li>Fax: +251-116-4544</li>
                             <li>E-mail: info@ftveti.edu.et</li>
                            <li>Addis Abeba</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Section End -->

        <!-- Footer Section Start -->
        <div class="footer_section">
            <div class="container">
                <p class="footer_text"> &copy; Student Complaint Management System.</p>
            </div>
        </div>
        <!-- Footer Section End -->
    </div>

    <!-- Javascript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>


    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
