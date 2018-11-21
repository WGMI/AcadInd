<?php

include 'core/init.php';
admin_only(); //Checks if the user is logged in.
include "pages/includes/header.php";
$benid = $_GET['editbeneficiary'];

$timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region2 = array('Eastern Africa');

$query = "SELECT * FROM beneficiaries WHERE beneficiary_id = $benid";
$editbenresult = mysqli_query($conn,$query);
if (!$editbenresult) {
			die('query failed'.mysqli_error($conn));
	}
while ($row = mysqli_fetch_assoc($editbenresult)) {
	check_edit_rights($row["user_id"]);
	$id = $row["beneficiary_id"];
	$region = $row["region"];
	$country = $row["country"];
	$people = $row["people"];
	$date = $row["period"];
	$updated_date = $row["updated_time"];	
	$foodsecuritylivelihood = $row["food_security_and_livelihood"];
	$food_assistance = $row["food_assistance"];
	$wash = $row["WASH"];
	$educationpro = $row["education_and_protection"];
	$education = $row["education"];
	$hnutrition = $row["health_and_nutrition"];
	$health = $row["health"];
	$protection = $row["protection"];
	$nutrition = $row["nutrition"];
	$mprevention = $row["malaria_prevention"];
	$nfooditems = $row["non_food_items"];
}

?>

<?php

if (isset($_POST['update_beneficiary'])) {
	$updateregion=$_POST['region'];
	$updatecountry=$_POST['country'];
	$updatepeople=$_POST['people'];
	$updatedate=$_POST['add-ben-date'];
	$updatefsecurity=$_POST['foodsecuritylivelihood'];
	$updatefassistance=$_POST['food_assistance'];
	$updatewash=$_POST['wash'];
	$updateedupro=$_POST['educationpro'];
	$updateedu=$_POST['education'];
	$updatehnutrition=$_POST['hnutrition'];
	$updatehealth=$_POST['health'];
	$updateprotection=$_POST['protection'];
	$updatenutrition=$_POST['nutrition'];
	$updatemprevention=$_POST['mprevention'];
	$updatenfooditems=$_POST['nfooditems'];

	$timestamp = strtotime(substr($updatedate,0,2).'/1/'.substr($updatedate,3));
	$sqldate = date('Y-m-d H:i:s',$timestamp);


	$query = "UPDATE beneficiaries SET
			 region='{$updateregion}',
			 country='{$updatecountry}',
			 people='{$updatepeople}',
			 period='{$sqldate}',
			 food_security_and_livelihood={$updatefsecurity},
			 food_assistance={$updatefassistance},
			 WASH={$updatewash},
			 education_and_protection={$updateedupro},
			 education={$updateedu},
			 health_and_nutrition={$updatehnutrition},
			 health={$updatehealth},
			 protection={$updateprotection},
			 nutrition={$updatenutrition},
			 malaria_prevention={$updatemprevention},
			 non_food_items={$updatenfooditems},
			 updated_time=now()
			 WHERE beneficiary_id = $benid";
			 //echo $query;
			 //die();
	$update_ben = mysqli_query($conn,$query);
	if (!$update_ben) {
			die('query failed'.mysqli_error($conn));
	}else{
		header("Location:viewbeneficiary.php?update=1");
	}



}



