$( function() {

	setHeading();
	setBadge();

	$("#acc_nav_li").addClass("active");

    if(isTrainer == 1) {
        load_trainer_clients();
    }

    load_current_details();

});

$('#btn_save_changes').click(function() {
    var accName = $( "#account_details_name" ).val();
    var accPhone = $( "#account_details_phone" ).val();
    var accEmail = $( "#account_details_email" ).val();
    var accQuals = $( "#account_details_quals" ).val();

    $.ajax({
        type: "POST",
        url: "php/save_acc_details.php",
        data: {
            acc_name: accName,
            acc_phone: accPhone,
            acc_email: accEmail,
            acc_quals: accQuals
        }
    })
    .done(function (sql) {
        console.log(sql);
        window.location.replace("edit_account.php");
    });
});

function load_current_details() {
	$.ajax({
        type: "POST",
        url: "php/get_acc_details.php"
    })
    .done(function (acc_details) {
        json_acc_details = JSON.parse(acc_details);
        // console.log(json_acc_details);

        $( "#account_details_name" ).val(json_acc_details["name"]);
		$( "#account_details_phone" ).val(json_acc_details["phone"]);
		$( "#account_details_email" ).val(json_acc_details["email"]);

        if(json_acc_details["trainer"] == 1) {
			$( "#account_details_quals" ).val(json_acc_details["quals"]);
        }

    });
}