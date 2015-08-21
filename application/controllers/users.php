<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function create()
	{
		$this->load->model('user');
		if($this->user->validate_reg($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}
		else 
		{
			$this->user->create($this->input->post());
			$this->session->set_flashdata('success', "<p>User was created successfully! Please login.</p>");
			redirect('/');
		}
	}
	public function login()
	{
		$this->load->model('user');
		if($this->user->validate_login($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}
		$user = $this->user->find_user($this->input->post());
		$this->session->set_userdata('logged_in_user', $user);

		if($user)
		{
			redirect('/appointments');
		}
		else {
			$this->session->set_flashdata('errors', "<p> No user with those email and password</p>");
			redirect('/');
		}
	}
	public function destroy()
	{
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('/');
	}
}

//end of main controller