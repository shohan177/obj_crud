<?php require_once 'vendor/autoload.php' ?>
<?php 

	use App\Controller\Student;
	use App\Controller\Teacher;
	use App\Controller\Staff;
 	
 	$stu = new Student;
 	$te = new Teacher;
 	$sta = new Staff;

if (isset($_GET['view_stu'])) {
	//Data recive for student

	$back = "all_data.php";
	$tirger = "All Student";
	$single_user_data	= $stu -> viewStudent($_GET['view_stu']);

}elseif (isset($_GET['view_te'])) {
	//data recive for teacher 
	$back = "all_techer_data.php";
	$tirger = "All Teacher";
	$single_user_data	= $te -> viewTeacher($_GET['view_te']);
	//data recive for staff
} elseif (isset($_GET['view_stf'])) {
	//data recive for staff
	$back = "all_data_staff.php";
	$tirger = "All Staff";
	$single_user_data	= $sta -> viewStaff($_GET['view_stf']);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>profie of <?php echo$single_user_data['name']; ?> </title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	
	

	<div class="wrap ">
		<a class="btn btn-info" href="<?php echo $back?>"><?php echo $tirger ?></a>
		
		<div class="card shadow">
			<div class="card-header shadow">
				
			
			<div class="card-body">
				<img style="height:300px; width: 300px; border-radius:150px 150px; margin-bottom: 20px;" src="media/student/img<?php echo$single_user_data['photo']; ?>">


				 <table class="table table-condensed">
				    <thead>

				      <tr>
				        <th>Firstname</th>
				        <th>Lastname</th>
				        <th>Email</th>
				      </tr>
				    </thead>
				    <tbody>
				    	
				      <tr>
				        <td><?php echo$single_user_data['name']; ?></td>
				        <td><?php echo$single_user_data['email']; ?></td>
				        <td><?php echo$single_user_data['cell']; ?></td>
				      </tr>
				     </tbody>  
			</di>
		</div>	
	</div>
	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>