<?php

include 'core/init.php';
protect(); //Checks if the user is logged in.
include "pages/includes/header.php";

if(isset($_GET['mode'])){
	$id = $session;
	if($user_data['type'] == 2){
		$query = mysqli_query($conn,"update users set type = 3 where id = $id");
	} else if($user_data['type'] == 3){
		$query = mysqli_query($conn,"update users set type = 2 where id = $id");
	}
	
	header("Location: index.php");
}

if(isset($_GET['authorisation'])){
  echo '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>You do not have authorisation for that action.</strong>
  </div>';
}

if(isset($_GET['adminauth'])){
  echo '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Administrator rights are required for that action</strong>
  </div>';
}

?>


        <section class="content-header">
          <h1>
            
            Dashboard
            
          </h1>
		  <br>
		  <?php
		  
		  if($user_data['type'] == 2){
			  echo "Welcome, ".$user_data['firstname'].". You are currently in <strong>Academia</strong> mode. <a href='index.php?mode=1'>Click here</a> to switch to Industry mode.";
		  } else if($user_data['type'] == 3){
			  echo "Welcome, ".$user_data['firstname'].". You are currently in <strong>Industry</strong> mode. <a href='index.php?mode=1'>Click here</a> to switch to Academia mode.";
		  }
		  
		  ?>
		  
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <hr>

        
          <!-- Small boxes (Stat box) -->
      
        <section class="content">
		
		<?php 
		
		if($user_data['type'] == 2){
			?>
			
			<!-- Info boxes -->
          <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
              <a href="projects.php">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-list-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Projects</span>
                  <span class="info-box-number"><small>Take A Look At All Your Projects</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-6 col-sm-8 col-xs-12">
              <a href="newproject.php">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Create A Project</span>
                  <span class="info-box-number"><small>Post What Your Working On</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->
			
			<?php
		} else{
			?>
			<div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
              <a href="ideas.php">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-lightbulb-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ideas</span>
                  <span class="info-box-number"><small>Take A Look At The Ideas You Posted</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
			
			<div class="clearfix visible-sm-block"></div>

            <div class="col-md-6 col-sm-8 col-xs-12">
              <a href="newidea.php">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Post An Idea</span>
                  <span class="info-box-number"><small>Post Something You'd Like Help With</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->
			<?php
		}
		
		?>
		
		<div class="col-md-6 col-sm-8 col-xs-12">
              <a href="profile.php">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-contact"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Account</span>
                  <span class="info-box-number"><small>View And Edit Your Account Details</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->
      
        </section>
  
</div>
    
<?php include "pages/includes/footer.php";?>