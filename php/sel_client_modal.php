<!-- Modal -->
<div class="modal fade" id="selectClientModal" tabindex="-1" role="dialog" aria-labelledby="selectClientTitle">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="selectClientTitle" align="center">Select Client</h4>
	  </div>
	  <div class="modal-body">
			<div class="panel-body" id="client_list_div" align="center"></div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<button type="button" class="btn btn-primary" id="select_client_btn">Select Client</button>
	  </div>
	</div>
  </div>
</div>

<script type="text/javascript">
	$("#trainer_badge").click(function() { 
		$("#selectClientModal").modal("toggle");
	});
</script>