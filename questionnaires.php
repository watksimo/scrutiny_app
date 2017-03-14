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
		<title>Questionnaires</title>

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
								Add Questionnaire to ' . $_SESSION['sel_client_name'];
echo '
							</h3>
						</div>

						<div class="panel-body" id="questionnaire_list">
							<div class="form-group">
								<label for="ques_start_date">Start Date</label>
								<input type="date" class="form-control" id="ques_start_date">
							</div>
							<div class="form-group">
								<label for="ques_end_date">End Date</label>
								<input type="date" class="form-control" id="ques_end_date">
							</div>
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-default" id="btn_add_questionnaire">Add Questionnaire</button>
						</div>
					</div>
				</div>
';
echo '
							
				<script type="text/javascript">
					$.ajax({
						type: "POST",
						url: "php/get_questionnaire_list.php",
					})
					.done(function (questionnaire_list) {
						json_questionnaire_list = JSON.parse(questionnaire_list);
						// console.log(json_questionnaire_list);

						var select_box = $("<select id=\"add_ques_select\" />");

						var i;
						for (i = 0; i < json_questionnaire_list.length; ++i) {
							var drop_text = json_questionnaire_list[i]["name"];
							$("<option />", {value: json_questionnaire_list[i]["id"], text: drop_text}).appendTo(select_box);
						}

						select_box.appendTo("#questionnaire_list");
					});

					$("#btn_add_questionnaire").on("click", function() {
						console.log("Adding questionnaire to client");
						$.ajax({
							type: "POST",
							url: "php/add_questionnaire.php",
							data: {
								add_ques_id: $("#add_ques_select").val(),
								ques_start_date: $("#ques_start_date").val(),
								ques_end_date: $("#ques_end_date").val(),
								ques_load_lvl: $("#ques_load_lvl").val()
							}
						})
						.done(function (sql) {
							console.log(sql);
							window.location.replace("questionnaires.php");
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
								Remove Questionnaire from ' . $_SESSION['sel_client_name'];
echo '
							</h3>
						</div>

						<div class="panel-body" id="rem_ques_list">
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-default" id="btn_rem_ques">Remove Questionnaire</button>
						</div>
					</div>
				</div>
';
echo '
				<script type="text/javascript">
					$.ajax({
						type: "POST",
						url: "php/get_curr_questionnaire_list.php",
					})
					.done(function (ques_list) {
						json_ques_list = JSON.parse(ques_list);
						// console.log(json_ques_list);

						var select_box = $("<select id=\"rem_ques_select\" />");

						var i;
						for (i = 0; i < json_ques_list.length; ++i) {
							$("<option />", {value: json_ques_list[i]["id"], text: json_ques_list[i]["name"]}).appendTo(select_box);
						}

						select_box.appendTo("#rem_ques_list");
					});

					$("#btn_rem_ques").on("click", function() {
						console.log("Removing questionnaire from client");
						$.ajax({
							type: "POST",
							url: "php/rem_questionnaire.php",
							data: {
								rem_ques_id: $("#rem_ques_select").val()
							}
						})
						.done(function (sql) {
							console.log(sql);
							window.location.replace("questionnaires.php");
						});
					});
				</script>
			</div>
';
echo '
			<div class="row">
				<div align="center">
					<button type="button" class="btn btn-default" id="btn_create_ques">Create New Questionnaire</button>
				</div>
			</div>
';
echo '
							
			<script type="text/javascript">
				$("#btn_create_ques").on("click", function() {
					window.location.replace("create_questionnaire.php");
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
		<script type="text/javascript" src="js/questionnaires.js"></script>
	</footer>
</html>
