<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TaskApp - CRUD</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/izitoast/css/iziToast.css">
</head>
<body>

	<div class="container">
		<h3>TaskApp - CRUD</h3>
		<form id="form_task">
			<div class="row">
				<div class="col-sm-10">
					<input type="text" id="txt_task" class="form-control" placeholder="Input Your Task" required>
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-success btn-block">Save Task</button>
				</div>
			</div>
		</form>

		<br>

		<div class="row">
			<div class="col-sm-6">
				<div class="alert alert-info"><b>PENDING</b> Tasks</div>
				<table class="table table-stripe" id="tbl_pending_task">
					<thead>
						<tr>
							<th>Actions</th>
							<th>Tasks</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>	
			</div>
			<div class="col-sm-6">
				<div class="alert alert-success"><b>COMPLETED</b> Tasks</div>
				<table class="table table-stripe" id="tbl_completed_task">
					<thead>
						<tr>
							<th>Actions</th>
							<th>Tasks</th>
							<th>Date Completed</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	

	<input type="hidden" id="txt_base_url" value="<?php echo base_url() ?>">
	<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.5.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/izitoast/js/iziToast.js"></script>
	<script src="<?php echo base_url(); ?>assets/custom_scripts/task.js"></script>
</body>
</html>