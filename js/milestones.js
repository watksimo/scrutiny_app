$('#btn_add_mile').on('click', function() {
    console.log('Adding milestone');
    $.ajax({
        type: "POST",
        url: "php/add_milestone.php",
        data: {
            mile_name: $("#mile_name").val(),
            mile_type: $("#mile_type").val(),
            mile_comments: $("#mile_comments").val(),
            mile_date: $("#mile_date").val()
        }
    })
    .done(function (sql) {
    	console.log(sql);
        // window.location.replace("milestones.php");
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

