<!doctype html>
<?php
	session_start();

	if( !( (isset($_SESSION['client_id'])) || (isset($_SESSION['trainer_id'])) ) ) {
		 header("Location: login.php");
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
					
				<div class="col-sm-6 col-sm-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Clients</h3>

						</div>

						<div class="panel-body">
							<div id="client_list_display"></div>
							<br>
							<span id="add_client_display"></span><button type="button" class="btn btn-default" id="btn_add_client">Add Client</button>

						</div>
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
		<script type="text/javascript" src="js/edit_clients.js"></script>
	</footer>
</html>
