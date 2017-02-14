<!doctype html>
<?php
	session_start();

	if( !( (isset($_SESSION['client_id'])) || (isset($_SESSION['trainer_id'])) ) ) {
		 header("Location: login.php");
	}

	if( isset($_SESSION['trainer_id']) ) {
		$is_trainer = 1;
	} else {
		$is_trainer = 0;
	}

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/calendar.css">
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

        <div class="content row">
            <div class="container">
	            <div class="col-sm-10 col-sm-offset-1" id="main_display"></div>

	            <br>
				<?php
					if(isset($_SESSION['sel_client'])) {
						echo '
							<div class="col-sm-6 col-sm-offset-3 panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
						';
						echo 'Add Milestone for ' . $_SESSION['sel_client_name'];
						echo '
									</h3>
								</div>

								<div class="panel-body" id="milestone_list">
								</div>
								<div class="panel-footer">
									<button type="button" class="btn btn-default" id="btn_add_mile">Add Milestone</button>
								</div>
							</div>
						';
						echo '
							
								<script type="text/javascript">
									$.ajax({
							            type: "POST",
							            url: "php/get_milestone_list.php",
							        })
								    .done(function (client_list) {
								        json_client_list = JSON.parse(client_list);
								        // console.log(json_client_list);

								        var select_box = $("<select id=\"add_mile_select\" />");

										var i;
										for (i = 0; i < json_client_list.length; ++i) {
											$("<option />", {value: json_client_list[i]["id"], text: json_client_list[i]["name"]}).appendTo(select_box);
										}

										select_box.appendTo("#milestone_list");
									});

									$("#btn_add_mile").on("click", function() {
									    console.log("Adding milestone to client");
									    $.ajax({
									        type: "POST",
									        url: "php/add_milestone.php",
									        data: {
									            add_mile_id: $("#add_mile_select").val()
									        }
									    })
									    .done(function (sql) {
									    	console.log(sql);
									        window.location.replace("milestones.php");
									    });
									});
								</script>

						';
					}
				?>
					            

				<div class="col-sm-6 col-sm-offset-3 panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Create New Milestone</h3>
					</div>
				  
					<div class="panel-body" id="add_milestone_details">
						<div class="form-group">
							<label for="mile_name">Name</label>
	  						<input type="text" class="form-control" id="mile_name">
	  					</div>
	  					<div class="form-group">
							<label for="mile_type">Type</label>
	  						<select class="form-control" id="mile_type">
							    <option>competition</option>
							    <option>personal</option>
							  </select>
	  					</div>
	  					<div class="form-group">
							<label for="mile_comments">Comments</label>
							<textarea class="form-control" rows="2" id="mile_comments"></textarea>
	  					</div>
	  					<div class="form-group">
							<label for="mile_date">Date</label>
	  						<input type="date" class="form-control" id="mile_date">
	  					</div>
					</div>

					<div class="panel-footer">
						<button type="button" class="btn btn-default" id="btn_create_mile">Create Milestone</button>
					</div>
				</div>

			</div>
        </div>

    </body>
    
    <footer>
    	<?php include 'php/footer.php'; ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjBf13Qu1XH0l-KcykGEM8LshQFw1c4Bc"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/milestones.js"></script>
    </footer>
</html>
