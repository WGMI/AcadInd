<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
		<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<style>
					#registerform .error {
					color: red;
					font-size:12px;
			}
			
		</style>
	</head>
<?php
include 'core/init.php';
	
$msg="";



	if(isset($_POST['submit'])){
		$email = $_POST['email'];

		if(!email_exists($email)){
			$username = sanitize($_POST['username']);
			if(!user_exists($username)){
				$password = sanitize($_POST['password']);
				$password_again = sanitize($_POST['retype_password']);
				$firstname = sanitize($_POST['firstname']);
				$lastname = sanitize($_POST['lastname']);
				$industry_id = $_POST['industry'];
				$hashed_password = md5($password);
				$time = time();
				// echo $hashed_password;die();

				
				$query = mysqli_query($conn,"
				INSERT INTO `users` 
				(`id`, `firstname`, `lastname`, `email`, `industry_id`, `username`, `password`, `type`, `active`, `date_joined`) 
				VALUES 
				(NULL, '$firstname', '$lastname', '$email', $industry_id, '$username', '$hashed_password', '0', 1, $time);
				");
				if($query){
					header('Location: login.php?success=1');
				} else{
					echo mysqli_error($conn);
				}
			} else{
				$msg="That username is already taken.";
			}
		} else{
			$msg="That email is already taken.";
		}
	}
?>	
  <body class="register-page" style="background-image:url(images/background.jpg);">
    <div class="register-box">
      <div class="register-box-body" >
			<div class="register-logo">
        <a href=""><b>Academia</b>Industry</a>
      </div>
				<p class="login-box-msg">Create account</p>
				<?php 
					if ($msg!=""){
							echo '<div class="alert alert-danger" role="alert">';
							echo $msg;
							echo '</div>'; 
					}   
				?>
        <form action="register.php" id="registerform" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control required" placeholder="First name" id="firstname" name="firstname" value="<?php if(isset($firstname)){ echo $firstname; } ?>"/>
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
					</div>
					<div class="form-group has-feedback">
            <input type="text" class="form-control required" placeholder="Last name" id="lastname" name="lastname" value="<?php if(isset($lastname)){ echo $lastname; } ?>"/>
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
					</div>
					<div class="form-group has-feedback">
            <input type="text" class="form-control required" placeholder="User name" id="username" name="username" value="<?php if(isset($username)){ echo $username; } ?>"/>
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control required" placeholder="Email address"  id="email" name="email" value="<?php if(isset($emailaddress)){ echo $emailaddress; } ?>"/>
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
					</div>
					
          <div class="form-group has-feedback">
			<select class="form-control form-control-sm required" name="industry" id="industry" >
				<option disabled selected>Select Industry</option>
				<?php
				$industries_query = mysqli_query($conn, "select * from industries");
				while($row = mysqli_fetch_assoc($industries_query)){
					?>
					<option value=<?php echo $row['industry_id']?>> <?php echo $row['industry_name'] ?> </option>
					<?php
				}
				?>
			</select>
		</div>
		  <div class="form-group has-feedback">
            <input type="password" class="form-control required" name="password" id="password" placeholder="Password"/>
            <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control required" name="retype_password" id="retype_password" placeholder="Retype password"/>
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
					</div>
					<div class="row">
            <div class="col-xs-8">    
                                    
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>      

        <a href="login.php" class="text-center">I already have an account</a>
      </div><!-- /.form-box -->
		</div><!-- /.register-box -->


		 <!-- jQuery 2.1.3 -->
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
		 <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/additional-methods.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="dist/js/main.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
			$(document).ready(function(){
				$("#registerform").validate({
					rules:{
						firstname:{
							required:true,
							minlength: 2
						},
						lastname:{
							required:true,
							minlength: 2
						},
						username:{
							required:true,
							minlength: 4
						},
						email:{
							required:true,
							email: true
						},
						region:{
							required:true
						},
						country:{
							required:true
						},
						password:{
							required:true,
							minlength:8
						},
						retype_password:{
							required:true,
							equalTo:'#password'
						}

					},
					messages:{

							firstname:{
							required: "Firstname field is required",
							minlength: "Firstname should be more than two characters"
						},
						lastname:{
							required: "Lastname field is required",
							minlength: "Lastname should be more than two characters"
						},
						username:{
							required: "Username field is required",
							minlength: "Username should be more than six characters"
						},
						email:{
							required:"Email field is required"
						},
						region:{
							required: "Region field is required"
						},
						country:{
							required: "Country field is required"
						},
						password:{
							required:"Password field is required",
							minlength:"Password should be more than eight(8) characters"
						},
						retype_password:{
							required: "Confirm your password",
							equalTo:'Your passwords do not match'
						}
					}
					
					});
			});

    </script>
		


		
  </body>
</html>