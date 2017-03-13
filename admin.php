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

		<div class="container-fluid">

			<div class="header row">
				<div class="col-sm-12">
					<h1><span id='page_heading'></span><span class="label label-default pull-right" id='trainer_badge'></span></h1>
				</div>
			</div>
			
			<nav class = "navbar navbar-default" role = "navigation">
				<?php include 'php/navbar.php'; ?>
			</nav> 

			<div class="content row">
				<div class="col-sm-10 col-sm-offset-1">
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#client_details_pane" role="tab" data-toggle="tab">Client</a></li>
						<li><a href="#trainer_details_pane" role="tab" data-toggle="tab">Trainer</a></li>
					</ul>
				

					<div class="tab-content">
						<div class="tab-pane active" id="client_details_pane">
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										Create New Client
									</h3>
								</div>

								<div class="panel-body" id="client_add_panel">
									<div class="form-group">
										<label for="new_client_name">Name</label>
										<input type="text" class="form-control" id="new_client_name">
									</div>
									<div class="form-group">
										<label for="new_client_type">Type</label>
										<select class="form-control" id="new_client_type">
											<option>strength</option>
											<option>athlete</option>
											<option>gen_pop</option>
										</select>
									</div>
									<div class="form-group">
										<label for="new_client_phone">Phone Number</label>
										<input type="text" class="form-control" id="new_client_phone">
									</div>
									<div class="form-group">
										<label for="new_client_email">Email Address</label>
										<input type="text" class="form-control" id="new_client_email">
									</div>
									<div class="form-group">
										<label for="new_client_comments">Comments</label>
										<textarea class="form-control" rows="2" id="new_client_comments"></textarea>
									</div>
									
								</div>
								<div class="panel-footer">
									<button type="button" class="btn btn-default" id="btn_create_client">Create Client</button>
								</div>
							</div>

						</div>
						<div class="tab-pane" id="trainer_details_pane">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										Create New Trainer
									</h3>
								</div>

								<div class="panel-body" id="trainer_add_panel">
									<div class="form-group">
										<label for="new_trainer_name">Name</label>
										<input type="text" class="form-control" id="new_trainer_name">
									</div>
									<div class="form-group">
										<label for="new_trainer_phone">Phone Number</label>
										<input type="text" class="form-control" id="new_trainer_phone">
									</div>
									<div class="form-group">
										<label for="new_trainer_email">Email Address</label>
										<input type="text" class="form-control" id="new_trainer_email">
									</div>
									<div class="form-group">
										<label for="new_trainer_quals">Qualifications</label>
										<textarea class="form-control" rows="2" id="new_trainer_quals"></textarea>
									</div>
									
								</div>
								<div class="panel-footer">
									<button type="button" class="btn btn-default" id="btn_create_trainer">Create Trainer</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<script type="text/javascript">

				$("#btn_create_client").on("click", function() {
					console.log("Creating new client");
					$.ajax({
						type: "POST",
						url: "php/create_client.php",
						data: {
							new_client_name: $("#new_client_name").val(),
							new_client_type: $("#new_client_type").val(),
							new_client_phone: $("#new_client_phone").val(),
							new_client_email: $("#new_client_email").val(),
							new_client_comments: $("#new_client_comments").html()
						}
					})
					.done(function (sql) {
						console.log(sql);
						window.location.replace("admin.php");
					});
				});

				$("#btn_create_trainer").on("click", function() {
					console.log("Creating new trainer");
					$.ajax({
						type: "POST",
						url: "php/create_trainer.php",
						data: {
							new_trainer_name: $("#new_trainer_name").val(),
							new_trainer_phone: $("#new_trainer_phone").val(),
							new_trainer_email: $("#new_trainer_email").val(),
							new_trainer_quals: $("#new_trainer_quals").val(),
						}
					})
					.done(function (sql) {
						console.log(sql);
						window.location.replace("admin.php");
					});
				});
			</script>

			<div class="row">

				<!-- Create delete user panel -->
				<div class="col-sm-5 col-sm-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Delete User
							</h3>
						</div>

						<div class="panel-body" id="user_list">
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-default" id="btn_del_user">Delete User</button>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-10 col-sm-offset-1" align="center">
							
					<button type="button" class="btn btn-default" id="btn_edit_user">Edit Current User</button>
					<button type="button" class="btn btn-default" onclick="window.location='edit_clients.php';">Edit Clients</button>
				</div>
					
			</div>

			<script type="text/javascript">
					$.ajax({
						type: "POST",
						url: "php/get_user_list.php",
					})
					.done(function (user_list) {
						json_user_list = JSON.parse(user_list);
						// console.log(json_user_list);

						var select_box = $("<select id=\"delete_user_select\" />");

						var i;
						for (i = 0; i < json_user_list.length; ++i) {
							var drop_text = json_user_list[i]["name"] + " [" + json_user_list[i]["type"] + "]";
							$("<option />", {value: json_user_list[i]["id"], text: drop_text}).appendTo(select_box);
						}

						select_box.appendTo("#user_list");
					});

					$("#btn_del_user").on("click", function() {
						console.log("Deleting user");
						if($("#delete_user_select option:selected").text().indexOf("client") >= 0) {
							$.ajax({
								type: "POST",
								url: "php/del_client.php",
								data: {
									del_client_id: $("#delete_user_select").val()
								}
							})
							.done(function (sql) {
								console.log(sql);
								window.location.replace("admin.php");
							});
						} else if($("#delete_user_select option:selected").text().indexOf("trainer") >= 0) {
							$.ajax({
								type: "POST",
								url: "php/del_trainer.php",
								data: {
									del_trainer_id: $("#delete_user_select").val()
								}
							})
							.done(function (sql) {
								console.log(sql);
								window.location.replace("admin.php");
							});
						}
						
					});

					$("#btn_edit_user").on("click", function() {
						window.location.replace("edit_user.php");
					});
				</script>
		</div>

	</body>
	
	<footer>
		<?php include 'php/footer.php'; ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjBf13Qu1XH0l-KcykGEM8LshQFw1c4Bc"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		<script type="text/javascript" src="js/programs.js"></script>
	</footer>
</html>
