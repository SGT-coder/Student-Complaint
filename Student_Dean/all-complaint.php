<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['sdid']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS|| All Complaints</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;
    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + width + ',height=' + height + ',left=' + left + ', top=' + top);
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
                                <h5 class="m-b-10">Manage Users</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="all-complaint.php">All Complaints</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>View All Complaints</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Complaint No</th>
                                                            <th>Complainant Name</th>
                                                            <th>Reg Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                  
                                                        $query = mysqli_query($con, "SELECT tblcomplaints.*, users.fullName as name FROM tblcomplaints JOIN users ON users.id = tblcomplaints.userId where subcategory = 'Registerar' || subcategory = 'Dormitary' || subcategory = 'Cafetria' ");
                                                        $cnt = 1;
                                                        while($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row['complaintNumber']); ?></td>
                                                            <td><?php echo htmlentities($row['name']); ?></td>
                                                            <td><?php echo htmlentities($row['regDate']); ?></td>
                                                            <td>
                                                                <?php $status = $row['status'];
                                                                if ($status == '') { ?>
                                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                                <?php } elseif ($status == 'in process') { ?>
                                                                    <span class="badge badge-warning">In Process</span>
                                                                <?php } elseif ($status == 'closed') { ?>
                                                                    <span class="badge badge-success">Closed</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']); ?>" class="btn btn-primary"> View Details</a>
                                                            </td>
                                                        </tr>
                                                        <?php $cnt = $cnt + 1; } ?>
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
            </div>
        </div>
    </section>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>
