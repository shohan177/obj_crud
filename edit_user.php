<?php require_once 'vendor/autoload.php' ?>
<?php 
	
	use App\Controller\Student;
	use App\Controller\Teacher;
	use App\Controller\Staff;
 	
 	$stu = new Student;
 	$te = new Teacher;
 	$sta = new Staff;



if (isset($_GET['edit_stu'])) {
	//Data recive for student
	$triger = "edit_stu";
	$user_data = $stu -> viewStudent($_GET['edit_stu']);

}elseif (isset($_GET['edit_te'])) {
	//data recive for teacher 
	$triger = "edit_te";
	$user_data = $te -> viewTeacher($_GET['edit_te']);
	//data recive for staff
} elseif (isset($_GET['edit_stf'])) {
	//data recive for staff
	$triger = "edit_stf";
	$user_data = $sta -> viewStaff($_GET['edit_stf']);
	
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
		$id = $user_data['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		
		$old_p = $_POST['old'];
		$new_p = $_FILES['photo']['name']; 

		//recive new photo update valu
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
			

		if (isset($_GET['edit_stu'])) {

			$mess = $stu -> updateStudent($id,$name, $email, $cell, $photo,$photo_status);
			header("location:all_data.php");

		}elseif (isset($_GET['edit_te'])) {
			
			$mess = $te -> updateTeacher($id,$name, $email, $cell, $photo,$photo_status);
			header("location:all_techer_data.php");

		} elseif(isset($_GET['edit_stf'])) {

			$mess = $sta -> updateStaff($id,$name, $email, $cell, $photo,$photo_status);
			header("location:all_data_staff.php");
			
		}

			
		}
		
	}


 ?>
<body>
	
	

	<div class="wrap ">
		
		<div class="card shadow">
			<?php 

			if (isset($mess)) {
				echo $mess;
			}

			 ?>
			<div class="card-body">
				<h2>Edit - <?php echo $user_data['name']?> </h2>
				<form action="<?php echo $_SERVER['PHP_SELF']?>?<?php echo $triger;?>=<?php echo $user_data['id'] ?>"  method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" value = "<?php echo $user_data['name']?>"class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value = "<?php echo $user_data['email']?>"class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" value = "<?php echo $user_data['cell']?>"class="form-control" type="text">
					</div>
					<div class="form-group">
						<img src="media/student/img<?php echo $user_data['photo']?>" style="height:100px; width:100px; border-radius:150px 150px; " alt="">
						<input type="hidden" name="old" value="<?php echo $user_data['photo']?>" id="">
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