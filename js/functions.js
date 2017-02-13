
$('#btn_logout').on('click', function() {
    console.log('called');
    $.ajax({
        type: "POST",
        url: "php/logout.php"
    })
    .done(function (rows_returned) {
        window.location.replace("login.php");
    });
});

function setHeading() {
	$.ajax({
        type: "POST",
        url: "php/get_heading_text.php",
    })
    .done(function (heading_text) {
        $('#page_heading').text(heading_text);
    });
}

function setBadge() {
	$.ajax({
        type: "POST",
        url: "php/get_badge_text.php",
    })
    .done(function (badge_text) {
		$('#trainer_badge').text(badge_text);
    });
	
}

json_milestones = [];
function loadMilestoneCalendar() {

    $.ajax({
        type: "POST",
        url: "php/get_milestones.php",
    })
    .done(function (milestones) {
    	console.log(milestones);
        json_milestones = JSON.parse(milestones);
        // console.log(json_milestones);
    });

    // Load calendar js
	$.getScript('http://arshaw.com/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js',function(){
		
		
		var events = new Array();

		var i;
		for (i = 0; i < json_milestones.length; ++i) {
			var temp_event = new Array();
			var temp_date = json_milestones[i]['date'].split('-');
			temp_event['title'] = json_milestones[i]['name'];
			temp_event['start'] = temp_event['end'] = new Date(temp_date[0], parseInt(temp_date[1]-1), temp_date[2]);
			temp_event['allDay'] = true;

			events.push(temp_event);
		}
		console.log(events);

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		console.log(m);
	  
		$('#main_display').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: ''
			},
			editable: true,
			events: events
		});
	})
}
