<html>
<title>Home</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="style/style.css" />
<link rel="stylesheet" href="style/TimeCircles.css" />
<link rel="stylesheet" href="style/HomePage.css" />
<script src="style/TimeCircles.js"></script>

</head>
<?php

include('master/Examination.php');

$exam = new Examination;
include('header.php');


?>

		<?php
		if(isset($_SESSION["user_id"]))
		{

		?>
		<br /><br />
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-5">
				<select name="exam_list" id="exam_list" class="form-control input-lg">
					<option value="">Select Exam</option>
					<?php

					echo $exam->Fill_exam_list();

					?>
				</select>
				<br />
				<br />
				<br />
			</div>
			<div class="col-md-3"></div>
		</div>
		<div>
			<span id="exam_details"></span>
		</div>
		<script>
		$(document).ready(function(){

			$('#exam_list').parsley();

			var exam_id = '';

			$('#exam_list').change(function(){

				$('#exam_list').attr('required', 'required');

				if($('#exam_list').parsley().validate())
				{
					exam_id = $('#exam_list').val();
					$.ajax({
						url:"user_ajax_action.php",
						method:"POST",
						data:{action:'fetch_exam', page:'index', exam_id:exam_id},
						success:function(data)
						{
							$('#exam_details').html(data);
						}
					});
				}
			});

			$(document).on('click', '#enroll_button', function(){
				exam_id = $('#enroll_button').data('exam_id');
				$.ajax({
					url:"user_ajax_action.php",
					method:"POST",
					data:{action:'enroll_exam', page:'index', exam_id:exam_id},
					beforeSend:function()
					{
						$('#enroll_button').attr('disabled', 'disabled');
						$('#enroll_button').text('please wait');
					},
					success:function()
					{
						$('#enroll_button').attr('disabled', false);
						$('#enroll_button').removeClass('btn-warning');
						$('#enroll_button').addClass('btn-success');
						$('#enroll_button').text('Enroll success');
					}
				});
			});

		});
		</script>
		<?php
		}
		else
		{
		?>
		<br />
		<br />
		<div  style="background: url('upload/background.jpeg') no-repeat;width:100%;height:100%;">
			<div align="center">
				<br />
				<h2 style="color: white;">Welcome To Online Examination...</h2>
				<br />
				<h4 style="color: yellow;">This platform gives you better way of examination and type of exam you choose..</h4>
				<p style="color:white;">Advantages Of Online Examination</p>
				<p style="color:white;">In India, the bulk of the population is young and is involved in the preparation of various examinations. Test Prep market in India is very big and dynamic. Nearly all of the prestigious institutes in India irrespective of the fact that the courses they offer invariably conduct the entrance examinations to intake the participants. Likewise, there is a big market for the preparation of the entrance exams for government jobs. Millions of aspirants aspire for these prestigious institutes and government jobs. The majority of the entrance exams have a similar pattern. They have Multiple Choice Questions, the time duration is fixed and there is the concept of negative marking.</p>
				<p style="margin-top: 150px;margin-left: 10px;"><a href="register.php" class="btn btn-primary btn-lg">Register</a></p>
				<p><a href="login.php" class="btn btn-success btn-lg">Login</a></p>
				<p><a href="master/login.php" class="btn btn-warning btn-lg">Admin Login</a></p>
			</div>
		</div>
		<?php
		}
		?>
		
	</div>
</div>
</body>
</html>