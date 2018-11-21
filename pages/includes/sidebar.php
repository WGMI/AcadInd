<?php 
  $currentPage = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <ul class="sidebar-menu">
            <li class="treeviewview">
			<?php
			if(!logged_in()){
				?>
				<a href="login.php">
                <i class="fa fa-account"></i> <span>Login</span> </i>
              </a>
				<?php
			} else{
				?>
				<li class="treeviewview <?php if($currentPage == 'index') { echo 'active'; } ?>">
					<a href="index.php">
	                <i class="fa fa-dashboard"></i> <span>Home</span> </i>
	              </a>
	          </li>
			  <li class="treeviewview <?php if($currentPage == 'projects') { echo 'active'; } ?>">
			  <?php
			  
			  if($user_data['type'] == 2){
				  ?>
				  <a href="projects.php">
					<i class="fa fa-bookmark"></i> <span>My Projects</span> </i>
				  </a>
				  <?php
			  } else if($user_data['type'] == 3){
				  ?>
				  <a href="ideas.php">
					<i class="fa fa-bookmark"></i> <span>My Ideas</span> </i>
				  </a>
				  <?php
			  }
			  
			  ?>
			</li>
			  <?php 
				if(isset($user_data['type']) && $user_data['type'] == 1){?>
					<li class="treeviewview <?php if($currentPage == "users") { echo "active"; } ?>">
							  <a href="users.php">
								<i class="fa fa-user"></i> <span>Users</span> </i>
							  </a>
					</li>
					
					




					
			

				<?php }
				//This menu item will only show up if an admin is logged in.
				?>

			

		 
				<?php
			}
			?>
               </aside>