<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid']) == 0) {	
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        $type = $_POST['type'];
        $id = intval($_GET['id']);
        $sql = mysqli_query($con, "update slrdc set type='$type' where id='$id'");
        $_SESSION['msg'] = "SLRDC Updated !!";
        
        // Redirect to subtasks.php after updating
        header('Location: subtasks.php');
        exit(); // Ensure no further output is sent
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SCMS || Update SLRDC</title>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="">
    <?php include('include/sidebar.php'); ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include('include/header.php'); ?>
    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Update SLRDC</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="subtasks.php">Update SLRDC</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update SLRDC</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if(isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php
                                    $id = intval($_GET['id']);
                                    $query = mysqli_query($con, "select * from slrdc where id='$id'");
                                    while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SLRDC</label>
                                            <input type="text" value="<?php echo htmlentities($row['type']); ?>" name="type" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ form-element ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>
