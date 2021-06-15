$(document).ready(()=>{

	TASK.load_task('PENDING','tbl_pending_task');
	TASK.load_task('COMPLETED','tbl_completed_task');

	$('#form_task').on('submit',(e)=>{
		e.preventDefault();
		TASK.add_task();
	});

});

const TASK = (()=>{


	let this_task = {};
	let base_url = $('#txt_base_url').val();


	this_task.add_task = ()=>{
		$.ajax({
			url : `${base_url}add-task`,
			method : 'POST',
			data : {
				task : $('#form_task #txt_task').val()
			},
			success : (result)=>
			{
				console.log(result);
				iziToast.success({
					title: 'Success',
					message: 'Task Inserted!',
				});
				TASK.load_task('PENDING','tbl_pending_task');
				$('#form_task #txt_task').val('').focus();
			}
		});
	}

	this_task.load_task = (task_status,tbl_id)=>{
		$.ajax({
			url : `${base_url}load-task/${task_status}`,
			method : 'GET',
			dataType : 'json',
			success : (data)=>
			{
				let tbody = ``;
				let actions = ``;

				$.each(data,function(){
					if(task_status == 'PENDING')
					{
						actions = 
						`<button type="button" class="btn btn-sm btn-success" onclick="TASK.update_task(${this.id},'COMPLETED')">Completed</button>
						<button type="button" class="btn btn-sm btn-danger" onclick="TASK.delete_task(${this.id})">Remove</button>`;
					}
					else
					{
						actions = 
						`<button type="button" class="btn btn-sm btn-info" onclick="TASK.update_task(${this.id},'PENDING')">Back to Pendding</button>
						<button type="button" class="btn btn-sm btn-danger" onclick="TASK.delete_task(${this.id})">Remove</button>`;
					}

					tbody += `<tr>
								<td>
									${actions}
								</td>
								<td>${this.task}</td>
								<td>${this.date_added}</td>
							</tr>`;
				});

				$(`#${tbl_id} tbody`).html(tbody);
			}
		});
	}

	this_task.update_task = (task_id,task_status)=>{
		$.ajax({
			url : `${base_url}update-task`,
			method : 'POST',
			data : {
				id : task_id,
				task_status : task_status
			},
			success : (result)=>
			{
				console.log(result);
				iziToast.success({
					title: 'Success',
					message: 'Task Updated!',
				});
				TASK.load_task('PENDING','tbl_pending_task');
				TASK.load_task('COMPLETED','tbl_completed_task');
			}
		});	
	}

	this_task.delete_task = (task_id)=>{
		if(confirm('Please Confirm!'))
		{
			$.ajax({
				url : `${base_url}delete-task`,
				method : 'POST',
				data : {
					id : task_id
				},
				success : (result)=>
				{
					console.log(result);
					iziToast.success({
						title: 'Success',
						message: 'Task Deleted!',
					});
					TASK.load_task('PENDING','tbl_pending_task');
					TASK.load_task('COMPLETED','tbl_completed_task');
				}
			});
		}
	}


	return this_task;


})();