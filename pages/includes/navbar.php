<nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo (logged_in()) ? $user_data['firstname']:'Not Signed In'; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                      <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                  </li>
				  <li class="user-footer">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>