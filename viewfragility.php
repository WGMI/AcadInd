<?php
include 'core/init.php';
admin_only();
include 'pages/includes/header.php';
?>

<div class="row">
            <div class="col-md-12">

            	<?php
				if (isset($_GET['success'])) {
					$msg="<strong>Fragility Index field successfully added!</strong>";
					echo '<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
				  	
				}
				?>


            	<?php
					if (isset($_GET['update'])) {
						$msg = $_GET['update'];
						$msg="<strong>Fragility Index field successfully updated!</strong>";
					  	echo '<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
					}
				?>


              <div class="box box-warning" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
				          <h1>
				            View Fragility Index Table<br>
				            <!-- <small><a href="addfunding"><button type="button" class="btn btn-primary btn-block btn-flat">Add Funding</button></small> -->
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li><a href="addfragility.php">Add Fragility Index</a></li>
				            <li class="active">View Fragility Index</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-right">
								<a href="addfragility.php" type="button" class="btn btn-warning btn-sm btn-block"><i class="fa fa-pencil"></i> Add Fragility Index</a>
							</div>
			        </section>
			        <br>
			        <hr>

		              

        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Fragility Index ID</th>
                <th>Region</th>
                <th>Country</th>
                <th>Fragility Index</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$user_id = $user_data['id'];
				$query = "SELECT * FROM fragility_index a
						  INNER JOIN country b  ON a.country_id = b.country_id
						  INNER JOIN region c ON a.region_id = c.region_id
						  where user_id = $user_id ORDER BY fragility_index_id DESC";
				$fragility_query = mysqli_query($conn,$query);
				$counter = 0;

				if (!$fragility_query) {
							die('query failed'.mysqli_error($conn));
					}
					
					

				while ($row = mysqli_fetch_assoc($fragility_query)) {
					$id = $row["fragility_index_id"];
					$region = $row["region_name"];
					$country = $row["country_name"];
					// $contact = $row["security_contact"];
					$fragilityindex = $row["fragility_index"];
					$globalpeaceindex = $row["global_peace_index"];
					$failedstatesindex = $row["failed_states_index"];
					$headeclaration = $row["hea_declaration"];
					$hazards = $row["hazards"];
					$population = $row["population"];
					$displacedpeople = $row["displaced_people"];
					$fieldspend = $row["field_spend"];
					$wvfragilityindexrank = $row["wv_fragility_index_rank_global"];
					
					

					echo "<tr>";
					echo "<td>{$id}</td>";
					echo "<td>{$region}</td>";
					echo "<td>{$country}</td>";
					// echo "<td>{$contact}</td>";
					echo "<td>{$fragilityindex}</td>";
					echo "<td><a type='button' data-placement='bottom' rel='tooltip' title='View row'  class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModal_".$counter."'>
  							  <span><i class='fa fa-eye'></i> View</span>
							  </a>


					<a class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='bottom' title='Edit row' href='update_fragility.php?editfragility={$id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</a>
                              <a class='btn btn-sm btn-danger delete_fragility' data-toggle='tooltip' data-placement='bottom' title='Delete row'  data-fragility-id=".$row['fragility_index_id']." href='javascript:void(0)'><i class='fa fa-trash-o' aria-hidden='true'></i> Delete</td>";
					echo "</tr>";


					echo '<div class="modal fade" id="exampleModal_'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">';
					        echo "Beneficiary Id Number"." ".$id;
					echo '</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">';

					      echo '<ul class="list-group">';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Region'.' -  '.$region;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Country'.' -  '.$country;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Fragility Index'.' -  '.$fragilityindex;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Global Peace Index'.' -  '.$globalpeaceindex;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Failed States Index'.' -  '.$failedstatesindex;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'HEA Declaration'.' -  '.$headeclaration;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Hazards'.' -  '.$hazards;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Population (million people)'.' -  '.$population;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Displaced People'.' -  '.$displacedpeople;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Field spend (in million US$)'.' -  '.$fieldspend;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'WV Fragility index rank(Global)'.' -  '.$wvfragilityindexrank;
								  echo '</li>';




						  echo '</ul>';

					      

					       
					    echo '</div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>';

					$counter++;


				}

			?>
        </tbody>
        <tfoot>
            <tr>
               <th>Fragility Index ID</th>
                <th>Region</th>
                <th>Country</th>
                <th>Fragility Index</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>



<?php
    if (isset($_GET['delete'])) {
       $deleteew = $_GET['delete'];
       $query = "DELETE FROM fragility_index WHERE fragility_index_id = {$deleteew}";
       $deletedwarning = mysqli_query($connection,$query);
       header("Location:viewfragility.php");
     } 
    ?>


<?php
include "pages/includes/footer.php";
?>