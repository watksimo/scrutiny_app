<!doctype html>
<?php
	session_start();

	if( !( (isset($_SESSION['client_id'])) || (isset($_SESSION['trainer_id'])) ) ) {
		 header("Location: login.php");
	}

	if( isset($_SESSION['trainer_id']) ) {
		$is_trainer = 1;
	} else {
		header("Location: home.php");
	}

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Program</title>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Bootstrap -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <script type="text/javascript">
        	var isTrainer = <?php echo $is_trainer; ?>;
        </script>
    </head>

    <body>

        <div class="header row">
            <div class="col-sm-12">
                <h1><span id='page_heading'></span><span class="label label-default pull-right" id='trainer_badge'></span></h1>
            </div>
        </div>
        
		<nav class = "navbar navbar-default" role = "navigation">
			<?php include 'php/navbar.php'; ?>
		</nav> 

        <div class="col-sm-8 col-sm-offset-2">
            <!--Program details-->
            <div class="program_details_panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Program Details</h3>
                </div>
                <div class="panel-body">
                	<div id="program_details">
                		<div class="form-group">
							<label for="program_details_name">Name</label>
							<input type="text" class="form-control" id="program_details_name" name="program_details_name">
						</div>
						<div class="form-group">
							<label for="program_details_type">Type</label>
	  						<select class="form-control" id="program_details_type">
							    <option>strength</option>
							    <option>athlete</option>
							    <option>gen_pop</option>
							  </select>
	  					</div>
						<div class="form-group">
							<label for="program_details_comments">Comments</label>
							<textarea class="form-control" rows="2" id="program_details_comments"></textarea>
						</div>
					</div>
                </div>
                <div class="panel-footer">

                </div>
            </div>

            <!--List of exercises in the program-->
            <div class="exer_panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Exercises</h3>
                </div>
                <div class="panel-body">
                	<div id="exer_list">
					</div>
                    <ul class="list-group" id="prog_list">
                    </ul>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" id="btn_add_exer">Add Exercise</button>
                    </ul>
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-default" id="btn_create_program">Create Program</button>


	<!-- Modal -->
	<div class="modal fade" id="exerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="ExerTitle">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exer_title">Modal title</h4>
	      </div>
	      <div class="modal-body" id="modal_exer_deets">
				<div class="form-group">
					<label for="exer_sets">Sets</label>
					<input type="text" class="form-control" id="exer_sets" name="exer_sets">
				</div>
				<div class="form-group">
					<label for="exer_reps">Reps</label>
					<input type="text" class="form-control" id="exer_reps" name="exer_reps">
				</div>
				<div class="form-group">
					<label for="exer_tempo">Tempo</label>
					<input type="text" class="form-control" id="exer_tempo" name="exer_tempo">
				</div>
				<div class="form-group">
					<label for="exer_rpe">RPE</label>
					<input type="text" class="form-control" id="exer_rpe" name="exer_rpe">
				</div>
				<div class="form-group">
					<label for="exer_comments">Comments</label>
					<textarea class="form-control" rows="2" id="exer_comments"></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="exer_id" id="exer_id">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="add_exer_modal">Add Exercise</button>
	      </div>
	    </div>
	  </div>
	</div>

        <?php
            if( isset($_SESSION['trainer_id']) ) {
                include 'php/sel_client_modal.php';
            }
        ?>
	
    </body>
    
    <footer>
    	<?php include 'php/footer.php'; ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjBf13Qu1XH0l-KcykGEM8LshQFw1c4Bc"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/create_program.js"></script>
    </footer>
</html>
