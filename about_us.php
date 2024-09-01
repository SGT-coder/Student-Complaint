<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- site metas -->
   <title>About Us - Complaint Management System</title>
  
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700&display=swap" rel="stylesheet">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <style>

html,
        body {
            
            /* background-image: url('images/img.jpeg'); */
            background-color: #2CBEBE;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
           
        }
      .values_list {
         margin-left: 20px; /* Indentation for the list */
         list-style-type: none; /* Remove default bullet points */
         color:white;
         font-size: 18px;
      }
      .values_list li {
         margin-bottom: 10px; /* Space between list items */
         position: relative; /* Position for pseudo-element */
         padding-left: 25px; /* Space for bullet icon */
      }
      .values_list li::before {
         content: "\f0da"; /* Font Awesome bullet point icon (chevron-right) */
         font-family: "FontAwesome";
         position: absolute;
         left: 0;
         color: #007bff; /* Custom bullet color */
      }
      .footer_section {
         background-color: #363636;
         color: white;
         padding: 10px 0; /* Reduce padding */
         text-align: center; /* Center align the content */
      }
      .about_section {
         margin-bottom: 20px; /* Add margin above the footer */
      }

      .section_title{
         font-weight: bolder;
      }
      .section_text{
         color: white;
         font-size: 18px;
      }
   </style>
</head>

<body>
   <!--header section start -->
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

                         <li class="nav-item active">
                           <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- header section end -->
  
   <!-- about us section start -->
   <div class="about_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h2 class="section_title">Our Vision</h2>
               <p class="section_text">FDRE Technical and Vocational Training Institute aspires to be a world-class institute in 2025 EC by achieving delivery of quality training, problem-solving research, community service, and technology and enterprise development.</p>
            </div>

            <div class="col-md-12">
               <h2 class="section_title">Our Mission</h2>
               <p class="section_text">Empowering TVT trainers, Industry technicians, and TVT leaders by providing internationally standardized undergraduate and postgraduate courses as well as short- term training.</p>
               <p class="section_text">Enhancing the efficiency of the skill development sector by conducting problem-solving studies and research and community service activities.</p>
               <p class="section_text">Implementing technology and enterprise development activities supported by research and development that enhance the productivity and competitiveness of the industry.</p>
            </div>
            
            <div class="col-md-12">
               <h2 class="section_title">Our Values</h2>
               <p class="section_text">Federal Technical and Vocational Education and Training Institute's core values include:</p>
               <ul class="values_list">
                  <li>Initiative for change</li>
                  <li>Commitment</li>
                  <li>Innovativeness</li>
                  <li>Competence</li>
                  <li>Team spirit</li>
                  <li>Social responsibility</li>
                  <li>Accept diversity</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- about us section end -->

   <!-- footer section start -->
   <div class="footer_section">
      <div class="container">
         <p class="footer_text"> &copy; Student Complaint  System.</p>
      </div>
   </div>
   <!-- footer section end -->

   <!-- Javascript files-->
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
