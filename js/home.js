json_milestones = [];

$(function() {
	setHeading();
	setBadge();

	if(isTrainer == 1) {

	    // Get all of the trainers clients
	    $.ajax({
            type: "POST",
            url: "php/get_trainers_clients.php",
        })
	    .done(function (client_list) {
	        json_client_list = JSON.parse(client_list);
	        // console.log(json_client_list);

	        var select_box = $('<select id="client_select" />');
	        $('<option />', {value: '', text: ''}).appendTo(select_box);

			var i;
			for (i = 0; i < json_client_list.length; ++i) {
				$('<option />', {value: json_client_list[i]['id'], text: json_client_list[i]['name']}).appendTo(select_box);
			}

			select_box.appendTo('#main_display');

			// Change session variable when selected client is changed
		    $( "#client_select" ).change(function() {
				var sel_client;
				$( "select option:selected" ).each(function() {
					sel_client = parseInt($( this ).val());
					sel_client_name = $( this ).text();
				});
				$.ajax({
					type: "POST",
					url: "php/set_trainers_client.php",
					data: {
						sel_client: sel_client
					}
				})
				.done(function () {
					// $('#trainer_badge').text("Viewing: " + sel_client_name);
					// viewing = sel_client_name;
					window.location.replace("home.php");
				});
			});

	    });    

	} else {
		loadMilestoneCalendar();
	}
});

