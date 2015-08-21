<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends CI_Model {

	public function validation_add_appointment($post) 
	{
		date_default_timezone_set('America/Los_Angeles');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', "Date", 'required|callback_date_check');
		$this->form_validation->set_rules('time', "Time", 'required');
		$this->form_validation->set_rules('tasks', "Tasks", 'trim|required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function validation_edit_appointment($post)
	{
		date_default_timezone_set('America/Los_Angeles');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', "Date", 'required');
		$this->form_validation->set_rules('time', "Time", 'required');
		$this->form_validation->set_rules('tasks', "Tasks", 'trim|required');
		$this->form_validation->set_rules('status', "Status", 'trim|required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function date_check($date)
	{
		date_default_timezone_set('America/Los_Angeles');

		if(new DateTime() < new DateTime($date))
		{
			$this->form_validation->set_message('time_check', 'The %s field can not be past date');
			return false;
		}
		else
		{	
			return true;
		}
	}
	public function add_appointment($post)
	{
		$query = "INSERT INTO appointments (date, time, tasks, status, created_at, updated_at, user_id) VALUES (?, ?, ?, 'Pending', NOW(), NOW(), ?)";
		$values = array($post['date'], $post['time'], $post['tasks'], $this->session->userdata['logged_in_user']['id']);
		$this->db->query($query, $values);
	}

	public function get_today_appointments()
	{
		$query= "SELECT id, time, tasks, status FROM appointments WHERE date = CURDATE() AND user_id = ? ORDER BY time ASC";
		return $this->db->query($query, $this->session->userdata['logged_in_user']['id'])->result_array();
	}

	public function get_future_appointments()
	{
		$query = "SELECT date, time, tasks, user_id FROM appointments WHERE date != CURDATE() AND user_id = ? ORDER BY date ASC, time DESC ";
		return $this->db->query($query, $this->session->userdata['logged_in_user']['id'])->result_array();
	}
	public function remove($id)
	{
		$query = "DELETE FROM appointments WHERE appointments.id = ?";
		$this->db->query($query, $id);
	}

	public function update($post)
	{
		$query = "UPDATE appointments SET date=?, time=?, tasks=?, status=? WHERE id = ?";	
		$this->db->query($query, $post);
	}
}