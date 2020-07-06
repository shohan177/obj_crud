<?php require_once 'vendor/autoload.php' ?>
<?php 
 /**
  * class location' This "App" is the replace of the app folder 
  */
 use App\Controller\Student;
 
 //class instance
 $stu = new Student;

	//sent id for view single user
	if (isset($_GET['view'])) 
	{
		
	  $single_student	= $stu -> viewStudent($_GET['view']);
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>profie of <?php echo $single_student['name']; ?> </title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	
	

	<div class="wrap ">
		<a class="btn btn-info" href="all_data.php">show all</a>
		
		<div class="card shadow">
			<div class="card-body">
				<img style="height:300px; width: 300px; border-radius:150px 150px; margin-bottom: 20px;" src="media/student/img<?php echo $single_student['photo']; ?>">


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
				        <td><?php echo $single_student['name']; ?></td>
				        <td><?php echo $single_student['email']; ?></td>
				        <td><?php echo $single_student['cell']; ?></td>
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