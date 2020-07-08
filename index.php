<?php require_once 'vendor/autoload.php' ?>
<?php 
 /**
  * class location' This "App" is the replace of the app folder 
  */
 use App\Controller\Student;
 
 //class instance
 $stu = new Student;



 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<?php 
	if (isset($_POST['save'])) {
		/**
		 * fild value recive 
		 */
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$photo = $_FILES['photo'];
	    $ct = $_POST['ct'];


		/**
		 * empty fild validation 
		 */
		if (empty($name) || empty($email) || empty($cell) ) {
			$mess = '<p class="alert alert-warning"> All Fied are Required ! <button class="close" data-dismiss="alert">&times;</button></p>';
		}
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$mess = '<p class="alert alert-info"> email erro !! <button class="close" data-dismiss="alert">&times;</button></p>';
		}
		else{

			$mess = $stu -> addNewStudent($name, $email, $cell, $photo, $ct);
		}
		
	}


 ?>
<body>
	
	

	<div class="wrap ">
		<a class="btn btn-info" href="all_data.php">show all</a>
		<div class="card shadow">
			<?php 

			if (isset($mess)) {
				echo $mess;
			}

			 ?>
			<div class="card-body">
				<h2>Sign Up</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']?>"  method="POST" enctype="multipart/form-data">
					<div class="form-group">
						 <select class="custom-select" name="ct" id="inputGroupSelect01">
						    <option selected>students</option>
						    <option value="teachers">Teachers</option>
						    <option value="staffs">Staffs</option> 
						  </select>
					</div>
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="save" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>