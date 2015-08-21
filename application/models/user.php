<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	//validation for registration
	public function validate_reg($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', "Name", 'trim|required');
		$this->form_validation->set_rules('email', "Email", 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', "Password", 'trim|required|min_length[8]|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', "Confirm Password", 'trim|required');
		$this->form_validation->set_rules('date_of_birth', "Date of Birth", 'required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//validation for login
	public function validate_login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', "email", 'trim|required|valid_email');
		$this->form_validation->set_rules('password', "Password", 'trim|required|md5');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	//query for adding a new user to the database.
	public function create($userinfo)
	{	
		$query = "INSERT INTO users(name, email, password, date_of_birth, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($userinfo['name'],$userinfo['email'],$userinfo['password'],$userinfo['date_of_birth']);
		$this->db->query($query, $values);
	}
	//query for retrieving logged_in_user information
	public function find_user($userinfo)
	{
		$query = "SELECT * FROM users WHERE email=? AND password =?";

		return $this->db->query($query, $userinfo)->row_array();
	}

}