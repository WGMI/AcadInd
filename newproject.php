<?php
include 'core/init.php';
protect();
include 'pages/includes/header.php';

check_user_type($user_data['type'],2);

if (!empty($_POST)) {
	$targetfolder = "uploads/";
	$targetfolder = $targetfolder . basename( $_FILES['attachment']['name']); 
	$ok=1;

	$pieces = explode('.',$_FILES['attachment']['name']);
	$file_type = end($pieces);

	if ($file_type=="pdf") {
		if(move_uploaded_file($_FILES['attachment']['tmp_name'], $targetfolder)){
			
			$description = $_POST["description"];
			$user_id = $user_data['id'];

		} else {
			echo "Problem uploading file";
		}

	} else {
		echo "You may only upload PDFs, JPEGs or GIF files.<br>";
	}
	
	$projectname = $_POST['projectname'];
	$deadline = $_POST['deadline'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$target = $_POST['target'];
	$website = $_POST['website'];
	$links = $_POST['links'];
	$user_id = $session;
	
	$query = mysqli_query($conn,"
	INSERT INTO `projects` 
	(`project_id`, `projectname`, `deadline`, `category`, `description`, `target`, `website`, `links`, `attachement`, `user_id`) 
	VALUES 
	(NULL, '$projectname', '$deadline', '$category', '$description', '$target', '$website', '$links', '$targetfolder', $user_id);
	");
			
	if (!$query) {
		die(mysqli_error($conn));
	} else {
		header("Location: projects.php?success=1");
	}
}

?>

<div class="row">
    <!-- left column -->
    <div class="col-md-10 col-md-offset-1">

        <div class="box box-primary">
            <div class="box-header">
                <!-- <h3 class="box-title">Add Beneficiary</h3> -->
            </div>
            <div class="box-body">


                <section class="content-header">
                    <h1>
                        Create A Project<br>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">New Project</li>
                    </ol>
                </section>
                <hr>
				
                <hr>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>


                <form class="form-horizontal form" method="post" role="form" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="step">
                            <div class="form-group">
                                <label for="projectname">Project Title</label>
                                <input type="text" class="form-control required" name="projectname"
                                       id="projectname" placeholder="Project Title">
                            </div>
							
							<div class="form-group">
                                <label for="projectname">Deadline (Optional)</label>
                                <input type="date" class="form-control" name="deadline"
                                       id="deadline">
                            </div>
							
							<div class="form-group has-feedback">
								<label for="category">Category</label>
								<select class="form-control form-control-sm required" name="category" id="category" >
									<option disabled selected>Select Category</option>
									<option value="Research">Research</option>
									<option value="Training">Training</option>
									<option value="Consultancy">Consultancy</option>
									<option value="Others">Other</option>
								</select>
							</div>
						</div>
							
						<div class="step">
							<div class="form-group">
                                <label for="description">Description
                                </label>
                                <textarea class="form-control" name="description" placeholder="What is your project about?"
                                          id="description" cols="30" rows="5" required></textarea>
                            </div>
							<div class="form-group">
                                <label for="target">Target
                                </label>
                                <textarea class="form-control" name="target" placeholder="Who is your project targeting? Who should be interested?"
                                          id="target" cols="30" rows="5" required></textarea>
                            </div>
						</div>
						
						<div class="step">
							<div class="form-group">
                                <label for="website">Project Website (Optional)</label>
                                <input type="text" class="form-control" name="website"
                                       id="website">
                            </div>
							<div class="form-group">
                                <label for="links">Project Links(Optional)
                                </label>
                                <textarea class="form-control" name="links" placeholder="Linkedin, Github etc"
                                          id="links" cols="30" rows="5"></textarea>
                            </div>
							<div class="form-group">
                                <label for="attachment">Additional Material (PDF only)
                                </label>
                                <input type="file" name="attachment" id="attachment">
                            </div>
						</div>
                        
                        <div class="step display">
                            <div class="col-md-8 col-md-offset-2">
                                <table id="example1"
                                       class="table table-bordered table-hover table-striped dataTable">
                                    <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="projectname"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deadline</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="deadline"></label>
                                        </td>
                                    </tr>
									<tr>
                                        <td>Category</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="category"></label>
                                        </td>
                                    </tr>
									<tr>
                                        <td>Description</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="description"></label>
                                        </td>
                                    </tr>
									<tr>
                                        <td>Target</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="target"></label>
                                        </td>
                                    </tr>
									<tr>
                                        <td>Website</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="website"></label>
                                        </td>
                                    </tr>
									<tr>
                                        <td>Links</td>
                                        <td><label class="col-md-10 control-label lbl" data-id="links"></label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <a type="button" class="action btn-info text-capitalize back btn">Back</a>
                                <a type="button" class="action btn-primary text-capitalize next btn">Next</a>
                                <button type="submit" class="action btn-success btn-flat text-capitalize submit btn"
                                        name="submit">Submit
                                </button>
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

<script>

    $('body').on('change', '#country', function () {
        var country = $(this).val();
        var country_label = $(this).find(":selected").text();

        $.post('_ajax.php', {country: country, action: 'country_population'}, function (data) {

            var label = country_label + "'s Population: " + data;
            $("#pop_vali").html(label);
        }).fail(function () {
            alert("Error Fetching Population Size");
        });

    });

</script>
