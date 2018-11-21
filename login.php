<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
	<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link href="dist/css/skins/main.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <!-- <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" /> -->
  </head>



  <?php 

  // echo phpinfo();

include 'core/init.php';
$msg="";
if(isset($_SESSION['id'])){
	header('Location: index.php');
}

if(isset($_GET['success'])){
	echo '<div class="alert alert-success" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Account created. You can now log in.</div>';
}

if(!empty($_POST)){
	$username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);
  
	
	if(empty($username) || empty($password)){
        //errors[] variable is declared in init.php
          $msg = 'Please enter both the username and the password.';
      } else if(!user_exists($username)){
          $msg = 'That username does not exist. Have you been registered?';
      } else if(!user_active($username)){
          $msg = 'Your account is not active. Please contact your administrator.';
      } else{
        //Login function is located in core/functions/users.php
          $login = login($username,$password);
        if(!$login){
            $msg = 'That username/password combination is incorrect';
        } else{
           $_SESSION['id'] = $login;
            header('Location: index.php');//Once logged in, the user is redirected away
            exit();
        }
      }
  }

if(!empty($errors)){
	echo '<div style="color:white; ">'.output_errors($errors).'</div>';
}

?>	



  <body class="login-page" style="background-image:url(images/background.jpg);">
    <div class="login-box">
     
      <div class="login-box-body">
	  <div class="login-logo">
        <a href=""><b>Academia</b>Industry</a>
      </div><!-- /.login-logo -->
        <?php if ($msg!=""){
                echo '<div class="alert alert-danger" role="alert">';
                echo $msg;
                echo '</div>'; 
								}   
				?>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username" required value="<?php if(isset($username)){ echo $username; } ?>"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                                    
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
		</div> -->
		<!-- /.social-auth-links -->

        <a href="register.php" class="text-center">Create an account</a>

      </div><!-- /.login-box-body -->
	</div><!-- /.login-box -->

	

	
	

    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>