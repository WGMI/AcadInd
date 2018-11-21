<?php
include 'core/init.php';
include 'pages/includes/header.php';

if (isset($_POST['sit_rep'])) {
	$country = $_POST['country'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	$query ="INSERT INTO situation_rep
	(country, 
	month,
	year,
	health_people_in_need ,
	health_people_reached ,
	health_children_reached ,
	health_funding_requested,
	health_funding_received ,


	education_people_in_need ,
	education_people_reached ,
	education_children_reached ,
	education_funding_requested,
	education_funding_received ,


	food_people_in_need ,
	food_people_reached ,
	food_children_reached ,
	food_funding_requested,
	food_funding_received ,


	nutrition_people_in_need ,
	nutrition_people_reached ,
	nutrition_children_reached ,
	nutrition_funding_requested,
	nutrition_funding_received ,


	protection_people_in_need ,
	protection_people_reached ,
	protection_children_reached ,
	protection_funding_requested,
	protection_funding_received ,


	shelter_people_in_need ,
	shelter_people_reached ,
	shelter_children_reached ,
	shelter_funding_requested,
	shelter_funding_received ,


	wash_people_in_need ,
	wash_people_reached ,
	wash_children_reached ,
	wash_funding_requested,
	wash_funding_received) VALUES('{$country}','{$month}', $year)";
	$insert_general_info = mysqli_query($conn, $query);


	if (!$insert_general_info) {
			die('query failed'.mysqli_error($conn));
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
        Add Situation Report<br>
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

<?php 
	$get_countries ="SELECT * FROM country INNER JOIN region on country.region_id = region.region_id WHERE status =  1 ORDER BY country_id DESC";
	$countries = mysqli_query($conn,$get_countries); 
?>


<form class="form-horizontal form" method="post" role="form" >
		<div class="box-body">
		    <div class="step">
				<div class="form-group">
					
					<div class="col-md-4">
						<label class="situation_label">Country: *</label>
						<select name="country" class="form-control form-control-sm select2 select2-hidden-accessible" id="country" onChange="getCategoriesForTest();" required>
							<option value="">Select Country</option>
							<?php foreach($countries as $country) : ?>
								<option value="<?php echo $country['country_id']; ?>" data-tokens="<?php echo $country['country_name']; ?>"><?php echo $country['country_name']; ?></option>							
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="col-md-4">
						    <label class="situation_label">Reporting Month: *</label>
						    <select class="form-control form-control-sm required select2 select2-hidden-accessible" name="month" id="month">
								<option value="" disabled selected>Select Month</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
					</div>

					<div class="col-md-4">
						    <label class="situation_label">Year: *</label>
						    <select class="form-control form-control-sm required select2 select2-hidden-accessible" name="year" id="year">
						    <option value="" disabled selected>Select Year</option>
						    <?php
								$startdate = 2008;
								$enddate = date("Y");
								$years = range ($startdate,$enddate);
								foreach($years as $key => $value)
								{?>

									<option value="<?php echo $value ?>"><?php echo $value ?></option>
								<?php }
								?>
								</select>
					</div>
				</div>
			<div class="col-md-12">
				 <div class="form-group">
				  	<label for="comment">Key Messages: *</label>
				  	<textarea class="form-control required" rows="5" name="narrative" id="narrative"></textarea>
				</div> 
				<div class="form-group">
				 	<label for="needs_gaps">Needs and Gaps(150 words): *</label>
				 	<textarea rows="5" name="needs_gaps" id="needs_gaps" maxlength="500" class="form-control required"></textarea>
				</div>
			</div>
	    	</div>



			<div class="step">
			    <div class="content">
					<!-- dynamic content will be loaded here -->						        						
					<div id="category-tabs-dc"></div>					
				</div>
			</div>

			<div class="step display">
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



</div>
</div>
</div>
</div>




<?php
include 'pages/includes/footer.php';
?>

