<!doctype html>
<?php
	session_start();

	if(!isset($_SESSION['client_id'])) {
		 header("Location: login.php");
	}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/calendar.css">
        <!-- Bootstrap -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>

    <body>

        <div class="header row">
            <div class="col-sm-12">
                <h1><span id='page_heading'></span><span class="label label-default pull-right" id='trainer_badge'></span></h1>
            </div>
        </div>
        
       <nav class = "navbar navbar-default" role = "navigation">
   
		   <div class = "navbar-header">
			  <button type = "button" class = "navbar-toggle" 
				 data-toggle = "collapse" data-target = "#example-navbar-collapse">
				 <span class = "sr-only">Toggle navigation</span>
				 <span class = "icon-bar"></span>
				 <span class = "icon-bar"></span>
				 <span class = "icon-bar"></span>
			  </button>

		   </div>
		   
		   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
			
			  <ul class = "nav navbar-nav">
				 <li class = "active">
				 	<a href = "#">Home</a>
				 </li>
				 <li>
				 	<a href = "#">Trainer Chat</a>
				 </li>
				 <li>
				 	<a href = "#">Daily Overview</a>
				 </li>
				 <li>
					<a href = "#">Progress Charts</a>
				 </li>
				 <li>
					<a href = "#">Milestones</a>
				 </li>
				 <li>
					<a href = "#">Facebook Group</a>
				 </li>
				 <li id='btn_logout'>
					<a href = "#">Logout</a>
				 </li>
			  </ul>
		   </div>
		   
		</nav> 

        <div class="content row">
            <div class="container">
			    <hr>
				<div id="calendar"></div>
			</div>
        </div>

    </body>
    
    <footer>
    	<div class="footer">
            <div class="col-sm-12">
            	<div class="pull-right">
	                <p>Scrutiny Strength & Conditioning</p>
	                <p>Site designed and maintained by Mick Watkins</p>
				</div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjBf13Qu1XH0l-KcykGEM8LshQFw1c4Bc"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/home.js"></script>
    </footer>
</html>