?>


		<div class="row">
            <!-- left column -->
            <div class="col-md-10 col-md-offset-1">

			<div class="box box-warning">
                <!-- <div class="box-header">
                  <h3 class="box-title">Edit Form Number <?php echo $id; ?><br></h3>
                </div> -->
                <div class="box-body">

                			<section class="content-header">
						          <h1>
						            Edit Beneficiary Form <?php echo "  Number ".$id ?><br>
						            <small><a href="viewbeneficiary.php">View beneficiary form</small>
						          </h1>
						          <ol class="breadcrumb">
						            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						            <li class="viewbeneficiary.php">View Beneficiary</li>
						            <li class="editbeneficiary.php">Edit Beneficiary</li>
						          </ol>
					        </section>

		<hr> 



                				<div class="progress">
									<div class="progress-bar progress-bar-warning progress-bar-striped active" id="benprogressbar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>


                  	<form class="form-horizontal form" method="post" role="form">
                  		<div class="box-body">
							  <div class="step">
											<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control select2 select2-hidden-accessible" name="region" id="region">
												    	<option selected><?php echo $region?></option>
												    	<?php

														foreach($region2 as $key => $value) {

														?>

														<option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
														<?php

														}

													?>
												</select>
											</div>

											<div class="form-group">
												    <label for="Country">Country</label>
												    <select class="form-control select2 select2-hidden-accessible" name="country" id="country">
														<option selected><?php echo $country ?></option>
														<option value="Kenya">Kenya</option>
														<option value="Uganda">Uganda</option>
														<option value="Tanzania">Tanzania</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Burundi">Burundi</option>
													</select>
											</div>
										    <div class="form-group">
												    <label for="Category" >Category of people</label>
												    <select class="form-control select2 select2-hidden-accessible" name="people" id="people">
														<option selected><?php echo $people ?></option>
														<option value="Children" >Children</option>
														<option value="Adults and Children">Adults and Children</option>
													</select>
											</div>
											<div class="form-group">
								                <label>Period</label>

											            <!-- <div class="input-group date">
											                <input type="text" class="form-control required" id="add-ben-date" name="add-ben-date" value="<?php echo $date ?>">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div> -->

											            <div class="input-group date">
											                <input type="text" class="form-control required" id="add-ben-date" name="add-ben-date"  placeholder="Enter beneficiary period" value="<?php echo $date ?>">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>
											<div class="form-group">
												    <label for="Security">Food Security and Livelihood</label>
													<input type="number" class="form-control required" name="foodsecuritylivelihood" id="foodsecuritylivelihood" placeholder="Food Security and Livelihood" value="<?php echo $foodsecuritylivelihood ?>">
											</div>
								</div>



								<div class="step">
												<div class="form-group">
													<label for="Assistance">Food Assistance</label>
													<input type="number" class="form-control required" id="food_assistance" name="food_assistance" placeholder="Food Assistance" value="<?php echo $food_assistance ?>">
												</div>
												<div class="form-group">
												    <label for="Security">Wash</label>
													<input type="number" class="form-control required" name="wash" id="wash" placeholder="Enter wash" value="<?php echo $wash ?>">
												</div>
												<div class="form-group">
													<label for="Protection">Education and Protection</label>
													<input type="number" class="form-control required" name="educationpro" id="educationpro" placeholder="Education and Protection" value="<?php echo $educationpro ?>">
												</div>
												<div class="form-group">
													<label for="Education">Education</label>
													<input type="number" class="form-control required" name="education" id="education" placeholder="Education" value="<?php echo $education ?>">
												</div>
												<div class="form-group">
													<label for="Nutrition">Health and Nutrition</label>
													<input type="number" class="form-control required" name="hnutrition" id="hnutrition" placeholder="Health and Nutrition" value="<?php echo $hnutrition ?>">
												</div>
											</div>

											<div class="step">
												<div class="form-group">
													<label for="Education">Health</label>
													<input type="number" class="form-control required" name="health" id="health" placeholder="Health" value="<?php echo $health ?>">
												</div>
												<div class="form-group">
													<label for="Education">Protection</label>
													<input type="number" class="form-control required" name="protection" id="protection" placeholder="protection" value="<?php echo $protection ?>">
												</div>
												<div class="form-group">
													<label for="Education">Nutrition</label>
													<input type="number" class="form-control required" name="nutrition" id="nutrition" placeholder="nutrition" value="<?php echo $nutrition ?>">
												</div>
												<div class="form-group">
													<label for="Education">Malaria Prevention</label>
													<input type="number" class="form-control required" name="mprevention" id="mprevention" placeholder="Malaria Prevention" value="<?php echo $mprevention ?>">
												</div>
												<div class="form-group">
													<label for="Education">Non Food_Items</label>
													<input type="number" class="form-control required" name="nfooditems" id="nfooditems" placeholder="Non Food_Items" value="<?php echo $nfooditems ?>">
												</div>
											</div>


									<div class="step display">
										<div class="col-md-8 col-md-offset-2">
										 <table id="example1" class="table table-bordered table-hover table-striped dataTable">
						                    <thead>
						                      <!-- <tr>
						                        <th scope="col">Fields</th>
						                        <th>Input</th>
						                      </tr> -->
						                    </thead>
						                    <tbody>
						                      <tr>
						                      	<td>Region</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="region"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Country</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="country"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>People</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="people"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Period</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="add-ben-date"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Food Security and Livelihood</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="foodsecuritylivelihood"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Food Assistance</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="food_assistance"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Wash</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="wash"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Education and Protection</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="educationpro"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Education</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="education"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Health and Nutrition</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="hnutrition"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Health</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="health"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Protection</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="protection"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Nutrition</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="nutrition"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Malaria Prevention</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="mprevention"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Non Food_Items</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="nfooditems"></label></td>
						                      </tr>
						                      
						                      
						                      

						                      
						                    </tbody>
						                    <tfoot>
						                      <!-- <tr>
						                       <th>Fields</th>
						                        <th>Input</th>
						                      </tr> -->
						                    </tfoot>
						                  </table>
						                  </div>
									</div>
								</div>


								<div class="row">
									<div class="col-sm-12">
										<div class="pull-right">
											<button type="button" class="action btn-info text-capitalize back btn">Back</button>
											<button type="button" class="action btn-warning text-capitalize next btn">Next</button>
											<button type="submit" class="action btn-success btn-flat text-capitalize submit btn" name="update_beneficiary">Submit</button>
										</div>
									</div>
								</div>

					</div>
				</form>






                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
      </div>




















                  	
              



        		

<?php
include "pages/includes/footer.php";
?>


