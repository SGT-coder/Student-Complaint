<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['diid'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS|| Not process yet Complaints</title>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    
 <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("complaintsTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
</script>   

</head>
<body class="">
    <?php include('include/sidebar.php');?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include('include/header.php');?>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Manage Users</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="notprocess-complaint.php">Not process Complaints</a></li>
                            
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
                 
                    <div class="card-body">
                        <h5>View Not process Complaints</h5>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for complaints.." class="form-control" style="max-width: 300px; display: inline-block;">
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-xl-12">
                <div class="card">
                   
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped" id="complaintsTable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Faculty</th>
                                        <th>Department</th>
                                        <th>Reg Date</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($con, "SELECT * from tblcomplaints WHERE tblcomplaints.status is null");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['category']); ?></td>
                                            <td><?php echo htmlentities($row['subcategory']); ?></td>
                                            <td><?php echo htmlentities($row['regDate']); ?></td>
                                            <td>
                                                <?php 
                                                $status = $row['status'];
                                                if ($status == '') { ?>
                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                <?php } elseif ($status == 'in process') { ?>
                                                    <span class="badge badge-warning">In Process</span>
                                                <?php } elseif ($status == 'closed') { ?>
                                                    <span class="badge badge-success">Closed</span>
                                                <?php } ?>
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
