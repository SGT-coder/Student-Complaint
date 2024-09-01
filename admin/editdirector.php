<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
{   
    header('location:index.php');
}
else
{
    if(isset($_POST['submit']))
    {
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
         $id=intval($_GET['id']);
        $sql=mysqli_query($con,"update director set first_name='$firstname',last_name='$lastname',email='$email' where id='$id'");
        $_SESSION['msg']="Director Updated !!";

        // Redirect to faculty.php after updating
        header('Location: adddirector.php');
        exit(); // Ensure no further output is sent
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SCMS||Update Director</title>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
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
                                <h5 class="m-b-10">Update Director</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="depthead.php">Update Director</a></li>
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
                            <h5>Update Director</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if(isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                        $id=intval($_GET['id']);
                                        $query=mysqli_query($con,"select * from director where id='$id'");
                                        while($row=mysqli_fetch_array($query))
                                        {
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" value="<?php echo  htmlentities($row['first_name']);?>"  name="firstname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Last Name</label>
                                            <input type="text" value="<?php echo  htmlentities($row['last_name']);?>"  name="lastname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Email</label>
                                            <input type="text" value="<?php echo  htmlentities($row['email']);?>"  name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Password</label>
                                            <input type="number" value="<?php echo  htmlentities($row['password']);?>"  name="password" class="form-control" required>
                                        </div>
                                     
                                        <button type="submit" class="btn  btn-primary" name="submit">Submit</button>
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
