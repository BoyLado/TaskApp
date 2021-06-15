<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Model {

	public function add_task($arr_data)
	{
		$this->db->insert('tasks',$arr_data);
		return ($this->db->affected_rows()!= 0)? true:false;
	}

	public function load_task($task_status)
	{
		$this->db->where('task_status',$task_status);
		$this->db->select('*')->from('tasks');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	public function update_task($task_id,$arr_data)
	{
		$this->db->where('id',$task_id);
		$this->db->update('tasks',$arr_data);
		return ($this->db->affected_rows()!= 0)? true:false;
	}

	public function delete_task($task_id)
	{
		$this->db->where('id',$task_id);
		$this->db->delete('tasks');
		return ($this->db->affected_rows()!= 0)? true:false;
	}	


}