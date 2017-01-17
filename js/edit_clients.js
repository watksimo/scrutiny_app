json_milestones = [];

$('#btn_logout').on('click', function() {
    console.log('Logging out');
    $.ajax({
        type: "POST",
        url: "php/logout.php"
    })
    .done(function (rows_returned) {
        window.location.replace("login.php");
    });
});



$(function() {

	// Get all of the trainers clients
    $.ajax({
        type: "POST",
        url: "php/get_trainers_clients.php",
    })
    .done(function (client_list) {
        json_client_list = JSON.parse(client_list);
        console.log(json_client_list);

        var client_list = $('<ul id="client_list" class="list-group" />');

		var i;
		for (i = 0; i < json_client_list.length; ++i) {
			var li_html = '<li class="list-group-item">';
			li_html = li_html + '<span class="rem_id" style="display:none;">' + json_client_list[i]['id'] + '</span>';
			li_html = li_html + '<span>' + json_client_list[i]['name'] + '</span>';
			li_html = li_html + '<button type="button" class="btn btn-default pull-right remove_client"><span class="glyphicon glyphicon-remove"></span></button>';
			li_html = li_html + '</li>';

			client_list.append(li_html);

		}

		client_list.appendTo('#main_display');

		$('.remove_client').on('click', function(event) {
		    // console.log('Removing client');
		    var rem_client  = $( event.currentTarget ).siblings( ".rem_id" ).text();
		    console.log(rem_client);

		    $.ajax({
		        type: "POST",
		        url: "php/remove_client.php",
				data: {
					rem_client: rem_client
				}
		    })
		    .done(function () {
		        window.location.replace("edit_clients.php");
		    });
		});

	});

});