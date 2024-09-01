<?php
session_start();
include('include/config.php');

if (strlen($_SESSION['sdid']) == 0) {
    header('location:index.php');
    exit();
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS | Complaints Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .complaint-image {
            max-width: 320px;
            max-height: 240px;
            width: auto;
            height: auto;
        }
        .complaint-media {
            max-width: 320px;
            max-height: 240px;
        }
    </style>
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
                                <h5 class="m-b-10">Complaints Details</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="all-complaint.php">Complaints Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>View Complaints Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead></thead>
                                                    <tbody>
                                                    <?php 
                                                    $cid = intval($_GET['cid']);
                                                    $query = mysqli_query($con, "SELECT tblcomplaints.*, users.fullName AS name FROM users JOIN tblcomplaints ON users.id = tblcomplaints.userId WHERE complaintNumber = '$cid'");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><b>Complaint Number</b></td>
                                                            <td><?php echo htmlentities($row['complaintNumber']); ?></td>
                                                            <td><b>Complainant Name</b></td>
                                                            <td><?php echo htmlentities($row['name']); ?></td>
                                                            <td><b>Reg Date</b></td>
                                                            <td><?php echo htmlentities($row['regDate']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Faculity</b></td>
                                                            <td><?php echo htmlentities($row['category']); ?></td>
                                                            <td><b>Department</b></td>
                                                            <td><?php echo htmlentities($row['subcategory']); ?></td>
                                                            <td><b>Complaint Type</b></td>
                                                            <td><?php echo htmlentities($row['complaintType']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Campus</b></td>
                                                            <td><?php echo htmlentities($row['state']); ?></td>
                                                            <td><b>Nature of Complaint</b></td>
                                                            <td colspan="3"><?php echo htmlentities($row['noc']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Complaint Details</b></td>
                                                            <td colspan="5"><?php echo htmlentities($row['complaintDetails']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Image (if any)</b></td>
                                                            <td colspan="5">
                                                                <?php 
                                                                $cfile = $row['complaintFile'];
                                                                $filePath = "../user/complaintdocs/" . $cfile;
                                                                if (empty($cfile) || !file_exists($filePath)) {
                                                                    echo "Image NA";
                                                                } else {
                                                                    $fileInfo = getimagesize($filePath);
                                                                    if ($fileInfo !== false) {
                                                                ?>
                                                                        <img src="<?php echo htmlentities($filePath); ?>" class="complaint-image" alt="Complaint File">
                                                                <?php 
                                                                    } else {
                                                                        echo "File is not a valid image.";
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Video (if any)</b></td>
                                                            <td colspan="5">
                                                                <?php
                                                                $vfile = $row['videoFile'];
                                                                if (empty($vfile)) {
                                                                    echo "Video NA";
                                                                } else {
                                                                ?>
                                                                    <video class="complaint-media" controls>
                                                                        <source src="../user/complaintdocs/<?php echo htmlentities($vfile); ?>" type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Audio (if any)</b></td>
                                                            <td colspan="5">
                                                                <?php
                                                                $afile = $row['audioFile'];
                                                                if (empty($afile)) {
                                                                    echo "Audio NA";
                                                                } else {
                                                                ?>
                                                                    <audio class="complaint-media" controls>
                                                                        <source src="../user/complaintdocs/<?php echo htmlentities($afile); ?>" type="audio/mpeg">
                                                                        Your browser does not support the audio element.
                                                                    </audio>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Final Status</b></td>
                                                            <td colspan="5">
                                                                <?php 
                                                                $status = $row['status'];
                                                                if ($status == '') {
                                                                ?>
                                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                                <?php } elseif ($status == 'in process') { ?>
                                                                    <span class="badge badge-warning">In Process</span>
                                                                <?php } elseif ($status == 'closed') { ?>
                                                                    <span class="badge badge-success">Closed</span>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <hr>
                                                        <?php
                                                        $ret = mysqli_query($con, "SELECT complaintremark.remark AS remark, complaintremark.status AS sstatus, complaintremark.remarkDate AS rdate 
                                                                                  FROM complaintremark 
                                                                                  JOIN tblcomplaints ON tblcomplaints.complaintNumber = complaintremark.complaintNumber 
                                                                                  WHERE complaintremark.complaintNumber = '$cid'");
                                                        $cnt = 1;
                                                        $count = mysqli_num_rows($ret);
                                                        if ($count) {
                                                        ?>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th colspan="3">Remark</th>
                                                                <th>Status</th>
                                                                <th>Updation Date</th>
                                                            </tr>
                                                            <?php 
                                                            while ($rw = mysqli_fetch_array($ret)) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                                    <td colspan="3"><?php echo htmlentities($rw['remark']); ?></td>
                                                                    <td><?php echo htmlentities($rw['sstatus']); ?></td>
                                                                    <td><?php echo htmlentities($rw['rdate']); ?></td>
                                                                </tr>
                                                                <?php 
                                                                $cnt++; 
                                                            } 
                                                        } ?>
                                                        <tr>
                                                            <td>
                                                                <?php if ($row['status'] != "closed") { ?>
                                                                    <a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']); ?>');" title="Update order">
                                                                        <button type="button" class="btn btn-primary">Take Action</button>
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                            <td colspan="4">
                                                                <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']); ?>');" title="Update order">
                                                                    <button type="button" class="btn btn-primary">View User Details</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
