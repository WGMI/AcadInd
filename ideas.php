<?php 
include 'core/init.php';
include 'pages/includes/header.php';
?>	

<div class="row">
            <div class="col-md-12 ">

            	<?php
				if (isset($_GET['success'])) {
					$msg = $_GET['success'];
					$msg="<strong>Congratulations! Your project has been created.</strong>";
					echo '<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
				  	
				}else{
					$msg ="";
				}
				?>


      


              <div class="box box-primary" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
		          <h1>
		            My Ideas<br>
		           
		          </h1>
		          <ol class="breadcrumb">
		            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li class="active">My Ideas</li>
		          </ol>
		        </section>

		        <hr>
				
				
					<hr>
<table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Deadline</th>
                <th>Category</th>
                <th>Website</th>
                <th>Attachements</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$query = "SELECT * FROM ideas where user_id = $session";
				$getideas = mysqli_query($conn,$query);
				$counter = 0;

				if (!$getideas) {
							die(mysqli_error($conn));
					}
					
					

				while ($row = mysqli_fetch_assoc($getideas)) {
					
					$attachement = ($row['attachements'] == 'uploads/') ? "Included":"None";
	
					echo "<tr>";
					echo "<td>".$row['idea_id']."</td>";
					echo "<td>".$row['ideaname']."</td>";
					echo "<td>".$row['deadline']."</td>";
					echo "<td>".$row['category']."</td>";
					echo "<td>".$row['website']."</td>";
					echo "<td>".$attachement."</td>";
					echo "<td><a type='button' class='btn btn-sm btn-primary' data-placement='bottom' rel='tooltip' title='View Row'  data-toggle='modal' data-target='#exampleModal_".$counter."'>
  							  <span><i class='fa fa-eye'></i></span>
							  </a>


					</td>";
					echo "</tr>";


					echo '<div class="modal fade" id="exampleModal_'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">';
					        echo "Project ID "." ".$row['project_id'];
					echo '</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">';

					      echo '<ul class="list-group">';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Title'.' -  '.$row['ideaname'];
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Deadline'.' -  '.$row['deadline'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Category'.' -  '.$row['category'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Stage'.' -  '.$row['stage'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Description'.' -  '.$row['description'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Target'.' -  '.$row['target'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Website'.' -  '.$row['website'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Links'.' -  '.$row['links'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Continuation'.' -  '.$row['continuation'];
								  echo '</li>';
								  
								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Attachements'.' -  '.$attachement;
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
                <th>Project ID</th>
                <th>Title</th>
                <th>Deadline</th>
                <th>Category</th>
                <th>Website</th>
                <th>Attachements</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>

<?php
include "pages/includes/footer.php";
?>