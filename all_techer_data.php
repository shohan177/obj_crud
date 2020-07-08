<?php require_once 'vendor/autoload.php' ?>
<?php 
 /**
  * class location' This "App" is the replace of the app folder 
  */
 use App\Controller\Teacher;
 
 //class instance
 $te = new Teacher;

	//sent id for delete single user
	if (isset($_GET['delete']))
	{
		
		$mess = $te -> delTeacher($_GET['delete']);
	}





 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>teacher data</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
		<a class="btn btn-danger" href="index.php">Insert data</a>
		<a class="btn btn-info" href="all_data.php">Student</a>
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
							$i = 1;
							$data = $te -> allTeacher();
							while ($teacher = $data -> fetch_assoc()):
						 ?>

						<tr>
							<td><?php echo $i++ ?></td>
							<td>Teacher - <?php echo $teacher['name'] ?></td>
							<td><?php echo $teacher['email'] ?></td>
							<td><?php echo $teacher['cell'] ?></td>
							<td><img src="media/student/img<?php echo $teacher['photo'] ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="view_singel_user.php?view_te=<?php echo $teacher['id'];?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit_user.php?edit_te=<?php echo $teacher['id'];?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete=<?php echo $teacher['id'] ?>">Delete</a>
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