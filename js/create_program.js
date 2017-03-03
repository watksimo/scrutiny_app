$( function() {

	setHeading();
	setBadge();

	$( "#prog_list" ).sortable();
	$( "#prog_list" ).disableSelection();

	$('.deleteExer').click(function() {
        $(this).closest( ".exer" ).remove();
    });

    $('#btn_add_exer').click(function() {
        var exerVal = $( "#add_exer_select" ).val();

        $('#exer_id').attr('value', exerVal);
        $.ajax({
		    type: "POST",
		    url: "php/get_ind_exercise_data.php",
		    data: {
		    	exer_id: exerVal
		    }
		})
		.done(function (exercise_info) {
		    json_program_list = JSON.parse(exercise_info);

		    $("#exer_title").html(json_program_list["name"]);

		});

		clearModal();
		// Show modal with name populated
		$('#exerDetailsModal').modal('toggle');
    });

    $('#exerDetailsModal').on('hidden.bs.modal', function () {
    	console.log("Modal Close.");
	})

	$('#add_exer_modal').click(function() {
		addExerToList();
		$('#exerDetailsModal').modal('toggle');
        clearModal();
    });

    $('#btn_create_program').click(function() {
    	var exercises = [];
    	var exer_pos = 1;

    	$( ".exer" ).each(function() {
    		exercises.push({
			    exerciseid: parseInt($( this ).find('#list_exer_id').val()),
			    position: exer_pos,
			    num_sets: parseInt($( this ).find('#list_exer_sets').val()),
			    num_reps: $( this ).find('#list_exer_reps').val(),
			    tempo: $( this ).find('#list_exer_tempo').val(),
			    rpe: $( this ).find('#list_exer_rpe').val(),
			    comments: $( this ).find('#list_exer_comments').html()
			});
			 exer_pos = exer_pos + 1;

		});

    	$.ajax({
		    type: "POST",
		    url: "php/create_new_program.php",
		    data: {
		    	program_name: $("#program_details_name").val(),
		    	program_type: $("#program_details_type").val(),
		    	program_comments: $("#program_details_comments").html(),
		    	program_exercises: JSON.stringify(exercises)
		    }
		})
		.done(function (ret_val) {
		    // console.log(ret_val);
		    window.location.replace("programs.php");
		});
    });
});

$.ajax({
    type: "POST",
    url: "php/get_all_exercises.php",
})
.done(function (exercise_list) {
    json_program_list = JSON.parse(exercise_list);
    // console.log(json_program_list);

    var select_box = $("<select id=\"add_exer_select\" />");

	var i;
	for (i = 0; i < json_program_list.length; ++i) {
		var drop_text = json_program_list[i]["name"] + " [" + json_program_list[i]["type"] + "]";
		$("<option />", {value: json_program_list[i]["id"], text: drop_text}).appendTo(select_box);
	}

	select_box.appendTo("#exer_list");
});

function addExerToList() {
	var listItem = document.getElementById("prog_list");
	var exer_name = $( "#exer_title" ).html();
	var exer_sets = $( "#exer_sets" ).val();
	var exer_reps = $( "#exer_reps" ).val();
	var exer_tempo = $( "#exer_tempo" ).val();
	var exer_rpe = $( "#exer_rpe" ).val();
	var exer_comments = $( "#exer_comments" ).val();
	var exer_id = $( "#exer_id" ).val();

	var itemText = `
		<li id="exer_list_cont" class=" exer_li list-group-item col-sm-12">
			<h4>` + exer_name + `</h4>
			<table class="table">
				<thead>
					<tr>
						<th>Sets</th>
						<th>Reps</th>
						<th>Tempo</th>
						<th>RPE</th>
						<th>Comments</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>` + exer_sets + `</td>
						<td>` + exer_reps + `</td>
						<td>` + exer_tempo + `</td>
						<td>` + exer_rpe + `</td>
						<td>` + exer_comments + `</td>
					</tr>
				</tbody>
			</table>
	`;
	console.log(exer_name);
	itemText += `
			<div class="exer hidden">
                ` + exer_name + `
                <div class="form-group">
					<input type="text" class="form-control" id="list_exer_sets" name="list_exer_sets" value="` + exer_sets + `">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="list_exer_reps" name="list_exer_reps" value="` + exer_reps + `">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="list_exer_tempo" name="list_exer_tempo" value="` + exer_tempo + `">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="list_exer_rpe" name="list_exer_rpe" value="` + exer_rpe + `">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="2" id="list_exer_comments">` + exer_comments + `</textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="list_exer_id" id="list_exer_id" value=` + exer_id + `>
				</div>
        	</div>
	        <button type="button" class="deleteExer btn btn-default btn-sm pull-right">
	            <span class="glyphicon glyphicon-remove"></span>
	        </button>
        </li>
	`;

	listItem.innerHTML = listItem.innerHTML + itemText;

	$('.deleteExer').click(function() {
        $(this).closest( ".exer_li" ).remove();
    });	
}

function clearModal() {
	$("exer_sets").val("");
	$("exer_reps").val("");
	$("exer_tempo").val("");
	$("exer_rpe").val("");
	$("exer_comments").val("");
}




