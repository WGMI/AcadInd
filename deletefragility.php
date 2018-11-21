<?php
include 'core/init.php';

if($_REQUEST['deletefragilityindex']) {
$query = "DELETE FROM fragility_index WHERE fragility_index_id ='".$_REQUEST['deletefragilityindex']."'";
$deletefrag = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
if($deletefrag) {
echo "Fragility Index Record successfully deleted";
}else{
	echo "Funding Record Kept!";
}
}


?>