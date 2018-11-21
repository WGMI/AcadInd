<?php

include 'core/init.php';
protect();
include "pages/includes/header.php";

$region = array('Eastern Africa');
?>



<div class="box box-warning">
                <div class="box-header">
                  <!-- <h3 class="box-title">Add Beneficiary</h3> -->
                </div>
                <div class="box-body">

                	<section class="content-header">
				          <h1>
				            <br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <!-- <li class="active">Add Situation report</li> -->
				          </ol>
			        </section>
			         <hr>



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
														<option value="Tanzania">Tanzania</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Burundi">Burundi</option>
													</select>
											</div>
											<div class="form-group">
								                <label>Period</label>

											            <div class="input-group date">
											                <input type="text" class="form-control required" id="add-date" name="add-date"  placeholder="Enter beneficiary period">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>

												<!-- <div class="form-group">
				                                    <label for="category">Categories</label>
				                                        <select class="form-control form-control-line required" id="selectewc" name="selectewc" onChange="category_earlywarning()">
				                                           <option selected="true" disabled>Choose Category</option>
				                                             <?php
				                                              $query = "SELECT * FROM earlywarningcategory";
				                                              $ew_result = mysqli_query($conn,$query);
				                                              while($row=mysqli_fetch_assoc($ew_result)){
				                                                $catname=$row['catname'];
				                                                $catid=$row['catid'];?>
				                                                <option value="<?php echo $catid; ?>"><?php echo $catname ?></option>
				                                             <?php } ?>
				                                        </select>
				                                        <input type="hidden" id="review_cat" value="<?php echo $catname ?>">
				                                </div>


				                                <div class="form-group">
				                                    <label for="indicator">Indicator</label>
				                                        <select class="form-control form-control-line required" id="ewindicator" name="ewindicator" onChange="indicator_possibleanswer()">
				                                            <option selected="true" disabled="disabled">Choose Relevant Indicator</option>
				                                        </select>
				                               </div>


											<div class="form-group">
													<label for="possible_answer">Possible answer</label>
													<select class="form-control form-control-line required" name="pa" id="pa">
														<option disabled selected>Choose Possible Answer</option>
													</select>
											</div> -->
								</div>



											<div class="step">
											
											<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">buzz</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#references" role="tab" data-toggle="tab">references</a>
  </li>
</ul>
												
												<hr></hr>
												<div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

												<div id="exTab2" class="container">	
												<ul class="nav nav-tabs">
															<li class="active">
												        		<a  href="#1" data-toggle="tab">Health</a>
															</li>
															<li><a href="#2" data-toggle="tab">Nutrition</a>
															</li>
															<li><a href="#3" data-toggle="tab">Education</a>
															</li>

															<li>
												        		<a  href="#4" data-toggle="tab">Economic</a>
															</li>
															<li><a href="#5" data-toggle="tab">Food Security</a>
															</li>
															<li><a href="#6" data-toggle="tab">Displacement</a>
															</li>


															<li>
												        		<a  href="#7" data-toggle="tab">Political</a>
															</li>
															<li><a href="#8" data-toggle="tab">Conflict</a>
															</li>
															<li><a href="#9" data-toggle="tab">Environment</a>
															</li>


															<li>
												        		<a  href="#10" data-toggle="tab">Destabilizing events</a>
															</li>
														</ul>

															<div class="tab-content ">
															  <div class="tab-pane active" id="1">
												          		<h3>Standard tab pwderwfwe wefwefwef</h3>
															  </div>
															<div class="tab-pane" id="2">
											          			<h3>Notice the gap between the content and tab</h3>
															</div>
													        <div class="tab-pane" id="3">
													          <h3>add clearfix to tab-content (see the css)</h3>
															</div>

															<div class="tab-pane" id="4">
													          <h3>asdasdasd</h3>
															</div>

															<div class="tab-pane" id="5">
													          <h3>aasdads)</h3>
															</div>

															<div class="tab-pane" id="6">
													          <h3>add clearfix to tab-content (see the css)</h3>
															</div>

															<div class="tab-pane" id="7">
													          <h3>add clearfix to tab-content (see the css)</h3>
															</div>

															<div class="tab-pane" id="8">
													          <h3>add clearfix to tab-content (see the css)</h3>
															</div>

															<div class="tab-pane" id="9">
													          <h3>add clearfix to tab-content (see the css)</h3>
															</div>

															<div class="tab-pane" id="10">
													          <h3>aasdaqsdasdasd</h3>
															</div>
															</div>
												  </div>

												<hr></hr>
											</div>


								<div class="row">
									<div class="col-sm-12">
										<div class="pull-right">
											<button type="button" class="action btn-info btn-flat text-capitalize back btn">Back</button>
											<button type="button" class="action btn-warning btn-flat text-capitalize next btn">Next</button>
											<button type="submit" class="action btn-success btn-flat text-capitalize submit btn" name="submit">Submit</button>
										</div>
									</div>
								</div>

					</div>
				</form>








		      </div>



<?php
include "pages/includes/footer.php";
?>