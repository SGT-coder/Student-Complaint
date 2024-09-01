<?php
include ('include/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$contactno = $_POST['contactno'];
	$hobby= $_POST['hobby'];
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	
	$status = 1;
	$query = mysqli_query($con, "insert into users(fullName,userEmail,password,contactNo,hobby,Faculty,Department,status) values('$fullname','$email','$password','$contactno','$hobby','$faculty','$department','$status')");

	echo "<script>alert('Registration successfull. Now You can login');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CMS | User Regsitrations</title>
	<link rel="stylesheet" href="../admin/assets/css/style.css">
	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function (data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function () { }
			});
		}
	</script>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<h4>Complaint management system
			<hr /><span style="color:#fff;"> User Registration</span>
		</h4>
		<hr />
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">

						<div class="card-body">


							<div class="form-group mb-3">

								<input type="text" class="form-control" placeholder="Full Name" name="fullname"
									required="required" autofocus>
							</div>
							<div class="form-group mb-4">

								<input type="email" class="form-control" placeholder="Email ID" id="email"
									onBlur="userAvailability()" name="email" required="required">
								<span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group mb-3">

								<input type="text" class="form-control" maxlength="10" name="contactno"
									placeholder="Contact no" required="required" autofocus>
							</div>


							<div class="form-group mb-3">

					<input type="text" class="form-control"  name="hobby"
					placeholder="write your hobby " required="required" autofocus>
						</div>
							<div class="form-group mb-3">
								<select name="faculty" class="form-control" required>
									<option value="" disabled selected>Select Faculty</option>
									<?php
									$query = mysqli_query($con, "select * from category");
									while ($row = mysqli_fetch_array($query)) { ?>
										<option value="<?php echo $row['categoryName']; ?>">
											<?php echo $row['categoryName']; ?></option>
									<?php } ?>
								</select>


							</div>
							<div class="form-group mb-3">

								<select name="department" class="form-control" required>
									<option value="" disabled selected>Select Department</option>
									<?php $query = mysqli_query($con, "select subcategory.*,category.categoryName as name from subcategory join category on subcategory.categoryid=category.id 
 ");
									while ($row = mysqli_fetch_array($query)) { ?>
										<option value="<?php echo $row['subcategory']; ?>"><?php echo $row['subcategory']; ?>
										</option>


									<?php } ?>
								</select>

							</div>
							<div class="form-group mb-3">

								<input type="password" class="form-control" placeholder="Password" required="required"
									name="password"><br>
							</div>
							<button class="btn btn-block btn-primary mb-4" type="submit" name="submit">Register</button>
							<hr>

						</div>
					</form>
					<i class="fa fa-home" aria-hidden="true"><a class="" href="../index.php">
							Back Home
						</a></i>
				</div>
			</div>
		</div>
		<!-- [ auth-signin ] end -->

		<!-- Required Js -->
		<script src="../admin/assets/js/vendor-all.min.js"></script>
		<script src="../admin/assets/js/plugins/bootstrap.min.js"></script>



		</body>

</html>