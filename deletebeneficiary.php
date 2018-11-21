<?php
include 'core/init.php';
protect();

if($_REQUEST['deleteben']) {
$query = "DELETE FROM beneficiaries WHERE beneficiary_id='".$_REQUEST['deleteben']."'";
$deleteset = mysqli_query($conn, $query) or die("database error:". mysqli_error($connection));
if($deleteset) {
echo "Beneficiary Record successfully deleted";
}
}
?>