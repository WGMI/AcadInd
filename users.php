<?php 
include 'core/init.php';
admin_only();//Only admins can access this page.
include 'pages/includes/header.php';

//The $_GET['success'] variable will be set after successfully adding a new user
if(isset($_GET['success'])){
	if($_GET['success'] == 1){
		echo '
		<div class="alert alert-success alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Account added.
		</div>
		';
	}
}

if(isset($_GET['editsuccess'])){
	if($_GET['editsuccess'] == 1){
		echo '
		<div class="alert alert-success alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Account edited.
		</div>
		';
	}
}

//The $_GET['delete'] variable will be set after deleting a user
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	if($user_data['type'] == 3){	
		$query = mysqli_query($conn,"delete from users where id = $id");
	} else{
		echo '
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Administrator rights are required for that action</strong>
		</div>';
	}
}

?>	


              <div class="box box-warning" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
		          <h1>
		            Current Users<br>
		           
		          </h1>
		          <ol class="breadcrumb">
		            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li><a href="addpeople.php">Add user</a></li>
		            <li class="active">View users</li>
		          </ol>
		        </section>

		        <hr>
				
				<section class="content-button">
			        	<div class="pull-right">
								<a href="addaccount.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-plus"></i> Add User Account</a>
							</div>
			        </section>
					<br>
					<hr>


			        <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
			        <thead>
			            <tr>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Account Status</th>
							<th>Office</th>
							<th>Type</th>
							<th></th>
							<th>Edit Account</th>
							<th>Reset Password</th
						</tr>
				        </thead>
				        <tbody>
				        			<?php
									$query = mysqli_query($conn,"select * from users");//Fetching all users
									
									//This function checks user type to know whether it's an admin or not
									function type($type){
										switch($type){
											case 0:
												return 'Regular User';
											break;
											case 1:
												return 'Super User';
											break;
											case 2:
												return 'Administrator';
											break;
											case 3:
												return 'Super Admin';
											break;
											
										}
									}

									//This function checks user active status to know whether it's active or not
									function active($active){
										return ($active) ? 'Active':'<p class="text-danger">Inactive</p>';
									}
									
									function office($office){
										global $conn;
										$query = mysqli_query($conn,"select country_name from country where country_id = $office");
										return mysqli_fetch_assoc($query)['country_name'];
									}
									
									while($row = mysqli_fetch_assoc($query)){
										
									echo '
									<tr>
										<td>'.$row['firstname'].' '.$row['lastname'].'</td>
										<td>'.$row['email'].'</td>
										<td>'.$row['username'].'</td>
										<td>'.active($row['active']).'</td>
										<td>'.office($row['country_id']).'</td>
										<td>'.type($row['type']).'</td>
										<td style="text-align: center">
										<a href="users.php?delete='.$row['id'].'" class="btn btn-danger">Delete</a>
										</td>
										<td style="text-align: center">
										<a href="editaccount.php?edit='.$row['id'].'" class="btn btn-warning">Edit</a>
										</td>
										<td style="text-align: center">
										<a href="manageaccount.php?user='.$row['id'].'" class="btn btn-warning">Reset</a>
										</td>
									</tr>
									';
									}
									?>
				        </tbody>
				        <tfoot>
				        	 <tr>
								<th>Name</th>
								<th>Email</th>
								<th>Username</th>
								<th>Account Status</th>
								<th>Office</th>
								<th></th>
								<th></th>
								<th>Edit Account</th>
								<th>Reset Password</th
							</tr>
				        </tfoot>
				    </table>



										
<?php 
include 'pages/includes/footer.php';
?>		