<?php
session_start();
include('include/config.php');
error_reporting(0);

if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {
    $userId = $_SESSION['id'];

    // Retrieve the user's chosen faculty from the users table
    $userQuery = mysqli_query($con, "SELECT faculty FROM users WHERE id = '$userId'");
    $userRow = mysqli_fetch_array($userQuery);
    $userFaculty = $userRow['faculty'];

    $userQuery1 = mysqli_query($con, "SELECT department FROM users WHERE id = '$userId'");
    $userRow1 = mysqli_fetch_array($userQuery1);
    $userFaculty1 = $userRow1['department'];

    // Fetch categories based on the user's faculty
    $categoryQuery = mysqli_query($con, "SELECT * FROM category WHERE categoryName = '$userFaculty'");
    $categoryQuery1 = mysqli_query($con, "SELECT * FROM subcategory WHERE subcategory = '$userFaculty1'");

    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $uid = $_SESSION['id'];
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $complaintype = $_POST['complaintype'];
        $state = $_POST['state'];
        $noc = $_POST['noc'];
        $complaintdetials = $_POST['complaindetails'];

        $my_video = $_FILES["my_video"]["name"];
        $my_audio = $_FILES["my_audio"]["name"];
        $my_image = $_FILES["my_image"]["name"]; // New image file field

        // Handle video file upload
        $videoExtension = strtolower(pathinfo($my_video, PATHINFO_EXTENSION));
        $allowed_video_extensions = array("mp4", "mov", "avi");

        // Handle audio file upload
        $audioExtension = strtolower(pathinfo($my_audio, PATHINFO_EXTENSION));
        $allowed_audio_extensions = array("mp3", "wav");

        // Handle image file upload
        $imageExtension = strtolower(pathinfo($my_image, PATHINFO_EXTENSION));
        $allowed_image_extensions = array("jpg", "jpeg", "png", "gif");

        if (!in_array($imageExtension, $allowed_image_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif format allowed');</script>";
        } elseif (!in_array($videoExtension, $allowed_video_extensions)) {
            echo "<script>alert('Invalid video format. Only MP4, MOV, and AVI formats are allowed');</script>";
        } elseif (!in_array($audioExtension, $allowed_audio_extensions)) {
            echo "<script>alert('Invalid audio format. Only MP3 and WAV formats are allowed');</script>";
        } else {
            // Rename and move the video file
            $videofilenew = md5($my_video) . '.' . $videoExtension;
            $targetVideoFile = "complaintdocs/" . $videofilenew;
            $maxVideoFileSize = 500 * 1024 * 1024; // 500MB

            if ($_FILES["my_video"]["size"] <= $maxVideoFileSize) {
                if (move_uploaded_file($_FILES["my_video"]["tmp_name"], $targetVideoFile)) {
                    $video_url = $videofilenew; // Store the video file name only
                } else {
                    echo "<script>alert('Failed to upload the video.');</script>";
                }
            } else {
                echo "<script>alert('The video file size should not exceed 500MB.');</script>";
            }

            // Rename and move the audio file
            $audiofilenew = md5($my_audio) . '.' . $audioExtension;
            $targetAudioFile = "complaintdocs/" . $audiofilenew;
            $maxAudioFileSize = 100 * 1024 * 1024; // 100MB

            if ($_FILES["my_audio"]["size"] <= $maxAudioFileSize) {
                if (move_uploaded_file($_FILES["my_audio"]["tmp_name"], $targetAudioFile)) {
                    $audio_url = $audiofilenew; // Store the audio file name only
                } else {
                    echo "<script>alert('Failed to upload the audio.');</script>";
                }
            } else {
                echo "<script>alert('The audio file size should not exceed 100MB.');</script>";
            }

            // Rename and move the image file
            $imagefilenew = md5($my_image) . '.' . $imageExtension;
            $targetImageFile = "complaintdocs/" . $imagefilenew;
            $maxImageFileSize = 5 * 1024 * 1024; // 5MB

            if ($_FILES["my_image"]["size"] <= $maxImageFileSize) {
                if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $targetImageFile)) {
                    $image_url = $imagefilenew; // Store the image file name only
                } else {
                    echo "<script>alert('Failed to upload the image.');</script>";
                }
            } else {
                echo "<script>alert('The image file size should not exceed 5MB.');</script>";
            }

            // Insert into the database
            $query = mysqli_query($con, "INSERT INTO tblcomplaints(userId, category, subcategory, complaintType, state, noc, complaintDetails, complaintFile, videoFile, audioFile) VALUES('$uid', '$category', '$subcat', '$complaintype', '$state', '$noc', '$complaintdetials', '$image_url', '$video_url', '$audio_url')");

            // Show complaint number
            $sql = mysqli_query($con, "SELECT complaintNumber FROM tblcomplaints ORDER BY complaintNumber DESC LIMIT 1");
            while ($row = mysqli_fetch_array($sql)) {
                $cmpn = $row['complaintNumber'];
            }
            $complainno = $cmpn;
            echo '<script>alert("Your complaint has been successfully filed and your complaint number is " + "' . $complainno . '")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS || Register Complaint</title>
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <script>
        function getCat(val) {
            $.ajax({
                type: "POST",
                url: "getsubcat.php",
                data: 'catid=' + val,
                success: function(data) {
                    $("#subcategory").html(data);
                }
            });
        }
    </script>
</head>
<body class="">
    <?php include('include/sidebar.php'); ?>
    <?php include('include/header.php'); ?>
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Register Complaint</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="register-complaint.php">Register Complaint</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Register Complaint</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <br />
                                    <form method="post" name="complaint" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="category">Your Faculty</label>
                                            <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
                                                <option value="" disabled selected>Select Category</option>
                                                <?php while ($rw = mysqli_fetch_array($categoryQuery)) { ?>
                                                    <option value="<?php echo htmlentities($rw['categoryName']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subcategory">Dep't where you complain </label>
                                            <select name="subcategory" id="category" class="form-control" onChange="getCat(this.value);" required="">
                                                <option value="" disabled selected>Select Category</option>
                                                <?php while ($rw = mysqli_fetch_array($categoryQuery1)) { ?>
                                                    <option value="<?php echo htmlentities($rw['subcategory']); ?>"><?php echo htmlentities($rw['subcategory']); ?></option>
                                                    <option value="Pedagogy">Pedagogy</option>
                                                    <option value="Mathematics">Mathematics</option>
                                                    <option value="Sport">Sport </option>
                                                    <option value="English">English </option>
                                                    <option value="Security">Security </option>
                                                    <option value="Library">Library </option>
                                                    <option value="Cafetria">Cafetria </option>
                                                    <option value="Dormitary">Dormitary </option>
                                                    <option value="Registerar">Registerar </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="complaintype">Complaint Type</label>
                                            <select name="complaintype" class="form-control" required="">
                                                <option value="" disabled selected>Select Complaint Type</option>
                                                <option value="Inadequate teaching methods">Inadequate teaching methods</option>
                                                <option value="Lack of engagement or support from Teachers.">Lack of engagement or support from professors</option>
                                                <option value="Unavailability of lecturers for consultations.">Unavailability of lecturers for consultations.</option>
                                                <option value="Unfair grading practices">Unfair grading practices </option>
                                                <option value="Delayed or lost exam results">Delayed or lost exam results </option>
                                                <option value="Difficulties with course registration "> Difficulties with course registration</option>
                                                <option value="Errors in academic records ">Errors in academic records </option>
                                                <option value="Incidents of racial, gender, or other forms of discrimination">Incidents of racial, gender, or other forms of discrimination </option>
                                                <option value="Poor condition of sports facilities">Poor condition of sports facilities </option>
                                                <option value="Unfair practices in sports teams or events ">Unfair practices in sports teams or events </option>
                                                <option value="Inadequate security measures ">Inadequate security measures </option>
                                                <option value="Incidents of theft, violence, or vandalism ">Incidents of theft, violence, or vandalism </option>
                                                <option value="Insufficient copies of textbooks or required reading materials ">Insufficient copies of textbooks or required reading materials </option>
                                                <option value="Limited access to online journals, databases, and e-books ">Limited access to online journals, databases, and e-books </option>
                                                <option value="Inadequate number of study rooms or quiet study areas ">Inadequate number of study rooms or quiet study areas </option>
                                                <option value="Inadequate number of study rooms or quiet study areas ">food issue</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="state">Campus</label>
                                            <select name="state" required="required" class="form-control">
                                                <option value="">Select Campus</option>
                                                <?php $sql = mysqli_query($con, "select stateName from state ");
                                                while ($rw = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo htmlentities($rw['stateName']); ?>"><?php echo htmlentities($rw['stateName']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="noc">Nature of Complaint</label>
                                            <input type="text" name="noc" required="required" value="" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="complaindetails">Complaint Details (max 2000 words)</label>
                                            <textarea name="complaindetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="my_image">Upload Image</label>
                                            <input type="file" name="my_image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="my_audio">Upload Audio</label>
                                            <input type="file" name="my_audio" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="my_video">Upload Video</label>
                                            <input type="file" name="my_video" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../admin/assets/js/vendor-all.min.js"></script>
    <script src="../admin/assets/js/plugins/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
