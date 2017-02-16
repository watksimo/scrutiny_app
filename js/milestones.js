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

$.ajax({
    type: "POST",
    url: "php/get_unused_milestones.php",
})
.done(function (mile_list) {
    json_mile_list = JSON.parse(mile_list);
    // console.log(json_mile_list);

    var select_box = $("<select id=\"del_mile_select\" />");

    var i;
    for (i = 0; i < json_mile_list.length; ++i) {
        $("<option />", {value: json_mile_list[i]["id"], text: json_mile_list[i]["name"]}).appendTo(select_box);
    }

    select_box.appendTo("#del_milestone_list");
});

$("#btn_del_mile").on("click", function() {
    console.log("Removing milestone from client");
    $.ajax({
        type: "POST",
        url: "php/del_milestone.php",
        data: {
            del_mile_id: $("#del_mile_select").val()
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

