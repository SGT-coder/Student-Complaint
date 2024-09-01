<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Basic Meta Tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complaint Management System</title>

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
      html, body {
         height: 100%;
         margin: 0;
         padding: 0;
         background-image: url('images/img4.jpeg');
         background-size: cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
      }

      .wrapper {
         display: flex;
         flex-direction: column;
         min-height: 100vh;
      }

      .footer_section {
         background-color: rgba(0, 0, 0, 0.5);
         color: white;
         padding: 10px 0; /* Reduce padding */
         text-align: center; /* Center align the content */
         margin-top: auto;
      }
      
      .header_section {
         background-color: rgba(255, 255, 255, 0.8); /* Transparent background */
         padding:  0; /* Adjust padding */
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
      
      .banner_section {
         padding: 60px 0;
         text-align: center;
         color: white;
         background: rgba(0, 0, 0, 0.5); /* Transparent background for banner */
      }
      
      .banner_taital {
         font-size: 48px;
         font-weight: 700;
         margin-bottom: 20px;
      }
      
      .number_main {
         display: flex;
         justify-content: center;
         align-items: center;
      }
      
      .number_text {
         font-size: 100px;
         font-weight: 700;
         color: rgba(255, 255, 255, 0.7);
      }

      /* Underline active link in dropdown menu */
      .navbar-light .dropdown-menu .nav-link.active,
      .navbar-light .dropdown-menu .nav-link:hover {
         text-decoration: underline;
         text-decoration-color: burlywood;
      }

       .dropdown-item:hover {
         text-decoration: underline;
         text-decoration-color: burlywood;
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
                     <a class="navbar-brand" href="index.php"><h1 style="font-size: 40px;color: black; align-items:left">SCS</h1></a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="index.php">Home</a>
                           </li>
                          
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                           <li class="nav-item">
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

      <!-- Banner Section Start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <h1 class="banner_taital" style="color:burlywood">Lodge Your Complaint</h1>
                     <div class="number_main">
                        <div class="number_text">01</div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="banner_taital"  style="color:burlywood">Feel Free To Complaint</h1>
                     <div class="number_main">
                        <div class="number_text">02</div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- Banner Section End -->
    
      <!-- Main Content Section Start -->
      <div class="main_content">
         <!-- You can add main content here if necessary -->
      </div>
      <!-- Main Content Section End -->

      <!-- Footer Section Start -->
      <div class="footer_section">
         <div class="container">
            <p class="footer_text">&copy; Student Complaint  System.</p>
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
   <!-- Sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- Owl Carousel -->
   <script src="js/owl.carousel.js"></script>
   <!-- Fancybox -->
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
