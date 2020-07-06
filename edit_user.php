<?php require_once 'vendor/autoload.php' ?>
<?php 
 /**
  * class location' This "App" is the replace of the app folder 
  */
 use App\Controller\Student;
 
 //class instance
 $stu = new Student;

if (isset($_GET['edit'])) {
	
	$single_student = $stu -> viewStudent($_GET['edit']);
}


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
		
		$old_p = $_POST['old'];
		$new_p = $_FILES['photo']['name']; 

		if (empty($new_p)) {
			$photo = $old_p;
			$photo_status = "old";
		
		}else{
			$photo = $_FILES['photo'];
			$photo_status = "new";
		}

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

			$mess = $stu -> updateStudent($name, $email, $cell, $photo,$photo_status);
			header("location:all_data.php");
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
				<form action="<?php echo $_SERVER['PHP_SELF']?>?edit=<?php echo $single_student['id'] ?>"  method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" value = "<?php echo $single_student['name']?>"class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value = "<?php echo $single_student['email']?>"class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" value = "<?php echo $single_student['cell']?>"class="form-control" type="text">
					</div>
					<div class="form-group">
						<img src="media/student/img<?php echo $single_student['photo']?>" style="height:100px; width:100px; border-radius:150px 150px; " alt="">
						<input type="hidden" name="old" value="<?php echo $single_student['photo']?>" id="">
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