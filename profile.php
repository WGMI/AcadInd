<?php

include 'core/init.php';
protect(); //Checks if the user is logged in.
include "pages/includes/header.php";
?>

<h1><?php echo $user_data['firstname'].' '.$user_data['lastname'];?></h1>

<br><br>

Username: <?php echo $user_data['username'];?><br><br>
Email: <?php echo $user_data['email'];?><br><br>


		
<?php include "pages/includes/footer.php";?>