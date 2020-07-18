<?php

//enroll_exam.php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

$exam->Change_exam_status($_SESSION['user_id']);

include('header.php');

?>

<br />

<b><div>Online Exam List</div></b>
<br />
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="exam_data_table">
				<thead>
					<tr>
						<th>Exam Title</th>
						<th>Date & Time</th>
						<th>Duration</th>
						<th>Total Question</th>
						<th>Right Answer Mark</th>
						<th>Wrong Answer Mark</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</div>
</body>
</html>

<script>

$(document).ready(function(){

		var dataTable = $('#exam_data_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"user_ajax_action.php",
			type:"POST",
			data:{action:'fetch', page:'enroll_exam'}
		},
		"columnDefs":[
			{
				"targets":[0,7],
				"orderable":false,
			},
		],
	});

});

</script>