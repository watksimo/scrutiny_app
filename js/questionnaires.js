$(function() {
	setHeading();
	setBadge();

	$("#ques_nav_li").addClass("active");

	if(isTrainer == 1) {
		load_trainer_clients();
	}

});

