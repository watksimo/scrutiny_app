$('#btn_create_mile').on('click', function() {
    console.log('Creating milestone');
    $.ajax({
        type: "POST",
        url: "php/create_milestone.php",
        data: {
            mile_name: $("#mile_name").val(),
            mile_type: $("#mile_type").val(),
            mile_comments: $("#mile_comments").val(),
            mile_date: $("#mile_date").val()
        }
    })
    .done(function (sql) {
    	console.log(sql);
        window.location.replace("milestones.php");
    });
});

$(function() {
	setHeading();
	setBadge();

	if(isTrainer == 1) {
	    // setTrainerBadge();
	}

	loadMilestoneCalendar();

});

