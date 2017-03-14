$(function() {
	setHeading();
	setBadge();

	$("#progs_nav_li").addClass("active");

	if(isTrainer == 1) {
		load_trainer_clients();
	}

});

