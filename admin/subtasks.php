<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
{   
    header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata'); // change according to timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if(isset($_POST['submit'])) {
        $type = $_POST['type'];
        $sql = mysqli_query($con, "insert into slrdc(type) values('$type')");
        $_SESSION['msg'] = "SLRDC Created !!";
    }

    if(isset($_GET['del'])) {
        mysqli_query($con, "delete from slrdc where id = '".$_GET['id']."'");
        $_SESSION['delmsg'] = "SLRDC deleted !!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SCMS|| SLRDC</title>
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
                                <h5 class="m-b-10">SLRDC</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="subtasks.php">SLRDC</a></li>
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
                            <h5>SLRDC</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <?php if(isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <?php if(isset($_GET['del'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <br />

                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SLRDC Name</label>
                                            <input type="text" placeholder="Enter SLRDC Name" name="type" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Manage SLRDC</h5>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>SLRDC</th>
                                                            <th>Creation date</th>
                                                            <th>Last Updated</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $query = mysqli_query($con, "select slrdc.id, slrdc.type, slrdc.creationDate, slrdc.updationDate from slrdc");
                                                        $cnt = 1;
                                                        while($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo htmlentities($cnt); ?></td>
                                                                <td><?php echo htmlentities($row['type']); ?></td>
                                                                <td><?php echo htmlentities($row['creationDate']); ?></td>
                                                                <td><?php echo htmlentities($row['updationDate']); ?></td>
                                                                <td>
                                                                    <a href="editslrdc.php?id=<?php echo $row['id']; ?>" class="btn btn-icon btn-primary"><i class="feather icon-edit"></i></a>
                                                                    <a href="subtasks.php?id=<?php echo $row['id']; ?>&del=delete" class="btn btn-icon btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="feather icon-delete"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        $cnt = $cnt + 1; 
                                                        } 
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
