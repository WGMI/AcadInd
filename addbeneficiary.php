<?php
 
include 'core/init.php';
admin_only();
include 'pages/includes/header.php';

$timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region = array('Eastern Africa');
if (isset($_POST["submit"])) {
	$region = $_POST["region"];
	$country = $_POST["country"];
	$people = $_POST["people"];
	$date = $_POST["add-date"];
	$foodsecuritylivelihood = $_POST["foodsecuritylivelihood"];
	$food_assistance = $_POST["food_assistance"];
	$wash = $_POST["wash"];
	$educationpro = $_POST["educationpro"];
	$education = $_POST["education"];
	$hnutrition = $_POST["hnutrition"];
	$health = $_POST["health"];
	$protection = $_POST["protection"];
	$nutrition = $_POST["nutrition"];
	$mprevention = $_POST["mprevention"];
	$nfooditems = $_POST["nfooditems"];
	
	$timestamp = strtotime(substr($date,0,2).'/1/'.substr($date,3));
	$sqldate = date('Y-m-d H:i:s',$timestamp);

	$user_id = $user_data['id'];
	
	$query = 
	"INSERT INTO `beneficiaries` 
	(`beneficiary_id`, 
	`region`, 
	`country`, 
	`people`, 
	`period`, 
	`food_security_and_livelihood`, 
	`food_assistance`, 
	`WASH`, 
	`education_and_protection`, 
	`education`, 
	`health_and_nutrition`, 
	`health`, 
	`protection`, 
	`nutrition`, 
	`malaria_prevention`, 
	`non_food_items`,
	user_id) 
	VALUES 
	(NULL, 
	'{$region}',
	'{$country}',
	'{$people}',
	'{$sqldate}',
	$foodsecuritylivelihood,
	$food_assistance,
	$wash,
	$educationpro,
	$education,
	$hnutrition,
	$health,
	$protection,
	$nutrition,
	$mprevention,
	$nfooditems,
	$user_id);";
	
	echo $date;
	echo '<br>';
	echo $date2;
	echo '<br>';
	echo $timestamp;
	echo '<br>';
	echo $sqldate;
	echo '<br>';
	echo $query;
	
	$benefits = mysqli_query($conn,$query);

	if (!$benefits) {
			die('query failed'.mysqli_error($connection));
	}else{
		// set_error_handler("var_dump");
		header("Location:viewbeneficiary.php?success=1");
	}
}

?>

<div class="row">
            <!-- left column -->
            <div class="col-md-10 col-md-offset-1">

			<div class="box box-warning">
                <div class="box-header">
                  <!-- <h3 class="box-title">Add Beneficiary</h3> -->
                </div>
                <div class="box-body">



		<section class="content-header">
	          <h1>
	            Add Beneficiary Data<br>
	            <small><a href="viewbeneficiary.php">View beneficiary form</small>
	          </h1>
	          <ol class="breadcrumb">
	            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li class="active">Add Beneficiary</li>
	          </ol>
        </section>

		<hr> 

		



                	<div class="progress">
								<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>


                  	<form class="form-horizontal form" method="post" role="form">
                  		<div class="box-body">
							  <div class="step">
											<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control select2 select2-hidden-accessible" name="region" id="region">
												    	<option value="volvo" disabled selected>Choose region</option>
												    	<?php

														foreach($region as $key => $value) {

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
														<option value="" disabled selected>Select Country</option>
														<option value="Kenya">Kenya</option>
														<option value="Uganda">Uganda</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Burundi">Burundi</option>
														<option value="Tanzania">Tanzania</option>
														<option value="Sudan">Sudan</option>
														<option value="South Sudan">South Sudan</option>
														<option value="Ethiopia">Ethiopia</option>
														<option value="Somalia">Somalia</option>
													</select>
											</div>
										    <div class="form-group">
												    <label for="Category" >Category of people</label>
												    <select class="form-control select2 select2-hidden-accessible" name="people" id="people">
														<option value="" disabled selected>Choose Category</option>
														<option value="Children" >Children</option>
														<option value="Adults and Children">Adults and Children</option>
													</select>
											</div>
											<!-- <div class="form-group">
												    <label for="Time">Period</label>
												        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
											</div> -->
											
											<!--<div class="form-group">
								                <label>Period</label>
											            <div class="input-group date">
											                <input type="text" class="form-control" id="add-ben-date" name="add-ben-date"  placeholder="Enter funding period">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>-->
											
											<div class="form-group">
								                <label>Period</label>
											            <div class="input-group date">
											                <input type="text" class="form-control required" id="add-date" name="add-date"  placeholder="Enter funding period">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>

											

											<div class="form-group">
												    <label for="Security">Food Security and Livelihood</label>
													<input type="number" class="form-control required" name="foodsecuritylivelihood" id="foodsecuritylivelihood" placeholder="Food Security and Livelihood">
											</div>
								</div>



								<div class="step">
												<div class="form-group">
													<label for="Assistance">Food Assistance</label>
													<input type="number" class="form-control required" id="food_assistance" name="food_assistance" placeholder="Food Assistance">
												</div>
												<div class="form-group">
												    <label for="Security">Wash</label>
													<input type="number" class="form-control required" name="wash" id="wash" placeholder="Enter wash">
												</div>
												<div class="form-group">
													<label for="Protection">Education and Protection</label>
													<input type="number" class="form-control required" name="educationpro" id="educationpro" placeholder="Education and Protection">
												</div>
												<div class="form-group">
													<label for="Education">Education</label>
													<input type="number" class="form-control required" name="education" id="education" placeholder="Education">
												</div>
												<div class="form-group">
													<label for="Nutrition">Health and Nutrition</label>
													<input type="number" class="form-control required" name="hnutrition" id="hnutrition" placeholder="Health and Nutrition">
												</div>
											</div>

											<div class="step">
												<div class="form-group">
													<label for="Education">Health</label>
													<input type="number" class="form-control required" name="health" id="health" placeholder="Health">
												</div>
												<div class="form-group">
													<label for="Education">Protection</label>
													<input type="number" class="form-control required" name="protection" id="protection" placeholder="Protection">
												</div>
												<div class="form-group">
													<label for="Education">Nutrition</label>
													<input type="number" class="form-control required" name="nutrition" id="nutrition" placeholder="Nutrition">
												</div>
												<div class="form-group">
													<label for="Education">Malaria Prevention</label>
													<input type="number" class="form-control required" name="mprevention" id="mprevention" placeholder="Malaria Prevention">
												</div>
												<div class="form-group">
													<label for="Education">Non Food_Items</label>
													<input type="number" class="form-control required" name="nfooditems" id="nfooditems" placeholder="Non Food_Items">
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
						                        <td><label class="col-md-10 control-label lbl" data-id="add-date"></label></td>
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
						                      	<td>Non-Food Items</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="nfooditems"></label></td>
						                      </tr>
						                      
						                      
						                      

						                      
						                    </tbody>
						                    <tfoot>
						                    </tfoot>
						                  </table>
						                  </div>
									</div>
								</div>


								<div class="row">
									<div class="col-sm-12">
										<div class="pull-right">
											<a type="button" class="action btn-info text-capitalize back btn">Back</a>
											<a type="button" class="action btn-warning text-capitalize next btn">Next</a>
											<button type="submit" class="action btn-success btn-flat text-capitalize submit btn" name="submit">Submit</button>
										</div>
									</div>
								</div>

					</div>
				</form>



                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
      </div>
	  
<?php include 'pages/includes/footer.php';?>	