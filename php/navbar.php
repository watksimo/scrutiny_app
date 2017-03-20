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
		<li id="home_nav_li">
			<a href = "home.php">Home</a>
		</li>
		<li id="chat_nav_li" class="disabled">
			<a href = "#">Trainer Chat</a>
		</li>
		<li id="over_nav_li" class="disabled">
			<a href = "#">Daily Overview</a>
		</li>
		<li id="chart_nav_li" class="disabled">
			<a href = "#">Progress Charts</a>
		</li>
		<li id="progs_nav_li">
			<a href = "programs.php">Programs</a>
		</li>
		<li id="ques_nav_li">
			<a href = "questionnaires.php">Questionnaires</a>
		</li>
		<li id="mile_nav_li">
			<a href = "milestones.php">Milestones</a>
		</li>
		<li id="fb_nav_li" class="disabled">
			<a href = "#">Facebook Group</a>
		</li>
<?php
if( isset($_SESSION['trainer_id']) ) {
	echo '
		<li id="admin_nav_li">
			<a href = "admin.php">Admin</a>
		</li>
		';
}
?>
		<li id='acc_nav_li'>
			<a href = "edit_account.php">Edit Account</a>
		</li>
		<li id='btn_logout'>
			<a href = "#">Logout</a>
		</li>
	</ul>
</div>