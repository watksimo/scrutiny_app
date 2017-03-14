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
<?php
if(isset($_SESSION['sel_client'])) {
echo '
				<div class="col-sm-5 col-sm-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
';
echo '
								Add Program to ' . $_SESSION['sel_client_name'];
echo '
							</h3>
						</div>

						<div class="panel-body" id="program_list">
							<div class="form-group">
								<label for="prog_start_date">Start Date</label>
								<input type="date" class="form-control" id="prog_start_date">
							</div>
							<div class="form-group">
								<label for="prog_end_date">End Date</label>
								<input type="date" class="form-control" id="prog_end_date">
							</div>
							<div class="form-group">
								<label for="prog_load_lvl">Load level</label>
								<select class="form-control" id="prog_load_lvl">
									<option>amber</option>
									<option>green</option>
								</select>
							</div>
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-default" id="btn_add_program">Add Program</button>
						</div>
					</div>
				</div>
';
echo '
							
				<script type="text/javascript">
					$.ajax({
						type: "POST",
						url: "php/get_program_list.php",
					})
					.done(function (program_list) {
						json_program_list = JSON.parse(program_list);
						// console.log(json_program_list);

						var select_box = $("<select id=\"add_program_select\" />");

						var i;
						for (i = 0; i < json_program_list.length; ++i) {
							var drop_text = json_program_list[i]["name"] + " [" + json_program_list[i]["type"] + "]";
							$("<option />", {value: json_program_list[i]["id"], text: drop_text}).appendTo(select_box);
						}

						select_box.appendTo("#program_list");
					});

					$("#btn_add_program").on("click", function() {
						console.log("Adding program to client");
						$.ajax({
							type: "POST",
							url: "php/add_program.php",
							data: {
								add_prog_id: $("#add_program_select").val(),
								prog_start_date: $("#prog_start_date").val(),
								prog_end_date: $("#prog_end_date").val(),
								prog_load_lvl: $("#prog_load_lvl").val()
							}
						})
						.done(function (sql) {
							console.log(sql);
							window.location.replace("programs.php");
						});
					});
				</script>
';

// Create remove milestone panel
echo '
				<div class="col-sm-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
';
echo '
								Remove Program from ' . $_SESSION['sel_client_name'];
echo '
							</h3>
						</div>

						<div class="panel-body" id="rem_program_list">
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-default" id="btn_rem_prog">Remove Program</button>
						</div>
					</div>
				</div>
';
echo '
				<script type="text/javascript">
					$.ajax({
						type: "POST",
						url: "php/get_curr_program_list.php",
					})
					.done(function (prog_list) {
						json_prog_list = JSON.parse(prog_list);
						// console.log(json_prog_list);

						var select_box = $("<select id=\"rem_prog_select\" />");

						var i;
						for (i = 0; i < json_prog_list.length; ++i) {
							$("<option />", {value: json_prog_list[i]["id"], text: json_prog_list[i]["name"]}).appendTo(select_box);
						}

						select_box.appendTo("#rem_program_list");
					});

					$("#btn_rem_prog").on("click", function() {
						console.log("Removing program from client");
						$.ajax({
							type: "POST",
							url: "php/rem_program.php",
							data: {
								rem_prog_id: $("#rem_prog_select").val()
							}
						})
						.done(function (sql) {
							console.log(sql);
							window.location.replace("programs.php");
						});
					});
				</script>
			</div>
';
echo '
			<div class="row">
				<div align="center">
					<button type="button" class="btn btn-default" id="btn_create_prog">Create New Program</button>
				</div>
			</div>
';
echo '
							
			<script type="text/javascript">
				$("#btn_create_prog").on("click", function() {
					window.location.replace("create_program.php");
				});
			</script>
';
} else {
echo '
			<div class="col-sm-10 col-sm-offset-1" align="center">
				<h3>Select client using button in top right.</h3>
			</div>
';
}
?>
					
			
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
		<script type="text/javascript" src="js/programs.js"></script>
	</footer>
</html>
