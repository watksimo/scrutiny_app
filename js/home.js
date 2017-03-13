json_milestones = [];

$(function() {
	setHeading();
	setBadge();

	$("#home_nav_li").addClass("active");

	if(isTrainer == 1) {

		load_trainer_clients();

	} else {
		loadMilestoneCalendar();
	}
});

