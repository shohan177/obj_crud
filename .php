<?php require_once 'vendor/autoload.php' ?>
<?php 
 /**
  * class location' This "App" is the replace of the app folder 
  */
 use App\Controller\Teachers;
 
 //class instance
 $stu = new Teachers;

	//sent id for delete single user
	if (isset($_GET['delete']))
	{
		
		$mess = $stu -> delstudent($_GET['delete']);
	}





 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teacher Data</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
		<a class="btn btn-danger" href="index.php">Insert data</a>
		<a class="btn btn-info" href="all_data.php.php">Student</a>
		<a class="btn btn-success" href="all_data_staff.php">Staff</a>
		<div class="card">
			<?php 

				if (isset($mess)) {
						echo $mess;
					}	

			 ?>
			<div class="card-body">
				<h2>All Teacher</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						 $data = $stu -> allStudent();
						 $i = 0;
						 while ($student = $data -> fetch_assoc()): 
						 ?>
						<tr>
							<td><?php  echo $i++ ?></td>
							<td><?php echo $student['name']; ?></td>
							<td><?php echo $student['email']; ?></td>
							<td><?php echo $student['cell']; ?></td>
							<td><img src="media/student/img<?php echo $student['photo']; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="view_singel_user.php?view=<?php echo $student['id'];?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit_user.php?edit=<?php echo $student['id'];?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete=<?php echo $student['id'];?> ">Delete</a>
							</td>
						</tr>

					<?php endwhile; ?>
						
						

					</tbody>
				</table>
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