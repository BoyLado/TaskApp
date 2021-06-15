<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Task','task');
	}

	public function index()
	{
		$this->load->view('task');
	}

	public function add_task()
	{
		$arr_data = ['task' => $this->input->post('task')];
		$result = $this->task->add_task($arr_data);
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function load_task($task_status)
	{
		$result = $this->task->load_task($task_status);
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function update_task()
	{
		$task_id = $this->input->post('id');
		$task_status = $this->input->post('task_status');
		$date_completed = ($task_status=='PENDING')?null:'NOW()';
		$arr_data = [
						'task_status' 	=> $task_status,
						'date_completed' 	=> $date_completed
					];
		$result = $this->task->update_task($task_id,$arr_data);
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function delete_task()
	{
		$task_id = $this->input->post('id');
		$result = $this->task->delete_task($task_id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
}
