function loadMilestoneCalendar() {
	$.ajax({
        type: "POST",
        url: "php/get_client_trainer.php",
    })
    .done(function (client_trainer) {
        json_client_trainer = JSON.parse(client_trainer);
        // console.log(json_client_trainer);
        $('#page_heading').text(json_client_trainer['client'] + "'s Training");
        $('#trainer_badge').text("Trainer: " + json_client_trainer['trainer']);
    });

    $.ajax({
        type: "POST",
        url: "php/get_milestones.php",
    })
    .done(function (milestones) {
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