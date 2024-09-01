
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
     $gender=$_POST['gender'];
    $email=$_POST['email']; 
    $password=md5($_POST['password']);
    $role=$_POST['role'];
$sql=mysqli_query($con,"insert into customers(first_name,last_name,gender,email,password,role) values('$first_name','$last_name','$gender','$email','$password','$role')");
$_SESSION['msg']="users  Created !!";

}

if(isset($_GET['del']))
          {
                  mysqli_query($con,"delete from customers where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="customer deleted !!";
          }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SCMS|Category</title>
   

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
                            <h5 class="m-b-10">Category</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                            
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
                        <h5>Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <?php if(isset($_POST['submit']))
{?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                    </div>
<?php } ?>


                                    <?php if(isset($_GET['del']))
{?>

<div class="alert alert-danger" role="alert">
                           <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                        </div>

                              
<?php } ?>

                                    <br />
                                <form method="post" name="Category">
                                    
                                                <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text"placeholder="Enter First Name"  name="first_name" class="form-control" required="true">
                                        
                                        </div>
                                           <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text"placeholder="Enter Last Name"  name="last_name" class="form-control" required="true">
                                        
                                        </div>  
                                         <div class="form-group">
                                        <label for="exampleInputEmail1"> Gender</label><br>
                                        <input type="radio"placeholder="Enter Gender"  name="gender" class="form-input" required="true">&nbsp; &nbsp;Male &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                        <input type="radio"placeholder="Enter Gender"  name="gender" class="form-input" required="true">&nbsp; &nbsp;Female&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                         <input type="radio"placeholder="Enter Gender"  name="gender" class="form-input" required="true">&nbsp; &nbsp;Other 
                                        </div>
                                           <div class="form-group">
                                        <label for="exampleInputEmail1"> Email</label>
                                        <input type="Email"placeholder="Enter Email"  name="email" class="form-control" required="true">
                                        
                                        </div>
                                           <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password"placeholder="Enter Password"  name="password" class="form-control" required="true">
                                        
                                        </div>
                                          
                                           
                                          <div class="form-group">
                                        <label for="exampleInputEmail1">role</label>
                                        <select name="role" class="form-control" required>
                                                <option value="">Select role</option> 
                                                <?php $query=mysqli_query($con,"select * from category ");
                                                while($row=mysqli_fetch_array($query))
                                                {?>
                                         <option value="<?php echo $row['categoryName'];?>"><?php echo $row['categoryName'];?></option>
                                       

                                                <?php } ?>
                                                </select>
                                                                                        
                                    </div>
                                
                                    <button type="submit" class="btn  btn-primary" name="submit">Add</button>
                                </form>
                            </div>
                           
                        </div>
                     <hr>
                      <div class="row">
                            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Categories</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th> Email</th>
                                            <th>Role </th>
                                            <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php $query=mysqli_query($con,"select customers.*,category.categoryName as name from customers join category on customers.role=category.categoryName ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']);?></td>
                                            <td><?php echo htmlentities($row['last_name']);?></td>
                                            <td> <?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['role']);?></td>
                                            <td>
                                            <a href="editfacultydean.php?id=<?php echo $row['id']?>" class="btn btn-icon btn-primary btn-xs"><i class="feather icon-edit"></i></a>
                                            <a href="faculty.php?id=<?php echo $row['id']?>&del=delete" class="btn  btn-icon btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="feather icon-delete"></i></a></td>

                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                   
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