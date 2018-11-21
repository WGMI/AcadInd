<?php

include 'core/init.php';
protect(); //Checks if the user is logged in.
include "pages/includes/header.php";

$ind_id = $user_data['industry_id'];
$industry = mysqli_fetch_assoc(mysqli_query($conn,"select industry_name from industries where industry_id = $ind_id"))['industry_name'];

?>

<h1><?php echo $user_data['firstname'].' '.$user_data['lastname'];?></h1>

<br><br>

Username: <?php echo $user_data['username'];?><br><br>
Email: <?php echo $user_data['email'];?><br><br>
Industry: <?php echo $industry;?><br><br>
Logged in as: <?php echo ($user_data['type'] != 2) ? 'Industry':'Academia';?><br><br>


		
<?php include "pages/includes/footer.php";?>