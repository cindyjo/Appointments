<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	
	public function add() {
		$this->load->model('appointment');

		if($this->appointment->validation_add_appointment($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/appointments');
		}
		else 
		{
			$this->appointment->add_appointment($this->input->post());
			redirect('/appointments');
		}
	}
	public function display() {
		date_default_timezone_set('America/Los_Angeles');
		$this->load->model('appointment');
		$list['today']=$this->appointment->get_today_appointments();
		$list['future'] = $this->appointment->get_future_appointments();
		$this->load->view('appointments',$list);
	}
	public function remove($id){

		$this->load->model('appointment');
		$this->appointment->remove($id);
		redirect('/appointments');
	}
	public function edit($id){
		$appoint_id['id']=$id;
		$this->load->view('edit', $appoint_id);
	}
	
	public function update(){
		$this->load->model('appointment');
		$data = $this->input->post();
		if($this->appointment->validation_edit_appointment($data) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/edit/'. $data['id']);
		}
		else 
		{
			$this->appointment->update($data);
			redirect('/appointments');
		}
	}
}