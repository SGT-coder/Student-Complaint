<?php
session_start();
include('include/config.php');

if (strlen($_SESSION['aid']) == 0) {   
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $id = intval($_GET['id']);
        $sql = mysqli_query($con, "UPDATE studentdean SET first_name='$firstname', last_name='$lastname', email='$email', role='$role' WHERE id='$id'");
        $_SESSION['msg'] = "Student Dean Updated !!";
        header('Location: addstudentdean.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SCMS||Update Student Dean</title>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
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
                            <h5 class="m-b-10">Update Student Dean</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="depthead.php">Update Student Dean</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Student Dean</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (isset($_SESSION['msg'])) { ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                    </div>
                                <?php } ?>
                                
                                <?php
                                $id = intval($_GET['id']);
                                $query = mysqli_query($con, "SELECT * FROM studentdean WHERE id='$id'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" value="<?php echo htmlentities($row['first_name']); ?>" name="firstname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" value="<?php echo htmlentities($row['last_name']); ?>" name="lastname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" value="<?php echo htmlentities($row['email']); ?>" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="">Select Role</option> 
                                            <?php
                                            $query_roles = mysqli_query($con, "SELECT * FROM slrdc");
                                            while ($role_row = mysqli_fetch_array($query_roles)) {
                                            ?>
                                                <option value="<?php echo $role_row['type']; ?>" <?php if ($row['role'] == $role_row['type']) echo 'selected'; ?>><?php echo $role_row['type']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>
